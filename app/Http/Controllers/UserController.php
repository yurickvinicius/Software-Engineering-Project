<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\User;

class UserController extends Controller
{
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

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

    public function destroy($id){
        $delete = $this->userModel
            ->find($id)
            ->update(
                [
                    'in_use' => 0,
                ]
            );
        if($delete)
            return redirect()
                    ->route('userListing');
        return redirect()
                    ->back()
                    ->with('error', 'Failed to disable account!');
    }

    public function deactivateUser()
    {
        $user = auth()->user();
        //$delete = $user->delete();
        $delete = $user->update(
                        [
                            'in_use' => 0,
                        ]
                    );
        if($delete)
            return redirect()
                    ->route('index');
        return redirect()
                    ->back()
                    ->with('error', 'Failed to disable account!');
    }

    public function createUser()
    {
        return view('user.createUser');
    }

    public function storeUser(UserRequest $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $create = $this->userModel->create($data);
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
        $users = $this->userModel
            ->where('in_use','<>',0)
            ->paginate(10);
        return view('user.list', compact('users'));
    }

    public function showUser(Request $request) {
        $user = $this->userModel->find($request->id);
        return view('user.show', compact('user'));
    }

    public function editUser(Request $request) {
        $user = $this->userModel->find($request->id);
        return view('user.edit', compact('user'));
    }

    public function updateUser(Request $request) {
        $user = $this->userModel->find($request->id);
        // dd($user);
        $user->name = $request->name;
        $user->login = $request->login;
        $user->email = $request->email;
        if($user['password'] != null)
        $user['password'] = bcrypt($user['password']);
        else unset($user['password']);
        $update = $user->save();

        if($update)
        return redirect()
        ->route('userListing')
        ->with('sucess', 'Update user successfully!');

        return redirect()
        ->back()
        ->with('error', 'Failed update user!');
    }
}
