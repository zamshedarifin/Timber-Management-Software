@extends('admin.dashboard')
@section('master')



    <?php
    $supplier_report=DB::table('prices')->where('supplier',$id)->get();
    $supplier_buyPrice=DB::table('prices')->where('supplier',$id)->sum('prices.price');
    $supplier_total=DB::table('onlylots')->where('supplier',$id)
        ->sum('onlylots.money');
    $supplier=DB::table('suppliers')->where('id',$id)->first();

    ?>




    <div class="row">
        <div class="col-md-6">Print:<a onclick="pageprint()" class="btn btn-primary "><i class="fa fa-print"></i></a></div>

    </div>
    <br>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Customer </b>
                </div>
                <div class="panel-body">
                    <p><b>Name:</b>   {{$supplier->supplier_name}} </p>
                    <p><b>Phone:</b>   {{$supplier->supplier_phone}} </p>
                    <p><b>Address:</b>   {{$supplier->supplier_address}} </p>
                </div>
                <div class="panel-footer">

                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Lot</th>
                            <th>position</th>
                            <th>CFT</th>
                            <th>Amount</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($supplier_report as $view)
                            <tr class="odd gradeX">
                                <td>{{$view->lot_number}}</td>
                                <td>{{$view->position}}</td>
                                <td>{{$view->cft}}</td>
                                <td>{{$view->price}}</td>


                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3" style="background: #1b4b72; color: #FFF; height: 40px; padding: 10px"><b>Total:</b></div>
                        <div class="col-lg-3"  style="background: #1b4b72; color: #FFF; height: 40px; padding: 10px"><b>{{$supplier_buyPrice}}</b></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3" style="background: #1c7430; color: #FFF; height: 40px; padding: 10px"><b>Total Paid:</b></div>
                        <div class="col-lg-3" style="background: #1c7430; color: #FFF; height: 40px; padding: 10px"><b class="text-left">{{$supplier_total}}</b></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3" style="background: #c51f1a; color: #FFF; height: 40px; padding: 10px"><b>Total Due:</b></div>
                        <div class="col-lg-3" style="background: #c51f1a; color: #FFF; height: 40px; padding: 10px"><b>{{$supplier_buyPrice - $supplier_total}}</b></div>

                    </div>


                </div>

                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>

@stop
