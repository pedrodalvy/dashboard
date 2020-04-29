<?php

namespace App\Services;

use App\Admin;
use Hash;
use Illuminate\Http\Request;

class AdminUsersService
{
    public function getAllUsers()
    {
        return Admin::all();
    }

    public function showUser($id)
    {
        $user = Admin::findOrFail($id);

        return view('users.show')
            ->with('user', $user);
    }

    public function editUser($id)
    {
        $user = Admin::findOrFail($id);

        return view('users.edit')
            ->with('user', $user);
    }

    public function updateUser(Request $request, $id)
    {
        $user = Admin::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($user->save()) {
            return redirect(route('user.show', $user->id))
                ->with('success', 'Cadastro alterado com sucesso.');
        }

        return back()->with('error', 'Não foi possível atualizar o cadastro do usuário.');
    }

    public function validateUser(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|string|between:8,16',
            'password_confirm' => 'same:password',
        ];

        $messages = [
            'name.required' => 'É nessessário informar o nome.',
            'name.string' => 'Informe um nome válido.',

            'email.required' => 'É necessário informar o E-Mail.',
            'email.email' => 'Informe um E-Mail válido.',

            'password.string' => 'Informe uma senha válida.',
            'password.between' => 'A senha precisa ter de 8 à 16 digitos.',

            'password_confirm.same' => 'As senhas precisam ser iguais nos dois campos.',
        ];

        return $request->validate($rules, $messages);
    }
}
