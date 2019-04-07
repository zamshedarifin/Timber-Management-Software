@extends('admin.dashboard')
@section('master')
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Details
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>date</th>
                            <th>Customer</th>
                            <th>Total Amount</th>
                            <th>Paid</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($totalSale as $view)
                        <tr>

                            <td>{{$view->date}}</td>
                            <?php
                            $customer=DB::table('customers')->where('id',$view->customer)->first();
                            ?>
                            <td>{{$customer->customer_name}}</td>
                            <td>{{$view->total}}</td>
                            <td>{{$view->paid}}</td>

                        </tr>
                        @endforeach

                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td><b>{{$total}}</b></td>
                            <td><b>{{$paid}}</b></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>


@stop
