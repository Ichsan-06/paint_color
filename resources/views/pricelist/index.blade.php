@extends('layout.dashboard')
@section('title','Pricelist')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Pricelist</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Pricelist</li>
        </ol>
        <div class="card mb-4">
            {{-- Card Header --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('pricelist.create') }}" class="btn-sm btn btn-primary">Tambah Pricelist</a>
                    </div>
                    <div class="col-md-10">
                        <form action="{{route('pricelist.import')}}" class="d-flex justify-content-center" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="file" name="file" id="" class="form-control">
                                </div>
                                <div class="col-md-2 d-flex">
                                    <button type="submit" class="btn btn-sm btn-primary">Import</button>&nbsp
                                    <a href="{{asset('pricelist.xlsx')}}" download class="btn btn-sm btn-success">Format</a>
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
                            <th>Type</th>
                            <th>Jenis</th>
                            <th>Galon</th>
                            <th>Pail</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Pricelists --}}
                        @foreach ($pricelists as $pricelist)
                            <tr>
                                <td width='10'>{{ $loop->iteration }}</td>
                                <td>{{ $pricelist->kota->nama_kota }}</td>
                                <td>{{ $pricelist->type->name }}</td>
                                <td>{{ $pricelist->jenis->name }}</td>
                                <td>{{ rupiah($pricelist->galon) }}</td>
                                <td>{{ rupiah($pricelist->pail) }}</td>
                                <td class="d-flex justify-content-left">
                                        <a href="{{ route('pricelist.edit',$pricelist->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                        <form action="{{ route('pricelist.destroy',$pricelist->id) }}" method="POST">
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
