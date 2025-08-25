<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HigherOrderWhenProxy;
use LaravelIdea\Helper\App\Models\_IH_User_QB;



/**
 * @method static filterdSearch(array|string $searchParameter = null , array $searchByParameter = null ):_IH_User_QB|Builder|HigherOrderWhenProxy
 * @method static sort(mixed $get)
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
     

    public function profile() :HasOne
    {
        return $this->hasOne(Profile::class);
    }


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

    protected function scopeFilterdSearch(Builder $query, string $searchParameter , array $filterdColumns ): _IH_User_QB|Builder|HigherOrderWhenProxy
    {
        $search = $searchParameter ?? '' ;
        $filters = $filterdColumns ?? [];

        return  $query->when($search  && $filters , function ($query) use ($search, $filters) {
            $query->where(function ($query) use ($search, $filters) {
                foreach ($filters as $column) {
                    $query->orWhere($column , 'like', '%' . $search . '%');
                }
            });

        });

    }

    protected function scopeSort(Builder $query, string $sortColumn, string $dir = 'asc'): _IH_User_QB|Builder
    {
        $column = $sortColumn ?? 'id';
        if($column === '-1'){
            return $query->orderBy('id', $dir);
        }
        return $query->orderBy($column, $dir);
    }

    public static function listUsersTableColumns(string ...$except): array
    {
        $usersTableColumns = DB::getSchemaBuilder()->getColumnListing('users');

        $columns = array_combine($usersTableColumns, $usersTableColumns);

        return Arr::except($columns,$except);

    }


}
