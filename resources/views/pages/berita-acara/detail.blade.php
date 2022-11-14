<html>
<head>
    <title>Surat Penegasan</title>
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
        Disini Header Surat Penegasan
    </div>

    <div class="page-footer" style="text-align: center">
        Disini Footer Surat Penegasan
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
                        <div style="text-align: justify">
                            {!! $berita_acara->body !!}
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
