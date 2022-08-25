@extends('layout.dashboard')
@section('title','Jenis')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Jenis</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Jenis</li>
        </ol>
        <div class="card mb-4">
            {{-- Card Header --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('jenis.create') }}" class="btn btn-primary">Tambah Jenis</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis ID</th>
                            <th>Nama Jenis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis as $type)
                            <tr>
                                <td width="10">{{ $loop->iteration }}</td>
                                <td>{{ $type->id }}</td>
                                <td>{{ $type->name }}</td>
                                <td width="60%">
                                    <a href="{{ route('jenis.edit',$type->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('jenis.destroy',$type->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
