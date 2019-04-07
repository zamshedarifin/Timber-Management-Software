@extends('admin.dashboard')
@section('master')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Admin Role
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form role="form" action="{{url('save-admin')}}" method="Post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label>Admin Name</label>
                                    <input class="form-control" name="name">
                                </div>

                                 <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email">
                                </div>

                                <div class="form-group">
                                    <label>password</label>
                                    <input class="form-control" name="password">
                                </div>

                                 <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role">
                                        <option value="1">Admin</option>
                                        <option value="2">Modarator</option>
                                    </select>
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
