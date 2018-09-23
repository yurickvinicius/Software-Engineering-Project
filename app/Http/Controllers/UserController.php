<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;

class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();

        $user->name = $request->nome;
        $user->email = $request->email;
        unset($user['password']);

        $update = $user->save();

        if($update)
            return redirect()
                    ->route('profile')
                    ->with('sucess', 'Dados atualizados com sucesso!');

        return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar os dados!');
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
                    ->with('sucess', 'Senha alterada com sucesso!');

        return redirect()
                    ->back()
                    ->with('error', 'Falha ao alterar senha!');
    }

    public function delete()
    {
        return view('user.delete');
    }

    public function deleteUser()
    {
        $user = auth()->user();

        $delete = $user->delete();

        if($delete)
            return redirect()
                    ->route('index');

        return redirect()
                    ->back()
                    ->with('error', 'Falha ao desativar conta!');
    }
}
