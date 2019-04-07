@extends('admin.dashboard')
@section('master')
    <?php
    $inventory = DB::table('sale_report')->sum('sale_report.total');
    $due = DB::table('sale_report')->sum('sale_report.due');
    $paid = DB::table('sale_report')->sum('sale_report.paid');

    ?>


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sales-Report</h1>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-2">Print:<a onclick="pageprint()" class="btn btn-primary "><i class="fa fa-print"></i></a></div>
        <div class="col-md-6">
            <form action="{{url('search.sales')}}" method="get">
            Search: <input type="text" name="from" id="datepicker" placeholder="Date" data-provide="datepicker">
            To: <input type="text" name="to" id="datepicker" placeholder="Date" data-provide="datepicker">
            <input type="submit" >
            </form>
        </div>
        <form action="{{url('search.saleReport')}}" method="get">
        <div class="col-md-4">
            <input type="text" name="text" placeholder="Search" >
            <input type="submit" >
        </div>
        </form>
    </div>



    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Customer Name</th>
                            <th>date</th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Due Amount</th>
                            <th>Add Pay</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($sale_report as $view)
                        <tr class="odd gradeX">
                            <td>{{$view->id}}</td>
                            <?php
                            $customer=DB::table('customers')->where('id',$view->customer)->first();
                            ?>

                            <td><input type="hidden" value="{{$customer->customer_name}}" name="customer">{{$customer->customer_name}}</td>
                            <td>{{$view->date}}</td>
                            <td>{{$view->total}}</td>
                            <td>{{$view->paid}}</td>
                            <td>{{$view->total - $view->paid}}</td>
                            <td class="center">
                                <form action="{{url('sale-payment/'.$view->id)}}" method="post">
                                   {!! csrf_field() !!}
                                    <input type="text" name="amount">
                                    <input type="submit" value="save" class="btn-primary">
                                </form>
                            </td>

                            <td class="center">
                                <a href="{{url('show-sale-details/'.$view->id)}}" class="btn btn-primary btn-circle" title="Edit"><i class="fa fa-eye"></i></a>
                                <a href="{{url('pdf/'.$view->id)}}" class="btn btn-primary btn-circle" title="pdf"><i class="fa fa-file-pdf-o"></i></a>
                                <?php
                                $access_label=Session::get('role');
                                if($access_label == 1)
                                {
                                ?>

                                <a href="{{url('delete-sale/'.$view->id)}}" class="btn btn-danger btn-circle" title="Delete" onclick="return checkDelete()"><i class="fa fa-trash"></i></a>
                            <?php
                            }
                            ?>
                            </td>

                        </tr>
                    @endforeach


                        <tr class="odd gradeX">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Total:  {{$inventory}}</b></td>
                            <td><b>Paid:  {{$paid}}</b></td>
                            <td><b>Due:  {{$due}}</b></td>

                            <td class="center"></td>
                            <td class="center"></td>
                        </tr>

                        </tbody>
                    </table>
                    {{$sale_report->links()}}
                </div>


@stop
