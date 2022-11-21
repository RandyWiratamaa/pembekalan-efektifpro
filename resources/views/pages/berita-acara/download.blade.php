<html>
<head>
    <title>{{ $berita_acara->pembekalan->materi_pembekalan->kode }} - {{ $berita_acara->pembekalan->bank->nama }}</title>
    <style type="text/css">

        @page {
            margin: 120px;
            font-size: 12px;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin-left: 114px;
            margin-right: 114px;
        }

        header {
            position: fixed;
            top: -100px;
            left: 0px;
            right: 0px;
            height: 80px;

            /** Extra personal styles **/
            /* background-color: #03a9f4;
            color: white; */
            text-align: center;
            /* line-height: 35px; */
        }
        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            /* background-color: #03a9f4;
            color: white; */
            text-align: center;
            /* line-height: 35px; */
        }

        div.nomor {
            text-align: left;
        }
        div.tanggal {
            text-align: right;
        }
        table {
            page-break-inside: always;
        }
        table tr {
            page-break-inside: always;
        }

        table tr td {
            page-break-inside: always;
        }
        ol {
            page-break-inside: always;
        }
        ol li {
            page-break-inside: always;
        }
    </style>
</head>

<body>
    <header>
        <img src="{{ asset('assets/temp_surat/header.png') }}" style="width: 120%" alt="">
    </header>

    <footer>
        <img src="{{ asset('assets/temp_surat/footer.png') }}" style="width: 120%"  alt="">
    </footer>
    <main>
        <div class="tanggal">
            Jakarta, {{ $berita_acara->tanggal->isoFormat('DD MMMM YYYY') }}
        </div>
        <div style="text-align: center; margin-top:10px;">
            BERITA ACARA
        </div>
        @php
            $body = $berita_acara->body;
            $exp = explode("<br>", $body);
            // dd($exp);
        @endphp
        <table>
            @foreach ($exp as $key => $i)
                <tr>{!! $i !!}</tr>
            @endforeach
        </table>
        <table style="width: 100%">
            <tr>
                <td style="width: 50%">
                    <div class="nomor" style="margin-top: 10px; text-align:center">
                        <p>Diterima oleh,</p>
                        <br>
                        <br>
                        <br>
                        <p><u>Nama PIC Penerima</u></p>
                        <p style="margin-top:-10px">Jabatan PIC Penerima</p>
                    </div>
                </td>
                <td style="width: 50%">
                    <div class="nomor" style="margin-top: 10px; text-align:center">
                        <p>Dilaksanakan oleh,</p>
                        @if ($berita_acara->approved_by != '')
                        <img src="{{ asset('assets/signature/'.$berita_acara->bpo->signature) }}" alt="" style="width:100px">
                        <p><u>{{ $berita_acara->bpo->nama }}</u></p>
                        <p style="margin-top:-10px ">{{ $berita_acara->bpo->jabatan }}</p>
                        PT Efektifpro Knowledge Source
                        @endif
                    </div>
                </td>
            </tr>
        </table>
    </main>

    {{-- <table>
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

    </table> --}}
</body>
</html>
