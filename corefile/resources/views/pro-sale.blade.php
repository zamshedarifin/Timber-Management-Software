
@extends('home')
@section('contant')
    <style>
        .nav li a{color:#286090; font-weight: Bold}

    </style>
    <div class="row">
        <div class="row">
            <div class="panel panel-footer">
                <div class="row">
                    <?php
                    $data=Session::get('Success');
                    if(isset($data)) {
                    ?>
                    <h5 style="color: #1c7430; font-weight: bold">
                        <?php echo $data; ?>
                    </h5>
                    <?php   }
                    ?>

        <div class="panel panel-footer">
            <div class="row">
                <form action="{{url('search')}}" method="get">


                    <div class="col-lg-2 col-sm-8">
                            <div class="form-group">
                                <input id="search" type="text" class="form-control" name="search" placeholder="Product Id">
                            </div>
                    </div>
                        <div class="col-lg-2 col-sm-8">
                            <div class="form-group">
                                <input id="search" type="text" class="form-control" name="searcho" placeholder="Product Id">
                            </div>
                    </div>
                        <div class="col-lg-2 col-sm-8">
                            <div class="form-group">
                                <input id="search" type="text" class="form-control" name="searcht" placeholder="Product Id">
                            </div>
                    </div>
                        <div class="col-lg-2 col-sm-8">
                            <div class="form-group">
                                <input id="search" type="text" class="form-control" name="searchth" placeholder="Product Id">
                            </div>
                    </div>
                        <div class="col-lg-2 col-sm-8">
                            <div class="form-group">
                                <input id="search" type="text" class="form-control" name="searchf" placeholder="Product Id">
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-8">
                            <div class="form-group">
                               <a href="#" class="btn addRow form-control"><span class="glyphicon glyphicon-plus"></span></a>

                            </div>
                        </div>
                    <table id="rr">

                    </table>


                    <div class="col-lg-2 col-sm-2">
                        <input type="submit" class="btn btn-success btn-block" value="search">
                    </div>


                </form>

                </div>
            <br>


            <div class="row">
                <form action="{{route('product-sale')}}" method="POST">
                    {!! csrf_field() !!}
                <div class="col-lg-6 col-sm-6">
                    <div class="form-group">
                        <label for="customer">Customer</label>
                        <select class="form-control" name="customer" >
                            @foreach($customer as $view_supplier)
                                <option value="{{$view_supplier->id}}">{{$view_supplier->customer_name}} </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="col-lg-2 col-sm-2">
                    <div class="form-group">
                        <label for="Add">Add customer </label>
                        <input id="Add" type="text" class="btn btn-warning form-control" value="+" data-toggle="modal" data-target="#CustomerModal">
                    </div>

                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input id="datepicker" type="text" class="form-control" name="datepicker"  placeholder="Date" data-provide="datepicker">

                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                        <th></th>
                        <th>product Details</th>
                        <th>Price</th>
                        </thead>

                        @foreach($search as $viewSrc)
                        <tbody>
                        <tr>
                            <td>
                                 <input type="hidden" name="extra[]">
                            </td>
                            <td class="col-sm-6">
                                <input type="hidden" name="tree" value="{{$viewSrc->product_id}}">
                                <input type="hidden" name="lot_number[]" value="{{$viewSrc->lot_number}}">
                                <p> <input type="hidden" name="treeName[]" value="{{$viewSrc->tree_name}}">Product Name: {{$viewSrc->tree_name}}</p>
                                <p> <input type="hidden" name="cft[]" value="{{$viewSrc->cft}}">CFT: <span style="color: #c51f1a; font-weight: bold">{{$viewSrc->cft}}</span></p>
                            </td>
                            <td><input onblur="findTotal()" type="text" name="price[]" class="" value="{{$viewSrc->price}}"></td>
                        </tr>
                        </tbody>
                        @endforeach

                        <tr>
                            <td></td>
                            <td class="col-sm-6 text-right"><b>Total Amount</b></td>
                            <td><input type="text" name="total" id="total"/></td>
                       </tr>

                        <tr>
                            <td></td>
                            <td class="col-sm-6 text-right"><b>Total Paid</b></td>
                          <td><input type="text" name="paid" id="due"/></td>
                       </tr>

                        <tr>
                            <td></td>
                            <td class="col-sm-6 text-right"><b>Total Due</b></td>
                           <td><input type="text" name="due" id="totalAmount"/></td>
                        </tr>


                    </table>

                </div>
                <div class="col-lg-2 col-sm-2 ">
                    <input type="submit" class="btn btn-primary btn-block" value="Sale">
                </div>
                </form>
            </div>

        </div>

        </div>
    </div>

    <script type="text/javascript">
        $('.addRow').on('click',function(){
            addRow();

        });

        function addRow() {
            var addRow='<div class="col-lg-2 col-sm-8">\n' +
                '                            <div class="form-group">\n' +
                '                                <input id="search" type="text" class="form-control" name="search[]" placeholder="Product Id">\n' +
                '                            </div>\n' +
                '                    </div>\n' +
                '                        <div class="col-lg-2 col-sm-8">\n' +
                '                            <div class="form-group">\n' +
                '                                <input id="search" type="text" class="form-control" name="searcho[]" placeholder="Product Id">\n' +
                '                            </div>\n' +
                '                    </div>\n' +
                '                        <div class="col-lg-2 col-sm-8">\n' +
                '                            <div class="form-group">\n' +
                '                                <input id="search" type="text" class="form-control" name="searcht[]" placeholder="Product Id">\n' +
                '                            </div>\n' +
                '                    </div>\n' +
                '                        <div class="col-lg-2 col-sm-8">\n' +
                '                            <div class="form-group">\n' +
                '                                <input id="search" type="text" class="form-control" name="searchth[]" placeholder="Product Id">\n' +
                '                            </div>\n' +
                '                    </div>\n' +
                '                        <div class="col-lg-2 col-sm-8">\n' +
                '                            <div class="form-group">\n' +
                '                                <input id="search" type="text" class="form-control" name="searchf[]" placeholder="Product Id">\n' +
                '                            </div>\n' +
                '                    </div>\n' +
                '                        <div class="col-lg-2 col-sm-8">\n' +
                '                            <div class="form-group">\n' +
                '                                <input id="search" type="text" class="form-control" name="searchfi[]" placeholder="Product Id">\n' +
                '                            </div>\n' +
                '                    </div>';


            $('#rr').append(addRow);
        };

        function delete_tr(tr) {
            $($(this).closest("tr")).remove()
        }

        function myFunction() {
            alert("You Can Not Remove Last One.");
        }
    </script>

    <script type="text/javascript">
        function findTotal(){
            var arr = document.getElementsByName('price[]');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            document.getElementById('total').value = tot;
        }

        $(function () {
            var total = $('input:text[id$=total]').keyup(foo);
            var due = $('input:text[id$=due]').keyup(foo);
            var totalAmount = $('input:text[id$=totalAmount]').keyup(foo);
            function foo() {
                var value1 = total.val();
                var value2 = due.val();

                if(IsNumeric(value2)){
                    if(IsNumeric(value1)){
                        var value3 = parseFloat(value1) - parseFloat(value2);
                        $('input:text[id$=totalAmount]').val(value3);
                    }}


            }
            function IsNumeric(input) {
                return (input - 0) == input && input.length > 0;
            }
        });

    </script>
@stop
