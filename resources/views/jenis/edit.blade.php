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
                <form action="{{ route('jenis.update',$jenis->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kota" name="name" placeholder="Nama Jenis" value="{{$jenis->name}}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
