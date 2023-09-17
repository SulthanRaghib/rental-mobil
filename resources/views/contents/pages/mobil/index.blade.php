@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Table Mobil</h5>

                    <a href="{{ route('mobil.create') }}" class="btn btn-sm btn-primary my-3">
                        Tambah Mobil <i class="bi bi-plus-circle pl-5"></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Mobil</th>
                                <th>Plat Nomor</th>
                                <th>Merek</th>
                                <th>Tipe Mobil</th>
                                <th>Kapasitas</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mobil as $m)
                                @if ($m->user_id == Auth::user()->id)
                                    <tr>
                                        <td>
                                            @if ($m->user_id == Auth::user()->id)
                                                {{ $loop->iteration }}
                                            @endif
                                        </td>
                                        <td>{{ $m->kode_mobil }}</td>
                                        <td>{{ $m->plat_nomor }}</td>
                                        <td>{{ $m->nama_merek }}</td>
                                        <td>{{ $m->nama_type_mobil }}</td>
                                        <td>{{ $m->kapasitas }} Orang</td>
                                        <td>
                                            @if ($m->status == 'Tersedia')
                                                <span class="badge bg-success">Tersedia</span>
                                            @else
                                                <span class="badge bg-danger">Tidak Tersedia</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('mobil.detail', $m->id) }}" class="btn btn-sm btn-info">
                                                Detail <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('mobil.edit', $m->id) }}" class="btn btn-sm btn-warning">
                                                Edit <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('mobil.destroy', $m->id) }}" method="POST"
                                                class="d-inline btn_hapus">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger btn_hapus"
                                                    onclick="btn_hapus('{{ $m->kode_mobil }}')" {{-- onclick="return confirm('Apakah anda yakin ingin menghapus data ID={{ $m->id }} ini?')" --}}>
                                                    Hapus <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @elseif (Auth::user()->role_id == 1)
                                    @foreach ($mobil as $m)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $m->kode_mobil }}</td>
                                            <td>{{ $m->plat_nomor }}</td>
                                            <td>{{ $m->nama_merek }}</td>
                                            <td>{{ $m->nama_type_mobil }}</td>
                                            <td>{{ $m->kapasitas }} Orang</td>
                                            <td>
                                                @if ($m->status == 'Tersedia')
                                                    <span class="badge bg-success">Tersedia</span>
                                                @else
                                                    <span class="badge bg-danger">Tidak Tersedia</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('mobil.detail', $m->id) }}" class="btn btn-sm btn-info">
                                                    Detail <i class="bi bi-eye"></i>
                                                </a>
                                                {{-- <a href="{{ route('mobil.edit', $m->id) }}" class="btn btn-sm btn-warning">
                                                    Edit <i class="bi bi-pencil-square"></i>
                                                </a> --}}
                                                <form action="{{ route('mobil.destroy', $m->id) }}" method="POST"
                                                    class="d-inline btn_hapus">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger btn_hapus"
                                                        onclick="btn_hapus('{{ $m->kode_mobil }}')" {{-- onclick="return confirm('Apakah anda yakin ingin menghapus data ID={{ $m->id }} ini?')" --}}>
                                                        Hapus <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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
        function btn_hapus(kode_mobil) {
            console.log(kode_mobil);
            event.preventDefault();
            Swal.fire({
                title: 'Anda Yakin ingin Menghapus Mobil dengan Kode=' + kode_mobil + '?',
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
