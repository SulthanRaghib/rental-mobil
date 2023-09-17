@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Table Mitra</h5>
                    {{-- RULES ADMIN --}}
                    @if (Auth::user()->role_id == 1)
                        <a href="{{ route('mitra.create') }}" class="btn btn-sm btn-primary my-3">
                            Tambah Mitra <i class="bi bi-plus-circle pl-5"></i>
                        </a>
                    @endif
                    {{-- END RULES ADMIN --}}
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mitra</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <th>No. Handphone</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        @if ($mitra->isEmpty())
                            <tbody>
                                <tr>
                                    <td colspan="8" class="text-center">Data Kosong</td>
                                </tr>
                            </tbody>
                        @endif
                        <tbody>
                            @foreach ($mitra as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->nama_perusahaan }}</td>
                                    <td>{{ $m->alamat }}</td>
                                    <td>{{ $m->no_telp }}</td>
                                    {{-- RULES MITRA --}}
                                    @if (Auth::user()->role_id == 3)
                                        @if (Auth::user()->id == $m->id)
                                            <td>
                                                <a href="{{ route('mitra.detail', $m->id) }}" class="btn btn-sm btn-info">
                                                    Detail <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('mitra.edit', $m->id) }}" class="btn btn-sm btn-warning">
                                                    Edit <i class="bi bi-pencil-square"></i>
                                                </a>
                                                {{-- <form action="{{ route('mitra.destroy', $m->id) }}" method="POST"
                                                class="d-inline btn_hapus">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger btn_hapus"
                                                    onclick="btn_hapus('{{ $m->nama_pemilik }}')">Hapus <i
                                                        class="bi bi-trash"></i>
                                                </button>
                                            </form> --}}
                                            </td>
                                        @else
                                            <td>
                                                <a href="{{ route('mitra.detail', $m->id) }}" class="btn btn-sm btn-info">
                                                    Detail <i class="bi bi-eye"></i>
                                                </a>
                                            </td>
                                        @endif
                                    @endif
                                    {{-- END RULES MITRA --}}
                                    {{-- RULES ADMIN --}}
                                    @if (Auth::user()->role_id == 1)
                                        <td>
                                            <a href="{{ route('mitra.detail', $m->id) }}" class="btn btn-sm btn-info">
                                                Detail <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('mitra.edit', $m->id) }}" class="btn btn-sm btn-warning">
                                                Edit <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('mitra.destroy', $m->id) }}" method="POST"
                                                class="d-inline btn_hapus">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger btn_hapus"
                                                    onclick="btn_hapus('{{ $m->nama_pemilik }}')">Hapus <i
                                                        class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                    {{-- END RULES ADMIN --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <script>
        function btn_hapus(nama_pemilik) {
            console.log(nama_pemilik);
            event.preventDefault();
            Swal.fire({
                title: 'Anda Yakin ingin Menghapus mitra dengan Nama Pemilik=' + nama_pemilik + '?',
                text: "Data yang dihapus tidak akan bisa dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Mohon Tunggu!',
                        html: 'Sedang menghapus data...',
                        didOpen: () => {
                            Swal.showLoading()
                        },
                    })
                    setTimeout(function() {
                        document.getElementsByClassName('btn_hapus')[0].submit();
                    }, 500)
                }
            })
        }
    </script>
@endsection
