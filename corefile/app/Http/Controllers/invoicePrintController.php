<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE DB;
use PDF;

class invoicePrintController extends Controller
{
    public function printPdf(Request $request,$id)
    {

        $customer['customer']=$request->customer;
        $sale_report['sale_report']=DB::table('sale_report')
            ->join('sales', 'sale_report.id', '=', 'sales.sale_id')
            ->where('sales.sale_id',$id)
            ->where('sale_report.id',$id)
            ->select('sales.*', 'sale_report.*')
            ->get();

        $sale_report['saleAmount']=DB::table('sale_report')->where('id',$id)->first();
        $pdf = PDF::loadView('admin.invoice',$sale_report,$customer);
        return $pdf->download('invoice.pdf');

    }
}
