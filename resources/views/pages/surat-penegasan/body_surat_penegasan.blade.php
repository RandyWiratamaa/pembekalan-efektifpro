<p>Dengan hormat,</p>
<p>Pertama-tama kami menyampaikan terimakasih dan penghargaan yang tinggi atas kepercayaan yang diberikan kepada kami. Dengan ini kami - PT. Efektifpro Knowledge Source - menegaskan program pembekalan {{ $data_pembekalan->materi_pembekalan->materi }} ({{ $data_pembekalan->materi_pembekalan->singkatan }}) {{ $data_pembekalan->level_pembekalan->level }} - LSPP sebagai berikut :</p>
<table class="table-bordered" style="width:95%; border: 1px solid black; border-collapse: collapse">
    <thead>
      <tr>
        <th colspan="3" class="text-center" style="border: 1px solid black; border-collapse: collapse">In House Class({{ $data_pembekalan->metode_pembekalan->metode }})</th>
      </tr>
    </thead>
    <tbody>
      <tr class="text-center">
        <td style="width: 25%; text-align:center; border: 1px solid black; border-collapse: collapse">Pembekalan {{ $data_pembekalan->materi_pembekalan->materi }} ({{ $data_pembekalan->materi_pembekalan->singkatan }})</td>
        <td style="width: 25%; text-align:center; border: 1px solid black; border-collapse: collapse">Investasi /Batch</td>
        <td>
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th colspan="3" style="width: 55%;">
                            <p>
                                <b>PT. Efektifpro Knowledge Source</b> <br>
                                <i>Gandaria 8 Office Tower Lt. 19 Unit B</i><br>
                                <i>Jln Sultan Iskandar Muda No. 8</i>
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hari / Tanggal</td>
                        <td>:</td>
                        <td>{{ $data_pembekalan->hari_tanggal->isoFormat('dddd, DD-MM-YYYY') }}</td>
                    </tr>
                    <tr>
                        <td>Tempat</td>
                        <td>:</td>
                        <td>{{ $data_pembekalan->metode_pembekalan->metode }}</td>
                    </tr>
                    <tr>
                        <td>Waktu</td>
                        <td>:</td>
                        <td>{{ $data_pembekalan->mulai->format('H:i') }} - {{ $data_pembekalan->selesai->format('H:i') }}</td>
                    </tr>
                    <tr>
                        <td>Room</td>
                        <td>:</td>
                        <td>{{ $data_pembekalan->metode_pembekalan->metode }}</td>
                    </tr>
                </tbody>
            </table>
        </td>
      </tr>
      <tr class="text-center">
        <td rowspan="2" style="height:90px; text-align:center; border: 1px solid black; border-collapse: collapse">{{ $data_pembekalan->level_pembekalan->level }}</td>
        <td rowspan="2" style="height:90px; text-align:center; border: 1px solid black; border-collapse: collapse">Rp. {{ $data_pembekalan->investasi }} /Batch</td>
      </tr>
      <tr class="text-center">
        <td style="height:50px; text-align:center; border: 1px solid black; border-collapse: collapse">Min. {{ $data_pembekalan->min_peserta }} Peserta</td>
      </tr>
    </tbody>
</table>
<br>
<ol type="I">
    <li>Ketentuan Pembekalan</li>
    <ol type="a">
        <li>Pembekalan akan dilaksanakan selama 1 hari.</li>
        <li>Pembekalan secaara <i>Online</i>, dengan menggunakan Aplikasi <i>Zoom Meeting</i>.</li>
        <li>Biaya diatas, hanya berlaku untuk Pembekalan melalui Online Training(Ms. Team).</li>
        <li>Biaya pembekalan belum termasuk PPN 11% dan PPh 23 (2%)</li>
        <li>Jika jumlah peserta Pembekalan {{ $data_pembekalan->materi_pembekalan->singkatan }} {{ $data_pembekalan->level_pembekalan->level }} kurang dari jumlah minimum peserta ({{ $data_pembekalan->min_peserta }} peserta /batch), maka {{ $data_pembekalan->bank->nama }} tetap akan membayar sejumlah minimum peserta pelatihan yang tercantum diatas.</li>
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
<p>Surat penegasan ini telah kami sesuaikan dengan kebutuhan {{ $data_pembekalan->bank->nama }}</p>
<br>
<p>
    <b><u>Untuk keterangan lebih lanjut dapat menghubungi contact person kami :</u></b>
</p>
<ol>
    <li>Rozi [ HP: 0811-9198-917, Email: Rozi.Efektifpro@gmail.com ]</li>
    <li>Putri [ HP: 0838-9526-91619, Email: aisyah.efektifpro@gmail.com ]</li>
    <li>Edo [ HP: 0896-5249-5723, Email: edo.efektifpro@gmail.com ]</li>
</ol>
