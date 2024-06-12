@extends('admin.layout.admin')
@section('css')
    {{-- <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
     <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .cnc_select_form .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: -5px !important;
        }

        .cnc_select_form span#select2-mc_no-xb-container {
            line-height: normal !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: 22px !important;
        }

        .cnc_select_form .select2-container .select2-selection--single {
            height: auto !important;
        }

        .cnc_select_form .input-group.mb-3 {
            margin-bottom: 5px !important;
        }

        .form-control1 {
            display: block;
            width: 100%;
            padding: -0.5rem .9rem !important;
            /* padding: -0.5rem 0.9rem; */
            font-size: .8125rem;
            font-weight: 400;
            line-height: 1.5;
            color: var(--vz-body-color);
            background-color: var(--vz-input-bg);
            background-clip: padding-box;
            border: 1px solid var(--vz-input-border);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.25rem;
            -webkit-transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out, -webkit-box-shadow .15s ease-in-out;
        }

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
                        <li class="breadcrumb-item active">Add MPI Production</li>
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
                                        <h2 class="card-title-lg">Add MPI Production
                                        <a href="{{ route('mpi_production.index') }}" style="float: right;"><button
                                                type="button" class="btn btn-primary">Back</button></a></h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <div class="card-body cnc_select_form">
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



                                    {!! Form::open(['route' => 'mpi_production.store', 'method' => 'POST']) !!}
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>M/C Number :</strong>
                                                <select name="mc_no" class="form-control1 mySelect2" required>
                                                     
                                                    @foreach ($mc_no as $value)
                                                        <option value="{{ $value->machine_number }}">
                                                            {{ $value->machine_number }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Date :</strong>
                                                {!! Form::date('date', Session::get('default_login_date'), ['class' => 'form-control1','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Shift :</strong>
                                                <select name="shift" class="form-control1 mySelect2" id="shift" required>
                                                     
                                                    @foreach ($shift as $value)
                                                        <option value="{{ $value->shift_name }}"
                                                            >
                                                            {{ $value->shift_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Batch Number:</strong>
                                                <select name="batch_number_id" class="form-control1 mySelect2" id="batch_number_id" required>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Part Name :</strong>
                                                {!! Form::text('part_name', null, ['class' => 'form-control1','id'=>'part_name','tabindex="-1" onclick="return false" readonly']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Customer :</strong>
                                                {!! Form::text('customer', null, ['class' => 'form-control1', 'id'=>'customer_name','tabindex="-1" onclick="return false" readonly']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Operator Name :</strong>
                                                <select name="operator_name" class="form-control1 mySelect2" required>
                                                    <option value="">--Select Operator Name --</option>
                                                    @foreach ($operator_name as $value)
                                                        <option value="{{ $value->full_name }}">
                                                            {{ $value->full_name }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Inspected Qty :</strong>
                                                <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control1 insert_qty"
                                                name="inspected_qty" id="inspected_qty" required>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Rejected Qty :</strong>
                                                {!! Form::text('rejected_qty', null, ['class' => 'form-control1 insert_qty','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>OK Qty :</strong>
                                                {!! Form::text('ok_qty', null, ['class' => 'form-control1', 'id'=>'ok_qty','tabindex="-1" onclick="return false" readonly']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Mag Type :</strong>
                                                {!! Form::text('mag_type','Coil Contact', ['class' => 'form-control1','tabindex="-1" onclick="return false" readonly']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Black Light :</strong>
                                                {!! Form::text('black_light', 'OK', ['class' => 'form-control1']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Bath Concentration :</strong>
                                                {!! Form::text('bath_concentration', 0.6, ['class' => 'form-control1']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Bath Quality :</strong>
                                                {!! Form::text('bath_quality', 'OK', ['class' => 'form-control1']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Test Piece :</strong>
                                                {!! Form::text('test_piece', 'OK', ['class' => 'form-control1']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group m-3">
                                                <strong>Ampere :</strong>
                                                {!! Form::text('ampere', '1200/1500', ['class' => 'form-control1']) !!}
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
        $(document).on('change', '#inspected_qty', function() {
            var data = $('#batch_number_id').select2('data')[0];
            var batch_qty = data.attr4;
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
        $(document).on("keyup", ".insert_qty", function() {
            var total=0;
            var total_prod_qty = parseFloat($( "input[name='inspected_qty']" ).val());
            var insert_use_qty = parseFloat($( "input[name='rejected_qty']" ).val());
            $total=total_prod_qty - insert_use_qty;
            if (isNaN(total) && total != '') {
                total = 0;
            }
            $("#ok_qty").val($total); 


        });  
    </script>
@endsection