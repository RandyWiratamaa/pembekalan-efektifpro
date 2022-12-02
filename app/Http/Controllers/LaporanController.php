<?php

namespace App\Http\Controllers;

use App\Models\Pembekalan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $page_name = 'Laporan';
        $bulan = [
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        ];
        // foreach($bulan as $bln => $key){

            // $pembekalan = Pembekalan::with([
            //     'surat_penegasan' => function($query) {
            //         return $query->orderBy('tgl_surat', 'ASC');
            //     }, 'metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic', 'peserta', 'schedule', 'jenis_pembekalan', 'penyelenggara'])
            //     ->whereMonth('tanggal_mulai', $bln)
            //     ->get();
        // }
        $pembekalan = Pembekalan::with([
            'surat_penegasan' => function($query) {
                return $query->with('surat_penawaran')->orderBy('tgl_surat', 'ASC');
            }, 'metode_pembekalan', 'materi_pembekalan', 'pengajar', 'pic', 'peserta', 'schedule', 'jenis_pembekalan', 'penyelenggara', 'berita_acara'])
            ->where('is_done', true)->get();
        return view('pages.laporan.index', get_defined_vars());
    }
}
