@extends('admin.layout.admin')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="margin-bottom: 49px;
        margin-top: -38px;
        height: 56px;">
            <p style="font-size: large;"><b>{{ $message }}</b> </p>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row">
                    <div class="col-md-12">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-header">
                                <h4 class="card-title">CNC Production
                                    <a href="{{ route('batch_number.batchwise_cnc_prod_report') }}" class="btn btn-primary"
                                        style="float: right;">
                                        PDF
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" width="100%">
                                    <thead>
                                        <tr class='warning'>
                                            <th>Date</th>
                                            <th>M/C No</th>
                                            <th>Shift</th>
                                            <th>setup</th>
                                            <th>Part Name</th>
                                            <th>Total Prod 1st Setup</th>
                                            <th>Total Prod 2nd Setup</th>
                                            <th>TR</th>
                                            <th>PMR</th>
                                            <th>FR</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data_array as $key => $val)
                                        <tbody>
                                            <div class=""
                                                style="margin-top:15px; margin-bottom:15px; margin-left:-15px;">
                                                <b>
                                                    <u>
                                                        {{ $val['month_year'] }}
                                                    </u>
                                                </b>
                                            </div>
                                            @foreach ($val['data'] as $key => $cnc_production)
                                                <tr>
                                                    <td>{{ date('d/m/Y',strtotime($cnc_production->date)) }}</td>
                                                    <td>{{ $cnc_production->mc_no }}</td>
                                                    <td>{{ $cnc_production->shift }}</td>
                                                    <td>{{ $cnc_production->setup }}</td>
                                                    <td>{{ $cnc_production->part_name }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{ $cnc_production->tr }}</td>
                                                    <td>{{ $cnc_production->pmr }}</td>
                                                    <td>{{ $cnc_production->fr }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endforeach
                                </table>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div> <!-- end row-->
            </div>
        </div>
    </div>
@endsection
