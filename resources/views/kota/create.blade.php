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

            <div class="card-body">
                {{-- Form --}}
                <form action="{{ route('kota.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kota" name="nama_kota" placeholder="Nama Kota">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah Kota</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
