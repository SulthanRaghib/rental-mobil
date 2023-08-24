@extends('main')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Table Merek</h5>

                    <a href="{{ route('merek.create') }}" class="btn btn-sm btn-primary my-3">
                        Tambah Merek <i class="bi bi-plus-circle pl-5"></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama Merek</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($nama_merek as $nm)
                                <tr>
                                    <td>{{ $nm->nama_merek }}</td>

                                    <td>
                                        <a href="{{ route('merek.edit', $nm->id) }}" class="btn btn-sm btn-warning">
                                            Edit <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('merek.destroy', $nm->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ID={{ $nm->id }} ini?')">
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
