<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('contents.pages.user.index', [
            'title' => 'User',
            'user' => User::all(),
        ]);
    }

    public function create()
    {
        return view('contents.pages.user.create', [
            'title' => 'Tambah User',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'email_user' => 'required|unique:users',
            'password' => 'required',
            'alamat_user' => 'required',
            'no_hp' => 'required',
        ]);

        User::create([
            'nama_user' => $request->nama_user,
            'email_user' => $request->email_user,
            'password' => Hash::make($request->password),
            'alamat_user' => $request->alamat_user,
            'no_hp' => $request->no_hp,
            'role_id' => 2,
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('contents.pages.user.edit', [
            'title' => 'Edit User',
            'user' => User::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_user' => 'required',
            'email_user' => 'required',
            'alamat_user' => 'required',
            'no_hp' => 'required',
        ]);

        User::find($id)->update([
            'nama_user' => $request->nama_user,
            'email_user' => $request->email_user,
            'alamat_user' => $request->alamat_user,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diubah');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus');
    }
}
