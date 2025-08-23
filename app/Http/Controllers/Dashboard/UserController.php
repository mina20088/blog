<?php /** @noinspection PhpVoidFunctionResultUsedInspection */

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchFilterRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Psr\Http\Message\ServerRequestInterface;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function index(request $request)
    {
        $columns = User::listUsersTableColumns('password', 'email_verified_at', 'remember_token', 'deleted_at');
        ds($columns)->cacheOff();

        if (\Session::has('results')) {
            $users = \Session::get('results');
        } else {
            $users = User::sort($request->input('sortBy'), $request->input('dir') ?? 'asc')->get();
        }

        return view('dashboard.users.index', [
            'users' => $users,
            'columns' => $columns,
        ]);
    }

    public function search(SearchFilterRequest $request): \Illuminate\Http\RedirectResponse
    {

        $validated = collect($request->validated());

        $users = User::filterdSearch($validated->get('search'), $validated->get('searchBy'))
            ->sort($validated->get('sortBy'))->get();

        \Session::put('results', $users);

        return redirect()->route('dashboard.users')->withInput();
    }

    public function resetFilters(): \Illuminate\Http\RedirectResponse
    {
        \Session::forget('results');
        return redirect()->route('dashboard.users');
    }

    public function create(){
        return view('dashboard.users.create');
    }

    public function store(Request $request):RedirectResponse{
        ds($request);
        return redirect()->back();
    }


}
