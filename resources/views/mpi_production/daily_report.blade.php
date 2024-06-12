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
            <p style="text-align: center;"><b><u>Daily MPI Production Report</u></b></p>
        </div>
    </div>
    </header>
    {{-- <img src="{{asset('images/')}}" alt="" height="50%" width="50%"> --}}
    <div class="row" style="clear:both;">

    <table class="table table-striped table-bordered" width="100%">

        <thead>
            <tr class='warning' >
                <th>Date</th>
                <th>Batch No</th>
                <th>Part Name</th>
                <th>Customer Name</th>
                <th>Insp Qty</th>
                <th>Rej Qty</th>
                <th>OK Qty</th>
            </tr>
        </thead>
            
        <tbody>
            <?php
            $total_insp_qty=0;
            $total_rej_qty=0;
            $total_ok_qty=0;
            ?>
            @foreach ($data as $key => $batchNumber)
                <tr>
                    <?php
                    $total_insp_qty+=$batchNumber->inspected_qty;
                    $total_rej_qty+=$batchNumber->rejected_qty;
                    $total_ok_qty+=$batchNumber->ok_qty;
                    ?>
                    <td>{{ $batchNumber->date }}</td>
                    <td>{{ $batchNumber->batch_number_id }}</td>
                    <td>{{ $batchNumber->part_name }}</td>
                    <td>{{ $batchNumber->customer }}</td>
                    <td>{{ $batchNumber->inspected_qty }}</td>
                    <td>{{ $batchNumber->rejected_qty }}</td>
                    <td>{{ $batchNumber->ok_qty }}</td>

                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>{{$total_insp_qty}}</b></td>
                <td><b>{{$total_rej_qty}}</b></td>
                <td><b>{{$total_ok_qty}}</b></td>

            </tr>
        </tbody>
    </table>
</div>
</body>
</html>
