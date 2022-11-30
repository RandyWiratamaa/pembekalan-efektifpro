<html>
<head>
    <title>Surat Penawaran</title>
    <style type="text/css">

        @page {
            margin: 100px;
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
            height: 50px;

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
            Jakarta, {{ $surat_penawaran->tgl_surat->isoFormat('DD MMMM YYYY') }}
        </div>
        <div class="nomor" style="margin-top:-15px">
            Nomor : {{ $surat_penawaran->no_surat }}
        </div>

        <div class="nomor" style="margin-bottom:20px;margin-top:20px">
            <p>{{ $surat_penawaran->bank->nama }}<br />{{ $surat_penawaran->bank->alamat }}<br />{{ $surat_penawaran->bank->kota }} - {{ $surat_penawaran->bank->kode_pos }}</p>
        </div>

        <div class="nomor">
            <p>
                Up. Yth : @if ($surat_penawaran->pic->jenkel == 'perempuan') Ibu @else Bapak @endif
                @if ($surat_penawaran->pic->midle_name == '')
                    {{ $surat_penawaran->pic->first_name }} {{ $surat_penawaran->pic->last_name }}
                @elseif($surat_penawaran->pic->last_name == '')
                    {{ $surat_penawaran->pic->first_name }} {{ $surat_penawaran->pic->midle_name }}
                @elseif($surat_penawaran->pic->last_name == '' && $surat_penawaran->pic->midle_name == '')
                    {{ $surat_penawaran->pic->first_name }}
                @else
                    {{ $surat_penawaran->pic->first_name }} {{ $surat_penawaran->pic->midle_name }} {{ $surat_penawaran->pic->last_name }}
                @endif
            </p>
        </div>
        <div class="nomor" style="padding-left:50px; margin-top:-25px">
            <p>{{ $surat_penawaran->pic->jabatan }}</p>
        </div>
        <div class="nomor">
            <p>Perihal : {{ $surat_penawaran->perihal }}</p>
        </div>
        <div class="nomor" style="padding-left:45px; margin-top:-25px; margin-bottom:20px">
            <p>
                {{ ucwords($surat_penawaran->penyelenggara->nama) }} ({{ strtoupper($surat_penawaran->penyelenggara->singkatan) }})
            </p>
        </div>
        @php
            $body = $surat_penawaran->body;
            $exp = explode("<br>", $body);
        @endphp
        <table style="text-align: justify">
            @foreach ($exp as $key => $i)
                <tr>{!! $i !!}</tr>
            @endforeach
            {{-- {!! $surat_penawaran->body !!} --}}
            {{-- {{ $body }} --}}
            {{-- <tr>
                {!! $exp[0] !!}
            </tr>
            <tr>
                {!! $exp[1] !!}
            </tr>
            <tr>
                {!! $exp[2] !!}
            </tr>
            <tr>{!! $exp[3] !!}</tr>
            <tr>{!! $exp[4] !!}</tr> --}}
        </table>
        <br>
        <div class="nomor" style="margin-top: 10px">
            <p><strong>Hormat Kami</strong></p>
            <p>PT. Efektifpro Knowledge Source</p>
            @if ($surat_penawaran->approved_by != '')
            <img src="{{ asset('assets/signature/'.$surat_penawaran->bpo->signature) }}" alt="" style="width:100px">
            <p><u>{{ $surat_penawaran->bpo->nama }}</u></p>
            <p>{{ $surat_penawaran->bpo->jabatan }}</p>
            @endif
        </div>
    </main>
    {{-- <div class="page-footer-space"></div> --}}

</body>
</html>
