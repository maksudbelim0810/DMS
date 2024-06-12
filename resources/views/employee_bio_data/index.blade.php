@extends('admin.layout.admin')
@section('content')
<!-- Content Header (Page header) -->
<!-- start page title -->
{{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Employee Master</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Employee Master</li>
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
                            <h4 class="card-title">Employee Master
                            @can('employee_bio_data-create')
                            <a href="{{ route('employee_bio_data.create') }}" class="btn btn-primary redirect_page" data-toggle="tooltip" title="Ctrl+A to New Entry!" data-href="{{ route('employee_bio_data.create') }}"  style="float: right;">
                                + Add Employee Master
                            </a></h4>
                            @endcan
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead class="text-center">
                
                                    <tr>
                                        <th>No</th>
                                        <th>Employee Name</th>
                                        <th>Date OF Birth</th>
                                        <th>Mobile No </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($employee_bio_data as $key=>$item)
                                    <tr>
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->date_of_birth }}</td>
                                        <td>{{ $item->mobile_no }}</td>
                                        <td class="text-center">
                                            @can('employee_bio_data-edit')
                                            <a class="btn btn-primary" href="{{ route('employee_bio_data.edit', $item->id) }}"><i class="bx bx-pencil"></i>
                                            </a>
                                            @endcan
                                            @can('employee_bio_data-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['employee_bio_data.destroy', $item->id],'style'=>'display:inline']) !!}
                                                <button type="submit" class="btn btn-danger" id="delete"><i class="bx bx-trash" aria-hidden="true"></i></button>
                                            {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No Data Available</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                            {!! $employee_bio_data->withQueryString()->links() !!}
                            </div>
                            
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->


            </div> <!-- end row-->


        </div>
        @endsection