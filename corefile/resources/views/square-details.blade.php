@extends('home')
@section('contant')
    <style>
        #ths {background: #1b4b72;
            color: #ffffff;}
    </style>


    <div class="col-lg-12 col-sm-12">
        <table class="table table-bordered">
            <thead>
            <th id="ths">Date</th>
            <th  id="ths">Supplier Name</th>
            <th id="ths"> Lot Number</th>
            <th id="ths"> Tree Name</th>
            <th id="ths"> Lot position</th>
            <th id="ths"> < 16</th>

            <th id="ths" >Action</th>
            </thead>

            <tbody>
            @foreach($lot as $view_lot)
                <tr>
                    <td style="background: #c6c8ca; color: #000000;">{{$view_lot->date}}</td>
                    <td style="background: #c6c8ca; color: #000000;">{{$view_lot->supplier}}</td>
                    <td style="background: #c6c8ca; color: #000000;">{{$view_lot->lot_number}}</td>
                    <td style="background: #c6c8ca; color: #000000;">{{$view_lot->tree_name}}</td>
                    <td style="background: #c6c8ca; color: #000000;">{{$view_lot->position}}</td>
                    <td style="background: #c6c8ca; color: #000000;">{{$view_lot->first}}</td>

                    <td style="background: #c6c8ca; color: #000000;"><a href="{{url('price-lot/'.$view_lot->id)}}"> <i class="fa fa-plus"></i></a> &nbsp

                        <a href="{{url('delete-lot/'.$view_lot->id)}}"> <i class="fa fa-trash"></i></a>
                    </td>






                </tr>
            @endforeach
            </tbody>
            {{$lot->links()}}
        </table>


    </div>

@stop
