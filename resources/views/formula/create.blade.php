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

            <div class="card-body">
                {{-- Form --}}
                <form action="{{ route('formula.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_warna">Kode Warna</label>
                        <select name="warna_id" id="kode_warna" class="form-control">
                            <option value="">Pilih Kode Warna</option>
                            @foreach ($warnas as $warna)
                            <option value="{{ $warna->id }}">{{ $warna->kode_warna }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_base">Kode Base</label>
                        <input type="text" name="kode_base" id="kode_base" class="form-control" placeholder="Kode Base">
                    </div>
                    <div class="form-group">
                        <label for="kode_formula">Kode Formula</label>
                        <input type="text" name="kode_formula" id="kode_formula" class="form-control" placeholder="Kode Formula">
                    </div>
                    <div class="form-group">
                        <label for="galon">Galon</label>
                        <input type="number" name="galon" id="galon" class="form-control" placeholder="44.00">
                    </div>
                    <div class="form-group">
                        <label for="pail">Pail</label>
                        <input type="number" name="pail" id="pail" class="form-control" placeholder="88.00">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
