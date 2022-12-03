<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DetailInvoice;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $page_name = 'Invoice';
        if($request->ajax()){
            $data = Invoice::with([
                'pembekalan' => function($query) {
                    return $query->with('metode_pembekalan', 'materi_pembekalan', 'bank', 'pic');
                }])->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('bank', function (Invoice $invoice){
                    return $invoice->pembekalan->bank->nama;
                })
                ->addColumn('tanggal', function($row){
                    $tgl = $row['tanggal']->isoFormat('dddd, DD MMMM YYYY');
                    return $tgl;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="btn btn-soft-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data = Invoice::with([
            'pembekalan' => function($query) {
                return $query->with('metode_pembekalan', 'materi_pembekalan', 'bank', 'pic');
            }])->get();

        return view('pages.invoice.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        $invoice = new Invoice;
        $invoice->pembekalan_uuid = $request->uuid;
        $invoice->no_surat =  $request->no_surat;
        $invoice->no_invoice =  $request->no_invoice;
        $invoice->tanggal =  $request->tanggal;
        $invoice->jatuh_tempo =  $request->jatuh_tempo;
        $invoice->bank_id =  $request->bank_id;
        $invoice->perihal =  $request->perihal;
        $invoice->body =  $request->invoice;
        $invoice->save();

        if($invoice) {
            toastr()->success('Invoice berhasil dibuat');
            return redirect()->route('invoice.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::firstWhere('id', $id);
        $invoice->no_surat = $request->no_surat;
        $invoice->no_invoice = $request->no_invoice;
        $invoice->tanggal = $request->tanggal;
        $invoice->jatuh_tempo = $request->jatuh_tempo;
        $invoice->perihal = $request->perihal;
        $invoice->body = $request->invoice;
        $invoice->save();

        if($invoice) {
            toastr()->success('Invoice berhasil diubah');
            return redirect()->route('invoice.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        if($invoice) {
            toastr()->success('Invoice berhasil dihapus');
            return redirect()->route('invoice.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function approve(Request $request, $id)
    {
        $approved = 1;
        $invoice = Invoice::firstWhere('id', $id);
        $invoice->is_approved = $approved;
        $invoice->approved_by = $request->approved_by;
        $invoice->save();

        if ($invoice) {
            toastr()->success('Invoice berhasil diapprove');
            return redirect()->route('invoice.index');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function generatePDF($id)
    {
        $invoice = Invoice::with([
            'pembekalan' => function($query) {
                return $query->with('metode_pembekalan', 'materi_pembekalan', 'bank', 'pic');
            }])->firstWhere('id', $id);
        $slug_bank = Str::slug($invoice->pembekalan->bank->nama);
        $filename = "INV-{$invoice->tanggal->isoFormat('DDMMYYYY')}-{$slug_bank}.pdf";
        $invoice->dokumen = $filename;
        $invoice->save();

        $path = public_path('assets/invoice');
        $data = [
            'invoice' => $invoice
        ];

        $body = explode(" ", $invoice->body);
        $body = $invoice->body;
        $exp = explode("<br>", $body);
        $pdf = Pdf::setOption(['dpi' => 150]);
        $pdf = Pdf::loadView('pages.invoice.download', $data)->setPaper('A4', 'potrait');
        $pdf->save($path . '/' . $filename);
        if($invoice) {
            toastr()->success('Invoice berhasil diapprove');
            return $pdf->download($filename);
        }
    }
}
