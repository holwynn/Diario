<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list', User::class);
        $users = User::with('profile')->paginate(10);

        return view('dashboard.users.list', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('view', User::class);

        return view('dashboard.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', User::class);

        $data = $this->validate($request, [
            'current_password' => 'required|string',
            'password' => 'nullable|string',
            'email' => 'required|email'
        ]);

        if (app('hash')->check($data['current_password'], Auth::user()->password)) {
            if (!empty($data['password'])) {
                $user->password = bcrypt($data['password']);
            }
            $user->email = $data['email'];
            $user->save();

            $message = 'Settings updated successfuly!';
        } else {
            $message = 'Incorrect password';
        }

        return redirect()
                ->action('Dashboard\UsersController@edit', ['id' => $user->id])
                ->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
