<html>
    <head>
        <title>Welcome To ATKO</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/todc-bootstrap/3.3.7-3.3.13/css/bootstrap-theme.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/todc-bootstrap/3.3.7-3.3.13/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $('#datepicker').datepicker({
            });
        </script>
    </head>
<body>
<div class="container">
    <section class="panel ">
        <div class="row">
            <nav class="navbar navbar-default" >
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{URL::to('round/')}}">Atko Timber</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Lot Add <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{URL::to('round/')}}">Round</a></li>
                                <li><a href="{{URL::to('square/')}}">Square</a></li>

                            </ul>
                        </li>
                        {{--<li><a href="{{route('product-price')}}" >Product Price</a></li>--}}

                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Lot Details <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{URL::to('Round-Lot')}}">Round</a></li>
                            <li><a href="{{URL::to('Square-Lot/')}}">Square</a></li>

                        </ul>
                        </li>
                        <li><a href="{{URL::to('/pro-sale')}}" >Product Sale</a></li>
                        <li><a href="{{URL::to('dashboard')}}" >Dashboard </a></li>
                        <li><a href="{{URL::to('logout')}}" >Logout </a></li>

                    </ul>
                </div>
            </nav>
        </div>
@yield('contant')

    </section>
</div>

<!-- Modal Supplier  Modal -->
<div id="SupplierModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form class="form-horizontal" action="{{route('save-supplier')}}" method="post">
                @csrf
                <fieldset>

                    <!-- Form Name -->
                    <legend>Add Supplier </legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_id">Supplier Name</label>
                        <div class="col-md-4">
                            <input id="product_id" name="supplier_name" placeholder="Supplier Name" class="form-control input-md" ="" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_name">Phone</label>
                        <div class="col-md-4">
                            <input id="product_name" name="supplier_phone" placeholder="Phone" class="form-control input-md" ="" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_name">Email</label>
                        <div class="col-md-4">
                            <input id="product_name" name="supplier_alt_phone" placeholder="Email" class="form-control input-md" ="" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_name">Address</label>
                        <div class="col-md-4">
                            <input id="product_name" name="supplier_address" placeholder="Address" class="form-control input-md" ="" type="text">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>


                </fieldset>
            </form>
        </div>

    </div>
</div>

<!-- Modal Customer  Modal -->
<div id="CustomerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
                <form class="form-horizontal" action="{{route('save-customer')}}" method="post">
                    @csrf
                <fieldset>

                    <!-- Form Name -->
                    <legend>Add Customer </legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_id">Customer Name</label>
                        <div class="col-md-4">
                            <input id="product_id" name="customer_name" placeholder="Customer Name" class="form-control input-md" ="" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_name">Phone</label>
                        <div class="col-md-4">
                            <input id="product_name" name="customer_phone" placeholder="Phone" class="form-control input-md" ="" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_name">Email</label>
                        <div class="col-md-4">
                            <input id="product_name" name="customer_alt_phone" placeholder="Email" class="form-control input-md" ="" type="text">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_name">Address</label>
                        <div class="col-md-4">
                            <input id="product_name" name="customer_address" placeholder="Address" class="form-control input-md" ="" type="text">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Save</button>

                </fieldset>
            </form>
        </div>

    </div>
</div>

@yield('javascript')
<script type="text/javascript" src="{{asset('asset/js')}}/bootstrap-datepicker.js"></script>

</body>
</html>

