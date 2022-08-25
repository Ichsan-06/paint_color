@extends('layout.dashboard')
@section('title','Colorant')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Colorant</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Colorant</li>
        </ol>
        <div class="card mb-4">
            {{-- Card Header --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('colorant.create') }}" class=" btn-sm btn btn-primary">Tambah Colorant</a>
                    </div>
                    <div class="col-md-10">
                        <form action="{{route('colorant.import')}}" class="d-flex justify-content-center" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="file" name="file" id="" class="form-control">
                                </div>
                                <div class="col-md-2 d-flex">
                                    <button type="submit" class="btn btn-sm btn-primary">Import</button>&nbsp
                                    <a href="{{asset('colorant.xlsx')}}" download class="btn btn-sm btn-success">Format</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kota</th>
                            <th>Nama Colorant</th>
                            <th>Harga</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Foreach colorant --}}
                        @foreach ($colorants as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->kota->nama_kota }}</td>
                                <td>{{ $k->kode }}</td>
                                <td>{{ rupiah($k->harga) }}</td>
                                <td>{{ $k->satuan }}</td>
                                <td>
                                    <a href="{{ route('colorant.edit', $k->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('colorant.destroy', $k->id) }}" method="POST" class="d-inline">
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
