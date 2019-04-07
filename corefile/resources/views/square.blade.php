
@extends('home')
@section('contant')
    <style>
        .nav li a{color:#286090; font-weight: Bold}

    </style>
    <div class="row">

        <div class="panel panel-footer">
            <form action="{{route('square-save')}}" method="POST">
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
                        <div id="Showsupplier">
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

                            <th><a href="#" class="addRow"><span class="glyphicon glyphicon-plus"></span></a> </th>
                            </thead>

                            <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="extra[]" >
                                </td>

                                <td>
                                    <select type="text" name="treename[]" class="form-control" >
                                        @foreach($tree as $view)
                                            <option value="Korai">{{$view->tree_name}}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td><input type="text" id="sizeone" name="sizeone[]" onkeypress="onkey()" class="form-control"></td>
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

        function addRow() {
            var addRow='<tr>\n' +
                '                                        <td>\n' +
                '                                            <input type="hidden" name="extra[]">\n' +
                '                                        </td>\n' +
                '\n' +
                '                                        <td>\n' +
                '                                            <select type="text" name="treename[]" class="form-control" >\n' +
                '                                                <option value="Shagun">Shagun</option>\n' +
                '                                                <option value="Mehaguni">Mehaguni</option>\n' +
                '                                                <option value="Korai">Korai</option>\n' +
                '                                            </select>\n' +
                '                                        </td>\n' +
                '\n' +
                 '\n' +
                '                                            <td><input type="text" name="sizeone[]" class="form-control"></td>\n' +
                '                                            <td><a href="#" class="btn btn-danger remove" onclick="delete_tr()"><span class="glyphicon glyphicon-remove"></span></a> </td>\n' +
                '                                </tr>';


            $('tbody').append(addRow);
        };

        function delete_tr(tr) {
            $(tr).closest('tr').remove();
        }

        function myFunction() {
            alert("You Can Not Remove Last One.");
        }

    </script>

@stop
