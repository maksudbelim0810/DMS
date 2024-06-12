@extends('admin.layout.admin')
@section('css')
    {{-- <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    <style>
        h4 {
            font-size: 14px;
        }

        h2 {
            font-size: 18px;
        }

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
            width: 240px !important;
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
                <h4 class="mb-sm-0">Visual & Packing</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Visual & Packing</a></li>
                        <li class="breadcrumb-item active">Visual & Packing</li>
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
                            {{-- <div class="card-header">
                                <div class="row align-items-left">
                                    <div class="col">
                                        <h2 class="card-title-lg">Add Visual & Packing
                                        <a href="{{ route('visual_packing.index') }}" class="btn btn-primary"
                                            style="float: right;">
                                            Back
                                        </a></h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div> --}}
                            <div class="card-body cnc_select_form">
                                <div class="tab-pane fade show active" id="LogIn_Tab" role="tabpanel">
                                    {!! Form::open(['route' => 'visual_packing.store', 'method' => 'POST']) !!}
                                    <div class="row align-items-left">
                                        <div class="col text-center">
                                            <h4 class="card-title-lg">Add Visual & Packing</h4>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row align-items-left">
                                        <div class="col">
                                            <h4 class="card-title-lg">Production Details</h4>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Unit</strong>
                                                <div class="input-group mb-3">
                                                    <select name="location" class="form-control1 mySelect2" required>
                                                        <option value="">--Select Unit --</option>
                                                        @foreach ($location as $value)
                                                            <option value="{{ $value->location_name }}">
                                                                {{ $value->location_name }}

                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Date</strong>
                                                <div class="input-group mb-3">
                                                    <input type="date" min="1900-01-01" max="2500-01-01" class="form-control1" name="date" id="date"
                                                        value="{{ Session::get('default_login_date') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Shift</strong>
                                                <div class="input-group mb-3">
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
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Batch No</strong>
                                                <div class="input-group mb-3">
                                                    <select name="batch_no" class="form-control1 mySelect2" id="batch_no" required>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Part Name</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="part_name"
                                                        id="part_name" tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Customer</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="customer"
                                                        id="customer" tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Incharge Name</strong>
                                                <div class="input-group mb-3">
                                                    <select name="incharge_name" class="form-control1 mySelect2" required>
                                                        <option value="">--Select Incharge --</option>
                                                        @foreach ($incharge as $value)
                                                            <option value="{{ $value->full_name }}">
                                                                {{ $value->full_name }}

                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row align-items-left mt-3">
                                        <div class="col">
                                            <h4 class="card-title-lg">Rejection Analysis</h4>
                                        </div>
                                        <!--end col-->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Lod</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="lod"
                                                        id="lod" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Bore</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="bore"
                                                        id="bore" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Width</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="width"
                                                        id="width" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Pos / Loc</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="pos_loc"
                                                        id="pos_loc" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Flange</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="flange"
                                                        id="flange" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Sod</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="sod"
                                                        id="sod"  value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Uc Dia</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="uc_dia"
                                                        id="uc_dia" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Track</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="track"
                                                        id="track" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Ovality</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="ovality"
                                                        id="ovality"  value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Damage</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="damage"
                                                        id="damage" value="0" required>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row align-items-left">
                                        <div class="col-md-8">
                                            <h4 class="card-title-lg">Forging</h4>
                                        </div>
                                        <div class="col-md-4">
                                            <h4 class="card-title-lg">Proof M/C</h4>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row">

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Od</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1  section1"
                                                        name="od" id="od" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Bore</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1  section1"
                                                        name="Virfbore" id="Virfbore" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Face</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1"
                                                        name="face" id="face" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Rad Chf</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 tot_rejection section1"
                                                        name="rad_chf" id="rad_chf" value="0" required>
                                                </div>
                                            </div>
                                        </div>


                                    
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Width</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1"
                                                        name="Virpw" id="Virpw" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Other</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1"
                                                        name="other" id="other" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Bore Radius</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="bore_radius"
                                                        id="bore_radius" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Od Radius</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="od_radius"
                                                        id="od_radius" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Missing Operation</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="missing_operation"
                                                        id="missing_operation" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Vibration</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="vibration"
                                                        id="vibration" value="0" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Rust / Burr</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="rust_burr"
                                                        id="rust_burr" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Crack</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 section1" name="crack"
                                                        id="crack" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row align-items-left mt-3">
                                        <div class="col">
                                            <h4 class="card-title-lg">Inspection Quantity Details</h4>
                                        </div>
                                        <!--end col-->
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Packed Qty</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==10) return false;" class="form-control1" name="packed_qty"
                                                        id="packed_qty" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Box Qty</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==10) return false;" class="form-control1" name="box_qty"
                                                        id="box_qty" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Visual Inspected Qty</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==8) return false;" class="form-control1"
                                                        name="visual_inspected_qty" id="visual_inspected_qty" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Total Rejection</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1 total" name="total_rejection"
                                                        id="total_rejection" tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
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
                                    <a href="{{ route('visual_packing.index') }}"><button type="button"
                                            class="btn btn-danger"><b>Cancel</b></button></a>
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
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    {{-- <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.mySelect2').select2({
            placeholder: "--Select Option-- ",
            selectOnClose: true
        });
        $(document).on("keyup", ".section1", function() {
            var sum = 0;
            $(".section1").each(function() {
                sum += +$(this).val();
                $(".total").val(sum);
            });
        });
        $(document).on('change', '#batch_no', function() {
            var data = $(this).select2('data')[0];
            var partname = data.attr1;
            var customer = data.attr2;

            $("#part_name").val(partname);
            $("#customer").val(customer);
        });
        $(document).on('change', '#packed_qty', function() {
            var data = $('#batch_no').select2('data')[0];
            var batch_qty = data.attr4;
            // alert(batch_qty);
            var packed_qty = $("input[name='packed_qty']").val();
            if (packed_qty != 0) {
                // if (batch_qty < packed_qty) {
                //     Swal.fire('Packed Qty not greater than Batch Qty!');
                //     // alert('Packed Qty not greater than Batch Qty');
                //     $("#packed_qty").val('');
                //     return false;
                // }
                $("#packed_qty").val(packed_qty);
            }
        });
        $(document).ready(function() {
            initAjaxSelect2($("#batch_no"), "{{ URL::to('/refrence_blno_id_from_bl_no_select2_source') }}");
        });
    </script>
@endsection
