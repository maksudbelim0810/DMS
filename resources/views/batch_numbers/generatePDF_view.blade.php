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
                                <h4 class="card-title">Batch Number Details</h4>
                                @can('batch_number-create')
                                    <a href="{{ route('batch_number.pdf') }}" class="btn btn-primary" style="float: right;">
                                       PDF
                                    </a>
                                @endcan
                            </div>
                            <div class="card-body">

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
                                        @foreach ($data_array as $key => $val)  
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
                                
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->


                </div> <!-- end row-->


            </div>



        </div>
    @endsection
