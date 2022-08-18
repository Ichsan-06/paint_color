@extends('layout.dashboard')
@section('title','Type')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Type</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Type</li>
        </ol>
        <div class="card mb-4">
            {{-- Card Header --}}
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('type.create') }}" class="btn btn-primary">Tambah Type</a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Foreach Type --}}
                        @foreach ($types as $t)
                            <tr>
                                <td width="10">{{ $loop->iteration }}</td>
                                <td>{{ $t->name }}</td>
                                <td width="60%">
                                    <a href="{{ route('type.edit', $t->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('type.destroy', $t->id) }}" method="POST" class="d-inline">
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
