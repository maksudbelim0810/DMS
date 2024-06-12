@extends('admin.layout.admin')
@section('css')
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" /> --}}
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
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
            width: 161px !important;
            left: -10px !important;
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
                <h4 class="mb-sm-0">CNC Production</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CNC Production</a></li>
                        <li class="breadcrumb-item active">CNC Production</li>
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
                                        <h2 class="card-title-lg">Add CNC Production
                                            <a href="{{ route('cnc_production.index') }}" class="btn btn-primary"
                                                style="float: right;">
                                                Back
                                            </a>
                                        </h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div> --}}
                            <div class="card-body cnc_select_form">
                                <div class="tab-pane fade show active" id="LogIn_Tab" role="tabpanel">
                                    {!! Form::open(['route' => 'cnc_production.store', 'method' => 'POST','id'=>'cnc_form']) !!}
                                    <div class="row align-items-left">
                                        <div class="col text-center">
                                            <h4 class="card-title-lg">Add CNC Production</h4>
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
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Mc No:</strong>
                                                <div class="input-group mb-3 select-wrap">
                                                    <select name="mc_no" id="mc_no" class="form-control1 mySelect2"
                                                        style="width:250px;" required>
                                                        <option value="">Select Machine No</option>
                                                        @foreach ($mc_no as $value)
                                                            <option value="{{ $value->machine_number }}">
                                                                {{ $value->machine_number }}

                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Date</strong>
                                                <div class="input-group mb-3">
                                                    <input type="date" class="form-control1" name="date"
                                                        value="{{ Session::get('default_login_date') }}" id="date"
                                                        required>
                                                    {{-- {{dd(Session::get('default_login_date'))}} --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Shift</strong>
                                                <div class="input-group mb-3">
                                                    <select name="shift" id="shift" class="form-control1 mySelect2"
                                                        id="shift" required>
                                                        <option value="">Select Shift</option>
                                                        @foreach ($shift as $value)
                                                            <option value="{{ $value->shift_name }}"
                                                                data-duration="{{ $value->shift_duration }}"
                                                                data-lunch="{{ $value->lunch_recess }}"
                                                                data-shichange="{{ $value->insert_change }}">
                                                                {{ $value->shift_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Shift Duration</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="shift_duration"
                                                        id="shift_duration" tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Setup</strong>
                                                <div class="input-group mb-3">
                                                    <select name="setup" class="form-control1 mySelect2" id="setup"
                                                        required>
                                                        <option value="">Select Setup</option>
                                                        @foreach ($setup as $value)
                                                            <option value="{{ $value->setup_name }}">
                                                                {{ $value->setup_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Batch No</strong>
                                                <div class="input-group mb-3">
                                                    <select name="batch_no" class="form-control1 mySelect2 selectEnter" id="batch_no"
                                                        required>
                                                        {{-- <option>Select Batch No</option>
                                                        @foreach ($batch_number as $value)
                                                            <option value="{{ $value->batch_name }}"
                                                                data-customer="{{ $value->customer_name }}"
                                                                data-partname="{{ $value->part_name }}">
                                                                {{ $value->batch_name }}
                                                            </option>
                                                        @endforeach --}}
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>Customer</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="customer"
                                                        id="customer" tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Cycle Time</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 productivity" name="cycle_time" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Operator Name</strong>
                                                <div class="input-group mb-3">
                                                    <select name="operator_name" class="form-control1 mySelect2"
                                                        id="operator_name" required>
                                                        <option value=""></option>
                                                        @foreach ($operator_name as $value)
                                                            <option value="{{ $value->full_name }}">
                                                                {{ $value->full_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-left">
                                        <div class="col">
                                            <h4 class="card-title-lg">Time Analysis</h4>
                                        </div>
                                        <!--end col-->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>BD Category</strong>
                                                <div class="input-group mb-3">
                                                    <select name="bd_category" class="form-control1 mySelect2">
                                                        <option value=""></option>
                                                        @foreach ($bd_category as $value)
                                                            <option value="{{ $value->break_down_category }}">
                                                                {{ $value->break_down_category }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Time</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 section1" name="time" id="time"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Lunch</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 deduction" name="lunch" id="lunch"
                                                        tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Idle Time</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1" name="idle_time" id="idle_time"
                                                        tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Shi Change</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1" name="Cnat" id="shi_change"
                                                        tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>No Oprator</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 section1 deduction" name="no_opration"
                                                        id="no_opration" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>No Power</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 section1 deduction" name="no_power"
                                                        id="no_power" value="0" required>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Job Setting</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 section1 deduction" name="job_setting"
                                                        id="job_setting" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Job Fault</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 section1 deduction" name="job_fault"
                                                        id="job_fault" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>No Load</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 section1 deduction" name="no_load"
                                                        id="no_load" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Productivity Time</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 deduction" name="productivity_time"
                                                        id="productivity_time" tabindex="-1" onclick="return false"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Time Deduction</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 total" name="total_time_deduction"
                                                        id="total_time_deduction" tabindex="-1" onclick="return false"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Total Loss</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 total" name="total_loss" id="total_loss"
                                                        tabindex="-1" onclick="return false" readonly>
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
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="lod" id="lod"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Bore</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="bore" id="bore"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Width</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="width" id="width"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Pos / Loc</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="pos_loc" id="pos_loc"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Flange</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="flange" id="flange"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Sod</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="sod" id="sod"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Uc Dia</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="uc_dia" id="uc_dia"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Track</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="track" id="track"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Ovality</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="ovality" id="ovality"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Damage</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="damage" id="damage"
                                                        value="0" required>
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
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="od" id="od"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Bore</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="Cnrfbore"
                                                        onKeyPress="if(this.value.length==3) return false;" id="Cnrfbore"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Face</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="face" id="face"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Rad Chf</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="rad_chf" id="rad_chf"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Width</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="Cnrpw" id="Cnrpw"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Other</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="other" id="other"
                                                        value="0" required>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row align-items-left mt-3">
                                        <div class="col">
                                            <h4 class="card-title-lg">Production Count</h4>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Part Count Start</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==7) return false;"
                                                        class="form-control1 part_count" name="part_count_start"
                                                        id="part_count_start" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Part Count End</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==7) return false;"
                                                        class="form-control1 part_count" name="part_count_end"
                                                        id="part_count_end" value="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Total Production</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==7) return false;"
                                                        class="form-control1 productivity part_count_total ok_pro"
                                                        name="total_production" id="total_production" tabindex="-1"
                                                        onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Total Rejection</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==7) return false;"
                                                        class="form-control1 rejection_total ok_pro"
                                                        name="total_rejection" id="total_rejection" tabindex="-1"
                                                        onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Ok Production</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==7) return false;"
                                                        class="form-control1 ok_product" name="ok_production"
                                                        id="ok_production" tabindex="-1" onclick="return false"
                                                        readonly>
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
                                    <button type="submit" class="btn btn-primary" style="margin-right: 50px;"
                                        id="form_submit"><b>Submit</b></button>
                                    <a href="{{ route('cnc_production.index') }}"><button type="button"
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}

    <script type="text/javascript">
        $('.mySelect2').select2({
            placeholder: "--Select Option-- ",
            selectOnClose: true,

        });

        $(document).on("keyup", ".section1", function() {
            var sum = 0;
            $(".section1").each(function() {
                sum += +$(this).val();
                $(".total").val(sum);
            });
        });
        $(document).on("keyup", ".deduction", function() {
            var sum = 0;
            $(".deduction").each(function() {
                sum += +$(this).val();
                $("#total_time_deduction").val(sum);
            });
            var total_time_deduction = $("input[name='total_time_deduction']").val();
            var Cnat = $("input[name='Cnat']").val();
            $("#idle_time").val(Cnat - total_time_deduction);
        });


        $(function() {
            $('.section1, #shi_change').keyup(function() {
                var value1 = parseFloat($('.section1').val()) || 0;
                var value2 = parseFloat($('#shi_change').val()) || 0;
                $('.total').val(value1 + value2);
            });
        });
        $("#shift").on('change', function() {
            var shift_duration = $(this).find(':selected').data('duration');
            var lunch = $(this).find(':selected').data('lunch');
            var shi_change = $(this).find(':selected').data('shichange');

            $("#lunch").val(lunch);
            $("#shift_duration").val(shift_duration);
            $("#shi_change").val(shi_change);

        });



        $(document).on("change", ".part_count", function() {
            var total = 0;
            var total_rejection = $("input[name='total_rejection']").val();
            total = parseFloat($('#part_count_end').val()) - parseFloat($('#part_count_start').val());

            if (parseFloat($('#part_count_end').val()) < parseFloat($('#part_count_start').val())) {
                if (parseFloat($('#part_count_end').val()) != 0)
                    Swal.fire('plz enter big value!');
                // alert('plz enter big value');
            }
            if (isNaN(total) && total != '') {
                total = 0;
            }
            $("#total_production").val(total);

            
            var total_production = $("input[name='total_production']").val();
            var data = $('#batch_no').select2('data')[0];
            var batch_qty = data.attr4;
            $(".ok_product").val(total_production - total_rejection);

            // if (total_production != 0) {
            //     if (batch_qty < total_production) {
            //         Swal.fire('Total Production not greater than batch qty!');
            //         $("#total_production").val('');
            //         return false;
            //     }
            //     $("#total_production").val(total_production);
            // }
        });
        
        $(document).on("keyup", ".tot_rejection", function() {
            var sum = 0;
            var total_rejection = $("input[name='total_rejection']").val();
            var total_production = $("input[name='total_production']").val();
            $(".tot_rejection").each(function() {
                sum += +$(this).val();
                $(".rejection_total").val(sum);
            });

            $(".ok_product").val(total_production - total_rejection);

            var total_rejection = $("input[name='total_rejection']").val();
            var total_production = $("input[name='total_production']").val();
            var data = $('#batch_no').select2('data')[0];
            var batch_qty = data.attr4;
            if (total_production != 0) {
                if (batch_qty < total_production) {
                    Swal.fire('Total Production not greater than batch qty!');
                    $("#total_production").val('');
                    return false;
                }
                $("#total_production").val(total_production);
            }

        });

        $(document).on("keyup", ".productivity", function() {
            var total_production = $("input[name='total_production']").val();
            // alert(total_production);
            var cycle_time = $("input[name='cycle_time']").val();
            $('#productivity_time').val(total_production * cycle_time);
        });

        $(document).on('change', '#batch_no', function() {
            var data = $(this).select2('data')[0];
            var partname = data.attr1;
            var customer = data.attr2;

            $("#part_name").val(partname);
            $("#customer").val(customer);
        });

        $(document).ready(function() {
            initAjaxSelect2($("#batch_no"), "{{ URL::to('/refrence_blno_id_from_bl_no_select2_source') }}");
        });

        $(document).on('focus', '.select2-selection.select2-selection--single', function(e) {
            $(this).closest(".select2-container").siblings('select:enabled').select2('open');

        });

        $('#cnc_form').submit(function() { 
            if ($("input[name='total_rejection']").val() > $("input[name='total_production']").val() ) {
                Swal.fire('Total Rejection not greater than Total Production!');
                $("#total_rejection").val('');
                $("#ok_production").val('');
                return false;
            }
        });
    </script>
@endsection
