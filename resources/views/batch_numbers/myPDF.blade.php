<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
        }

        th,
        td {
            /* border: 1px solid #ccc; */
            padding: 8px;
            text-align: left;
            position: relative;
        }
        td {
            font-size: 75%;
        }

        th {
            background-color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        tr.active {
            background-color: #007bff;
            color: #fff;
        }
        .title{
            color: #024b99;
            font-size: 180%;
            text-align: center;
            margin-top: 0%;
        }
        .warning{
            color: #000000;
            border: 2px solid;
            border-left: 0px;
            border-right: 0px;
        }
        .danger{
            color: #ee0b0b;
            font-weight:bold;

        }
        header {
                position: fixed;
                top: 0px;
                left: 0px;
                right: 0px;
                height: 50px;
                line-height: 35px;
            }
    </style>
</head>
<body>
    <header>
        
    <div class="row" style="width:100%; float:left; clear:both;">
        <div style="width:300px; float:left;">
            <img src="{{ public_path('images/R Logo.jpg') }}" width="30%">
        </div>
        <div style="width:60%; float:left; padding-left:30%;">
            <p class="title" style="margin-bottom:0;"><u>{{ $title }}</u></p>
            <p style="text-align: center;"><b>List of Open Batch For Cnc Turning</b></p>
        </div>
    </div>
    </header>

    <div class="row" style="clear:both;">

    <table class="table table-striped table-bordered" width="100%">

        <thead>
            <tr class='warning'>
                <th><u>Batch Name</u></th>
                <th><u>Customer Name</u></th>
                <th><u>Part Name</u></th>
                <th><u>Date</u></th>
                <th><u>Qty</u></th>
            </tr>
        </thead>
            @foreach ($data as $key => $val)  
        <tbody>
        <div class="" style="margin-top:15px; margin-bottom:15px; margin-left:-15px;">
            <b>
                <u>
                    {{$val['month_year']}}
                </u>
            </b>
        </div>
                    
            @foreach ($val['data'] as $key => $batchNumber)
                <tr>
                    
                    <td>{{ $batchNumber->batch_name }}</td>
                    <td>{{ $batchNumber->customer_name }}</td>
                    <td>{{ $batchNumber->part_name }}</td>
                    <td>{{ $batchNumber->batch_start_date }}</td>
                    <td>{{ $batchNumber->batch_qty }}</td>

                </tr>
            @endforeach
            <tr>
                <td class="danger" align="right">{{$val['data']->count()}}</td>
                <td class="danger">Total Open Batch Nos</td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
        </tbody>

        @endforeach
    </table>
</div>
</body>
</html>
