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
            <font size="4"><b>Daftar Harga - <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                        data-cfemail="d89cbdbbb39888b9b1b6ac">[email&#160;protected]</a> Coloring System - Aceh</b>
            </font><br>
            <font size="2.5">Data per Tanggal : 20/08/2022 11:20:06</font>
        </center>
        <div class="row">
            <div class="column_harga" style="background-color:#ffffff;">
                @foreach ($warnas as $warna)
                    <table class="table-style-one" width=100% style="margin-top:30px">
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
                            @php
                                $galon = 0;
                            @endphp
                            @foreach ($warna->formula[0]->jenis->pricelist as $pricelist)
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
                                                    $galon += ($v_warna->galon * $price)+$pricelist->galon;
                                                }
                                            @endphp
                                            {{$galon}}
                                        </td>
                                        <td>
                                            <center>Rp. 578,800</center>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            {{-- <tr>
                                <td>
                                    <center><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="eda9a8aea6adbeb9acbf">[email&#160;protected]</a></center>
                                </td>
                                <td>
                                    <center>Rp. 123,760</center>
                                </td>
                                <td>
                                    <center>Rp. 578,800</center>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <center><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="094d4c4a424945405d4c">[email&#160;protected]</a></center>
                                </td>
                                <td>
                                    <center>Rp. 160,760</center>
                                </td>
                                <td>
                                    <center>Rp. 758,800</center>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <center><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="206465636b606372796c">[email&#160;protected]</a></center>
                                </td>
                                <td>
                                    <center>Rp. 210,760</center>
                                </td>
                                <td>
                                    <center>Rp. 1,013,800</center>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <center><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="6226272129222c2d26272e273131">[email&#160;protected]</a>
                                    </center>
                                </td>
                                <td>
                                    <center>Rp. 265,760</center>
                                </td>
                                <td>
                                    <center>Rp. 1,278,800</center>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <center><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="155150565e55504d415047565a5441">[email&#160;protected]</a>
                                    </center>
                                </td>
                                <td>
                                    <center>Rp. 355,760</center>
                                </td>
                                <td>
                                    <center>Rp. 1,728,800</center>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <center><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="490d0c0a0209">[email&#160;protected]</a> 3 IN 1</center>
                                </td>
                                <td>
                                    <center>Rp. 206,608</center>
                                </td>
                                <td>
                                    <center>Rp. 993,040</center>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                @endforeach
            </div>
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
