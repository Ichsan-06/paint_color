<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deck@Paint Coloring System</title>
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create three equal columns that floats next to each other */

        .column {
            float: left;
            width: 33.33%;
            padding: 5px;
        }

        .column_harga {
            float: left;
            width: 100%;
            padding: 5px;
        }

        .column_formula_harga_1 {
            float: left;
            width: 55%;
            padding: 5px;
        }

        .column_formula_harga_2 {
            float: left;
            width: 66.5%;
            padding: 5px;
        }

        /* Clear floats after the columns */

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        table.table-style-one {
            font-family: verdana, arial, sans-serif;
            font-size: 12px;
            color: #333333;
            border-width: 1px;
            border-color: #3A3A3A;
            border-collapse: collapse;
        }

        table.table-style-one th {
            border-width: 1px;
            padding: 5px;
            border-style: solid;
            border-color: #3A3A3A;
            background-color: #ffffff;
        }

        table.table-style-one td {
            border-width: 1px;
            padding: 4px;
            border-style: solid;
            border-color: #3A3A3A;
            background-color: #ffffff;
        }
    </style>
    <style type="text/css">
        table {
            page-break-inside: avoid
        }

        thead {
            display: table-header-group
        }

        tfoot {
            display: table-footer-group
        }

        html,
        body {
            width: 210mm;
            height: 297mm;
            margin: 0 auto;
        }

        .block {
            display: block;
            width: 100%;
            padding: 5px 10px;
            font-size: 13px;
            cursor: pointer;
            text-align: center;
        }
    </style>

<body>
    <br><button type="button" onclick="printDiv('printableArea')" class="block">Print</button><br>
    <div id="printableArea">
        <center style="border-style: solid; border-width:1px; border-color: #000000;">
            <font size="4"><b>Daftar Formula & Harga - <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                        data-cfemail="571332343c1707363e3923">[email&#160;protected]</a> Coloring System - Aceh</b>
            </font><br>
            <font size="2.5">Data per Tanggal : 21/08/2022 11:41:13</font>
        </center>
        <center style="border-style: solid; border-width:1px; border-color: #000000; margin-top:3px;">
            <font size="2.5">Varian : Star, Brite, Cryl, Nodeless, Extercoat</font>
        </center>
        <div class="row">
            @foreach ($warnas as $warna)
                <div class="column" style="background-color:#ffffff;">
                    <table class="table-style-one" width=100%>
                        <thead>
                            <tr>
                                <th colspan="3">{{ $warna->kode_warna }}</th>
                            </tr>
                            <tr>
                                <th>Kode</th>
                                <th>Galon</th>
                                <th>Pail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <center>
                                        @if (isset($warna->formula[0]))
                                            {{ $warna->formula[0]->jenis->name }}
                                        @else
                                            -
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>1</center>
                                </td>
                                <td>
                                    <center>1</center>
                                </td>
                            </tr>
                            @if (isset($warna->formula[0]))
                                @foreach ($warna->formula as $formula)
                                    <tr>
                                        <td>
                                            <center>{{ $formula->kode_formula }}</center>
                                        </td>
                                        <td>
                                            <center>{{ $formula->galon }}</center>
                                        </td>
                                        <td>
                                            <center>{{ $formula->pail }}</center>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="column_formula_harga_2" style="background-color:#ffffff;">
                    <table class="table-style-one" width=100%>
                        <thead>
                            <tr>
                                <th colspan="3">{{ $warna->kode_warna }}</th>
                            </tr>
                            <tr>
                                <th>Tipe Cat</th>
                                <th>Galon</th>
                                <th>Pail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($warna->formula[0]))
                                @foreach ($warna->formula[0]->jenis->pricelist as $pricelist)
                                    @php
                                        $galon = 0;
                                        $pail = 0;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $pricelist->type->name }}
                                        </td>
                                        <td>
                                            @php
                                                foreach ($warna->formula as $t_warna => $v_warna) {
                                                    if ($t_warna == 1) {
                                                        $price = 290;
                                                    } else {
                                                        $price = 230;
                                                    }
                                                    $galon += $v_warna->galon * $price;
                                                }
                                            @endphp
                                            {{ rupiah($galon + $pricelist->galon) }}
                                        </td>
                                        <td>
                                            @php
                                                foreach ($warna->formula as $t_warna => $v_warna) {
                                                    if ($t_warna == 1) {
                                                        $price = 290;
                                                    } else {
                                                        $price = 230;
                                                    }
                                                    $pail += $v_warna->pail * $price;
                                                }
                                            @endphp
                                            {{ rupiah($pail + $pricelist->pail) }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
</body>
<script>
    //document.onreadystatechange = function(){
    //    if (document.readyState === "complete") {
    //	window.print();
    //    }
    //    else {
    //       window.onload = function () {
    //	window.print();
    //       };
    //    };
    //}
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

</html>