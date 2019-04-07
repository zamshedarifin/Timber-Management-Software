@extends('admin.dashboard')
@section('master')
    <?php
    $totalSale =DB::table('sale_report')->sum('sale_report.total');
    $totalpaid =DB::table('sale_report')->sum('sale_report.paid');
    $totalexpance =DB::table('expences')->sum('expences.amount');
    $totalPurches =DB::table('prices')->sum('prices.price');

    ?>
    <div class="row">

        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Total Sale</b>
                </div>
                <div class="panel-body">
                    <b>Date to Date:</b>
                    <p><form action="{{url('search.totalsale')}}" method="get">
                        <input size="13" name="from" id="datepicker" placeholder="Date" data-provide="datepicker">
                        <input size="13" name="to"id="datepicker" placeholder="Date" data-provide="datepicker">
                        <button value="ok">ok</button>
                    </form>
                    </p>
                </div>
                <div class="panel-footer">
                    <b>Tk:  {{$totalSale}}</b>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Total Received Money</b>
                </div>
                <div class="panel-body">

                    <b>Date to Date:</b>
                    <p><form action="{{url('search.totalsale')}}" method="get">
                        <input size="13" name="from" id="datepicker" placeholder="Date" data-provide="datepicker">
                        <input size="13" name="to"id="datepicker" placeholder="Date" data-provide="datepicker">
                        <button value="ok">ok</button>
                    </form>
                    </p>
                </div>
                <div class="panel-footer">
                    <b>TK:  {{$totalpaid}}</b>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Sales Product</b>
                </div>
                <div class="panel-body">
                    <p>Purches Price:</p>

                <p> <b>{{$totalPurches}}</b></p>
                </div>
                <div class="panel-footer">
                    <b>TK:  {{$totalSale}}</b>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Total Due</b>
                </div>
                <div class="panel-body">
                    <b>Date to Date:</b>
                    <p><form action="{{url('search.due')}}" method="get">
                        <input size="13" name="from" id="datepicker" placeholder="Date" data-provide="datepicker">
                        <input size="13" name="to"id="datepicker" placeholder="Date" data-provide="datepicker">
                        <button value="ok">ok</button>
                    </form>
                    </p>

                </div>
                <div class="panel-footer">
                    <b>TK:  {{$totalSale - $totalpaid}}</b>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Total Expence</b>
                </div>
                <div class="panel-body">
                    <b>Date to Date:</b>
                    <p><form action="{{url('search.expance')}}" method="get">
                        <input size="13" name="from" id="datepicker" placeholder="Date" data-provide="datepicker">
                        <input size="13" name="to"id="datepicker" placeholder="Date" data-provide="datepicker">
                        <button value="ok">ok</button>
                    </form>
                    </p>

                </div>
                <div class="panel-footer">
                    <b>Price:  {{$totalexpance}}</b>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <b>Total Profit / Loss</b>
                </div>
                <div class="panel-body">
                    <b>Date to Date:</b>
                    <p><form action="{{url('search.profit')}}" method="get">
                        <input size="13" name="from" id="datepicker" placeholder="Date" data-provide="datepicker">
                        <input size="13" name="to"id="datepicker" placeholder="Date" data-provide="datepicker">
                        <button value="ok">ok</button>
                    </form>
                    </p></div>
                <div class="panel-footer">
                    <b>Price: {{$totalSale-($totalPurches+$totalexpance)}}</b>
                </div>
            </div>
        </div>

    </div>


@stop
</
