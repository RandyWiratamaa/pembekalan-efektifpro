<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function store(Request $request)
    {
        $invoice = new Invoice;
        $invoice->pembekalan_uuid = $request->uuid;
        $invoice->no_invoice =  $request->no_invoice;
        $invoice->tanggal =  $request->tanggal;
        $invoice->bank_id =  $request->bank_id;
        $invoice->perihal =  $request->perihal;
        $invoice->body =  $request->invoice;
        $invoice->save();

        if($invoice) {
            toastr()->success('Invoice berhasil dibuat');
            return redirect()->route('pembekalan.index');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
