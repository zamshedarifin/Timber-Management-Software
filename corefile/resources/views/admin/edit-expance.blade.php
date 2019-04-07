@extends('admin.dashboard')
@section('master')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Expence
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form role="form" action="{{url('edit-expanse/'.$edit_value->id)}}" method="Post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" name="date" value="{{$edit_value->date}}">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" value="{{$edit_value->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>

                                    <select  class="form-control" name="cft">
                                        <option >{{$edit_value->cft}}</option>
                                    @foreach($expance as $view)
                                            <option value="{{$view->expance_category}}">{{$view->expance_category}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input class="form-control" name="amount" value="{{$edit_value->amount}}">
                                </div>

                                <div class="form-group">
                                    <label>Note</label>
                                    <input class="form-control" name="note" value="{{$edit_value->note}}">
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
    <!-- /.row -->


@stop
