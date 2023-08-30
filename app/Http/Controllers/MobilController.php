<?php

namespace App\Http\Controllers;

use App\Models\BahanBakar;
use App\Models\Merek;
use App\Models\Mobil;
use App\Models\TypeMobil;
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
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'kode_mobil' => 'required|unique:mobils',
            'kode_daerah' => 'required',
            'no_polisi' => 'required',
            'kode_wilayah' => 'required',
            'plat_nomor' => 'unique:mobils',
            'harga_sewa' => 'required',
            'kapasitas' => 'required|numeric',
            'gambar_mobil' => 'required|mimes:jpg,jpeg,png,webp|image',
            'merek_id' => 'required',
            'bahan_bakar_id' => 'required',
            'tipe_mobil_id' => 'required',
        ];

        $messages = [
            'kode_mobil.required' => 'Kode mobil harus diisi.',
            'kode_mobil.unique' => 'Kode mobil sudah ada.',
            'kode_daerah.required' => 'Kode daerah harus diisi.',
            'no_polisi.required' => 'No polisi harus diisi.',
            'kode_wilayah.required' => 'Kode wilayah harus diisi.',
            'plat_nomor.unique' => 'Plat nomor sudah ada.',
            'harga_sewa.required' => 'Harga sewa harus diisi.',
            'kapasitas.required' => 'Kapasitas harus diisi.',
            'kapasitas.numeric' => 'Kapasitas harus berupa angka.',
            'gambar_mobil.required' => 'Gambar mobil harus diisi.',
            'gambar_mobil.image' => 'Gambar mobil harus berupa file gambar.',
            'gambar_mobil.mimes' => 'Gambar mobil harus berupa file: jpg, jpeg, png, webp.',
            'merek_id.required' => 'Merek harus diisi.',
            'bahan_bakar_id.required' => 'Bahan bakar harus diisi.',
            'tipe_mobil_id.required' => 'Tipe mobil harus diisi.',
        ];

        // buat unique plat nomor berdasarkan input no polisi saja, apabila no polisi sudah ada maka tidak bisa membuat plat nomor yang sama
        if ($request->no_polisi) {
            $rules['plat_nomor'] = 'unique:mobils,plat_nomor' . $request->no_polisi;
            $messages['plat_nomor.unique'] = 'Plat nomor sudah ada.';
        }


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
            'tipe_mobil_id' => $request->tipe_mobil_id,
        ]);

        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('contents.pages.mobil.edit', [
            'title' => 'Mobil',
            'mobil' => Mobil::find($id),
            'merek' => Merek::all(),
            'type_mobil' => TypeMobil::all(),
            'bahan_bakar' => BahanBakar::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'kode_mobil' => 'required|unique:mobils,kode_mobil,' . $id,
            'kode_daerah' => 'required',
            'no_polisi' => 'required',
            'kode_wilayah' => 'required',
            'plat_nomor' => 'unique:mobils,plat_nomor,' . $id,
            'harga_sewa' => 'required',
            'kapasitas' => 'required|numeric',
            'gambar_mobil' => 'mimes:jpg,jpeg,png,bmp,gif,svg,webp|image',
            'merek_id' => 'required',
            'bahan_bakar_id' => 'required',
            'tipe_mobil_id' => 'required',
        ];

        $messages = [
            'kode_mobil.required' => 'Kode mobil harus diisi.',
            'kode_mobil.unique' => 'Kode mobil sudah ada.',
            'kode_daerah.required' => 'Kode daerah harus diisi.',
            'no_polisi.required' => 'No polisi harus diisi.',
            'kode_wilayah.required' => 'Kode wilayah harus diisi.',
            'plat_nomor.unique' => 'Plat nomor sudah ada.',
            'harga_sewa.required' => 'Harga sewa harus diisi.',
            'kapasitas.required' => 'Kapasitas harus diisi.',
            'kapasitas.numeric' => 'Kapasitas harus berupa angka.',
            'gambar_mobil.image' => 'Gambar mobil harus berupa file gambar.',
            'gambar_mobil.mimes' => 'Gambar mobil harus berupa file: jpg, jpeg, png, bmp, gif, svg, webp.',
            'merek_id.required' => 'Merek harus diisi.',
            'bahan_bakar_id.required' => 'Bahan bakar harus diisi.',
            'tipe_mobil_id.required' => 'Tipe mobil harus diisi.',
        ];

        $this->validate($request, $rules, $messages);

        $mobil = Mobil::find($id);
        $harga_sewa_number = str_replace(['Rp. ', '.'], '', $request->harga_sewa);

        if ($request->gambar_mobil) {
            $gambar_nama = 'mobil-' . time() . '.' . $request->gambar_mobil->extension();
            $path = public_path('assets/img/mobil');
            $request->gambar_mobil->move($path, $gambar_nama);
            $mobil->update([
                'gambar_mobil' => $gambar_nama,
            ]);
        }

        $mobil->update([
            'kode_mobil' => $request->kode_mobil,
            'plat_nomor' => $request->kode_daerah . ' ' . $request->no_polisi . ' ' . $request->kode_wilayah,
            'harga_sewa' => $harga_sewa_number,
            'kapasitas' => $request->kapasitas,
            'merek_id' => $request->merek_id,
            'bahan_bakar_id' => $request->bahan_bakar_id,
            'tipe_mobil_id' => $request->tipe_mobil_id,
        ]);

        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil diubah.');
    }

    public function destroy($id)
    {
        Mobil::find($id)->delete();

        return redirect()->route('mobil.index')->with('success', 'Data mobil berhasil dihapus.');
    }
}
