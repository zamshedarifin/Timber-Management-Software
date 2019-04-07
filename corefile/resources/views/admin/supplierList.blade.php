@extends('admin.dashboard')
@section('master')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Supplier List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-4">Print:<a onclick="pageprint()" class="btn btn-primary "><i class="fa fa-print"></i></a></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="{{url('search.supplier')}}" method="get">

                <input type="text" name="search" >
                <input type="submit" >
            </form>
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                       @foreach($sup_info as $view)
                        <tr class="odd gradeX">
                            <td>{{$view->supplier_name}}</td>
                            <td>{{$view->supplier_phone}}</td>
                            <td>{{$view->supplier_alt_phone}}</td>
                            <td>{{$view->supplier_address}}</td>

                            <td class="center">
                                <a href="{{url('edit-supplier/'.$view->id)}}" class="btn btn-primary btn-circle"><i class="fa fa-pencil"></i></a>
                                <a href="{{url('view-supplier/'.$view->id)}}" class="btn btn-success btn-circle"><i class="fa fa-eye"></i></a>
                                <?php
                                $access_label=Session::get('role');
                                if($access_label == 1)
                                {
                                ?>

                                <a href="{{url('delete-supplier/'.$view->id)}}" class="btn btn-danger btn-circle" onclick="return checkDelete()"><i class="fa fa-trash"></i></a>
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
