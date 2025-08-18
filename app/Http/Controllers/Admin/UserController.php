<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->when(request('q'), fn($q)=>$q->where('name','like','%'.request('q').'%')
                                          ->orWhere('email','like','%'.request('q').'%'))
            ->latest()->paginate(10)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        // Si no usas mutator, haz: $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('admin.users.index')->with('status','Usuario creado');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        // Si el password viene vacío, no lo toques
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);
        return redirect()->route('admin.users.index')->with('status','Usuario actualizado');
    }

    public function destroy(User $user)
    {
        // Evita auto-eliminarse (política opcional)
        if (auth()->id() === $user->id) {
            return back()->withErrors('No puedes eliminar tu propio usuario.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('status','Usuario eliminado');
    }
}