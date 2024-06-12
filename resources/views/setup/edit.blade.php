@extends('admin.layout.admin')
@section('content')
<!-- Content Header (Page header) -->
<!-- start page title -->
{{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Setup Master</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Setup Master</a></li>
                    <li class="breadcrumb-item active">Setup Master</li>
                </ol>
            </div>

        </div>
    </div>
</div> --}}
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
                                    <h2 class="card-title-lg">Edit Setup Master</h2>
                                    <a href="{{ route('setup.index') }}" class="btn btn-primary" style="float: right;">
                                        Back
                                    </a>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="card-body">
                            <div class="tab-pane fade show active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                {!! Form::model($setup, ['method' => 'PATCH','route' => ['setup.update', $setup->id]]) !!}

                                <!-- <input type="hidden" name="id" value="{{$setup->id}}"> -->
                                <div class="form-group">
                                    <strong>Name</strong>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="setup_name" id="setup_name" placeholder="Enter name" value="{{$setup->setup_name}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                 <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                <a href="{{ route('setup.index') }}"><button type="button" class="btn btn-danger"><b>Cancel</b></button></a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        @if (count($errors) > 0)
                        <small class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </small>
                        @endif<!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

            </div> <!-- end row-->
        </div>
    </div>
</div>
@endsection