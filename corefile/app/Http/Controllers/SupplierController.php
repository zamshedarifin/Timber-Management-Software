<?php

namespace App\Http\Controllers;

use App\customer;
use App\Lot;
use App\onlylot;
use App\Post;
use App\Supplier;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
Session_start();
class SupplierController extends Controller
{
    public function saveSupplier()
    {
        $item=input::except('_token');
        Supplier::create($item);
        return back();
    }
    public function saveCustomer()
    {
        $item=input::except('_token');
        customer::create($item);
        return back();
    }

    public function supplierList()
    {
        $supplier['supplier']=Supplier::all();
        return view('supplierList',$supplier);
    }

    public function customerList()
    {
        $customer['customer']=customer::all();
        return view('customerList',$customer);
    }
}
