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
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color:{{"#".$warna->kode_hex}};height:30px"></div>
                <div class="card body text-center">
                    <h5>{{ $warna->kode_warna }} - {{ $warna->nama_warna }}</h5>
                </div>
            </div>

            <div class="card mt-3">
                <table class="table">
                    <tr>
                        <td colspan="3" class="text-center">Daftar Harga</td>
                    </tr>
                    <tr>
                        <th>Tipe Cat</th>
                        <th>Galon</th>
                        <th>Pail</th>
                    </tr>
                    {{-- Foreach type --}}
                    @foreach ($type as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>
                                @php
                                    if (isset($item->pricelist[0])) {
                                        $hargaAwal = $item->pricelist[0]->galon;
                                        $galon = 0;
                                        foreach ($item->pricelist[0]->jenis->formula as $formula => $harga) {
                                            if ($formula == 1) {
                                                $price = 290;
                                            } else {
                                                $price = 230;
                                            }

                                            $galon += $harga->galon * $price;
                                        }

                                        echo rupiah($hargaAwal + $galon);
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if (isset($item->pricelist[0])) {
                                        $hargaAwal = $item->pricelist[0]->pail;
                                        $pail = 0;
                                        foreach ($item->pricelist[0]->jenis->formula as $formula => $harga) {
                                            if ($formula == 1) {
                                                $price = 290;
                                            } else {
                                                $price = 230;
                                            }

                                            $pail += $harga->pail * $price;
                                        }

                                        echo rupiah($hargaAwal + $pail);
                                    }
                                @endphp
                            </td>
                    @endforeach
                </table>
            </div>

            <div class="card mt-4" style="border: 0px">
                @foreach ($type as $types)
                    <button data-bs-toggle="collapse" data-bs-target="#demo-{{ $types->id }}"
                        class="btn btn-dark mt-3">{{ $types->name }}</button>

                    <div id="demo-{{ $types->id }}" class="collapse">
                        <table class="table">
                            <tr>
                                <td colspan="4" class="text-center">Detail Harga Galon</td>
                            </tr>
                            <tr>
                                <th>Kode</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total Harga</th>
                            </tr>

                            @if (isset($types->pricelist[0]))
                                <tr>
                                    <td>{{ $types->pricelist[0]->jenis->name }}</td>
                                    <td>{{ rupiah($types->pricelist[0]->galon) }}</td>
                                    <td>1</td>
                                    <td>{{ rupiah($types->pricelist[0]->galon) }}</td>
                                </tr>
                                @php
                                    $result = 0;
                                @endphp
                                @foreach ($types->pricelist[0]->jenis->formula as $formula => $harga)
                                    @php
                                        if ($formula == 1) {
                                            $price = 290;
                                        } else {
                                            $price = 230;
                                        }

                                    @endphp
                                    <tr>
                                        <td>{{ $harga->kode_formula }}</td>
                                        <td>{{ $price . '/ ml' }}</td>
                                        <td>{{ $harga->galon . ' ml' }}</td>
                                        <td>{{ rupiah($harga->galon * $price) }}</td>
                                    </tr>

                                    @php
                                        $result += $harga->galon * $price;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="3" align="center">Total Harga</td>
                                    <td align="left">{{ rupiah($result + $types->pricelist[0]->galon) }}</td>

                                </tr>
                            @endif
                        </table>

                        <table class="table">
                            <tr>
                                <td colspan="4" class="text-center">Detail Harga Galon</td>
                            </tr>
                            <tr>
                                <th>Kode</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total Harga</th>
                            </tr>

                            @if (isset($types->pricelist[0]))
                                <tr>
                                    <td>{{ $types->pricelist[0]->jenis->name }}</td>
                                    <td>{{ rupiah($types->pricelist[0]->pail) }}</td>
                                    <td>1</td>
                                    <td>{{ rupiah($types->pricelist[0]->pail) }}</td>
                                </tr>
                                @php
                                    $result = 0;
                                @endphp
                                @foreach ($types->pricelist[0]->jenis->formula as $formula => $harga)
                                    @php
                                        if ($formula == 1) {
                                            $price = 290;
                                        } else {
                                            $price = 230;
                                        }

                                    @endphp
                                    <tr>
                                        <td>{{ $harga->kode_formula }}</td>
                                        <td>{{ $price . '/ ml' }}</td>
                                        <td>{{ $harga->pail . ' ml' }}</td>
                                        <td>{{ rupiah($harga->pail * $price) }}</td>
                                    </tr>

                                    @php
                                        $result += $harga->pail * $price;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="3" align="center">Total Harga</td>
                                    <td align="left">{{ rupiah($result + $types->pricelist[0]->pail) }}</td>

                                </tr>
                            @endif
                        </table>

                    </div>
                @endforeach
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
                                <td colspan="4" align="center">Pricelist - {{$getKota->nama_kota}}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>Jenis</td>
                                <td>Galon</td>
                                <td>Pail</td>
                            </tr>
                            @foreach ($pricelists as $key => $abang)
                                <tr>
                                    <td>{{ $abang->name }}</td>
                                    <td>
                                        <table class="table">
                                            @foreach ($abang->pricelist as $name_jenis)
                                                <tr>
                                                    <td> {{ $name_jenis->jenis->name }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            @foreach ($abang->pricelist as $galon_tot)
                                                <tr>
                                                    <td> {{ rupiah($galon_tot->galon) }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            @foreach ($abang->pricelist as $pail_tot)
                                                <tr>
                                                    <td> {{ rupiah($pail_tot->pail) }}</td>
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
