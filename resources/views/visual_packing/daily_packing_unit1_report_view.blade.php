@extends('admin.layout.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Visual & Packing</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Visual & Packing</li>
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
                                <h4 class="card-title">Visual & Packing
                               
                                    <a href="{{$route_data}}" class="btn btn-primary" style="float: right;">
                                       PDF
                                    </a></h4>
                                
                            </div>
                            <div class="card-body">

                                <table class="table table-striped table-bordered" width="100%">

                                    <thead>
                                        <tr class='warning'>
                                            <th>Date</th>
                                            <th>Part Name</th>
                                            <th>Customer Name</th>
                                            <th>Visul Qty</th>
                                            <th>Pack Qty</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $total_visual_inspected_qty = 0;
                                        $total_packed_qty = 0;
                                        ?>
                                        @foreach ($data as $key => $batchNumber)
                                            <tr>
                                                <?php
                                                
                                                $total_visual_inspected_qty += $batchNumber->visual_inspected_qty;
                                                $total_packed_qty += $batchNumber->packed_qty;
                                                ?>
                                                <td>{{ $batchNumber->date }}</td>
                                                <td>{{ $batchNumber->part_name }}</td>
                                                <td>{{ $batchNumber->customer }}</td>
                                                <td>{{ $batchNumber->visual_inspected_qty }}</td>
                                                <td>{{ $batchNumber->packed_qty }}</td>
                                                <td>{{ $batchNumber->location }}</td>

                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>{{ $total_visual_inspected_qty }}</b></td>
                                            <td><b>{{ $total_packed_qty }}</b></td>
                                            <td></td>

                                        </tr>
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
