@extends('layout.dashboard')
@section('title','Kota')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Kota</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Kota</li>
        </ol>
        <div class="card mb-4">
            {{-- Card Header --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('kota.create') }}" class="btn btn-primary">Tambah Kota</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kota ID</th>
                            <th>Nama Kota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Foreach kota --}}
                        @foreach ($kota as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->id }}</td>
                                <td>{{ $k->nama_kota }}</td>
                                <td>
                                    <a href="{{ route('kota.edit', $k->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('kota.destroy', $k->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
