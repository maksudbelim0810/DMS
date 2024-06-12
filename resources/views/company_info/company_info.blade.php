@extends('admin.layout.admin')
@section('content')
<!-- Content Header (Page header) -->
<!-- start page title -->
{{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Company Info</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Company Info</a></li>
                    <li class="breadcrumb-item active">Company Info</li>
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
                                    <h2 class="card-title-lg">Company Info</h2>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="card-body">
                            <div class="tab-pane fade show active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                {!! Form::model($data, ['method' => 'PATCH','route' => ['company_info.update']]) !!}
                                <div class="form-group">
                                    <strong>Name</strong>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="Name" id="Name" placeholder="Enter name" value="{{$data->Name}}">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <strong>Address</strong>
                                    <div class="input-group mb-3">
                                        <textarea name="Address" class="form-control" id="Address" rows="5">{{$data->Address}}</textarea>
                                        {{-- <input type="text" class="form-control" name="Address" id="Address" placeholder="Enter name" value=""> --}}
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>City</strong>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="City" id="City" placeholder="Enter name" value="{{$data->City}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Phone</strong>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="Phone" id="Phone" placeholder="Enter name" value="{{$data->Phone}}">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                 <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                
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