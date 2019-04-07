@extends('admin.dashboard')
@section('master')
    <?php

    $users = DB::table('prices')
        ->select('tree_name', DB::raw('SUM(price) as total_sales')
        ,DB::raw('SUM(cft) as total_cft')
        ,DB::raw('count(tree_name) as total_tree'))
        ->where('prices.sale',0)
        ->groupBy('tree_name')
        ->get();

        $w =  \App\Price::latest()->limit(7)->get();
        $sumArray = 0;
        foreach ($w as $k=>$data)
            {
                $sumArray += $data->price;
            }
        $sumArray;
        $expence=DB::table('expences')->sum('amount');

       $m =  \App\Price::latest()->limit(30)->get();
            $sumMonthly = 0;
            foreach ($m as $k=>$data)
                {
                    $sumMonthly += $data->price;
                }
            $sumMonthly;
            $expence=DB::table('expences')->sum('amount');

       $y =  \App\Price::latest()->limit(365)->get();
            $sumYearly = 0;
            foreach ($y as $k=>$data)
                {
                    $sumYearly += $data->price;
                }
            $sumYearly;
            $expence=DB::table('expences')->sum('amount');

        ?>


    <div class="row">
        @foreach($users as $view_user)
                     <div class="col-lg-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <b>{{$view_user->tree_name}}</b>
                                </div>
                                <div class="panel-body">
                                    <p>Quantity= {{$view_user->total_tree}}</p>
                                    <p>CFT= {{$view_user->total_cft}}</p>

                                </div>
                                <div class="panel-footer">
                                    <b>Tk:  {{round($view_user->total_sales,4)}}</b>
                                </div>
                            </div>
                        </div>


        @endforeach
    </div>

<hr>
<div class="row">
        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>7 days Sale</b>
                </div>
                <div class="panel-body">
                    <b>CFT:</b>

                </div>
                <div class="panel-footer">
                    <b>Tk:{{round($sumArray,0)}}</b>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Monthly Sales</b>
                </div>
                <div class="panel-body">
                    <b>CFT:</b>

                </div>
                <div class="panel-footer">
                    <b>TK:{{round($sumMonthly,0)}}</b>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Yearly Sales</b>
                </div>
                <div class="panel-body">
                    <b>CFT:</b>
                </div>
                <div class="panel-footer">
                    <b>TK: {{round($sumYearly,0)}} </b>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Monthly Expance money</b>
                </div>
                <div class="panel-body">
                    <p></p>
                    <p></p>
                </div>
                <div class="panel-footer">
                    <b>TK:  {{$expence}}</b>
                </div>
            </div>
        </div>

    </div>
@stop
