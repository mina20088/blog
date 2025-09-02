<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HigherOrderWhenProxy;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelIdea\Helper\App\Models\_IH_User_QB;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;



/**
 * @method static filterdSearch(array|string $searchParameter = null, array $filterdColumns = []): _IH_User_QB|Builder|HigherOrderWhenProxy
 * @method static sort(mixed $get)
 */
class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $attributes = [
        'locked' => false,
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
        'locked' => 'boolean',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function scopeSearch(Builder $query, string $value = '')
    {
        $query->when($value, function ($query) use ($value) {
            $query
                ->where('first_name', 'like', '%' . $value . '%')
                ->orWhere('last_name', 'like', '%' . $value . '%')
                ->orWhere('username', 'like', '%' . $value . '%')
                ->orWhere('email', 'like', '%' . $value . '%');
        });
    }

    protected function scopeFilterdSearch(Builder $query, string $searchParameter = '', array $filterdColumns = [])
    {
        $query->when($searchParameter || $filterdColumns, function ($query) use ($searchParameter, $filterdColumns) {
            $query->where(function ($query) use ($searchParameter, $filterdColumns) {
                foreach ($filterdColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $searchParameter . '%');
                }
            });
        });
    }

    protected function scopeSort(Builder $query, string $sortColumn = null, string $dir = 'asc'): _IH_User_QB|Builder
    {
        $column = $sortColumn ?? 'id';
        if ($column === '-1') {
            return $query->orderBy('id', $dir);
        }
        return $query->orderBy($column, $dir);
    }

    public static function listUsersTableColumns(string ...$except): array
    {
        $usersTableColumns = DB::getSchemaBuilder()->getColumnListing('users');
        $columns = array_combine($usersTableColumns, $usersTableColumns);

        return Arr::except($columns, $except);
    }
}
