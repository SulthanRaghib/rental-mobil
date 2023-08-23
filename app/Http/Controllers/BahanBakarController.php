<?php

namespace App\Http\Controllers;

use App\Models\BahanBakar;
use Illuminate\Http\Request;

class BahanBakarController extends Controller
{
    public function index()
    {
        return view('contents.pages.bahanbakar.index', [
            'title' => 'Bahan Bakar',
            'bahan_bakar' => BahanBakar::all(),
        ]);
    }

    public function create()
    {
        return view('contents.pages.bahanbakar.create', [
            'title' => 'Bahan Bakar',
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_bahan_bakar' => 'required|unique:bahan_bakar',
        ];

        $messages = [
            'nama_bahan_bakar.required' => 'Nama bahan bakar harus diisi.',
            'nama_bahan_bakar.unique' => 'Nama bahan bakar sudah ada.',
        ];

        $this->validate($request, $rules, $messages);

        BahanBakar::create([
            'nama_bahan_bakar' => $request->nama_bahan_bakar,
        ]);

        return redirect()->route('bahanbakar.index')->with('success', 'Data bahan bakar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('contents.pages.bahanbakar.edit', [
            'title' => 'Bahan Bakar',
            'bahan_bakar' => BahanBakar::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_bahan_bakar' => 'required|unique:bahan_bakar,nama_bahan_bakar,' . $id,
        ];

        $messages = [
            'nama_bahan_bakar.required' => 'Nama bahan bakar harus diisi.',
            'nama_bahan_bakar.unique' => 'Nama bahan bakar sudah ada.',
        ];

        $this->validate($request, $rules, $messages);

        BahanBakar::find($id)->update([
            'nama_bahan_bakar' => $request->nama_bahan_bakar,
        ]);

        return redirect()->route('bahanbakar.index')->with('success', 'Data bahan bakar berhasil diubah.');
    }

    public function destroy($id)
    {
        BahanBakar::find($id)->delete();

        return redirect()->route('bahanbakar.index')->with('success', 'Data bahan bakar berhasil dihapus.');
    }
}