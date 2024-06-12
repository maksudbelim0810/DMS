@extends('admin.layout.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dispatch Advice</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Dispatch Advice</li>
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
                                <h4 class="card-title">Dispatch Advice
                                @can('dispatch_advice-create')
                                    <a href="{{ route('dispatch_advice.Daily_dispatch_report') }}" class="btn btn-primary"
                                        style="float: right;">
                                       PDF
                                    </a></h4>
                                @endcan
                            </div>
                            <div class="card-body">

                                <table class="table table-striped table-bordered" width="100%">

                                    <thead>
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
                               

                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->


                </div> <!-- end row-->

            </div>
        </div>
    </div>
@endsection
