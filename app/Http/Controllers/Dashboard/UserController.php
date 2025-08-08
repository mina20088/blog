<?php /** @noinspection PhpVoidFunctionResultUsedInspection */

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $columns = User::listUsersTableColumns('password', 'email_verified_at', 'remember_token', 'deleted_at');

        $users = User::search($request->query('search') ?? "")
            ->sort($request->query('sortBy','id'))
            ->get();

        if(request()->query('search') === null && $request->query('sortBy') === 'id') {
            return redirect()->route('dashboard.users', ['users' => $users]);
        }
        return view('dashboard.users.index', ['users' =>  $users, 'columns' => $columns]);
    }


    public function filter(Request $request)
    {
        $search = $request->query('search') ?? '';

        $sort = $request->query('sortBy') !== "-1" ? $request->query('sortBy') ?? 'id' : 'id';

        dump($sort);

        $users = User::search($search)->sort($sort)->get();

        return view('dashboard.users.index', ['users' => $users]);
    }


}
