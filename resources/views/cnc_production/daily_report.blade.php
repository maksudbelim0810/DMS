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
            <p style="text-align: center;"><b><u>Daily CNC Production Report</u></b></p>
        </div>
    </div>
    </header>
    {{-- <img src="{{asset('images/')}}" alt="" height="50%" width="50%"> --}}
    <div class="row" style="clear:both;">

    <table class="table table-striped table-bordered" width="100%">

        <thead>
            <tr class='warning' >
                <th>Date</th>
                <th>M/C No</th>
                <th>Shift</th>
                <th>Part Name</th>
                <th>Total Prod 1st Setup</th>
                <th>Total Prod 2nd Setup</th>
                <th>TR</th>
                <th>PMR</th>
                <th>FR</th>
                <th>Total Prod</th>
                <th>Target Prod</th>
                <th>Prod Loss</th>
                <th>Oper Effi%</th>
            </tr>
        </thead>
            
        <tbody>
            @foreach ($data as $key => $cnc_production)
                <tr>
                    <td>{{ $cnc_production->date }}</td>
                    <td>{{ $cnc_production->mc_no }}</td>
                    <td>{{ $cnc_production->shift }}</td>
                    <td>{{ $cnc_production->part_name }}</td>
                    <td></td>
                    <td></td>
                    <td>{{ $cnc_production->tr }}</td>
                    <td>{{ $cnc_production->pmr }}</td>
                    <td>{{ $cnc_production->fr }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            @endforeach

        </tbody>
    </table>
</div>
</body>
</html>
