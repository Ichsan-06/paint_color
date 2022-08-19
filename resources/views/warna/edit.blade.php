@extends('layout.dashboard')
@section('title','Edit Warna')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Warna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Warna</li>
        </ol>
        <div class="card mb-4">

            <div class="card-body">
                {{-- Form Edit warna --}}
                <form action="{{ route('warna.update', $warna->id) }}" method="POST">
                    @csrf
                    {{-- Kategori --}}
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" placeholder="Kategori" value="{{ $warna->kategori }}">
                        @error('kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kode_warna">Kode Warna</label>
                        <input type="text" class="form-control @error('kode_warna') is-invalid @enderror" id="kode_warna" name="kode_warna" placeholder="Kode Warna" value="{{ $warna->kode_warna }}">
                        @error('kode_warna')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_label">Nama Label</label>
                        <input type="text" class="form-control @error('nama_label') is-invalid @enderror" id="nama_label" name="nama_label" placeholder="Nama Label" value="{{ $warna->nama_label }}">
                        @error('nama_label')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_warna">Nama Warna</label>
                        <input type="text" class="form-control @error('nama_warna') is-invalid @enderror" id="nama_warna" name="nama_warna" placeholder="Nama Warna" value="{{ $warna->nama_warna }}">
                        @error('nama_warna')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kode_hex">Kode Hexa</label>
                        <input type="text" class="form-control @error('kode_hex') is-invalid @enderror" id="kode_hex" name="kode_hex" placeholder="Kode Hexa" value="{{ $warna->kode_hex }}">
                        @error('kode_hex')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <br>
                    {{-- Btn Submit --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
