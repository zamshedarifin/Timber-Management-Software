@extends('admin.dashboard')
@section('master')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Product
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form role="form" action="{{url('Save-edit-product/'.$pro->id)}}" method="Post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label>Product code</label>
                                    <input class="form-control" name="code" value="{{$pro->product_id}}" >

                                </div>
                                <div class="form-group">
                                    <label>Tree Name</label>
                                    <input class="form-control" name="tree" value="{{$pro->tree_name}}" >

                                </div>

                                <div class="form-group">
                                    <label>Supplier</label>
                                    <input class="form-control" name="supplier" value="{{$pro->supplier}}" >

                                </div>

                                <div class="form-group">
                                    <label>CFT</label>
                                    <input class="form-control" name="cft" value="{{$pro->cft}}" >

                                </div>
                                <div class="form-group">
                                     <label>Amount</label>
                                    <input class="form-control" name="price" value="{{$pro->price}}" >

                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
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
