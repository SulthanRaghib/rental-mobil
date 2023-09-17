@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Tambah Mitra</h5>

                    <button type="button" class="btn btn-sm btn-warning my-3" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Kembali <i class="bi bi-arrow-left-circle"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop"data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Anda yakin ingin kembali? data yang telah diinputkan tidak akan tersimpan dan akan
                                    hilang.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{ route('mitra.index') }}" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <form action="{{ route('mitra.update', $mitra->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="nama">Nama Pemilik</label>
                                    <input type="text" name="nama" id="nama" class="form-control mb-3"
                                        placeholder="Masukkan Nama Pemilik" value="{{ $mitra->nama }}">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="nama_perusahaan">Nama Perusahaan</label>
                                    <input type="text" name="nama_perusahaan" id="nama_perusahaan"
                                        class="form-control mb-3" placeholder="Masukkan Nama Perusahaan"
                                        value="{{ $mitra->nama_perusahaan }}">
                                    @error('nama_perusahaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="no_telp">No Handphone</label>
                                    <input type="text" name="no_telp" id="no_telp" class="form-control mb-3"
                                        placeholder="Masukkan No Handphone" value="{{ $mitra->no_telp }}">
                                    @error('no_telp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="email">Email Mitra</label>
                                <input type="email" name="email" id="email" class="form-control mb-3"
                                    placeholder="Masukkan Email Mitra" value="{{ $mitra->email }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control mb-3">{{ $mitra->alamat }}</textarea>
                                @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Mitra</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // buat input dengan eye
        const togglePassword = document.querySelector('#button-view');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.innerHTML = `<i class="bi bi-eye${type === 'password' ? '-slash' : ''}"></i>`;
        });
    </script>
@endsection
