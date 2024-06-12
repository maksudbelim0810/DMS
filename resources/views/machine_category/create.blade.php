@extends('admin.layout.admin')
@section('content')
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
                                    <h2 class="card-title-lg">Add Machine Category</h2>
                                    <a href="{{ route('machine_category.index') }}" class="btn btn-primary" style="float: right;">
                                        Back
                                    </a>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="card-body">
                            <div class="tab-pane fade show active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                            {!! Form::open(array('route' => 'machine_category.store','method'=>'POST')) !!}
                                    <div class="form-group">
                                        <strong>Name</strong>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="name"
                                                id="name" placeholder="Enter name" required>
                                        </div>
                                    </div>
                    
                            </div>
                        </div>
                        @if (count($errors) > 0)
                            <small class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </small>
                        @endif
                        <div class="card-footer">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                 <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                <a href="{{ route('machine_category.index') }}"><button type="button" class="btn btn-danger"><b>Cancel</b></button></a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        <!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div> <!-- end row-->
        </div>
    </div>
</div>
@endsection
