<html>
<head>
    <title>{{ $invoice->pembekalan->materi_pembekalan->kode }} - {{ $invoice->pembekalan->bank->nama }}</title>
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
        .next-page {
            /* page-break-after: always; */
            page-break-before: always;
        }
        .border {
            border: 1px solid black;
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
        <div class="nomor">
            <table border="0">
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>{{ $invoice->tanggal->isoFormat('DD MMMM YYYY') }}</td>
                </tr>
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td>{{ $invoice->no_invoice }}</td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>:</td>
                    <td>5(Lima) lampiran</td>
                </tr>
            </table>
        </div>
        <div class="nomor">
            <p>
                Kepada Yth. <br/>
                {{ $invoice->pembekalan->bank->nama }}<br />
                {{ $invoice->pembekalan->bank->alamat }}<br />
                {{ $invoice->pembekalan->bank->kota }} - {{ $invoice->pembekalan->bank->kode_pos }}
            </p>
        </div>
        <div class="nomor">
            <p>
                Up. Yth : @if ($invoice->pembekalan->pic->jenkel == 'perempuan') Ibu @else Bapak @endif
                @if ($invoice->pembekalan->pic->midle_name == '')
                    {{ $invoice->pembekalan->pic->first_name }} {{ $invoice->pembekalan->pic->last_name }}
                @elseif($invoice->pembekalan->pic->last_name == '')
                    {{ $invoice->pembekalan->pic->first_name }} {{ $invoice->pembekalan->pic->midle_name }}
                @elseif($invoice->pembekalan->pic->last_name == '' && $invoice->pembekalan->pic->midle_name == '')
                    {{ $invoice->pembekalan->pic->first_name }}
                @else
                    {{ $invoice->pembekalan->pic->first_name }} {{ $invoice->pembekalan->pic->midle_name }} {{ $invoice->pembekalan->pic->last_name }}
                @endif
            </p>
        </div>
        <div class="nomor" style="padding-left:50px; margin-top:-25px">
            <p>{{ $invoice->pembekalan->pic->jabatan }}</p>
        </div>
        <div class="nomor">
            <p><u>Perihal : {{ $invoice->perihal }}</u></p>
        </div>
        <div class="nomor">
            <p style="text-indent:40px; margin-top: -10px">
                {{ strtoupper($invoice->pembekalan->penyelenggara->singkatan) }} -
                {{ ucwords($invoice->pembekalan->penyelenggara->nama) }}
            </p>
        </div>
        @php
            // $body = $invice->body;
            // $exp = explode("<br>", $body);
            // dd($exp);
        @endphp
        <table>
            {{-- @foreach ($exp as $key => $i)
                <tr>{!! $i !!}</tr>
            @endforeach --}}
            {!! $invoice->body !!}
        </table>
        <div class="nomor" style="margin-top: 10px">
            <p><strong>Hormat Kami</strong></p>
            <p>PT. Efektifpro Knowledge Source</p>
            @if ($invoice->approved_by != '')
            <img src="{{ asset('assets/signature/'.$invoice->bpo->signature) }}" alt="" style="width:100px">
            <p><u>{{ $invoice->bpo->nama }}</u></p>
            <p>{{ $invoice->bpo->jabatan }}</p>
            @endif
        </div>
    </main>

    <div class="next-page">
        <main>
            <table style="width: 100%">
                <tr>
                    <td style="width: 50%">
                        <strong><span style="font-size: 16px">{{ $invoice->pembekalan->bank->nama }}</span></strong><br/>
                        {{ $invoice->pembekalan->bank->alamat }}<br />
                        {{ $invoice->pembekalan->bank->kota }} - {{ $invoice->pembekalan->bank->kode_pos }}
                    </td>
                    <td style="width: 50%">
                        <table class="border" style="width: 100%">
                            <tr>
                                <td style="text-align: right; text-size:20px">INVOICE NO : {{ $invoice->no_invoice }}</td>
                            </tr>
                        </table>
                        <table style="margin-top: 10px;width: 100%" class="border">
                            <tr>
                                <td>Tanggal Invoice</td>
                                <td> : {{ $invoice->tanggal->isoFormat('DD-MMM-YYYY') }}</td>
                            </tr>
                            <tr>
                                <td>Jatuh Tempo</td>
                                <td> : {{ $invoice->jatuh_tempo->isoFormat('DD-MMM-YYYY') }}</td>
                            </tr>
                            <tr>
                                <td>Surat Penegasan No.</td>
                                <td> : {{ $invoice->pembekalan->surat_penegasan->no_surat }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <table style="width: 100%">
                <tr>
                    <td style="width: 50%">
                        <div class="nomor">
                            <p>
                                Up. Yth : @if ($invoice->pembekalan->pic->jenkel == 'perempuan') Ibu @else Bapak @endif
                                @if ($invoice->pembekalan->pic->midle_name == '')
                                    {{ $invoice->pembekalan->pic->first_name }} {{ $invoice->pembekalan->pic->last_name }}
                                @elseif($invoice->pembekalan->pic->last_name == '')
                                    {{ $invoice->pembekalan->pic->first_name }} {{ $invoice->pembekalan->pic->midle_name }}
                                @elseif($invoice->pembekalan->pic->last_name == '' && $invoice->pembekalan->pic->midle_name == '')
                                    {{ $invoice->pembekalan->pic->first_name }}
                                @else
                                    {{ $invoice->pembekalan->pic->first_name }} {{ $invoice->pembekalan->pic->midle_name }} {{ $invoice->pembekalan->pic->last_name }}
                                @endif
                            </p>
                        </div>
                        <div class="nomor" style="padding-left:50px; margin-top:-25px">
                            <p>{{ $invoice->pembekalan->pic->jabatan }}</p>
                        </div>
                    </td>
                    <td style="width: 50%">
                        <div class="tanggal">
                            No. PO
                        </div>
                    </td>
                </tr>
            </table>


            <table border="1" style="border-style: solid; border-collapse:collapse">
                <tr style="text-align: center">
                    <td>TANGGAL</td>
                    <td>URAIAN</td>
                    <td>JML BATCH</td>
                    <td>HARGA SATUAN</td>
                    <td>TOTAL</td>
                </tr>
                <tr>
                    <td>
                        {{ $invoice->tanggal->isoFormat('DD-MMM-YY') }}
                    </td>
                    <td>
                        {{ strtoupper($invoice->pembekalan->jenis_pembekalan->jenis) }}
                        ({{ $invoice->pembekalan->metode_pembekalan->metode }})
                        Pembekalan {{ $invoice->pembekalan->materi_pembekalan->materi }} -
                        {{ ucwords($invoice->pembekalan->penyelenggara->singkatan) }}
                    </td>
                    <td>1</td>
                    <td>{{ $invoice->pembekalan->investasi }}</td>
                    <td>{{ $invoice->pembekalan->investasi }}</td>
                </tr>
                <tr>
                    <td colspan="3">
                        PPN
                    </td>
                    <td>IDR</td>
                    <td>
                        3500000
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <i>Total Balance</i>
                    </td>
                    <td>IDR</td>
                    <td>
                        3500000
                    </td>
                </tr>
            </table>

            <div class="nomor" style="margin-top: 10px">
                <p><strong>PT. Efektifpro Knowledge Source</strong></p>
                @if ($invoice->approved_by != '')
                <img src="{{ asset('assets/signature/'.$invoice->bpo->signature) }}" alt="" style="width:100px">
                <p><u>{{ $invoice->bpo->nama }}</u></p>
                <p>{{ $invoice->bpo->jabatan }}</p>
                @endif
            </div>

            <div class="nomor">
                Pembayaran Harap ditransfer melalui : <br/>
                <strong>
                    <p style="text-indent: 75px">PT. Efektifpro Knowledge Source</p>
                    <p style="text-indent: 75px">BANK PERMATA SYARIAH</p>
                    <p style="text-indent: 75px">A/C. : 971.226.900</p>
                    <p style="text-indent: 75px">Cabang Jakarta Arteri Pondok Indah</p>
                </strong>
                <p>Apabila memiliki pertanyaan terkait dengan invoice ini silahkan menghubungi kami di 021-2277-3237 atau efektifpro@gmail.com</p>
            </div>
        </main>
    </div>
</body>
</html>
