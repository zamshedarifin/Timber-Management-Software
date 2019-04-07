@extends('admin.dashboard')
@section('master')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Expence List</h1>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-2">Print:<a onclick="pageprint()" class="btn btn-primary "><i class="fa fa-print"></i></a></div>
        <div class="col-md-8">
            <form action="{{url('search.expancelist')}}" method="get">
                Search: <input type="text" name="from" id="datepicker" placeholder="Date" data-provide="datepicker">
                To: <input type="text" name="to" id="datepicker" placeholder="Date" data-provide="datepicker">
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Date</th>

                            <th>Category</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($expence as $view)
                        <tr class="odd gradeX">
                            <td>{{$view->id}}</td>
                            <td>{{$view->name}}</td>
                            <td>{{$view->date}}</td>

                            <td>{{$view->cft}}</td>
                            <td>{{$view->amount}}</td>


                            <td class="center">
                                <a href="{{url('edit-expence/'.$view->id)}}" class="btn btn-primary btn-circle"><i class="fa fa-pencil"></i></a>
                                <a href="{{url('delete-expence/'.$view->id)}}" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a>
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
