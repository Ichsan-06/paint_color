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

            <div class="card-body">
                {{-- Form --}}
                <form action="{{ route('jenis.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Jenis">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
