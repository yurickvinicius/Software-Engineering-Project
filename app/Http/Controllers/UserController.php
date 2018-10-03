<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
<<<<<<< HEAD

class UserController extends Controller
{
=======
use App\User;

class UserController extends Controller
{
    private $userModel;

    public function __construct(User $user)
    {
        $this->$userModel = $user;
    }

>>>>>>> 21d1c8392af21e38b5a78c128fb2dc62667aabbb
    public function profile()
    {
        return view('user.profile');
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;
        unset($user['password']);

        $update = $user->save();

        if($update)
            return redirect()
                    ->route('profile')
                    ->with('sucess', 'Data updated successfully!');

        return redirect()
                    ->back()
                    ->with('error', 'Failed to update data!');
    }

    public function settings()
    {
        return view('user.settings');
    }

    public function settingsUpdate(Request $request)
    {
        $user = $request->all();

        if($user['password'] != null)
            $user['password'] = bcrypt($user['password']);
        else unset($user['password']);

        $update = auth()->user()->update($user);

        if($update)
            return redirect()
                    ->route('settings')
                    ->with('sucess', 'Password updated successfully!');

        return redirect()
                    ->back()
                    ->with('error', 'Failed to update password!');
    }

    public function deactivate()
    {
        return view('user.deactivate');
    }

    public function deactivateUser()
    {
        $user = auth()->user();

        $delete = $user->delete();

        if($delete)
            return redirect()
                    ->route('index');

        return redirect()
                    ->back()
                    ->with('error', 'Failed to disable account!');
    }
<<<<<<< HEAD
=======

    public function createUser()
    {
        return view('user.createUser');
    }

    public function saveUser(Requester $requester)
    {
        $create = $this->userModel->create($requester->all());

        if($create)
            return redirect()
                    ->route('userListing')
                    ->with('sucess', 'Create user successfully!');

        return redirect()
                    ->back()
                    ->with('error', 'Failed create user!');
    }

    public function userListing()
    {
        $users = User::paginate(10);
        return view('user.list', compact('users'));
    }
>>>>>>> 21d1c8392af21e38b5a78c128fb2dc62667aabbb
}
