<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use App\User;

class UsersController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $this->authorize('list', User::class);
        
        $users = User::with('profile')->paginate(10);

        return view('dashboard.users.list', [
            'users' => $users
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('view', $user);

        return view('dashboard.users.edit', [
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $data = $this->userService->update($request, $user);

        return redirect()
                ->action('Dashboard\UsersController@edit', ['id' => $data['user']->id])
                ->with('message', $data['message']);
    }

    public function destroy(User $user)
    {
        //
    }
}
