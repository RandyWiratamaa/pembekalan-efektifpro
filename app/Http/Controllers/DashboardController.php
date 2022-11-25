<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Pembekalan;
use Illuminate\Http\Request;
use App\Models\SuratPenawaran;
use App\Models\SuratPenegasan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $page_name = "Dashboard";

        $surat_penawaran = SuratPenawaran::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_surat) as month_name"))
                        ->whereYear('tgl_surat', date('Y'))
                        ->where('is_approved', '1')
                        ->groupBy(DB::raw("Month(tgl_surat)"))
                        ->pluck('count', 'month_name');
        $label_surat_penawaran = $surat_penawaran->keys();
        $data_surat_penawaran = $surat_penawaran->values();

        $surat_penegasan = SuratPenegasan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_surat) as month_name"))
                        ->whereYear('tgl_surat', date('Y'))
                        ->where('is_approved', '1')
                        ->groupBy(DB::raw("Month(tgl_surat)"))
                        ->pluck('count', 'month_name');
        $label_surat_penegasan = $surat_penegasan->keys();
        $data_surat_penegasan = $surat_penegasan->values();

        $schedule = Schedule::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tanggal) as month_name"))
                        ->join('surat_penegasan', 'schedule.pembekalan_uuid', '=', 'surat_penegasan.pembekalan_uuid')
                        ->where('surat_penegasan.is_approved', '1')
                        ->whereYear('tanggal', date('Y'))
                        ->groupBy(DB::raw("Month(tanggal)"))
                        ->pluck('count', 'month_name');
        $label_schedule = $schedule->keys();
        $data_schedule = $schedule->values();

        $jml_kelas_per_pengajar = Schedule::select(DB::raw("COUNT(*) as count"), DB::raw("pengajar.nama as nama"))
                        ->join('pengajar', 'schedule.pengajar_id', '=', 'pengajar.id')
                        ->join('surat_penegasan', 'schedule.pembekalan_uuid', '=', 'surat_penegasan.pembekalan_uuid')
                        ->where('surat_penegasan.is_approved', '1')
                        ->whereYear('tanggal', date('Y'))
                        ->groupBy(DB::raw("pengajar_id"))
                        ->pluck('count', 'nama');
        $label_pengajar = $jml_kelas_per_pengajar->keys();
        $data_pengajar = $jml_kelas_per_pengajar->values();

        return view('pages.dashboard.index', get_defined_vars());
    }
}
