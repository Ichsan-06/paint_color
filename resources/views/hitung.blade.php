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
            <div class="card mb-3">
                <div class="card-header" style="background-color:{{ '#' . $warna->kode_hex }};height:30px"></div>
                <div class="card body text-center">
                    <h5>{{ $warna->kode_warna }} - {{ $warna->nama_warna }}</h5>
                </div>
            </div>

            <form action="{{ route('hitung.post', $warna->id) }}" method="POST">
                @csrf
                <!--Table-->
                <table class="table table-striped table-bordered nowrap">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="4" style="vertical-align : middle;text-align:center;">
                                <center>Detail Harga</center>
                            </td>
                            <td>
                                <center>LH (Gln)</center>
                            </td>
                            <td>
                                <center><input type="text" class="form-control" name="harga_base_galon"
                                        required="" style="margin: -5px; height:31px;"
                                        onkeypress="return isNumber(event)" onpaste="return false;"></center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>LH (Pail)</center>
                            </td>
                            <td>
                                <center><input type="text" class="form-control" name="harga_base_pail" required=""
                                        style="margin: -5px; height:31px;" onkeypress="return isNumber(event)"
                                        onpaste="return false;"></center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>MS (ml)</center>
                            </td>
                            <td>
                                <center><input type="text" class="form-control" name="MS" required=""
                                        style="margin: -5px; height:31px;" onkeypress="return isNumber(event)"
                                        onpaste="return false;"></center>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <center>BP (ml)</center>
                            </td>
                            <td>
                                <center><input type="text" class="form-control" name="BP" required=""
                                        style="margin: -5px; height:31px;" onkeypress="return isNumber(event)"
                                        onpaste="return false;"></center>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3">
                                <button type="submit" name="action" value="decka" class="btn btn-sm btn-primary">Hitung Harga - DECK@</button>
                                <button type="submit" name="action" value="3in1" class="btn btn-sm btn-primary">Hitung Harga - DECK@ 3 IN 1</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>

            @if (isset($type))
                <div class="card">
                    <div class="card-body">
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

                            @if (isset($type->pricelist[0]))
                                <tr>
                                    <td>{{ $type->pricelist[0]->jenis->name }}</td>
                                    <td>{{ rupiah($request->harga_base_galon) }}</td>
                                    <td>1</td>
                                    <td>{{ rupiah($request->harga_base_galon) }}</td>
                                </tr>
                                @php
                                    $result = 0;
                                @endphp
                                @foreach ($type->pricelist[0]->jenis->formula as $formula => $harga)
                                    @php
                                        if ($formula == 0) {
                                            $ms = $request->MS;
                                        } else {
                                            $ms = $request->BP;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $harga->kode_formula }}</td>
                                        <td>{{ $ms . '/ ml' }}</td>
                                        <td>
                                            {{ $harga->galon . ' ml' }}
                                        </td>
                                        <td>{{ rupiah($ms * $harga->galon) }}</td>
                                    </tr>

                                    @php
                                        $result += $ms * $harga->galon;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="3" align="center">Total Harga</td>
                                    <td align="left">{{ rupiah($result + $request->harga_base_galon) }}
                                    </td>

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

                            @if (isset($type->pricelist[0]))
                                <tr>
                                    <td>{{ $type->pricelist[0]->jenis->name }}</td>
                                    <td>{{ rupiah($request->harga_base_pail) }}</td>
                                    <td>1</td>
                                    <td>{{ rupiah($request->harga_base_pail) }}</td>
                                </tr>
                                @php
                                    $result = 0;
                                @endphpimage.png
                                @foreach ($type->pricelist[0]->jenis->formula as $formula => $harga)
                                    @php
                                        if ($formula == 0) {
                                            $ms = $request->MS;
                                        } else {
                                            $ms = $request->BP;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $harga->kode_formula }}</td>
                                        <td>{{ $ms . '/ ml' }}</td>
                                        <td>
                                            {{ $harga->pail . ' ml' }}
                                        </td>
                                        <td>{{ rupiah($ms * $harga->pail) }}</td>
                                    </tr>

                                    @php
                                        $result += $ms * $harga->pail;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="3" align="center">Total Harga</td>
                                    <td align="left">{{ rupiah($result + $request->harga_base_pail) }}
                                    </td>

                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            @endif

            @if (isset($typeThree))
                <div class="card">
                    <div class="card-body">
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

                            @if (isset($typeThree->pricelist[0]))
                                <tr>
                                    <td>{{ $typeThree->pricelist[0]->jenis->name }}</td>
                                    <td>{{ rupiah($request->harga_base_galon) }}</td>
                                    <td>1</td>
                                    <td>{{ rupiah($request->harga_base_galon) }}</td>
                                </tr>
                                @php
                                    $result = 0;
                                @endphp
                                @foreach ($typeThree->pricelist[0]->jenis->formula as $formula => $harga)
                                    @php
                                        if ($formula == 0) {
                                            $ms = $request->MS;
                                        } else {
                                            $ms = $request->BP;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $harga->kode_formula }}</td>
                                        <td>{{ $ms . '/ ml' }}</td>
                                        <td>
                                            {{ (($harga->galon*4)/5) . ' ml' }}
                                        </td>
                                        <td>{{ rupiah($ms * (($harga->galon*4)/5)) }}</td>
                                    </tr>

                                    @php
                                        $result += $ms * (($harga->galon*4)/5);
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="3" align="center">Total Harga</td>
                                    <td align="left">{{ rupiah($result + $request->harga_base_galon) }}
                                    </td>

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

                            @if (isset($typeThree->pricelist[0]))
                                <tr>
                                    <td>{{ $typeThree->pricelist[0]->jenis->name }}</td>
                                    <td>{{ rupiah($request->harga_base_pail) }}</td>
                                    <td>1</td>
                                    <td>{{ rupiah($request->harga_base_pail) }}</td>
                                </tr>
                                @php
                                    $result = 0;
                                @endphpimage.png
                                @foreach ($typeThree->pricelist[0]->jenis->formula as $formula => $harga)
                                    @php
                                        if ($formula == 0) {
                                            $ms = $request->MS;
                                        } else {
                                            $ms = $request->BP;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $harga->kode_formula }}</td>
                                        <td>{{ $ms . '/ ml' }}</td>
                                        <td>
                                            {{ (($harga->pail/5)*4) . ' ml' }}
                                        </td>
                                        <td>{{ rupiah($ms * (($harga->pail/5)*4)) }}</td>
                                    </tr>

                                    @php
                                        $result += $ms * (($harga->pail/5)*4);
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="3" align="center">Total Harga</td>
                                    <td align="left">{{ rupiah($result + $request->harga_base_pail) }}
                                    </td>

                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            @endif
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
