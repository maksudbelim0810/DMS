@extends('admin.layout.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Shift Master</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Shift Master</a></li>
                    <li class="breadcrumb-item active">Add Shift Master</li>
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
                                        <h2 class="card-title-lg">Add Shift Master</h2>
                                        <a href="{{ route('shift_entry.index') }}" style="float: right;"><button
                                                type="button" class="btn btn-primary">Back</button></a>
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



                                    {!! Form::open(['route' => 'shift_entry.store', 'method' => 'POST']) !!}
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Shift Name:</strong>
                                                {!! Form::text('shift_name', null, ['placeholder' => 'Shift Name', 'class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Shift Duration[hrs] :</strong>
                                                {!! Form::number('shift_duration', null, [
                                                    'placeholder' => 'Shift Duration',
                                                    'class' => 'form-control',
                                                    'required',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Insert Change[sec] :</strong>
                                                {!! Form::number('insert_change', null, ['placeholder' => 'Insert Change', 'class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Lunch Recess[min] :</strong>
                                                {!! Form::number('lunch_recess', null, ['placeholder' => 'Lunch Recess', 'class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                         <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                        <a href="{{ route('shift_entry.index') }}"><button type="button"
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
