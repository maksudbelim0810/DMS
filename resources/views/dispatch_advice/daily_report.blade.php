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
            <p style="text-align: center;"><b><u>Daily Dispatch Report</u></b></p>
        </div>
    </div>
    </header>
    {{-- <img src="{{asset('images/')}}" alt="" height="50%" width="50%"> --}}
    <div class="row" style="clear:both;">

    <table class="table table-striped table-bordered" width="100%">

        <thead class="text-center">
                
            <tr class='warning' >
                <th>Date</th>
                <th>AD No</th>
                <th>Batch No</th>
                <th>Part Name</th>
                <th>Customer Name</th>
                <th>Disp Qty</th>
            </tr>
        </thead>
            
        <tbody>
            @foreach ($data as $key => $batchNumber)
                <tr>
                    <td>{{ $batchNumber->date }}</td>
                    <td>{{ $batchNumber->dispatch_advice_no }}</td>
                    <td>{{ $batchNumber->batch_no }}</td>
                    <td>{{ $batchNumber->part_name }}</td>
                    <td>{{ $batchNumber->customer }}</td>
                    <td>{{ $batchNumber->total_qty }}</td>

                </tr>
            @endforeach

        </tbody>
    </table>
</div>
</body>
</html>
