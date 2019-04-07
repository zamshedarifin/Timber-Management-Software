<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Input;
use DB;
Use Session;
Session_start();

class CalculationController extends Controller
{
    public function searchSales(Request $request)
    {
       $from = $request->from;
        $to=$request->to;

        $sale_report['sale_report']=DB::table('sale_report')
            ->whereBetween('date',[$from,$to])
            ->orwhere('date',[$from])

            ->orderby('id','desc')->paginate(10);

        return view('admin.salesReport',$sale_report);
    }

   public function searchprice(Request $request)
    {
       $from = $request->from;
        $to=$request->to;

        $pro_price['pro_price']=DB::table('prices')
            ->whereBetween('date',[$from,$to])
            ->orwhere('date',[$from])
            ->orderby('id','desc')->paginate(10);

        return view('admin.productList',$pro_price);
    }

    public function searchlot(Request $request)
    {
       $from = $request->from;
        $to=$request->to;
        $lotDetails['lotDetails']=DB::table('prices')
            ->whereBetween('date',[$from,$to])
            ->orderby('id','desc')->paginate(10);

        return view('admin.lotDetails',$lotDetails);
    }

    public function salePayment(Request $request,$id)
    {
        $data=array();
        $data['money']=$request->amount;
        $data['tree_id']=$id;
        $data['date']=date("Y-m-d");

        DB::table('sale_report')->where('id',$id)->increment('paid', $request->amount);
        DB::table('transection')->insert($data);
        return back();
    }

    public function lotPayment(Request $request,$id)
    {
        DB::table('onlylots')->where('lot_number',$id)->increment('money', $request->amount);


        return back();
    }

    public function searchSalesReport(Request $request)
    {
        $text = $request->text;
        $sale_report['sale_report']=DB::table('sale_report')
            ->where('customer',$text)
            ->orwhere('date',$text)
            ->orwhere('total',$text)
            ->orwhere('paid',$text)
            ->orderby('id','desc')->paginate(10);

        return view('admin.salesReport',$sale_report);
    }

    public function searchproCode(Request $request)
    {
        $text = $request->text;
        $pro_price['pro_price']=DB::table('prices')
            ->where('product_id',$text)
            ->orderby('id','desc')->paginate(10);

        return view('admin.productList',$pro_price);
    }


    public function searchTotalsale(Request $request)
    {
        $from= $request->from;
        $to= $request->to;

        $totalSale['totalSale']=DB::table('sale_report')->whereBetween('date',[$from,$to])->get();
        $totalSale['total']=DB::table('sale_report')->whereBetween('date',[$from,$to])->sum('sale_report.total');
        $totalSale['paid']=DB::table('sale_report')->whereBetween('date',[$from,$to])->sum('sale_report.paid');
        return view('admin.reportSearchDate',$totalSale);

    }

    public function searchDue(Request $request)
    {
        $from= $request->from;
        $to= $request->to;

        $totalSale['totalSale']=DB::table('sale_report')->whereBetween('date',[$from,$to])->get();
        $totalSale['total']=DB::table('sale_report')->whereBetween('date',[$from,$to])->sum('sale_report.total');
        $totalSale['paid']=DB::table('sale_report')->whereBetween('date',[$from,$to])->sum('sale_report.paid');
        return view('admin.reportSearchdue',$totalSale);

    }

    public function searchExpance(Request $request)
    {
        $from= $request->from;
        $to= $request->to;

        $expance['expance']=DB::table('expences')->whereBetween('date',[$from,$to])->get();
        $expance['amount']=DB::table('expences')->whereBetween('date',[$from,$to])->sum('expences.amount');

        return view('admin.calculateExpance',$expance);

    }

    public function searchexpancelist(Request $request)
    {
        $from= $request->from;
        $to= $request->to;

        $expence['expence']=DB::table('expences')->whereBetween('date',[$from,$to])->get();

        return view('admin.expenceList',$expence);

    }
    public function searchprofit(Request $request)
    {
        $from= $request->from;
        $to= $request->to;
        $profit['expance']=DB::table('expences')->whereBetween('date',[$from,$to])->sum('expences.amount');
        $profit['sale']=DB::table('sale_report')->whereBetween('date',[$from,$to])->sum('sale_report.total');
        $profit['price']=DB::table('prices')->whereBetween('date',[$from,$to])->sum('prices.price');
        return view('admin.profitLoss',$profit);

    }

    public function searchcustomer(Request $request)
    {
        $data=$request->search;
        $cus_info['cus_info']=DB::table('customers')
            ->where('customer_name',$data)
            ->orwhere('customer_phone',$data)
            ->orwhere('customer_alt_phone',$data)
            ->get();
        return view('admin.customerList',$cus_info);
    }

    public function searchsupplier(Request $request)
    {
        $data=$request->search;
        $sup_info['sup_info']=DB::table('suppliers')
            ->where('supplier_name',$data)
            ->orwhere('supplier_phone',$data)
            ->orwhere('supplier_address',$data)
            ->get();
        return view('admin.supplierList',$sup_info);
    }

    public function onlylot(Request $request)
    {
        $text = $request->text;

        $lotDetails=DB::table('prices')
            ->join('onlylots','prices.lot_number','=','onlylots.lot_number')
            ->select('onlylots.date','onlylots.money','prices.lot_number','prices.supplier'
                ,DB::raw('SUM(price) as total_price')
                ,DB::raw('SUM(cft) as total_cft'))
            ->groupBy('prices.lot_number','prices.supplier','onlylots.date','onlylots.money')
            ->where('onlylots.date',$text)
            ->orwhere('prices.lot_number',$text)

            ->get();
        return view('admin.lotDetails',$lotDetails);
    }

}
