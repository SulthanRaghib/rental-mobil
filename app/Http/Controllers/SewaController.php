<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Sewa;
use App\Models\User;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    public function store(Request $request)
    {
        $rule = [
            'nama' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required',
            'tanggal_sewa' => 'required|after_or_equal:today',
            'waktu_sewa' => 'required|after_or_equal:today',
            'tanggal_kembali' => 'required|after_or_equal:tanggal_sewa',
            'waktu_kembali' => 'required|after_or_equal:waktu_sewa',
            'total_bayar' => 'required',
        ];

        $message = [
            'nama.required' => 'Nama harus diisi.',
            'no_ktp.required' => 'No KTP harus diisi.',
            'no_telp.required' => 'No Handphone harus diisi.',
            'tanggal_sewa.required' => 'Tanggal sewa harus diisi.',
            'tanggal_sewa.after_or_equal' => 'Tanggal sewa harus lebih dari atau sama dengan hari ini.',
            'waktu_sewa.required' => 'Waktu sewa harus diisi.',
            'waktu_sewa.after_or_equal' => 'Waktu sewa harus lebih dari atau sama dengan hari ini.',
            'tanggal_kembali.required' => 'Tanggal kembali harus diisi.',
            'tanggal_kembali.after_or_equal' => 'Tanggal kembali harus lebih dari atau sama dengan tanggal sewa.',
            'waktu_kembali.required' => 'Waktu kembali harus diisi.',
            'waktu_kembali.after_or_equal' => 'Waktu kembali harus lebih dari atau sama dengan waktu sewa.',
            'total_bayar.required' => 'Total bayar harus diisi.',
        ];

        $request->validate($rule, $message);

        $total = $request->total_bayar;
        $total_bayar = preg_replace('/[^0-9]/', '', $total);

        Sewa::create([
            'tanggal_sewa' => $request->tanggal_sewa,
            'waktu_sewa' => $request->waktu_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'waktu_kembali' => $request->waktu_kembali,
            'total_bayar' => $total_bayar,
            'no_ktp' => $request->no_ktp,
            'status' => 'Menunggu Pembayaran',
            'user_id' => $request->user_id,
            'mobil_id' => $request->mobil_id,
        ]);

        $mobil = Mobil::find($request->mobil_id);
        $mobil->status = 'Tidak Tersedia';
        $mobil->save();

        $user = User::find($request->user_id);
        $user->no_telp = $request->no_telp;
        $user->save();

        return redirect()->route('homepage')->with('success', 'Pemesanan berhasil dilakukan.');
    }

    public function cekSewa()
    {
        $id = auth()->user()->id;
        $findUser = User::find($id)->get('id');

        return view('contents.pages.sewa.cekSewa', [
            'title' => 'Cek Sewa',
            'sewa' => Sewa::selectSewaAll(),
            'user' => $findUser,
        ]);
    }
}
