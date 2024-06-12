@extends('admin.layout.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Role</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Roles</a></li>
                        <li class="breadcrumb-item active">Role</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col">

            <div class="h-100">


                <div class="row">
                    <div class="col-md-12">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-header">
                                <div class="row align-items-left">
                                    <div class="col">
                                        <h2 class="card-title-lg">Edit Role</h2>
                                        <a href="{{ route('roles.index') }}" class="btn btn-primary" style="float: right;">
                                            Back
                                        </a>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <div class="card-body">
                                <div class="tab-pane fade show active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif


                                    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control mb-3']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Permissions:</strong>
                                                <br />
                                                <div class="row mt-3">
                                                    @foreach ($permission as $value)
                                                        <div class="col-md-3">
                                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                                {{ $value->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                             <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                            <a href="{{ route('roles.index') }}"><button type="button"
                                                class="btn btn-danger"><b>Cancel</b></button></a>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}

                                </div>
                                <!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->


                    </div> <!-- end row-->

                </div>
            </div>
        @endsection
