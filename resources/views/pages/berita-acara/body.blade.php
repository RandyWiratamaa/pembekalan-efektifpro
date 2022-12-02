<p>
    Sehubungan dengan adanya pengajuan program In House Class (Video Conference)
    Pembekalan {{ $i->materi_pembekalan->materi }} ({{ $i->materi_pembekalan->kode }}),
    kami informasikan rincian sebagai berikut :</p>
<table border="0">
    <tr>
        <td>Nama Program</td>
        <td>:</td>
        <td>{{ $i->materi_pembekalan->kode }} - {{ $i->materi_pembekalan->materi }}</td>
    </tr>
    <tr>
        <td>Fasilitator</td>
        <td>:</td>
        <td>{{ $i->pengajar->nama }}</td>
    </tr>
    <tr>
        <td>Tanggal Pelaksanaan</td>
        <td>:</td>
        <td>{{ $i->tanggal_mulai->isoFormat('DD MMMM YYYY') }} & {{ $i->tanggal_selesai->isoFormat('DD MMMM YYYY') }}</td>
    </tr>
    <tr>
        <td>Lokasi</td>
        <td>:</td>
        <td>{{ $i->metode_pembekalan->metode }}</td>
    </tr>
    <tr>
        <td>Jumlah Peserta</td>
        <td>:</td>
        <td></td>
    </tr>
</table>
<br>
<p>
    Yang mana program In House Class {{ $i->materi_pembekalan->materi }} ({{ $i->materi_pembekalan->kode }}) sesuai dengan PO no_po tersebut telah dilaksanakan dengan baik sesuai
    jadwal yang telah dilaksanakan. Adapun rincian sebagai berikut :
</p>
<strong><em>Rincian PO :</em></strong>
<table class="table-bordered" border="1" style="width:95%; border: 1px solid black; border-collapse: collapse">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Harga Satuan</th>
        <th>Jumlah Harga</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="text-align: center">1</td>
        <td>Pembekalan
            {{ $i->materi_pembekalan->materi }}
            (1 Day, 1 Batch min 35 person;
            Include PPH 23; Exclude PPN;
            Garansi Pelatihan Ulang Tanpa Biaya Jika Tidak Lulus Ujian)
        </td>
        <td style="text-align: center">1</td>
        <td style="text-align: center">Batch</td>
        <td style="text-align: center">{{ $i->investasi }}</td>
        <td style="text-align: center">{{ $i->investasi }}</td>
      </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-center">Grand Total</td>
            <td>{{ $i->investasi }}</td>
        </tr>
    </tfoot>
</table>
<p>
    Demikian berita acara ini kami buat dengan sebenar-benarnya untuk dapat digunakan sebagaimana mestinya.
</p>
