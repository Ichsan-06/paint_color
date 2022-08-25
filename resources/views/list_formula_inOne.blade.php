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
            <font size="4"><b>Daftar Formula - Deck@Paint Coloring System</b></font><br>
            <font size="2.5">Data per Tanggal : 21/08/2022 11:15:35</font>
        </center>
        <center style="border-style: solid; border-width:1px; border-color: #000000; margin-top:3px;">
            <font size="2.5">Varian : 3 IN 1</font>
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
                                            <center>{{ (($formula->galon*4)/5)."0 ml" }}</center>
                                        </td>
                                        <td>
                                            <center>{{ (($formula->pail/5)*4). " ml" }}</center>

                                        </td>
                                    </tr>
                                @endforeach
                                {{-- @else
                                <td>
                                    <center>1</center>
                                </td>
                                <td>
                                    <center>1</center>
                                </td> --}}
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
