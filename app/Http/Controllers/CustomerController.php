<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class CustomerController extends Controller
{
    /**
     * Display a index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }


    /**
     * Load a listing of the resource and download.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice(Request $request)
    {
        $invoiceDetails = $request->all();
        // load html page in browser to check data
        // return view('customer.invoice')->withInvoiceDetails($invoiceDetails);
        //download pdf file
        $pdf = PDF::loadView('customer.invoice',['invoiceDetails' => $invoiceDetails]);
  
        return $pdf->download('invoice.pdf');
    }
    public function invoice_template()
    {
        // return view('customer.invoice_template');
        $pdf = PDF::loadView('customer.invoice_template');
        //download pdf file
        return $pdf->download('invoice_template.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
