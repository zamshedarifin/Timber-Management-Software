@extends('admin.dashboard')
@section('master')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Customer List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-4">Print:<a onclick="pageprint()" class="btn btn-primary "><i class="fa fa-print"></i></a></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{url('search.customer')}}" method="get">

                <input type="text" name="search" >
                <input type="submit" >
            </form>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cus_info as $view)
                            <tr class="odd gradeX">
                                <td>{{$view->customer_name}}</td>
                                <td>{{$view->customer_phone}}</td>
                                <td>{{$view->customer_alt_phone}}</td>
                                <td>{{$view->customer_address}}</td>

                                <td class="center">
                                    <a href="{{url('edit-customer/'.$view->id)}}" class="btn btn-primary btn-circle"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('view-customer/'.$view->id)}}" class="btn btn-success btn-circle"><i class="fa fa-eye"></i></a>
                                    <?php
                                    $access_label=Session::get('role');
                                    if($access_label == 1)
                                    {
                                    ?>

                                   <a href="{{url('delete-customer/'.$view->id)}}" class="btn btn-danger btn-circle" onclick="return checkDelete()"><i class="fa fa-trash"></i></a>
                                    <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
@stop
