@extends('admin.layout.admin')
@section('content')
<!-- Content Header (Page header) -->
<!-- start page title -->
{{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Location</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Location</li>
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
                            <h4 class="card-title">Location
                            @can('location-create')
                            <a href="{{ route('location.create') }}" class="btn btn-primary redirect_page" data-toggle="tooltip" title="Ctrl+A to New Entry!" data-href="{{ route('location.create') }}" style="float: right;">
                                + Add Location
                            </a></h4>
                            @endcan
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead class="text-center">
                
                                    <tr>
                                        <th>No</th>
                                        <th>Location Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($location as $key => $item)
                                    <tr>
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td>{{ $item->location_name }}</td>
                                        <td class="text-center">
                                            @can('location-edit')
                                            <a class="btn btn-primary" href="{{ route('location.edit', $item->id) }}"><i class="bx bx-pencil"></i>
                                            </a>
                                            @endcan
                                            @can('location-delete')
                                            {!! Form::open(['method' => 'DELETE','route' => ['location.destroy', $item->id],'style'=>'display:inline']) !!}
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
                            {!! $location->withQueryString()->links() !!}
                            </div>
                            
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->


            </div> <!-- end row-->


        </div>
        @endsection