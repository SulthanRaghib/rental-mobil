@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Detail Mitra</h5>

                    <a href="{{ route('mitra.index') }}" class="btn btn-sm btn-warning my-3">
                        Kembali <i class="bi bi-arrow-left-circle pl-5"></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <div class="row m-0">
                        <div class="col-6">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>Nama Pemilik</th>
                                        <td>{{ $mitra->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $mitra->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <td>{{ $mitra->nama_perusahaan }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $mitra->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Handphone</th>
                                        <td>{{ $mitra->no_telp }}</td>
                                    </tr>
                                    @if ($mitra->id == Auth::user()->id)
                                        <tr>
                                            <th>Action</th>
                                            <td>
                                                {{-- update password label --}}
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#updatePassword">
                                                    Update Password <i class="bi bi-pencil-square"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="updatePassword" data-bs-backdrop="static"
                                                    data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="updatePasswordLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah
                                                                    Password | Pemilik : {{ $mitra->nama }}
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('mitra.updatePassword', $mitra->id) }}"
                                                                    action="POST">
                                                                    @csrf
                                                                    <label for="password">Password Baru</label>
                                                                    <input type="password" name="password" id="password"
                                                                        class="form-control my-2"
                                                                        placeholder="Masukkan Password Baru">
                                                                    @error('password')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror

                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-warning">Simpan</button>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <a href="{{ route('mitra.index') }}"
                                                                    class="btn btn-primary">Kembali</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    @endsection
