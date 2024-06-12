@extends('admin.layout.admin')
@section('content')
<!-- Content Header (Page header) -->
<!-- start page title -->
<div class="row">
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
</div>
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
                            <h4 class="card-title">Role Details</h4>

                        </div>
                        <div class="card-body">
                            
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <h4><strong>Name:</strong>
                                            {{ $role->name }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Permissions:</strong>
                                            @if(!empty($rolePermissions))
                                            <div class="row">
                                                @foreach($rolePermissions as $v)
                                                <div class="col-md-3">
                                                    <label class="form-control">{{ $v->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                           
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            
                                </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->


            </div> <!-- end row-->

            
</div>
  


</div>
@endsection