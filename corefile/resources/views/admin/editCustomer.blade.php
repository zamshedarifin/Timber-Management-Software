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
                            <form role="form" action="{{url('Save-edit-customer/'.$customer->id)}}" method="Post">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="customer_name" value="{{$customer->customer_name}}">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="customer_phone" value="{{$customer->customer_phone}}">
                                </div>


                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="customer_alt_phone" value="{{$customer->customer_alt_phone}}">
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="customer_address" value="{{$customer->customer_address}}">
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
