@extends('admin.dashboard')
@section('master')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sales Details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-6">Print:<a onclick="pageprint()" class="btn btn-primary "><i class="fa fa-print"></i></a></div>
        <div class="col-md-6">
            <input type="button" value="Add Payment" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >
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
                            <th>Tree</th>
                            <th>CFT</th>
                            <th>Amount</th>


                        </tr>
                        </thead>
                        <tbody>
                    @foreach($sale_report as $view)
                           <tr class="odd gradeX">
                                <td>{{$view->tree_name}}</td>
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
                        <div class="col-lg-3"  style="background: #1b4b72; color: #FFF; height: 40px; padding: 10px"><b>{{$saleAmount->total}}</b></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3" style="background: #1c7430; color: #FFF; height: 40px; padding: 10px"><b>Total Paid:</b></div>
                        <div class="col-lg-3" style="background: #1c7430; color: #FFF; height: 40px; padding: 10px"><b class="text-left">{{$saleAmount->paid}}</b></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3" style="background: #c51f1a; color: #FFF; height: 40px; padding: 10px"><b>Total Due:</b></div>
                        <div class="col-lg-3" style="background: #c51f1a; color: #FFF; height: 40px; padding: 10px"><b>{{$saleAmount->total - $saleAmount->paid}}</b></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <p  style="text-align: center; font-size: 30px"><b>Transection Summery</b></p>
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transection as $view_transection)
                            <tr class="odd gradeX">
                                <td>{{$view_transection->date}}</td>
                                <td>{{$view_transection->money}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

      </div>
    </div>

<!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Payment</h4>
                    </div>
                    <div class="modal-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <form action="{{url('sale-payment/'.$saleAmount->id)}}" method="post">
                           {!! csrf_field() !!}

                            <thead>
                            <tr>
                                <th>Enter Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="Text" class="form-control" name="amount"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" class="btn btn-primary form-control"></td>
                                </tr>
                            </tbody>
                            </form>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
@stop
