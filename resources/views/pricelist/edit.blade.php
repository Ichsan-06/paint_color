@extends('layout.dashboard')
@section('title','Edit Pricelist')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Pricelist</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Pricelist</li>
        </ol>
        <div class="card mb-4">

            <div class="card-body">
                {{-- Form --}}
                <form action="{{ route('pricelist.update',$pricelist->id) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="type">Kota</label>
                        <select name="kota_id" id="type" class="form-control">
                            <option value="">Pilih Kota</option>
                            @foreach ($kotas as $kota)
                                <option value="{{ $kota->id }}" {{ $pricelist->kota_id == $kota->id ? 'selected' : '' }}>{{ $kota->nama_kota }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">Jenis</label>
                        <select name="jenis_id" id="type" class="form-control">
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $j)
                                <option value="{{ $j->id }}" {{ $pricelist->jenis_id == $j->id ? 'selected' : '' }}>{{ $j->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type_id" id="type" class="form-control">
                            <option value="">Pilih Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $pricelist->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="galon">Galon</label>
                        <input type="text" name="galon" id="galon" class="form-control" value="{{ $pricelist->galon }}">
                    </div>
                    <div class="form-group">
                        <label for="pail">Pail</label>
                        <input type="text" name="pail" id="pail" class="form-control" value="{{ $pricelist->pail }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>
@endsection
