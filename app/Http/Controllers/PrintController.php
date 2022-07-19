<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SaleInvoice;

class PrintController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.product-category');
    }

    public function printSaleInvoice($saleInvoiceId)
    {
        $saleInvoice = SaleInvoice::find($saleInvoiceId);

        return view('print.sale-invoice')
            ->with('saleInvoice', $saleInvoice);
    }
}
