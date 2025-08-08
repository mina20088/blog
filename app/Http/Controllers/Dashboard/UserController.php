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

        $searchParameter = $request->query('search', '');
        $searchByParameter = $request->query('searchBy', []);
        $sortByParameter = $request->query('sortBy', 'id');

        // Always build the base query with filtered search
        $usersQuery = User::filterdSearch($searchParameter, $searchByParameter);

        // Apply sorting only if sortBy parameter is set and not "-1"
        if ($sortByParameter !== '-1') {
            $usersQuery = $usersQuery->sort($sortByParameter);
        }

        return view('dashboard.users.index', [
            'users' => $usersQuery->get(),
            'columns' => $columns,
        ]);
    }



}
