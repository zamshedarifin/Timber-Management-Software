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

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($expance as $view)
                                <tr>

                                    <td>{{$view->date}}</td>
                                    <td>{{$view->name}}</td>
                                    <td>{{$view->amount}}</td>

                                </tr>
                            @endforeach
                                <tr>
                                    <td></td>
                                    <td><b>Total</b></td>

                                    <td><b>{{$amount}}</b></td>

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
