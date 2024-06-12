@extends('admin.layout.admin')
@section('css')
    {{-- <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container .select2-dropdown {
            position: relative;
            top: -25px !important;
            width: 205px !important;
            left: 0px !important;
            padding: 0 !important;
            margin: 0 !important;
            z-index: 0;
        }

        .select2-container .select2-dropdown .select2-search {
            padding: 0 !important;
        }

        .select2-container .select2-dropdown .select2-search .select2-search__field {
            padding: 0 !important;
            width: 100%;
            height: 25px;
        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">MPI Production</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">MPI Production</a></li>
                        <li class="breadcrumb-item active">MPI Production</li>
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
                                        <h2 class="card-title-lg">Edit MPI Production
                                        <a href="{{ route('mpi_production.index') }}" style="float: right;"><button
                                                type="button" class="btn btn-primary">Back</button></a></h2>
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



                                    {!! Form::model($MPIProduction, ['method' => 'PATCH', 'route' => ['mpi_production.update', $MPIProduction->id]]) !!}
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>M/C Number :</strong>
                                                <select name="mc_no" class="form-control mySelect2" required>
                                                     
                                                    @foreach ($mc_no as $value)
                                                        <option value="{{ $value->machine_number }}"
                                                            @if ($value->machine_number == $MPIProduction->mc_no) selected @endif >
                                                            {{ $value->machine_number }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Date :</strong>
                                                {!! Form::date('date', date('Y-m-d',strtotime( $MPIProduction->date )), ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Shift :</strong>
                                                <select name="shift" class="form-control mySelect2" id="shift" required>
                                                     
                                                    @foreach ($shift as $value)
                                                        <option value="{{ $value->shift_name }}"
                                                            @if ($value->shift_name == $MPIProduction->shift) selected @endif >
                                                            {{ $value->shift_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Batch Number :</strong>
                                                <select name="batch_number_id" class="form-control mySelect2" id="batch_number_id" required>
                                                    <option value="{{$MPIProduction->batch_number_id}}" data-batch_qty="{{$MPIProduction->batch->batch_qty}}">{{$MPIProduction->batch_number_id}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Part Name :</strong>
                                                {!! Form::text('part_name', $MPIProduction->part_name, ['class' => 'form-control','id'=>'part_name','tabindex="-1" onclick="return false" readonly']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Customer :</strong>
                                                {!! Form::text('customer', $MPIProduction->customer, ['class' => 'form-control','id'=>'customer_name','tabindex="-1" onclick="return false" readonly']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Operator Name :</strong>
                                                <select name="operator_name" class="form-control mySelect2" required>
                                                    <option value="">--Select Operator Name --</option>
                                                    @foreach ($operator_name as $value)
                                                        <option value="{{ $value->full_name }}"
                                                            @if ($value->full_name == $MPIProduction->operator_name) selected @endif >
                                                            {{ $value->full_name }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Inspected Qty :</strong>
                                                <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control insert_qty"
                                                name="inspected_qty" value="{{$MPIProduction->inspected_qty}}" id="inspected_qty" required>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Rejected Qty :</strong>
                                                {!! Form::text('rejected_qty', $MPIProduction->rejected_qty, ['class' => 'form-control insert_qty','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>OK Qty :</strong>
                                                {!! Form::text('ok_qty', $MPIProduction->ok_qty, ['class' => 'form-control','id'=>'ok_qty']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Mag Type :</strong>
                                                {!! Form::text('mag_type', $MPIProduction->mag_type, ['class' => 'form-control','tabindex="-1" onclick="return false" readonly']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Black Light :</strong>
                                                {!! Form::text('black_light', $MPIProduction->black_light, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Bath Concentration :</strong>
                                                {!! Form::text('bath_concentration', $MPIProduction->bath_concentration, [ 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Bath Quality :</strong>
                                                {!! Form::text('bath_quality', $MPIProduction->bath_quality, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Test Piece :</strong>
                                                {!! Form::text('test_piece', $MPIProduction->test_piece, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Ampere :</strong>
                                                {!! Form::text('ampere', $MPIProduction->ampere, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                             <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                            <a href="{{ route('mpi_production.index') }}"><button type="button"
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
        </div>
    </div>
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    {{-- <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.mySelect2').select2({
            placeholder: "--Select Option-- ",
            selectOnClose: true
        });

        $(document).on('change', '#batch_number_id', function() {
            var data = $(this).select2('data')[0];
            var partname = data.attr1;
            var customer = data.attr2;

            $("#part_name").val(partname);
            $("#customer_name").val(customer);
        });
        
        $(document).ready(function() {
            initAjaxSelect2($("#batch_number_id"), "{{ URL::to('/refrence_blno_id_from_bl_no_select2_source') }}");
        });
        $(document).on("keyup", ".insert_qty", function() {
            var total = 0;
            var total_prod_qty = parseFloat($("input[name='inspected_qty']").val());

            var insert_use_qty = parseFloat($("input[name='rejected_qty']").val());
            $total = total_prod_qty - insert_use_qty;
            if (isNaN(total) && total != '') {
                total = 0;
            }
            $("#ok_qty").val($total);


        });
        $(document).on('change', '#inspected_qty', function() {
            var batch_qty = $('#batch_number_id').find(':selected').data('batch_qty');
            var inspected_qty = $("input[name='inspected_qty']").val();
            if (inspected_qty != 0) {
                // if (batch_qty < inspected_qty) {
                //     Swal.fire('Inspected Qty not greater than Batch Qty');
                //     $("#inspected_qty").val('');
                //     return false;
                // }
                $("#inspected_qty").val(inspected_qty);
            }
        });
    </script>
@endsection
