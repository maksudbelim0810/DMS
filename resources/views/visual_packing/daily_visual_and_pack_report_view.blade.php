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
                            <h4 class="card-title">Visual & Packing</h4>
                            @can('visual_packing-create')
                            <a href="{{ route('visual_packing.daily_visual_and_pack_report') }}" class="btn btn-primary" style="float: right;">
                                PDF
                            </a>
                            @endcan
                        </div>
                        <div class="card-body">

                            <table class="table table-striped table-bordered" width="100%">

                                <thead>
                                    <tr class='warning' >
                                        <th>Date</th>
                                        <th>Batch No</th>
                                        <th>Part Name</th>
                                        <th>Customer Name</th>
                                        <th>Total Rej</th>
                                        <th>Visul Qty</th>
                                        <th>Pack Qty</th>
                                    </tr>
                                </thead>
                                    
                                <tbody>
                                    <?php
                                    $total_rej_qty=0;
                                    $total_visual_inspected_qty=0;
                                    $total_packed_qty=0;
                                    ?>
                                    @foreach ($data as $key => $batchNumber)
                                        <tr>
                                            <?php
                                            
                                            $total_visual_inspected_qty+=$batchNumber->visual_inspected_qty;
                                            $total_rej_qty+=$batchNumber->total_rejection;
                                            $total_packed_qty+=$batchNumber->packed_qty;
                                            ?>
                                            <td>{{ $batchNumber->date }}</td>
                                            <td>{{ $batchNumber->batch_no }}</td>
                                            <td>{{ $batchNumber->part_name }}</td>
                                            <td>{{ $batchNumber->customer }}</td>
                                            <td>{{ $batchNumber->total_rejection }}</td>
                                            <td>{{ $batchNumber->visual_inspected_qty }}</td>
                                            <td>{{ $batchNumber->packed_qty }}</td>
                                            
                        
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>{{$total_rej_qty}}</b></td>
                                        <td><b>{{$total_visual_inspected_qty}}</b></td>
                                        <td><b>{{$total_packed_qty}}</b></td>
                        
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->


            </div> <!-- end row-->


        </div>
        @endsection