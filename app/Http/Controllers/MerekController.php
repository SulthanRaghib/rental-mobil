<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    public function index()
    {
        return view('contents.pages.merek.index', [
            'title' => 'Merek',
            'nama_merek' => Merek::all(),
        ]);
    }

    public function create()
    {
        return view('contents.pages.merek.create', [
            'title' => 'Merek',
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_merek' => 'required|unique:mereks',
        ];

        $messages = [
            'nama_merek.required' => 'Nama merek harus diisi.',
            'nama_merek.unique' => 'Nama merek sudah ada.',
        ];

        $this->validate($request, $rules, $messages);

        Merek::create([
            'nama_merek' => $request->nama_merek,
        ]);

        return redirect()->route('merek.index')->with('success', 'Data merek berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('contents.pages.merek.edit', [
            'title' => 'Merek',
            'merek' => Merek::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_merek' => 'required|unique:mereks,nama_merek,' . $id,
        ];

        $messages = [
            'nama_merek.required' => 'Nama merek harus diisi.',
            'nama_merek.unique' => 'Nama merek sudah ada.',
        ];

        $this->validate($request, $rules, $messages);

        Merek::find($id)->update([
            'nama_merek' => $request->nama_merek,
        ]);

        return redirect()->route('merek.index')->with('success', 'Data merek berhasil diubah.');
    }

    public function destroy($id)
    {
        Merek::find($id)->delete();

        return redirect()->route('merek.index')->with('success', 'Data merek berhasil dihapus.');
    }
}