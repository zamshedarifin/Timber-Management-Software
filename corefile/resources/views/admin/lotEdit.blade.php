@extends('admin.dashboard')
@section('master')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Details</h1>
        </div>

    </div>

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
                            <th>position</th>
                            <th> < 16</th>
                            <th>16 - 23</th>
                            <th>24 - 29</th>
                            <th>30 - 35</th>
                            <th>36 - 47</th>
                            <th>48 - 59</th>
                            <th>59 ></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lotDetails as $view)
                            <tr class="odd gradeX">
                                <td>{{$view->date}}</td>
                                <td>{{$view->lot_number}}</td>
                                <td>{{$view->supplier}}</td>
                                <td>{{$view->position}}</td>

                                <td>{{$view->first}}</td>
                                <td>{{$view->second}}</td>
                                <td>{{$view->third}}</td>
                                <td>{{$view->fourth}}</td>
                                <td>{{$view->five}}</td>
                                <td>{{$view->six}}</td>
                                <td>{{$view->seven}}</td>
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
