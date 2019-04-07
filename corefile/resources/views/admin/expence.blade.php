@extends('admin.dashboard')
@section('master')

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Expence
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <form role="form" action="{{route('save.expanse')}}" method="Post">
                              {!! csrf_field() !!}
                               <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" class="form-control" name="date" id="datepicker" placeholder="Date" data-provide="datepicker">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>

                                    <select  class="form-control" name="cft">
                                        @foreach($expance as $view)
                                            <option value="{{$view->expance_category}}">{{$view->expance_category}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input class="form-control" name="amount">
                                </div>

                              <div class="form-group">
                                    <label>Note</label>
                                    <input class="form-control" name="note">
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
