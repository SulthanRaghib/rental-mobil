@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Table Bahan Bakar</h5>

                    <a href="{{ route('bahanbakar.create') }}" class="btn btn-sm btn-primary my-3">
                        Tambah Bahan Bakar <i class="bi bi-plus-circle pl-5"></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama Bahan Bakar</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bahan_bakar as $bb)
                                <tr>
                                    <td>{{ $bb->nama_bahan_bakar }}</td>

                                    <td>
                                        <a href="{{ route('bahanbakar.edit', $bb->id) }}" class="btn btn-sm btn-warning">
                                            Edit <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('bahanbakar.destroy', $bb->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ID={{ $bb->id }} ini?')">
                                                Hapus <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>

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
@endsection
