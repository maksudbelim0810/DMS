@extends('admin.layout.admin')
@section('css')
<link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Machine Master</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Machine Master</a></li>
                    <li class="breadcrumb-item active">Edit Machine Master</li>
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
                                        <h2 class="card-title-lg">Edit Machine Master</h2>
                                        <a href="{{ route('machine_entry.index') }}" style="float: right;"><button
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



                                    {!! Form::model($MachineEntry, ['method' => 'PATCH', 'route' => ['machine_entry.update', $MachineEntry->id]]) !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Machine Department:</strong>
                                                <select name="machine_department" id="machine_department"
                                                    class="form-control mySelect2" required>
                                                    <option value="">--Select Option--</option>
                                                    @foreach ($machine_department as $value)
                                                        <option value="{{ $value->name }}"
                                                            @if ($value->name == $MachineEntry->machine_department) selected @endif>
                                                            {{ $value->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Machine Name:</strong>
                                                {!! Form::text('machine_name', $MachineEntry->machine_name, [
                                                    'placeholder' => 'Machine Name',
                                                    'class' => 'form-control',
                                                    'required',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Machine Number :</strong>
                                                {!! Form::text('machine_number', $MachineEntry->machine_number, [
                                                    'placeholder' => 'Machine Number',
                                                    'class' => 'form-control',
                                                    'required',
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Machine Model :</strong>
                                                {!! Form::text('machine_model', $MachineEntry->machine_model, [
                                                    'placeholder' => 'Machine Model',
                                                    'class' => 'form-control',
                                                    'required',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Machine Make :</strong>
                                                {!! Form::text('machine_make', $MachineEntry->machine_make, [
                                                    'placeholder' => 'Machine Make',
                                                    'class' => 'form-control',
                                                    'required',
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>M/C Capacity :</strong>
                                                {!! Form::text('mc_capacity', $MachineEntry->mc_capacity, [
                                                    'placeholder' => 'M/C Capacity',
                                                    'class' => 'form-control',
                                                    'required',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                         <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                        <a href="{{ route('machine_entry.index') }}"><button type="button"
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
    @section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>

    <script type="text/javascript">
        $('.mySelect2').select2({
            placeholder: "--Select Option-- ",
            selectOnClose: true
        });

    </script>
@endsection