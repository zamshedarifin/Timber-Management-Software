<div class="container">

    <div class="page-header">
        <h1 style="text-align: center">ATKO </h1>
    </div>

    <div class="customer">
    <div class="left">Name:</div>
    <div class="right">Date:</div>

    </div>

    <div class="address">Address:</div>



    <!-- Simple Invoice - START -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td style="width: 200px;"><strong>Tree Name</strong></td>
                                    <td style="width: 200px;"></td>
                                    <td style="width: 200px;" class="text-center"><strong>CFT</strong></td>
                                    <td style="width: 200px;" class="text-right"><strong>Price</strong></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sale_report as $view)
                                <tr>
                                    <td class="text-center">{{$view->tree_name}}</td>
                                    <td class="text-center"></td>
                                    <td class="text-center">{{$view->cft}}</td>
                                    <td class="text-right">{{$view->price}}</td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Total</strong></td>
                                    <td class="highrow text-right">{{$saleAmount->total}}</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Paid</strong></td>
                                    <td class="emptyrow text-right">{{$saleAmount->paid}}</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>DUE</strong></td>
                                    <td class="emptyrow text-right">{{$saleAmount->total - $saleAmount->paid}}</td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">

            <div style="margin-left: 500px; padding-top: 30px;"><STRONG>Signature</STRONG></div>
        </div>
    </div>

    <style>
        .customer{height: 40px;width: 700px;}
        .address{height: 20px;width: 700px;margin-left: 20px;padding-top: 20px;
            border-bottom: #000 1px dotted; margin-bottom: 40px;}

        .left{float: left; clear: right; width: 60%; margin-left: 20px;
            border-bottom: #000 1px dotted;}
        .right{float: right; width:30%; border-bottom: #000 1px dotted;}

        .iconbig {
            font-size: 77px;
            color: #5CB85C;
        }

        .table > tbody > tr > .emptyrow {
            border-top: none;
        }

        .table > thead > tr > .emptyrow {
            border-bottom: none;
        }

        .table > tbody > tr > .highrow {
            border-top: 3px solid;
        }
    </style>


</div>
