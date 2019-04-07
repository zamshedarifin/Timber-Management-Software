@extends('admin.dashboard')
@section('master')
    <?php
    $lotDetails=DB::table('prices')
        ->join('onlylots','prices.lot_number','=','onlylots.lot_number')
        ->select('onlylots.date','onlylots.money','prices.lot_number','prices.supplier'
          ,DB::raw('SUM(price) as total_price')
          ,DB::raw('SUM(cft) as total_cft'))
        ->groupBy('prices.lot_number','prices.supplier','onlylots.date','onlylots.money')
        ->get();


    $users = DB::table('prices')
        ->select('tree_name', DB::raw('SUM(price) as total_sales')
            ,DB::raw('SUM(cft) as tocft')
            ,DB::raw('count(tree_name) as total_tree'))
        ->where('prices.sale',0)
        ->groupBy('tree_name')
        ->get();



?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lot Details</h1>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-2">Print:<a onclick="pageprint()" class="btn btn-primary "><i class="fa fa-print"></i></a></div>
        <div class="col-md-6">
            <form action="{{url('search.lot')}}" method="get">
                Search: <input type="text" name="from" id="datepicker" placeholder="Date" data-provide="datepicker" >
                To: <input type="text" name="to" id="datepicker" placeholder="Date" data-provide="datepicker" >
                <input type="submit" >
            </form>
        </div>
        <form action="{{url('search.onlylot')}}" method="get">
            <div class="col-md-4">
                <input type="text" name="text" placeholder="Search" >
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

                            <th>Date</th>
                            <th>Lot Number</th>
                            <th>supplier</th>
                            <th>Total CFT</th>
                            <th>Stock CFT</th>
                            <th>Stock price</th>
                            <th>Total Paid</th>
                            <th>Lot Due price</th>

                            <th>Add Pay</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
@foreach($lotDetails as $view)
                         <tr class="odd gradeX">
                             <td>{{$view->date}}</td>
                             <td>{{$view->lot_number}}</td>
                             <?php
                             $supplier=DB::table('suppliers')->where('id',$view->supplier)->first();
                             $users = DB::table('prices')
                                     ->where('prices.sale',0)
                                     ->where('prices.lot_number',$view->lot_number)
                                 ->sum('prices.cft');

                             ?>
                             <td>{{$supplier->supplier_name}}</td>
                            <td>{{$view->total_cft}}</td>
                            <td>{{$users}}</td>
                            <td>{{$view->total_price}}</td>
                             <td>{{$view->money}}</td>
                             <td>{{$view->total_price - $view->money}}</td>


                             <td class="center">
                                 <form action="{{url('lot-payment/'.$view->lot_number)}}" method="post">
                                     {!! csrf_field() !!}
                                     <input type="text" name="amount" size="5">
                                     <input type="submit" value="save">
                                 </form>
                             </td>
                            <td class="center">
                                <a href="{{url('edit-lot/'.$view->lot_number)}}" class="btn btn-primary btn-circle"><i class="fa fa-eye"></i></a>

                                <?php
                                $access_label=Session::get('role');
                                if($access_label == 1)
                                {
                                ?>
                              <a href="{{url('delete-lot/'.$view->lot_number)}}" class="btn btn-danger btn-circle" onclick="return checkDelete()"><i class="fa fa-trash"></i></a>
                                <?php } ?>
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
