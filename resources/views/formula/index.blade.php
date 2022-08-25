@extends('layout.dashboard')
@section('title','Formula')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Formula</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Formula</li>
        </ol>
        <div class="card mb-4">
            {{-- Card Header --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('formula.create') }}" class="btn btn-sm btn-primary">Tambah Formula</a>
                    </div>
                    <div class="col-md-10">
                        <form action="{{route('formula.import')}}" class="d-flex justify-content-center" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="file" name="file" id="" class="form-control">
                                </div>
                                <div class="col-md-2 d-flex">
                                    <button type="submit" class="btn btn-sm btn-primary">Import</button>&nbsp
                                    <a href="{{asset('formula.xlsx')}}" download class="btn btn-sm btn-success">Format</a>
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
                            <th>Kode Warna</th>
                            <th>Kode base</th>
                            <th>Kode Formmula</th>
                            <th>Galon</th>
                            <th>Pail</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Foreach Formula --}}
                        @foreach ($formulas as $formula)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $formula->warna->kode_warna }}</td>
                            <td>{{ $formula->jenis->name }}</td>
                            <td>{{ $formula->kode_formula }}</td>
                            <td>{{ $formula->galon }}</td>
                            <td>{{ $formula->pail }}</td>
                            <td>
                                <div class="d-flex justify-content-left">
                                    <a href="{{ route('formula.edit', $formula->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('formula.destroy', $formula->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </div>
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
