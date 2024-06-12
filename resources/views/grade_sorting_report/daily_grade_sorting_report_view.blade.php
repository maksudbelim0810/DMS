@extends('admin.layout.admin')
@section('content')
<!-- Content Header (Page header) -->
<!-- start page title -->
{{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Grade Sorting Report</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Grade Sorting Report</li>
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
                            <h4 class="card-title">Grade Sorting Report
                            {{-- @can('grade_sorting_report-create') --}}
                            <a href="{{ route('grade_sorting_report.daily_grade_sorting_report') }}" class="btn btn-primary" style="float: right;">
                               PDF
                            </a></h4>
                            {{-- @endcan --}}
                        </div>
                        <div class="card-body">

                            <table class="table table-striped table-bordered" width="100%">

                                <thead>
                                    <tr class='warning' >
                                        <th>M/c No</th>
                                        <th>Date</th>
                                        <th>Shift</th>
                                        <th>Batch No</th>
                                        <th>Part Name</th>
                                        <th>Customer Name</th>
                                        {{-- <th>Insp Qty</th> --}}
                                        <th>Rej Qty</th>
                                        <th>OK Qty</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <?php
                                    // $total_insp_qty=0;
                                    $total_rej_qty=0;
                                    $total_ok_qty=0;
                                    ?>
                                    @foreach ($data as $key => $batchNumber)
                                        <tr>
                                            <?php
                                            // $total_insp_qty+=$batchNumber->inspected_qty;
                                            $total_rej_qty+=$batchNumber->suspected_rej_qty;
                                            $total_ok_qty+=$batchNumber->ok_qty;
                                            ?>
                                            <td>{{ $batchNumber->mc_no }}</td>
                                            <td>{{ $batchNumber->date }}</td>
                                            <td>{{ $batchNumber->shift }}</td>
                                            <td>{{ $batchNumber->batch_no }}</td>
                                            <td>{{ $batchNumber->part_no_and_name }}</td>
                                            <td>{{ $batchNumber->customer }}</td>
                                            {{-- <td>{{ $batchNumber->inspected_qty }}</td> --}}
                                            <td>{{ $batchNumber->suspected_rej_qty }}</td>
                                            <td>{{ $batchNumber->ok_qty }}</td>
                        
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        {{-- <td><b>{{$total_insp_qty}}</b></td> --}}
                                        <td><b>{{$total_rej_qty}}</b></td>
                                        <td><b>{{$total_ok_qty}}</b></td>
                        
                                    </tr>
                                </tbody>
                            </table>
                            
                            
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->


            </div> <!-- end row-->


        </div>
        @endsection