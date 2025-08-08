<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HigherOrderWhenProxy;
use LaravelIdea\Helper\App\Models\_IH_User_QB;


/**
 * @method static filterdSearch(array|string $searchParameter, array|string $searchByParameter)
 */
class User extends Model
{
    use SoftDeletes , HasFactory ;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
    ];


    protected $attributes = [
        'locked' => false
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
        'locked' => 'boolean',
    ];

    public function scopeSearch(Builder $query, string $value = ''): _IH_User_QB|Builder|HigherOrderWhenProxy
    {
        return $query->when($value, function ($query) use ($value) {
            $query
                ->where('first_name', 'like', '%' . $value . '%')
                ->orWhere('last_name', 'like', '%' . $value . '%')
                ->orWhere('username', 'like', '%' . $value . '%')
                ->orWhere('email', 'like', '%' . $value . '%');
        });
    }

    protected function scopeFilterdSearch(Builder $query, string $searchParameter = '', array $filterdColumns = []): _IH_User_QB|Builder|HigherOrderWhenProxy
    {
       return $query->when($searchParameter && $filterdColumns , function ($query) use ($searchParameter, $filterdColumns) {
                foreach ($filterdColumns as $column) {
                    $query->orWhere($column , 'like', '%' . $searchParameter . '%');
                }
        });
    }

    protected function scopeSort(Builder $query, string $value): _IH_User_QB|Builder {
        return $query->orderBy($value);
    }

    public static function listUsersTableColumns(string ...$except): array
    {
        $usersTableColumns = DB::getSchemaBuilder()->getColumnListing('users');

        $columns = array_combine($usersTableColumns, $usersTableColumns);

        return Arr::except($columns,$except);

    }


}
