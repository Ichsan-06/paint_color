@extends('layout.dashboard')
@section('title','Warna')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Warna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Warna</li>
        </ol>
        <div class="card mb-4">
            {{-- Card Header --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('warna.create') }}" class="btn btn-primary">Tambah Warna</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Kode Warna</th>
                            <th>Label</th>
                            <th>Nama</th>
                            <th>Kode Hexa</th>
                            <th>Warna</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Foreach Warna --}}
                        @foreach ($warna as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->kode_warna }}</td>
                                <td>{{ $item->nama_label }}</td>
                                <td>{{ $item->nama_warna }}</td>
                                <td>{{ $item->kode_hex }}</td>
                                <td>
                                    <div style="height: 30px;width:60px;background-color:{{"#".$item->kode_hex}}">

                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('warna.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('warna.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
