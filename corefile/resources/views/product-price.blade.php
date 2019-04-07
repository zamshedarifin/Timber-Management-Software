@extends('home')
@section('contant')


    <div class="row">
        <div class="panel panel-footer">
            <div class="row">
                <?php
                $data=Session::get('save');
                if(isset($data)) {
                ?>
                <h5 style="color: #1c7430; font-weight: bold">
                    <?php echo $data; ?>
                </h5>
                <?php   }
                ?>


                <form action="{{route('save-price')}}" method="post">
                    @csrf
                    <div class="col-lg-2 col-sm-4">
                        <div class="form-group">
                            <label for="lot">Lot Number</label>
                            <input id="lot" type="text" class="form-control" name="lot_number" placeholder="Lot Number" value="{{$search->lot_number}}">
                            <input id="tree" type="hidden" class="form-control" name="supplier" value="{{$search->supplier}}">
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-4">
                        <div class="form-group">
                            <label for="tree">Tree Name</label>
                            <input id="tree" type="text" class="form-control" name="treename" value="{{$search->tree_name}}">
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-4">
                        <div class="form-group">
                            <label for="tree">Tree Position</label>
                            <input id="tree" type="text" class="form-control" name="position" value="{{$search->position}}">

                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-4">
                        <div class="form-group">
                            <label for="tree">Date</label>
                            <input id="datepicker" type="text" class="form-control" name="datepicker"  placeholder="Date" data-provide="datepicker" required>

                        </div>
                    </div>


                    @if($search->position == 'square')
                        <div class="col-lg-12 col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                <th>Height</th>
                                <th>Width</th>
                                <th>Length</th>
                                <th>CFT</th>
                                <th>price showprice</th>

                                </thead>

                                <tbody>
                                <tr>

                                    <td><input type="text" name="height" id="height" class="form-control"></td>
                                    <td><input type="text" name="width" id="width"class="form-control"></td>
                                    <td><input type="text" name="lengthsq" id="lengthsq" class="form-control"></td>
                                    <td><input type="text" name="cft" id="cft" class="form-control"></td>
                                    <td><input type="text" name="price" id="price" value="{{$search->first}}" class="form-control"></td>
                                </tr>
                                </tbody>

                            </table>

                            <div class="col-lg-2 col-sm-4">
                                <div class="form-group">
                                    <label for="lot">Product ID</label>
                                    <input id="lot" type="text" class="form-control" name="product_id" placeholder="Product Id" value="{{$search->lot_number}}={{$search->id}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    @else
                        <div class="col-lg-12 col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                <th>Round One</th>
                                <th>Round Two</th>
                                <th>Length</th>
                                <th>CFT</th>
                                <th> showprice</th>
                                <th>price showprice</th>

                                </thead>

                                <tbody>
                                <tr>

                                    <td><input type="text" name="round1" id="round1" onkeyup="onkey()" class="form-control"></td>
                                    <td><input type="text" name="round2" id="round2"class="form-control"></td>
                                    <td><input type="text" name="length" id="length" class="form-control"></td>
                                    <td><input type="text" name="cft" id="cft" class="form-control"></td>
                                    <td><input type="text" name="showprice" id="showprice" value="" class="form-control"></td>
                                    <td><input type="text" name="price" id="price"  class="form-control"></td>

                                </tr>
                                </tbody>

                            </table>
                            <div class="col-lg-2 col-sm-4">
                                <div class="form-group">
                                    <label for="lot">Product ID</label>
                                    <input id="lot" type="text" class="form-control" name="product_id" placeholder="Product Id" value="{{$search->lot_number}}-{{$search->id}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-block">
                            </div>

                        </div>

                    @endif
                </form>
            </div>

        </div>
    </div>

    <script>
        $('#length').keyup(function(){

            var round1
            var round2
            var length
            textone = parseFloat($('#round1').val());
            texttwo = parseFloat($('#round2').val());
            texttre = parseFloat($('#length').val());
            showprice = parseFloat($('#showprice').val());
            var cft = ((textone * texttwo * texttre)/(2304));
            var showprice = (showprice * cft);
            $('#cft').val(cft.toFixed(2));
            $('#price').val(showprice.toFixed(2));


        });

        function onkey(){
            var a = $('#round1').val();
            $('#round2').val(a);

            var first = {{$search->first}};
            var second = {{$search->second}};
            var third = {{$search->third}};
            var fourth = {{$search->fourth}};
            var five= {{$search->five}};
            var six = {{$search->six}};
            var seven = {{$search->seven}};
            var round1 = $('#round1').val();
            if(round1<16){
                $('#showprice').val(first);
            }else if(round1>=16 && round1<=23){
                $('#showprice').val(second);
            }else if(round1>=24 && round1<=29){
                $('#showprice').val(third);
            }else if(round1>=30 && round1<=35){
                $('#showprice').val(fourth);
            }else if(round1>=36 && round1<=47){
                $('#showprice').val(five);
            }else if(round1>=48 && round1<=59){
                $('#showprice').val(six);
            }else if(round1>59){
                $('#showprice').val(seven);
            }
            else{
                $('#showprice').val("");
            }



        }


    </script>
    <script>
        $('#lengthsq').keyup(function(){

            var height
            var width
            var lengthsq


            textone = parseFloat($('#height').val());
            texttwo = parseFloat($('#width').val());
            texttre = parseFloat($('#lengthsq').val());
            price = parseFloat($('#price').val());
            var cft = (textone * texttwo * texttre)/144;

            var price = price * cft;
            $('#cft').val(cft.toFixed(2));
            $('#price').val(price.toFixed(2));


        });
    </script>

@stop
