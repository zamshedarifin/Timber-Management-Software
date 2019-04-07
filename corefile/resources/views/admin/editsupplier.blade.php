@extends('admin.dashboard')
@section('master')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Customer
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form role="form" action="{{url('Save-edit-supplier/'.$supplier->id)}}" method="Post">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="supplier_name" value="{{$supplier->supplier_name}}">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="supplier_phone" value="{{$supplier->supplier_phone}}">
                                </div>$supplier


                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="supplier_alt_phone" value="{{$supplier->supplier_alt_phone}}">
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="supplier_address" value="{{$supplier->supplier_address}}">
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
