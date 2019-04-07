
@extends('home')
@section('contant')
    <style>
        .nav li a{color:#286090; font-weight: Bold}

    </style>
 <div class="row">

            <div class="panel panel-footer">
                <form action="{{route('save-data')}}" method="POST">
                    @csrf
                    <?php
                    $massage = Session::get('Success');
                    if (isset($massage)) {
                    ?>
                    <h5 style="color: #1c7430; font-weight: bold">
                        <?php echo $massage; ?>
                    </h5>

                    <?php
                    }
                    ?>

                    <div class="row">
                    <div class="col-lg-2 col-sm-2">
                        <div class="form-group">
                            <label for="lot">Lot Number</label>
                            <input id="lot" type="text" class="form-control {{ $errors->has('lot_number') ? ' is-invalid' : '' }}" name="lot_number" placeholder="Lot Number" required>
                            <strong style="color: red">{{ $errors->first('lot_number') }}</strong>
                        </div>
                    </div>

                    <div class="col-lg-5 col-sm-6">
                        <div class="form-group">
                            <label for="supplier">Supplier</label>
                            <select class="form-control" name="supplier" >
                                @foreach($supplier as $view_supplier)
                                <option value="{{$view_supplier->id}}">{{$view_supplier->supplier_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-1 col-sm-2">
                            <div class="form-group">
                                <label for="Add">Add </label>
                                <input id="Add" type="text" class="btn btn-primary form-control" value="+" data-toggle="modal" data-target="#SupplierModal">
                            </div>

                    </div>
                    <div class="col-lg-4 col-sm-4">
                        <div class="form-group">
                            <label for="datepicker">Date</label>
                            <input id="datepicker" type="text" class="form-control" name="datepicker"  placeholder="Date" data-provide="datepicker">

                        </div>
                    </div>



                    {{--Table--}}

                    <div class="col-lg-12 col-sm-12">
                        <table class="table table-bordered">
                            <thead>

                                    <th></th>
                                    <th>product name</th>

                                    <th> < 16</th>
                                    <th>16 - 23</th>
                                    <th>24 - 29</th>
                                    <th>30 - 35</th>
                                    <th>36 - 47</th>
                                    <th>48 - 59</th>
                                    <th>59 ></th>
                                    <th>ok</th>
                                    <th><a href="#" class="addRow"><span class="glyphicon glyphicon-plus"></span></a> </th>
                            </thead>

                            <tbody>
                                <tr>
                                        <td>
                                            <input type="hidden" name="extra[]" >
                                        </td>

                                        <td>
                                            <select type="text" name="treename[]" class="form-control" style="width: 120px;">
                                               @foreach($tree as $view)
                                                <option value="{{$view->tree_name}}">{{$view->tree_name}}</option>
                                               @endforeach
                                            </select>
                                        </td>


                                            <td><input type="text"  name="sizeone[]"  class="form-control idCond" data-idCond="'+idCond+'" id="input1'+idCond+'"></td>
                                            <td><input type="text"  name="sizetwo[]"  class="form-control idCond" data-idCond="'+idCond+'" id="input2'+idCond+'"></td>
                                            <td><input type="text"  name="sizethree[]"  class="form-control idCond" data-idCond="'+idCond+'" id="input3'+idCond+'"></td>
                                            <td><input type="text"  name="sizefour[]"  class="form-control idCond" data-idCond="'+idCond+'" id="input4'+idCond+'"></td>
                                            <td><input type="text"  name="sizefive[]"   class="form-control idCond" data-idCond="'+idCond+'" id="input5'+idCond+'"></td>
                                            <td><input type="text"  name="sizesix[]"  class="form-control idCond" data-idCond="'+idCond+'" id="input6'+idCond+'"></td>
                                            <td><input type="text"  name="sizeseven[]"  class="form-control idCond" data-idCond="'+idCond+'" id="input7'+idCond+'"></td>
                                    <td><button type="button" id="checkAllIdOk" class="btn btn-success" data-idCond="'+idCond+'">OK</button></td>
                                           <td><a href="#" class="btn btn-danger remove" onclick="myFunction()"><span class="glyphicon glyphicon-remove"></span></a> </td>
                                </tr>
                            </tbody>

                        </table>

                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-primary btn-block">
                        </div>
                    </div>

                </div>
                </form>
            </div>
</div>


    <script type="text/javascript">
        $('.addRow').on('click',function(){
            addRow();

        });
        var idCond = 0;
        function addRow() {

            var addRow='<tr id="rowId'+idCond+'" >\n' +
                '                                        <td>\n' +
                '                                            <input type="hidden" name="extra[]">\n' +
                '                                        </td>\n' +
                '\n' +
                '                                        <td>\n' +
                '                                            <select type="text" name="treename[]" class="form-control" style="width: 120px;">\n' +
                '                                                @foreach($tree as $view)\n' +
                '                                                <option value="{{$view->tree_name}}">{{$view->tree_name}}</option>\n' +
                '                                                @endforeach                \n' +
                '                                        </select>\n' +
                '                                        </td>\n' +
                '\n' +

                '\n' +
                '                                            <td><input type="text" name="sizeone[]" class="form-control idCond" data-idCond="'+idCond+'" id="input1'+idCond+'"></td>\n' +
                '                                            <td><input type="text" name="sizetwo[]" class="form-control idCond" data-idCond="'+idCond+'" id="input2'+idCond+'"></td>\n' +
                '                                            <td><input type="text" name="sizethree[]" class="form-control idCond" data-idCond="'+idCond+'"  id="input3'+idCond+'"></td>\n' +
                '                                            <td><input type="text" name="sizefour[]" class="form-control idCond" data-idCond="'+idCond+'" id="input4'+idCond+'"></td>\n' +
                '                                            <td><input type="text" name="sizefive[]" class="form-control idCond" data-idCond="'+idCond+'"  id="input5'+idCond+'"></td>\n' +
                '                                            <td><input type="text" name="sizesix[]" class="form-control idCond" data-idCond="'+idCond+'"  id="input6'+idCond+'"></td>\n' +
                '                                            <td><input type="text" name="sizeseven[]" class="form-control idCond" data-idCond="'+idCond+'"  id="input7'+idCond+'"></td>\n' +
                '                                            <td><button type="button" id="checkAllIdOk" class="btn btn-success" data-idCond="'+idCond+'">OK</button></td>\n' +
                '                                           <td><button type="button" class="btn btn-danger removeInputEle"  data-idCond="'+idCond+'">X</button> </td>\n' +
                '                                </tr>';


            $('tbody').append(addRow);
            idCond ++;
        };



        function myFunction() {
            alert("You Can Not Remove Last One.");
        }




        $(document).on("blur",".idCond",function(e){
            e.preventDefault();
            var currentVal = $(this).val();
            var idCond =  $(this).attr('data-idCond');
            var input1 = $("#input1"+idCond).val();
            var input2 = $("#input2"+idCond).val();
            var input3 = $("#input3"+idCond).val();
            var input4 = $("#input4"+idCond).val();
            var input5 = $("#input5"+idCond).val();
            var input6 = $("#input6"+idCond).val();
            var input7 = $("#input7"+idCond).val();
            console.log(currentVal)
            if (input1=="" && input2!="" && input3=="" && input4=="" && input5==""&& input6==""&& input7==""){
                $("#input1"+idCond).val(currentVal);
                if (input2==""){
                    $("#input2"+idCond).val(currentVal);
                }if (input3==""){
                    $("#input3"+idCond).val(currentVal);
                }if (input4==""){
                    $("#input4"+idCond).val(currentVal);
                }if (input5==""){
                    $("#input5"+idCond).val(currentVal);
                }if (input6==""){
                    $("#input6"+idCond).val(currentVal);
                }if (input7==""){
                    $("#input7"+idCond).val(currentVal);
                }
            }


            else if( input2=="" && input3!="" && input4=="" && input5==""&& input6==""&& input7==""){
                $("#input2"+idCond).val(currentVal);
                if (input1==""){
                    $("#input1"+idCond).val(currentVal);
                }
                if (input4==""){
                    $("#input4"+idCond).val(currentVal);
                }if (input5==""){
                    $("#input5"+idCond).val(currentVal);
                }if (input6==""){
                    $("#input6"+idCond).val(currentVal);
                }if (input7==""){
                    $("#input7"+idCond).val(currentVal);
                }

            }


            else if( input3=="" && input4!="" && input5==""&& input6==""&& input7==""){
                $("#input3"+idCond).val(currentVal);
                if (input1==""){
                    $("#input1"+idCond).val(currentVal);
                }
                if (input2==""){
                    $("#input2"+idCond).val(currentVal);
                }if (input3==""){
                    $("#input3"+idCond).val(currentVal);
                }if (input5==""){
                    $("#input5"+idCond).val(currentVal);
                }if (input6==""){
                    $("#input6"+idCond).val(currentVal);
                }if (input7==""){
                    $("#input7"+idCond).val(currentVal);
                }

            }


            else if( input4=="" && input5!=""&& input6==""&& input7==""){
                $("#input4"+idCond).val(currentVal);
                if (input1==""){
                    $("#input1"+idCond).val(currentVal);
                }
                if (input2==""){
                    $("#input2"+idCond).val(currentVal);
                }
                if (input3==""){
                    $("#input3"+idCond).val(currentVal);
                }
                if (input4==""){
                    $("#input4"+idCond).val(currentVal);
                }if (input5==""){
                    $("#input5"+idCond).val(currentVal);
                }if (input6==""){
                    $("#input6"+idCond).val(currentVal);
                }if (input7==""){
                    $("#input7"+idCond).val(currentVal);
                }

            }

            else if( input5=="" && input6!=""&& input7==""){
                $("#input5"+idCond).val(currentVal);
                if (input1==""){
                    $("#input1"+idCond).val(currentVal);
                }
                if (input2==""){
                    $("#input2"+idCond).val(currentVal);
                }
                if (input3==""){
                    $("#input3"+idCond).val(currentVal);
                }
                if (input4==""){
                    $("#input4"+idCond).val(currentVal);
                }
                if (input7==""){
                    $("#input7"+idCond).val(currentVal);
                }
            }


            else if( input6==""&& input7!=""){
                $("#input6"+idCond).val(currentVal);
                if (input1==""){
                    $("#input1"+idCond).val(currentVal);
                }
                if (input2==""){
                    $("#input2"+idCond).val(currentVal);
                }
                if (input3==""){
                    $("#input3"+idCond).val(currentVal);
                }
                if (input4==""){
                    $("#input4"+idCond).val(currentVal);
                }
                if (input5==""){
                    $("#input5"+idCond).val(currentVal);
                }
            }

            $(document).on("click","#checkAllIdOk",function(e){
                e.preventDefault();
                var idCond =  $(this).attr('data-idCond');
                var input1 = $("#input1"+idCond).val();
                var input2 = $("#input2"+idCond).val();
                var input3 = $("#input3"+idCond).val();
                var input4 = $("#input4"+idCond).val();
                var input5 = $("#input5"+idCond).val();
                var input6 = $("#input6"+idCond).val();
                var input7 = $("#input7"+idCond).val();

                if (input6!="" && input7==""){
                    $("#input7"+idCond).val(input6);
                 }
                 if(input5!="" && input6=="" && input7==""){
                     $("#input6"+idCond).val(input5);
                     $("#input7"+idCond).val(input5);
                 }
                if(input4!="" && input5=="" && input6=="" && input7==""){
                    $("#input6"+idCond).val(input4);
                    $("#input7"+idCond).val(input4);
                    $("#input5"+idCond).val(input4);
                }
                if(input3!="" && input4=="" && input5=="" && input6=="" && input7==""){
                    $("#input6"+idCond).val(input3);
                    $("#input7"+idCond).val(input3);
                    $("#input5"+idCond).val(input3);
                    $("#input4"+idCond).val(input3);
                }
                if(input2!="" && input3=="" && input4=="" && input5=="" && input6=="" && input7==""){
                    $("#input6"+idCond).val(input2);
                    $("#input7"+idCond).val(input2);
                    $("#input5"+idCond).val(input2);
                    $("#input4"+idCond).val(input2);
                    $("#input3"+idCond).val(input2);
                }
                if(input1!="" && input2=="" && input3=="" && input4=="" && input5=="" && input6=="" && input7==""){
                    $("#input6"+idCond).val(input1);
                    $("#input7"+idCond).val(input1);
                    $("#input5"+idCond).val(input1);
                    $("#input4"+idCond).val(input1);
                    $("#input3"+idCond).val(input1);
                    $("#input2"+idCond).val(input1);
                }



            });

            $(document).on("click",".removeInputEle",function (e) {
                e.preventDefault();

                var currentInputVal =  $(this).attr('data-idCond');
                alert(currentInputVal);
                $("#rowId"+currentInputVal).remove();
            })

});
 </script>

@stop

