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

            <div class="card-body">
                {{-- Form --}}
                <form action="{{ route('colorant.update',$colorant->id) }}" method="POST">
                    @csrf
                    {{-- Kota Id --}}
                    <div class="form-group">
                        <label for="kota_id">Kota</label>
                        <select name="kota_id" id="kota_id" class="form-control">
                            <option value="">Pilih Kota</option>
                            @foreach ($kotas as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $colorant->kota_id ? 'selected' : '' }}>{{ $k->nama_kota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode Colorant</label>
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode"
                            name="kode" placeholder="Kode Colorant" value="{{ $colorant->kode }}">
                        @error('kode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga"
                            name="harga" placeholder="Harga" value="{{ $colorant->harga }}">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan"
                            name="satuan" placeholder="Satuan" value="{{ $colorant->satuan }}">
                        @error('satuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Update Colorant</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
