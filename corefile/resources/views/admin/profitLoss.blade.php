@extends('admin.dashboard')
@section('master')
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Profit Loss
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th>Paid Purches</th>
                            <th>Total Sale</th>
                            <th>Total Expance</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>{{$price}}</td>
                                <td>{{$sale}}</td>
                                <td>{{$expance}}</td>
                              </tr>
                        <tr>
                            <td></td>
                            <td><b>Total Profit</b></td>
                            <td><b>{{$sale-($price+$expance)}}</b></td>
                            <td><b></b></td>
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
