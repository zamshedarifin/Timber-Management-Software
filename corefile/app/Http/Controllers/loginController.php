<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use DB;
Use Session;
Session_start();

class loginController extends Controller
{
    public function loginPage()
    {
        $session=Session::get('id');
        if($session == Null)
        {
            return view('login');
        }
        else
        {
            return redirect('round/');
        }

    }

    public function submitLogin(Request $request)
    {
        $email=$request->email;
        $password=md5($request->password);
        $table= DB::table('admins')->where('email',$email)->where('password',$password)->first();
        if($table)
        {
            Session::put('role',$table->role);
            Session::put('name',$table->name);
            Session::put('id',$table->id);
            return redirect('round/');
        }
        else
        {
            return redirect('/');
        }

    }

    public function logout()
    {
        Session::put('id',Null);
        Session::put('name',Null);
        return redirect('/');
    }

    public function dashboard()
    {
        $session=Session::get('id');
        if($session != Null)
        {
        return view('admin.contant');
        }
        else
        {
            return redirect('/');
        }
    }

    public function roleSet()
    {
        $session=Session::get('id');
        if($session != Null)
        {
            return view('admin.add-admin');
        }
        else
        {
            return redirect('/');
        }
    }

    public function SaveAdmin(Request $request)
    {
        $data = new Admin;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=md5($request->password);
        $data->role=$request->role;
        $data->save();

        return back();
    }
}
