@extends('admin.dashboard')
@section('master')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add a New Tree
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form role="form" action="{{route('save.tree')}}" method="Post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label>Tree Name</label>
                                    <input class="form-control" name="tree_name">
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
