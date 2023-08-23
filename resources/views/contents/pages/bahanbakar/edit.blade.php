@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Edit Bahan Bakar</h5>

                    <button type="button" class="btn btn-sm btn-warning my-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Kembali <i class="bi bi-arrow-left-circle"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
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
                                    <a href="{{ route('bahanbakar.index') }}" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="table-responsive">

                    <form action="{{ route('bahanbakar.update', $bahan_bakar->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_bahan_bakar" class="form-label">Nama Bahan Bakar</label>
                            <input type="text" class="form-control" id="bahan_bakar" name="nama_bahan_bakar"
                                value="{{ $bahan_bakar->nama_bahan_bakar }}">

                            @error('nama_bahan_bakar')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Bahan Bakar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
