<html>
<head>
    <title>Surat Penegasan</title>
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
            Jakarta, {{ $surat_penegasan->tgl_surat->isoFormat('DD MMMM YYYY') }}
        </div>
        <div class="nomor" style="margin-top:-10px">
            Nomor : {{ $surat_penegasan->no_surat }}
        </div>

        <div class="nomor" style="margin-bottom:20px">
            <p>{{ $surat_penegasan->bank->nama }}<br />{{ $surat_penegasan->bank->alamat }}<br />{{ $surat_penegasan->bank->kota }} - {{ $surat_penegasan->bank->kode_pos }}</p>
        </div>

        <div class="nomor">
            <p>
                Up. Yth : @if ($surat_penegasan->pembekalan->pic->jenkel == 'perempuan') Ibu @else Bapak @endif
                @if ($surat_penegasan->pembekalan->pic->midle_name == '')
                    {{ $surat_penegasan->pembekalan->pic->first_name }} {{ $surat_penegasan->pembekalan->pic->last_name }}
                @elseif($surat_penegasan->pembekalan->pic->last_name == '')
                    {{ $surat_penegasan->pembekalan->pic->first_name }} {{ $surat_penegasan->pembekalan->pic->midle_name }}
                @elseif($surat_penegasan->pembekalan->pic->last_name == '' && $surat_penegasan->pembekalan->pic->midle_name == '')
                    {{ $surat_penegasan->pembekalan->pic->first_name }}
                @else
                    {{ $surat_penegasan->pembekalan->pic->first_name }} {{ $surat_penegasan->pembekalan->pic->midle_name }} {{ $surat_penegasan->pembekalan->pic->last_name }}
                @endif
            </p>
        </div>
        <div class="nomor" style="padding-left:50px; margin-top:-25px">
            <p>{{ $surat_penegasan->pembekalan->pic->jabatan }}</p>
        </div>
        <div class="nomor">
            <p>Perihal : {{ $surat_penegasan->perihal }}</p>
        </div>
        <div class="nomor" style="padding-left:50px; margin-top:-25px">
            <p>
                {{ $surat_penegasan->penyelenggara->nama }} ({{ $surat_penegasan->penyelenggara->singkatan }})
            </p>
        </div>
        @php
            $body = $surat_penegasan->body;
            $exp = explode("<br>", $body);
            // dd($exp);
        @endphp
        <table>
            @foreach ($exp as $key => $i)
                <tr>{!! $i !!}</tr>
            @endforeach
        </table>
        <div class="nomor" style="margin-top: 10px">
            <p><strong>Hormat Kami</strong></p>
            <p>PT. Efektifpro Knowledge Source</p>
            @if ($surat_penegasan->approved_by != '')
            <img src="{{ asset('assets/signature/'.$surat_penegasan->bpo->signature) }}" alt="" style="width:100px">
            <p><u>{{ $surat_penegasan->bpo->nama }}</u></p>
            <p>{{ $surat_penegasan->bpo->jabatan }}</p>
            @endif
        </div>
    </main>

</body>
</html>
