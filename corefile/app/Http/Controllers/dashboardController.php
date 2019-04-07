<?php

namespace App\Http\Controllers;


use App\customer;
use App\expancecategory;
use App\Expence;
use App\Note;
use App\Price;
use App\Supplier;
use App\Tree;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Input;
use DB;
Use Session;
Session_start();

class dashboardController extends Controller{
    public function allLot()
    {

        $session=Session::get('id');
        if($session != Null)
        {
           return view('admin.lotDetails');
        }
        else
        {
            return redirect('round/');
        }
    }
    public function allSupplier()
    {

        $session=Session::get('id');
        if($session != Null)
        {
            $sup_info['sup_info']=DB::table('suppliers')->get();
            return view('admin.supplierList',$sup_info);
        }
        else
        {
            return redirect('round/');
        }
    }

    public function allcustomer()
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $cus_info['cus_info']=DB::table('customers')->get();
            return view('admin.customerList',$cus_info);
        }
        else
        {
            return redirect('round/');
        }
    }

    public function viewCustomer($cus)
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $cus_id['id']=$cus;
            return view('admin.viewcustomer',$cus_id);
        }
        else
        {
            return redirect('round/');
        }

    }

    public function viewSupplier($id)
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $sup['id']=$id;
            return view('admin.supplierDetails',$sup);
        }
        else
        {
            return redirect('round/');
        }

    }
    public function editCustomer($id)
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $customer['customer']=DB::table('customers')->where('id',$id)->first();
            return view('admin.editCustomer',$customer);
        }
        else
        {
            return redirect('round/');
        }

    }

    public function editCustomersave($id)
    {
        $data = customer::find($id);
        $in = input::except('_token');
        $data->fill($in)->save();
        return redirect('all-customer');
    }


    public function deleteCustomer($id)
    {
        DB::table('customers')->where('id',$id)->delete();
        return back();
    }




    public function editsupplier($id)
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $supplier['supplier']=DB::table('suppliers')->where('id',$id)->first();
            return view('admin.editsupplier',$supplier);
        }
        else
        {
            return redirect('round/');
        }

    }
    public function editSavesupplier($id)
    {
        $data = Supplier::find($id);
        $in = input::except('_token');
        $data->fill($in)->save();
        return redirect('all-supplier');
    }


    public function deleteSupplier($id)
    {
        DB::table('suppliers')->where('id',$id)->delete();
        return back();
    }


    public function accountReport()
    {
        $session=Session::get('id');
        if($session != Null)
        {
            return view('admin.accountReport');
        }
        else
        {
            return redirect('round/');
        }
    }

    public function Expence()
        {
            $session=Session::get('id');
            if($session != Null)
            {
                $asset['expance']=expancecategory::all();
                return view('admin.expence',$asset);
            }
            else
            {
                return redirect('round/');
            }
        }

    public function expencelist()
    {
            $session=Session::get('id');
            if($session != Null)
            {
                $expence['expence']=DB::table('expences')->get();
                return view('admin.expenceList',$expence);
            }
            else
            {
                return redirect('round/');
            }
    }

    public function editexpence($id)
    {
        $session=Session::get('id');
        if($session != Null)
        {
            $asset['expance']=expancecategory::all();
            $asset['edit_value']=DB::table('expences')->where('id',$id)->first();


            return view('admin.edit-expance',$asset);
        }
        else
        {
            return redirect('round/');
        }
    }

    public function editsaveExpanse($id)
    {
        $data = Expence::find($id);
        $in = input::except('_token');
        $data->fill($in)->save();
        return redirect('Expence-list');
    }

    public function deleteexpence($id)
    {
        Expence::where('id',$id)->delete();
        return back();
    }

    public function productList()
        {
            $session=Session::get('id');
            if($session != Null)
            {
                $pro_price['pro_price']=DB::table('prices')->where('sale',0)->paginate(15);

                return view('admin.productList',$pro_price);
            }
            else
            {
                return redirect('round/');
            }

        }
    public function editproduct($id)
    {
            $session=Session::get('id');
            if($session != Null)
            {
                $pro['pro']=DB::table('prices')->where('id',$id)->first();

                return view('admin.editProduct',$pro);
            }
            else
            {
                return redirect('round/');
            };
    }

    public function saveEditProduct(Request $request,$id)
    {
         $data=array();
         $data['product_id']=$request->code;
         $data['tree_name']=$request->tree;
         $data['supplier']=$request->supplier;
         $data['cft']=$request->cft;
         $data['price']=$request->price;

         DB::table('prices')->where('id',$id)->update($data);

         return redirect('Product-List');
    }


        public function deleteproduct($id)
        {
            DB::table('prices')->where('id',$id)->delete();
            return back();
        }

    public function salesReport()
            {
                $session=Session::get('id');
                if($session != Null)
                {

                    $sale_report['sale_report']=DB::table('sale_report')->orderby('id','desc')->paginate(10);
                    return view('admin.salesReport',$sale_report);
                }
                else
                {
                    return redirect('round/');
                }

            }

    public function note()
        {
            $session=Session::get('id');
            if($session != Null)
            {
                $note['note']=DB::table('notes')->get();
                return view('admin.note',$note);
            }
            else
            {
                return redirect('round/');
            }
        }


    public function AddTreePage()
            {
                $session=Session::get('id');
                if($session != Null)
                {
                    return view('admin.createTree');
                }
                else
                {
                    return redirect('round/');
                }
            }
    public function AddExCatPage()
            {
                $session=Session::get('id');
                if($session != Null)
                {
                    return view('admin.expanceCategory');
                }
                else
                {
                    return redirect('round/');
                }
            }

    public function saveNote()
    {
            $input=input::except('_token');
            Note::create($input);
            return redirect('note');

    }
    public function Deletenote($id)
    {
        Note::where('id',$id)->delete();
        return redirect('note');
    }


    public function saveTree(Request $request)
         {
            $input=input::except('_token');
            Tree::create($input);

            $data=array();
            $data['tree_name']=$request->tree_name;

            DB::table('prices')->insert($data);


            return back();

         }

    public function saveexpansecategory()
       {
           $input=input::except('_token');
           expancecategory::create($input);
           return back();

       }

    public function saveExpanse()
        {
           $input=input::except('_token');
           Expence::create($input);
           return back();
        }

    public function ShowSalesdetails($id)
        {
            $session=Session::get('id');
            if($session != Null)
            {
                $sale_report['sale_report']=DB::table('sale_report')
                    ->join('sales', 'sale_report.id', '=', 'sales.sale_id')
                    ->where('sales.sale_id',$id)
                    ->where('sale_report.id',$id)
                    ->select('sales.*', 'sale_report.*')
                    ->get();

                $sale_report['saleAmount']=DB::table('sale_report')->where('id',$id)->first();
                $sale_report['transection']=DB::table('transection')->where('tree_id',$id)->get();
                $sale_report['id']=$id;

                return view('admin.saleDetailsShow',$sale_report);
            }
            else
            {
                return redirect('round/');
            }

    }

    public function deleteSale($id)
    {
        DB::table('sale_report')->where('id',$id)->delete();
        return back();
    }


    public function editLot($id)
    {

        $lotDetails['lotDetails']=DB::table('lots')->where('lot_number',$id)->get();
        return view('admin.lotEdit',$lotDetails);
    }
    public function deleteLot($id)
    {

        DB::table('lots')->where('lot_number',$id)->delete();
        DB::table('onlylots')->where('lot_number',$id)->delete();
        DB::table('prices')->where('lot_number',$id)->delete();
        return back();
    }



}
