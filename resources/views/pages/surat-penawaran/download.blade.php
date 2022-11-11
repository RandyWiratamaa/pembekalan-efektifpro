<html>
<head>
    <title>Surat Penawaran</title>
    <style type="text/css">
    /* Styles go here */
        .page-header, .page-header-space {
            height: 90px;
        }

        .page-footer, .page-footer-space {
            height: 50px;
        }

        .page-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 1px solid black; /* for demo */
        }

        .page-header {
            position: fixed;
            top: 0mm;
            width: 100%;
            border-bottom: 1px solid black; /* for demo */
        }

        .page {
            page-break-after: always;
        }

        @page {
            margin: 20mm;
            size: A4
        }

        @media print {
            thead {display: table-header-group;}
            tfoot {display: table-footer-group;}

            button {display: none;}

            body {margin: 0;}
        }
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
        }
    </style>
</head>

<body>
    <div class="page-header" style="text-align: center">
        Disini Header Surat Penawaran
    </div>

    <div class="page-footer" style="text-align: center">
        Disini Footer Surat Penawaran
    </div>

    <table>
        <thead>
            <tr>
                <td>
                <!--place holder for the fixed-position header-->
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <!--*** CONTENT GOES HERE ***-->
                    <div class="page">
                        <table style="border-collapse: collapse; width: 100%; height: 18px;" border="0">
                            <tbody>
                                <tr style="height: 18px;">
                                    <td style="height: 18px;">Nomor : {{ $surat_penawaran->no_surat }}</td>
                                    <td style="height: 18px;">Jakarta, {{ $surat_penawaran->tgl_surat->isoFormat('DD MMMM YYYY') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>Kepada :</p>
                        <p>{{ $surat_penawaran->bank->nama }}<br />{{ $surat_penawaran->bank->alamat }}<br />{{ $surat_penawaran->bank->kota }} - {{ $surat_penawaran->bank->kode_pos }}</p>
                        <table style="border-collapse: collapse;" border="0">
                            <tbody>
                                <tr>
                                    <td>Up. Yth</td>
                                    <td>:</td>
                                    <td>Ibu. nama PIC</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>Jabatan PIC</td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="border-collapse: collapse;" border="0">
                            <tbody>
                                <tr>
                                    <td>Perihal</td>
                                    <td>:</td>
                                    <td>{{ $surat_penawaran->perihal }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                        <div style="text-align: justify">
                            {!! $surat_penawaran->body !!}
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>
                    <!--place holder for the fixed-position footer-->
                    <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

    </table>
</body>
</html>
