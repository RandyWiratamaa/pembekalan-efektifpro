<p>Dengan hormat,</p>
<p style="text-align: justify">Pertama-tama kami menyampaikan terimakasih dan penghargaan yang tinggi atas kepercayaan yang diberikan kepada kami.
    Dengan ini kami - PT. Efektifpro Knowledge Source - menegaskan program pembekalan
    {{ $i->materi_pembekalan->materi }} ({{ $i->materi_pembekalan->kode }})
    - {{ strtoupper($i->penyelenggara->singkatan) }} sebagai berikut :
</p>
<table class="table-bordered" style="width:100%; border: 1px solid black; border-collapse: collapse" border="1">
    <thead>
      <tr>
        <th colspan="3" class="text-center" style="border: 1px solid black; border-collapse: collapse">
            {{ ucwords($i->jenis_pembekalan->jenis) }}
        </th>
      </tr>
    </thead>
    <tbody>
        <tr style="text-align: center">
            <td>{{ $i->materi_pembekalan->materi }}</td>
            <td>Investasi /Batch</td>
            <td>
                <p><b>PT. Efektifpro Knowledge Source</b></p>
                <p><i>Gandaria 8 Office Tower Lt. 19 Unit B</i></p>
                <p><i>Jln Sultan Iskandar Muda No. 8</i></p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center">Level 1</td>
            <td style="text-align: center">Rp. /Batch</td>
            <td>
                <table style="width: 100%;"border="0">
                    <tbody>
                        <tr>
                            <td style="text-align: left">Hari / Tanggal</td>
                            <td style="text-align: left">: <span id="tanggal_mulai"></span></td>
                            {{-- <td> --}}
                                {{-- {{ $data_pembekalan->hari_tanggal->isoFormat('dddd, DD-MM-YYYY') }} --}}
                            {{-- </td> --}}
                        </tr>
                        <tr>
                            <td style="text-align: left">Tempat</td>
                            <td style="text-align: left">:</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Waktu</td>
                            <td style="text-align: left">:</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">Room</td>
                            <td style="text-align: left">:</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr class="text-center">
            <td colspan="2"></td>
            <td style="height:50px; text-align:center; border: 1px solid black; border-collapse: collapse">
                Min. Peserta
                {{-- {{ $data_pembekalan->min_peserta }}  --}}
            </td>
        </tr>
    </tbody>
</table>
<br>
<ol type="I">
    <li>Ketentuan Pembekalan</li>
    <ol type="a">
        <li>Pembekalan akan dilaksanakan selama 1 hari.</li>
        <li>Pembekalan secara <i>Online</i>, dengan menggunakan Aplikasi <i>Zoom Meeting</i>.</li>
        <li>Biaya diatas, hanya berlaku untuk Pembekalan melalui Online Training(Ms. Team).</li>
        <li>Biaya pembekalan belum termasuk PPN 11% dan PPh 23 (2%)</li>
        <li>Jika jumlah peserta Pembekalan
            {{-- {{ $data_pembekalan->materi_pembekalan->singkatan }} {{ $data_pembekalan->level_pembekalan->level }}  --}}
            kurang dari jumlah minimum peserta
            (
                {{-- {{ $data_pembekalan->min_peserta }} --}}
                 peserta /batch), maka
                 {{-- {{ $data_pembekalan->bank->nama }}  --}}
            tetap akan membayar sejumlah minimum peserta pelatihan yang tercantum diatas.</li>
        <li>Apabila peserta tidak lulus, dapat mengikuti pelatihan berikutnya tanpa dibebankan biaya.</li>
    </ol>
    <li>Peserta Pembekalan akan memperoleh</li>
    <ol type="a">
        <li>Materi Pembekalan [Soft File]</li>
        <li>Sertifikat Pelatihan</li>
    </ol>
    <li>Fasilitator</li>
    <ol type="a">
        <li>Terlampir</li>
    </ol>
</ol>
<p>Surat penegasan ini telah kami sesuaikan dengan kebutuhan
    {{ $i->bank->nama }}
</p>
<br>
<p>Demikian surat penegasan ini, atas perhatian dan kerjasamanya kami ucapkan terima kasih.
<br>
<p>
    <b><u>Untuk keterangan lebih lanjut dapat menghubungi contact person kami :</u></b>
</p>
<ol>
    <li>Rozi [ HP: 0811-9198-917, Email: Rozi.Efektifpro@gmail.com ]</li>
    <li>Putri [ HP: 0838-9526-91619, Email: aisyah.efektifpro@gmail.com ]</li>
</ol>
