<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('contents.pages.role.index', [
            'title' => 'Role',
            'role' => Role::all(),
        ]);
    }

    public function create()
    {
        return view('contents.pages.role.create', [
            'title' => 'Role',
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_role' => 'required|unique:roles',
        ];

        $messages = [
            'nama_role.required' => 'Nama role harus diisi.',
            'nama_role.unique' => 'Nama role sudah ada.',
        ];

        $this->validate($request, $rules, $messages);

        Role::create([
            'nama_role' => $request->nama_role,
        ]);

        return redirect()->route('role.index')->with('success', 'Data role berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('contents.pages.role.edit', [
            'title' => 'Role',
            'role' => Role::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_role' => 'required|unique:roles,nama_role,' . $id,
        ];

        $messages = [
            'nama_role.required' => 'Nama role harus diisi.',
            'nama_role.unique' => 'Nama role sudah ada.',
        ];

        $this->validate($request, $rules, $messages);

        Role::find($id)->update([
            'nama_role' => $request->nama_role,
        ]);

        return redirect()->route('role.index')->with('success', 'Data role berhasil diubah.');
    }

    public function destroy($id)
    {
        Role::find($id)->delete();

        return redirect()->route('role.index')->with('success', 'Data role berhasil dihapus.');
    }
}
