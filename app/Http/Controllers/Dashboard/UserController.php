<?php /** @noinspection PhpVoidFunctionResultUsedInspection */

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchFilterRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Psr\Http\Message\ServerRequestInterface;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function index(SearchFilterRequest $request)
    {
        Cache::put('columns',User::listUsersTableColumns('password', 'email_verified_at', 'remember_token', 'deleted_at'));

        $valid = collect($request->validated());

        $users = User::filterdSearch($valid->get('search') , $valid->get('searchBy'))
            ->sort($valid->get('sortBy'))->get();

        return view('dashboard.users.index', [
            'users' => $users,
            'columns' => Cache::get('columns'),
        ]);
    }



}
