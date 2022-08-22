<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Paint</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <div class="d-flex">
                    <a href="{{route('login')}}" class="btn btn-sm btn-primary">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Daftar Pricelist {{$kota->nama_kota}}
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Warna</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Foreach warna --}}
                            @foreach ($warna as $item)
                            <tr>
                                <td>{{ $item->kode_warna }}</td>
                                <td>
                                    <div style="height: 30px;width:100%;background-color:{{"#".$item->kode_hex}}">

                                    </div>
                                </td>
                                <td>
                                    <a href="{{route('price.warna',['kota_id'=>$kota->id,'warna_id'=>$item->id])}}" class="btn btn-sm btn-primary">Lihat</a>
                                    <a href="{{route('hitung',['warna_id'=>$item->id])}}" class="btn btn-sm btn-success">Hitung</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-4 mb-4" style="border: 0px">
                <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Price List - DECK@PAINT
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="4" align="center">Pricelist - {{$kota->nama_kota}}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>Jenis</td>
                                <td>Galon</td>
                                <td>Pail</td>
                            </tr>
                            @foreach ($pricelists as $key => $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <table class="table">
                                            @foreach ($item->pricelist as $price)
                                                <tr>
                                                    <td> {{ $price->jenis->name }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            @foreach ($item->pricelist as $price)
                                                <tr>
                                                    <td> {{ rupiah($price->galon) }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            @foreach ($item->pricelist as $price)
                                                <tr>
                                                    <td> {{ rupiah($price->pail) }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mt-4 mb-4" style="border: 0px">
                <button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#list"
                    aria-expanded="false" aria-controls="list">
                    Price List - DECK@PAINT
                </button>
                <div class="collapse" id="list">
                    <div class="card card-body">
                        <a href="{{route('list.harga',$kota->id)}}" class="btn btn-success">Daftar List Harga</a>
                        <br>
                        <a href="{{route('list.formula',$kota->id)}}" class="btn btn-success mb-1">Daftar List Formula</a>
                        <a href="{{route('list.formulaHarga',$kota->id)}}" class="btn btn-success">Daftar List Formula & Harga </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>
