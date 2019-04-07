@extends('home')
@section('contant')
    <style>
        #ths {background: #1b4b72;
            color: #ffffff;}
    </style>


    <div class="col-lg-12 col-sm-12">
        <table class="table table-bordered">
            <thead>

            <th  id="ths">Customer Name</th>
            <th  id="ths">Customer Phone</th>
            <th  id="ths">Customer Alternate Phone</th>
            <th  id="ths">Customer Address</th>
            <th id="ths" >Action</th>
            </thead>

            <tbody>
            @foreach($customer as $view_customer)
                <tr>
                    <td style="background: #c6c8ca; color: #000000;">{{$view_customer->customer_name}}</td>
                    <td style="background: #c6c8ca; color: #000000;">{{$view_customer->customer_phone}}</td>
                    <td style="background: #c6c8ca; color: #000000;">{{$view_customer->customer_alt_phone}}</td>
                    <td style="background: #c6c8ca; color: #000000;">{{$view_customer->customer_address}}</td>

                    <td style="background: #c6c8ca; color: #000000;"><a href="#"> <i class="fa fa-trash"></i></a>
                        <a href="#"> <i class="fa fa-plus"></i></a> </td>






                </tr>
            @endforeach
            </tbody>

        </table>


    </div>

@stop
