<?php

namespace App\Http\Controllers;

use App\cus;
use App\customer;
use App\Lot;
use App\onlylot;
use App\Price;
use App\Sale;
use App\Supplier;
use App\Tree;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use DB;
Session_start();

class FrontEndController extends Controller
{

    public function round()
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $asset['supplier']=Supplier::all();
            $asset['tree']=Tree::all();
            return view('round',$asset);
        }
        else
        {
            return redirect('/');
        }

    }



    public function square()
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $asset['supplier']=Supplier::all();
            $asset['tree']=Tree::all();
            return view('square',$asset);
        }
        else
        {
            return redirect('/');
        }

    }

    public function proSalePage(Request $request)
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $input=$request->search;
            $search['search']=Price::where('product_id',$input)->get();
            $search['customer']=customer::All();

            return view('pro-sale',$search);
        }
        else
        {
            return redirect('/');
        }


    }

    public function roundinsert(Request $request)
    {
        $request->validate([
            'lot_number' => 'required|unique:onlylots',
        ]);

        $cus= new onlylot;
        $cus->lot_number=$request->lot_number;
        $cus->supplier=$request->supplier;
        $cus->date=$request->datepicker;
        $id=$cus->save();
        if($id != 0) {
            foreach ($request->extra as $key => $v) {
                $data = array(
                    'extra' => $request->$v,
                    'lot_number' => $request->lot_number,
                    'supplier'=>$request->supplier,
                    'date'=>$request->datepicker,
                    'tree_name' => $request->treename[$key],
                    'position' => 'Round',
                    'first' => $request->sizeone[$key],
                    'second' => $request->sizetwo[$key],
                    'third' => $request->sizethree[$key],
                    'fourth' => $request->sizefour[$key],
                    'five' => $request->sizefive[$key],
                    'six' => $request->sizesix[$key],
                    'seven' => $request->sizeseven[$key]);

                Lot::insert($data);
                Session::flash('Success','Data Save Successfully');
            }
        }
        return back();
    }

    public function SquareInsert(Request $request)
    {
        $request->validate([
            'lot_number' => 'required|unique:onlylots',
        ]);

        $cus= new onlylot;
        $cus->lot_number=$request->lot_number;
        $cus->supplier=$request->supplier;
        $cus->date=$request->datepicker;
        $id=$cus->save();
        if($id != 0) {
            foreach ($request->extra as $key => $v) {
                $data = array(
                    'extra' => $request->$v,
                    'lot_number' => $request->lot_number,
                    'supplier'=>$request->supplier,
                    'date'=>$request->datepicker,
                    'tree_name' => $request->treename[$key],
                    'position' => 'square',
                    'first' => $request->sizeone[$key]);
                Lot::insert($data);
                Session::flash('Success','Data Save Successfully');
            }
        }
        return back();
    }


    public function roundlot()
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $lot['lot']=Lot::where('position','Round')->paginate(10);
            return view('round-details',$lot);
        }
        else
        {
            return redirect('/');
        }

    }
public function Squarelot()
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $lot['lot']=Lot::where('position','Square')->paginate(10);
            return view('square-details',$lot);
        }
        else
        {
            return redirect('/');
        }

    }

    public function Deletelot($id)
    {
        Lot::Where('id',$id)->delete();
        return back();
    }

    public function LotPriceAdd($id)
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $search['search'] = Lot::Where('id',$id)->first();
            return view('product-price',$search);
        }
        else
        {
            return redirect('/');
        }
    }

    public function savePrice(Request $request)
    {

        $request->validate([
            'product_id' => 'required|unique:prices',
        ]);

        $data = new Price;
        $data->lot_number=$request->lot_number;
       
        $data->supplier=$request->supplier;
        $data->date=$request->datepicker;
        $data->tree_name=$request->treename;
        $data->position=$request->position;
        $data->product_id=$request->product_id;
        $data->cft=$request->cft;
        $data->price=$request->price;
        $data->note=$request->note;

        $data->save();
        Session::flash('save','Data Save Successfully');
        return back();
    }

    public function search(Request $request)
    { $session=Session::get('id');
        if($session != Null)
        {
            $input=$request->search;
            $inputo=$request->searcho;
            $inputt=$request->searcht;
            $inputth=$request->searchth;
            $inputf=$request->searchf;
            $inputfi=$request->searchfi;

            $search['search']=Price::where('product_id',$input) ->where('sale',0)
                ->orwhere('product_id',$inputo)
                ->orwhere('product_id',$inputt)
                ->orwhere('product_id',$inputth)
                ->orwhere('product_id',$inputf)
                ->orwhere('product_id',$inputfi)
               ->get();
            $search['customer']=customer::All();
            return view('pro-sale',$search);
        }
        else
        {
            return redirect('/');
        }


    }

    public function productSaleSave(Request $request)
    {
        $cus= array();
        $cus['customer']=$request->customer;
        $cus['date']=date('m/d/Y');
        $cus['total']=$request->total;
        $cus['due']=$request->due;
        $cus['paid']=$request->paid;
        $id=DB::table('sale_report')->insertGetId($cus);

        if($id != 0) {
            foreach ($request->extra as $key => $v) {
                $data = array(
                    'extra' => $request->$v,
                    'sale_id' => $id,
                    'customer' => $request->customer,
                    'date'=>date('m/d/Y'),
                    'tree_name' => $request->treeName[$key],
                    'lot_number' => $request->lot_number[$key],
                    'cft'=> $request->cft[$key],
                    'price' =>$request->price[$key]);
                Sale::insert($data);
                Session::flash('Success','Data Save Successfully');
            }
            Session::flash('Success','Data Save Successfully');
        }
     DB::table('prices')->where('product_id',$request->tree)->update(['sale'=>1]);

        return back();

    }

}
