<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MitraController extends Controller
{
    public function index()
    {
        return view('contents.pages.mitra.index', [
            'title' => 'Mitra',
            'mitra' => User::all()->where('role_id', 3)
        ]);
    }

    public function create()
    {
        return view('contents.pages.mitra.create', [
            'title' => 'Tambah Mitra',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:mitras',
            'password' => 'required',
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'role_id' => 3,
        ]);

        return redirect()->route('mitra.index')->with('success', 'Data mitra berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('contents.pages.mitra.edit', [
            'title' => 'Edit Mitra',
            'mitra' => User::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        User::find($id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        return redirect()->route('mitra.index')->with('success', 'Data mitra berhasil diubah');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('mitra.index')->with('success', 'Data mitra berhasil dihapus');
    }

    public function detail($id)
    {
        return view('contents.pages.mitra.detail', [
            'title' => 'Detail Mitra',
            'mitra' => User::find($id),
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        User::find($id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('mitra.index')->with('success', 'Password mitra berhasil diubah');
    }
}
