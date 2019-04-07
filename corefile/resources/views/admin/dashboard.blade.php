<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Atko Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('asset/admin')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('asset/admin')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('asset/admin')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('asset/admin')}}/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('asset/admin')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $( function() {
            //$( "#datepicker" ).datepicker();
            $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
        } );
    </script>
    <script type="text/javascript">
        function checkDelete()
        {
            chk=confirm('Are Your Sure to Delete This ?');
            if(chk)
            {
                return true;
            }
            else{
                return false;
            }

        }
    </script>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('round/')}}">AtKO</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">


            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>{{Session::get('name')}} <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">

                    <li><a href="{{URL::to('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>

            </li>

        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="{{URL::to('dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <?php
                    $access_label=Session::get('role');
                    if($access_label == 1)
                    {
                    ?>
                    <li><a href="{{url('account-report')}}"><i class="fa fa-list fa-fw"></i>Account Report</a></li>
                   <?php
                   }
                   ?>

                    <li><a href="{{url('all-customer')}}"><i class="fa fa-list fa-fw"></i>Customer List</a></li>
                    <li><a href="{{url('Expence')}}"><i class="fa fa-list fa-fw"></i>Expence</a></li>
                    <li><a href="{{url('Expence-list')}}"><i class="fa fa-list fa-fw"></i>Expence List</a></li>
                    <li><a href="{{url('all-lot')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Lot Details</a></li>
                    <li><a href="{{url('note')}}"><i class="fa fa-list fa-fw"></i>Note</a></li>
                    <li><a href="{{url('Product-List')}}"><i class="fa fa-list fa-fw"></i>Product List</a></li>
                    <li><a href="{{url('pro-sale')}}"><i class="fa fa-list fa-fw"></i>Pos</a></li>
                    <li><a href="{{url('all-supplier')}}"><i class="fa fa-list fa-fw"></i>Supplier List</a></li>
                    <li><a href="{{url('Sales-Report')}}"><i class="fa fa-list fa-fw"></i>Sales Report</a></li>
                    <li><a href="#"><i class="fa fa-list fa-fw"></i>Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('Create-Expance-Category')}}">Create Expance Category</a>
                            </li>
                            <li>
                                <a href="{{url('Create-Tree')}}">Create Tree Name</a>
                            </li>
                            <?php
                            $access_label=Session::get('role');
                            if($access_label == 1)
                            {
                            ?>
                            <li><a href="{{url('Add-admin')}}">Add Admin</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
       <br>
        @yield('master')


    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script type="text/javascript" src="{{asset('asset/js')}}/bootstrap-datepicker.js"></script>

<script src="{{asset('asset/admin')}}/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('asset/admin')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('asset/admin')}}/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="{{asset('asset/admin')}}/vendor/raphael/raphael.min.js"></script>
<script src="{{asset('asset/admin')}}/vendor/morrisjs/morris.min.js"></script>
<script src="{{asset('asset/admin')}}/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('asset/admin')}}/dist/js/sb-admin-2.js"></script>
<script>
    function pageprint() {
        window.print();
    }
</script>

@yield('jquery')
</body>

</html>
