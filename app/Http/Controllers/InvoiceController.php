<?php

namespace App\Http\Controllers;

use FontLib\TrueType\Collection;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function admin()
    {
        $invoices = new Collection;
        if(auth()->user()->stripe_id){
            $invoices = auth()->user()->invoices();
        }

        return view('invoices.admin', compact('invoices'));
    }

    public function download($id)
    {
        return request()->user()->downloadInvoice($id, [
            "vendor" => "Mi empresa",
            "product" => __("Subscripcion")
        ]);
    }
}
