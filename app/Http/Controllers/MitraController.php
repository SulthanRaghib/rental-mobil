<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // https://app.goapi.id/home
        $api_key_goApi = 'TQpJdXsrIsj9CmBCzKOJLvslWZdKx0';
        $provinsi_goApi = json_decode(file_get_contents('https://api.goapi.id/v1/regional/provinsi?api_key=' . $api_key_goApi), true);

        return view('contents.pages.mitra.create', [
            'title' => 'Tambah Mitra',
            'provinsi' => $provinsi_goApi['data'],
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'nama_perusahaan' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'no_telp' => 'required',
        ];

        $messages = [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'nama_perusahaan.required' => 'Nama perusahaan wajib diisi',
            'provinsi.required' => 'Provinsi wajib diisi',
            'kota.required' => 'Kota wajib diisi',
            'kecamatan.required' => 'Kecamatan wajib diisi',
            'kelurahan.required' => 'Kelurahan wajib diisi',
            'no_telp.required' => 'No. Handphone wajib diisi',
        ];

        $request->validate($rules, $messages);

        User::create([
            'kode_user' => $request->kode_user,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => 'Prov. ' . $request->provinsi . ', Kab. ' . $request->kota . ', Kec. ' . $request->kecamatan . ', Kel. ' . $request->kelurahan,
            'no_telp' => $request->no_telp,
            'role_id' => 3,
        ]);

        return redirect()->route('mitra.index')->with('success', 'Data mitra berhasil ditambahkan');
    }

    public function edit($id)
    {
        // https://app.goapi.id/home
        $api_key_goApi = 'TQpJdXsrIsj9CmBCzKOJLvslWZdKx0';
        $provinsi_goApi = json_decode(file_get_contents('https://api.goapi.id/v1/regional/provinsi?api_key=' . $api_key_goApi), true);

        return view('contents.pages.mitra.edit', [
            'title' => 'Edit Mitra',
            'mitra' => User::find($id),
            'provinsi' => $provinsi_goApi['data'],
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
        $rules = [
            'password_lama' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ];

        $messages = [
            'password_lama.required' => 'Password lama wajib diisi',
            'password.required' => 'Password baru wajib diisi',
            'password.confirmed' => 'Password baru tidak sama dengan konfirmasi password',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.same' => 'Konfirmasi password tidak sama dengan password baru',
        ];

        $request->validate($rules, $messages);
        $user = User::find($id);

        if (Hash::check($request->password_lama, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        } else {
            return redirect()->back()->with('password-error', 'Password lama tidak sesuai');
        }


        if (Auth::user()->role_id == 1) {
            return redirect()->route('mitra.index')->with('password-success', 'Password mitra berhasil diubah');
        } else {
            Auth::logout();
            return redirect()->route('login')->with('password-success', 'Password berhasil diubah, Mohon login kembali');
        }
    }
}
