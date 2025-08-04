<?php

namespace App\Services;

use App\Helpers\Logger;
use App\Models\User;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Service class for managing user data operations.
 *
 * Provides CRUD (Create, Read, Update) functionality for the 'auth' table,
 * including duplicate prevention, logging, and error handling. All database
 * operations are wrapped in try-catch blocks with comprehensive logging.
 */
class UsersService
{
    /**
     * Retrieve all user records from the 'auth' table.
     *
     * Fetches all rows from the 'auth' table and returns them as a collection.
     * If an exception occurs during the query, the error is logged and false is returned.
     *
     * @return Collection|bool  Collection of user records on success, or false on failure.
     */
    public function all(): Collection|bool
    {
        try {
            return DB::table("auth")->get();
        } catch (Exception $e) {
            Logger::logger('error',$e->getMessage(), $e);
        }

        return false;
    }

    public function allToArray(): array
    {
        return $this->all()->toArray();
    }

    /**
     * Retrieve the first user record matching a given attribute and value.
     *
     * Searches the 'auth' table for the first record where the specified attribute equals the provided value.
     * Returns the user record as an object if found, or false if an exception occurs or no record is found.
     * All exceptions are logged.
     *
     * @param  string  $attribute  The column name to filter by.
     * @param  string  $value      The value to match for the specified attribute.
     * @return object|false        The user records object on success, or false on failure.
     */

    public function get(string $attribute, string $value): mixed
    {
        try {
            return DB::table("auth")->where($attribute, $value)->first();
        } catch (Exception $e) {
            Logger::logger('error',$e->getMessage(), $e);
        };

        return false;
    }

    /**
     * Insert a new user record into the 'auth' table.
     *
     * Attempts to create a new user record using the provided data array.
     * Log the insertion attempt and any exceptions that occur.
     *
     * @param  array  $data  The associative array of user attributes and values to insert.
     * @return bool          True if the record was inserted successfully, false otherwise.
     */
    public function create(array $data): bool
    {
        try {
            Logger::logger('info','inserted',(array)$data);
            Log::info('inserted', $data);
            return DB::table("auth")->insert($data);
        } catch (Exception $e) {
            Log::error($e->getMessage(), (array)$e);
        }

        return false;

    }

    /**
     * Attempts to insert a new user record into the 'auth' table, ignoring the operation if a duplicate exists.
     *
     * This method uses an "insert or ignore" strategy to prevent duplicate entries based on unique constraints
     * (such as email or username). If a duplicate is detected, it logs detailed information about the conflict.
     * All operations and exceptions are logged for monitoring and debugging purposes.
     *
     * @param array $data Associative array containing user data to insert (e.g., 'email', 'username', etc.).
     * @return int Returns 0 if the insert is ignored due to a duplicate or if an error occurs.
     */

    public function createWithoutDuplicate(array $data): int
    {

        try {

            $rows = Db::table("auth")->insertOrIgnore($data);

            if($rows === 0) {
                Logger::logger('error','Ignored Insert Because Of Duplicate ', $data , ['duplicate' =>
                    [
                        'email' => $this->checkExistence('email', $data['email']),
                        'username' => $this->checkExistence('username',$data['username']),
                    ]
                ]);

                return 0;
            }

            Logger::logger('info','user inserted successfully', $data);

        } catch (Exception $e) {
            Logger::logger('error',$e->getMessage(), $e ,[$e->getTrace()]);
        }

        return 0;

    }


    /**
     * Insert a new user record into the 'auth' table and return its ID.
     *
     * Attempts to create a new user record with the provided data and returns the auto-incremented ID of the inserted record.
     * If an exception occurs during the insertion, logs the error and returns 0.
     *
     * @param  array  $data  The associative array of user attributes and values to insert.
     * @return int           The ID of the newly inserted user record, or 0 on failure.
     */
    public function createAndGetId(array $data): int
    {
        try{

            return DB::table('auth')->insertGetId($data);

        }
        catch (Exception $e)
        {

            Logger::logger('error',$e->getMessage(), $e);

        }
        return 0;
    }


    /**
     * Update user records in the 'auth' table based on a given attribute and value, and return the updated record.
     *
     * Attempts to update one or more user records where the specified attribute matches the given value.
     * After a successful update, retrieves and returns the updated user record.
     * If an exception occurs during the update, the error is logged and false is returned.
     *
     * @param array $data The associative array of columns and values to update.
     * @param string $attribute The column name to use in the WHERE clause.
     * @param string $value The value to match for the specified attribute.
     * @return object|false|array The updated user record object on success, or false on failure.
     */
    public function update(array $data,string $attribute , string $value): object|false|array
    {
        try
        {
            $userBeforeUpdate = $this->get($attribute, $value);

            $update =  DB::table('auth')->where($attribute, $value)->update($data);

            Logger::logger('info', 'user with username ' . $data['username'] . ' updated' , context:  [
                'data' => ['searchBy' => $attribute, 'user-before-update' => $userBeforeUpdate ],
                'update' =>  UsersService::latest(),
                'updated' => $update
            ] );

            return $this->get($attribute, $data[$attribute]);
        }
        catch (Exception $e)
        {
            Logger::logger('error',$e->getMessage(), $e);
        }

        return [];

    }


    /**
     * Updates an existing user record or creates a new one in the 'auth' table.
     *
     * Searches for a user using the specified attributes. If a matching user exists,
     * updates the record with the provided data. If no match is found, inserts a new user record.
     * Logs the operation and returns the latest user data on success, or an empty array on failure.
     *
     * @param array $attributes Key-value pairs to search for an existing user (e.g., ['email' => 'user@example.com']).
     * @param array $data Key-value pairs to update or insert (e.g., ['username' => 'newuser']).
     * @return array The latest user data if successful, or an empty array on error.
     */

    public function UpdateOrCreate(array $attributes, array $data): array
    {
        try
        {
            $updatedOrCreated = DB::table('auth')->updateOrInsert($attributes, $data);

            $updatedUser = UsersService::latest();

            Logger::logger('info', 'user with username ' . $data['username'] . ' updated' , context:  [
                'data' => ['searchBy' => $attributes, 'toUpdate' => $data],
                'update' =>  $updatedOrCreated,
                'updated' => $updatedUser
            ] );

            return $updatedUser;
        }
        catch (Exception $e){
            Logger::logger('error',$e->getMessage(), $e);
        }

        return [];
    }

    /**
     * Check if a user record exists in the 'auth' table for a given column and value.
     *
     * Queries the 'auth' table to determine if any record matches the specified column and value.
     *
     * @param  string  $column  The column name to search by (e.g., 'email', 'username').
     * @param  string  $value   The value to match in the specified column.
     * @return bool             True if a matching record exists, false otherwise.
     */

    public function checkExistence(string $column, string $value): bool
    {
        return DB::table("auth")->where($column, $value)->exists();
    }


    /**
     * Retrieves the most recently updated user record from the 'auth' table.
     *
     * By default, this method orders auth by the 'updated_at' column in descending order
     * and returns the first (latest) record. You can specify a different column to sort by if needed.
     *
     * @param string $column The column to use for ordering (default: 'updated_at').
     * @return mixed The latest user record, or null if no records are found.
     */

    public static function latest(string $column = "updated_at" ): mixed
    {
        return Db::table("auth")->latest($column)->first();
    }

    public function listUsersTableColumns(string ...$except)
    {
        $usersTableColumns = DB::getSchemaBuilder()->getColumnListing('auth');

        $columns = array_combine($usersTableColumns, $usersTableColumns);

        return Arr::except($columns,$except);

    }






}
