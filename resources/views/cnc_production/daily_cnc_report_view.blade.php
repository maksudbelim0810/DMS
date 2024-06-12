@extends('admin.layout.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">CNC Production</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">CNC Production</li>
                </ol>
            </div>

        </div>
    </div>
</div> --}}
    <!-- end page title -->
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
                                        <a href="{{ route('cnc_production.daily_cnc_report') }}" class="btn btn-primary"
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
                                            <th>Part Name</th>
                                            <th>Total Prod 1st Setup</th>
                                            <th>Total Prod 2nd Setup</th>
                                            <th>Total Prod 3rd Setup</th>
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
                                

                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->


                </div> <!-- end row-->


            </div>
        </div>
    </div>
@endsection

