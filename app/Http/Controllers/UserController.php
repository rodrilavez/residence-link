<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Solo admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return User::all();
    }

    public function show(Request $request, User $user)
    {
        // Admin o el propio usuario
        if ($request->user()->role === 'admin' || $request->user()->id === $user->id) {
            return $user;
        }

        return response()->json(['message' => 'No autorizado'], 403);
    }

    public function store(Request $request)
    {
        // Solo admin crea usuarios
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,guard,residente'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        // Solo admin o el mismo usuario puede actualizar
        if ($request->user()->role !== 'admin' && $request->user()->id !== $user->id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $data = $request->validate([
            'name' => 'sometimes',
            'email' => 'sometimes|email|unique:users,email,'.$user->id,
            'password' => 'sometimes|min:6',
            'role' => 'sometimes|in:admin,guard,residente'
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        return response()->json($user, 200);
    }

    public function destroy(Request $request, User $user)
    {
        // Solo admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $user->delete();
        return response()->json(null, 204);
    }
}
