@extends('admin.dashboard')
@section('master')



  <?php
        $cus_repoat=DB::table('sales')->where('customer',$id)->get();
        $cus_total=DB::table('sale_report')->where('customer',$id)->sum('sale_report.total');
        $cus_paid=DB::table('sale_report')->where('customer',$id)->sum('sale_report.paid');
        $cus_info=DB::table('customers')->where('id',$id)->first();




  ?>



  <!-- /.row -->
  <div class="row">
      <div class="col-md-6">Print:<a onclick="pageprint()" class="btn btn-primary "><i class="fa fa-print"></i></a></div>

  </div>
  <br>
  <div class="row">
      <div class="col-lg-6">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <b>Customer </b>
              </div>
              <div class="panel-body">
                  <p><b>Name:</b>   {{$cus_info->customer_name}} </p>
                  <p><b>Phone:</b>   {{$cus_info->customer_phone}} </p>
                  <p><b>Address</b>   {{$cus_info->customer_address}} </p>
              </div>
              <div class="panel-footer">

              </div>
          </div>
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
                            <th>Date</th>
                            <th>Lot</th>
                            <th>CFT</th>
                            <th>Amount</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cus_repoat as $view)
                            <tr class="odd gradeX">
                                <td>{{$view->date}}</td>
                                <td>{{$view->lot_number}}</td>
                                <td>{{$view->cft}}</td>
                                <td>{{$view->price}}</td>


                            </tr>
                        @endforeach


                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3" style="background: #1b4b72; color: #FFF; height: 40px; padding: 10px"><b>Total:</b></div>
                        <div class="col-lg-3"  style="background: #1b4b72; color: #FFF; height: 40px; padding: 10px"><b>{{$cus_total}}</b></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3" style="background: #1c7430; color: #FFF; height: 40px; padding: 10px"><b>Total Paid:</b></div>
                        <div class="col-lg-3" style="background: #1c7430; color: #FFF; height: 40px; padding: 10px"><b class="text-left">{{$cus_paid}}</b></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-3" style="background: #c51f1a; color: #FFF; height: 40px; padding: 10px"><b>Total Due:</b></div>
                        <div class="col-lg-3" style="background: #c51f1a; color: #FFF; height: 40px; padding: 10px"><b>{{$cus_total - $cus_paid}}</b></div>

                    </div>


                </div>

                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        </div>

@stop
