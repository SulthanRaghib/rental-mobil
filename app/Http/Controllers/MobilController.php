<?php

namespace App\Http\Controllers;

use App\Models\BahanBakar;
use App\Models\Merek;
use App\Models\Mobil;
use App\Models\TypeMobil;
use App\Models\User;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        return view('contents.pages.mobil.index', [
            'title' => 'Mobil',
            'mobil' => Mobil::selectMobilAll(),
        ]);
    }

    public function detail($id)
    {
        return view('contents.pages.mobil.detail', [
            'title' => 'Mobil',
            'mobil' => Mobil::getDetailMobil($id),
        ]);
    }

    public function create()
    {
        return view('contents.pages.mobil.create', [
            'title' => 'Mobil',
            'merek' => Merek::all(),
            'type_mobil' => TypeMobil::all(),
            'bahan_bakar' => BahanBakar::all(),
            'mitra' => User::all()->where('role_id', 3),
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'kode_mobil' => 'required|unique:mobils',
            'kode_daerah' => 'required',
            'no_polisi' => 'required',
            'kode_wilayah' => 'required',
            'harga_sewa' => 'required',
            'kapasitas' => 'required|numeric',
            'gambar_mobil' => 'required|mimes:jpg,jpeg,png,webp|image',
            'merek_id' => 'required',
            'bahan_bakar_id' => 'required',
            'type_mobil_id' => 'required',
        ];

        $messages = [
            'kode_mobil.required' => 'Kode mobil harus diisi.',
            'kode_mobil.unique' => 'Kode mobil sudah ada.',
            'kode_daerah.required' => 'Kode daerah harus diisi.',
            'no_polisi.required' => 'No polisi harus diisi.',
            'kode_wilayah.required' => 'Kode wilayah harus diisi.',
            'harga_sewa.required' => 'Harga sewa harus diisi.',
            'kapasitas.required' => 'Kapasitas harus diisi.',
            'kapasitas.numeric' => 'Kapasitas harus berupa angka.',
            'gambar_mobil.required' => 'Gambar mobil harus diisi.',
            'gambar_mobil.image' => 'Gambar mobil harus berupa file gambar.',
            'gambar_mobil.mimes' => 'Gambar mobil harus berupa file: jpg, jpeg, png, webp.',
            'merek_id.required' => 'Merek harus diisi.',
            'bahan_bakar_id.required' => 'Bahan bakar harus diisi.',
            'type_mobil_id.required' => 'Tipe mobil harus diisi.',
        ];

        $this->validate($request, $rules, $messages);

        $gambar_nama = 'mobil-' . time() . '.' . $request->gambar_mobil->extension();
        $path = public_path('assets/img/mobil');
        $request->gambar_mobil->move($path, $gambar_nama);
        $harga_sewa_number = str_replace(['Rp. ', '.'], '', $request->harga_sewa);

        Mobil::create([
            'kode_mobil' => $request->kode_mobil,
            'plat_nomor' => $request->kode_daerah . ' ' . $request->no_polisi . ' ' . $request->kode_wilayah,
            'harga_sewa' => $harga_sewa_number,
            'kapasitas' => $request->kapasitas,
            'gambar_mobil' => $gambar_nama,
            'status' => 'Tersedia',
            'merek_id' => $request->merek_id,
            'bahan_bakar_id' => $request->bahan_bakar_id,
            'type_mobil_id' => $request->type_mobil_id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('contents.pages.mobil.edit', [
            'title' => 'Mobil',
            'mobil' => Mobil::find($id),
            'merek' => Merek::with('mobil')->get(),
            'type_mobil' => TypeMobil::with('mobil')->get(),
            'bahan_bakar' => BahanBakar::with('mobil')->get(),
            'mitra' => User::all()->where('role_id', 3)
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'kode_mobil' => 'required|unique:mobils,kode_mobil,' . $id,
            'kode_daerah' => 'required',
            'no_polisi' => 'required',
            'kode_wilayah' => 'required',
            'harga_sewa' => 'required',
            'kapasitas' => 'required|numeric',
            'gambar_mobil' => 'nullable|mimes:jpg,jpeg,png,webp|image',
            'merek_id' => 'required',
            'bahan_bakar_id' => 'required',
            'type_mobil_id' => 'required',
        ];

        $messages = [
            'kode_mobil.required' => 'Kode mobil harus diisi.',
            'kode_mobil.unique' => 'Kode mobil sudah ada.',
            'kode_daerah.required' => 'Kode daerah harus diisi.',
            'no_polisi.required' => 'No polisi harus diisi.',
            'kode_wilayah.required' => 'Kode wilayah harus diisi.',
            'harga_sewa.required' => 'Harga sewa harus diisi.',
            'kapasitas.required' => 'Kapasitas harus diisi.',
            'kapasitas.numeric' => 'Kapasitas harus berupa angka.',
            'gambar_mobil.image' => 'Gambar mobil harus berupa file gambar.',
            'gambar_mobil.mimes' => 'Gambar mobil harus berupa file: jpg, jpeg, png, webp.',
            'merek_id.required' => 'Merek harus diisi.',
            'bahan_bakar_id.required' => 'Bahan bakar harus diisi.',
            'type_mobil_id.required' => 'Tipe mobil harus diisi.',
        ];

        $this->validate($request, $rules, $messages);

        $mobilID = Mobil::find($id);
        $harga_sewa_number = str_replace(['Rp. ', '.'], '', $request->harga_sewa);

        if ($request->gambar_mobil) {
            $gambar_nama = 'mobil-' . time() . '.' . $request->gambar_mobil->extension();
            $path = public_path('assets/img/mobil');
            $request->gambar_mobil->move($path, $gambar_nama);
            $mobilID->gambar_mobil = $gambar_nama;
        }

        $mobilID->kode_mobil = $request->kode_mobil;
        $mobilID->plat_nomor = $request->kode_daerah . ' ' . $request->no_polisi . ' ' . $request->kode_wilayah;
        $mobilID->harga_sewa = $harga_sewa_number;
        $mobilID->kapasitas = $request->kapasitas;
        $mobilID->merek_id = $request->merek_id;
        $mobilID->bahan_bakar_id = $request->bahan_bakar_id;
        $mobilID->type_mobil_id = $request->type_mobil_id;
        $mobilID->user_id = $request->user_id;
        $mobilID->save();

        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil diubah.');
    }

    public function destroy($id)
    {
        Mobil::find($id)->delete();

        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil dihapus.');
    }
}
