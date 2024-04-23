<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //buat nampilin data users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    //untuk tambah data users
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|max:255',
        'telepon' => 'required|max:255',
        'alamat' => 'required|max:255',
        'role' => 'required|in:admin,pembeli',
    ]);

    User::create($validatedData);

    return redirect()->route('users.index')->with('success', 'Data pengguna berhasil ditambahkan!');
}

//untuk edit data user
public function edit($id)
{
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email,'.$id,
        'password' => 'nullable|max:255',
        'telepon' => 'required|max:255',
        'alamat' => 'required|max:255',
        'role' => 'required|in:admin,pembeli',
    ]);

    if ($request->has('password')) {
        $validatedData['password'] = bcrypt($request->password);
    }

    $user->update($validatedData);

    return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui!');
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'Data pengguna berhasil dihapus!');
}


}
