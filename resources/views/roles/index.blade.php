@extends('admin.layout.admin')
@section('content')
<!-- Content Header (Page header) -->
<!-- start page title -->
{{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">user</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">user</li>
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
                            <h4 class="card-title">Role Details

                            @can('role-create')
                            <a href="{{ route('roles.create') }}">
                                <button type="button" class="btn btn btn-success" style="float: right;"><i class="bx bx-plus" aria-hidden="true"></i></button>
                            </a></h4>
                            @endcan


                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($roles as $key => $role)
                                <tr>
                                    <td class="text-center">{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><i class="ri ri-eye-line" aria-hidden="true"></i></a>
                                        @can('role-edit')
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><i class="bx bx-pencil" aria-hidden="true"></i></a>
                                        @endcan
                                        @can('role-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                        <!-- {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!} -->
                                        <button type="submit" class="btn btn-danger" id="delete"><i class="bx bx-trash" aria-hidden="true"></i></button>
                                        {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->


            </div> <!-- end row-->


        </div>



    </div>
    @endsection