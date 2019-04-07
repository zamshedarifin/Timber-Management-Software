@extends('admin.dashboard')
@section('master')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product List</h1>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-2">Print:<a onclick="pageprint()" class="btn btn-primary "><i class="fa fa-print"></i></a></div>
        <div class="col-md-6">
            <form action="{{url('search.price')}}" method="get">
                Search: <input type="text" name="from" id="datepicker" placeholder="Date" data-provide="datepicker">
                To: <input type="text" name="to" id="datepicker" placeholder="Date" data-provide="datepicker">
                <input type="submit" >
            </form>
        </div>
        <form action="{{url('search.proCode')}}" method="get">
            <div class="col-md-4">
                <input type="text" name="text" placeholder="Code only" >
                <input type="submit" >
            </div>
        </form>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Date</th>
                            <th>Tree Name</th>
                            <th>supplier</th>
                            <th>CFT</th>
                            <th>Buy Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
    @foreach($pro_price as $view)
                        <tr class="odd gradeX">
                            <td>{{$view->product_id}}</td>
                            <td>{{$view->date}}</td>
                            <td>{{$view->tree_name}}</td> <?php
                            $supplier=DB::table('suppliers')->where('id',$view->supplier)->first();
                            ?>
                            <td>{{$supplier->supplier_name}}</td>
                            <td>{{$view->cft}}</td>
                            <td>{{$view->price}}</td>

                            <td class="center">
                                <a href="{{url('edit-product/'.$view->id)}}" class="btn btn-primary btn-circle"><i class="fa fa-pencil"></i></a>
                                <?php
                                $access_label=Session::get('role');
                                if($access_label == 1)
                                {
                                    ?>
                                <a href="{{url('delete-product/'.$view->id)}}" class="btn btn-danger btn-circle"onclick="return checkDelete()"><i class="fa fa-trash"></i></a>
                           <?php } ?>

                            </td>
                        </tr>
    @endforeach
                        </tbody>
                    </table>
                    {{$pro_price->links()}}
                </div>

            </div>
            <!-- /.col-lg-12 -->
        </div>
@stop
