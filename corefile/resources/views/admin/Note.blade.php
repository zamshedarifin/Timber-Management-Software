@extends('admin.dashboard')
@section('master')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Note</h1>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add a note </a>
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
                            <th>Name person/Org:</th>
                            <th>Reason</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($note as $view)
                            <tr class="odd gradeX">
                                <td>{{$view->id}}</td>
                                <td>{{$view->name}}</td>
                                <td>{{$view->name}}</td>
                                <td>{{$view->reason}}</td>
                                <td>{!!$view->amount!!}</td>

                                <td class="center">
                                    <a href="{{url('delete-note/'.$view->id)}}" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></a>
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



        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Note</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form role="form" action="{{route('save.note')}}" method="Post">
                                                {!! csrf_field() !!}
                                                <div class="form-group">
                                                    <label>Name Person/ Org:</label>
                                                    <input class="form-control" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <input class="form-control" name="reason">
                                                </div>
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input class="form-control" name="amount">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input class="form-control" name="date">
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit Button</button>
                                                <button type="reset" class="btn btn-default">Reset Button</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
@stop
