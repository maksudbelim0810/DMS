@extends('admin.layout.admin')
@section('css')
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
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
                                        <h2 class="card-title-lg">Edit CNC Production
                                        <a href="{{ route('cnc_production.index') }}" class="btn btn-primary"
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
                                    {!! Form::model($cnc_production, [
                                        'method' => 'PATCH',
                                        'id' => 'cnc_form',
                                        'route' => ['cnc_production.update', $cnc_production->id],
                                    ]) !!}
                                    <div class="row align-items-left">
                                        <div class="col text-center">
                                            <h4 class="card-title-lg">Edit CNC Production</h4>
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
                                                <div class="input-group mb-3">
                                                    <select name="mc_no" class="form-control1 mySelect2" required>

                                                        @foreach ($mc_no as $value)
                                                            <option value="{{ $value->machine_number }}"
                                                                @if ($value->machine_number == $cnc_production->mc_no) selected @endif>
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
                                                    <input type="date" min="1900-01-01" max="2500-01-01"
                                                        class="form-control1" name="date" id="date"
                                                        value="{{ date('Y-m-d', strtotime($cnc_production->date)) }}"
                                                        required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Shift</strong>
                                                <div class="input-group mb-3">
                                                    <select name="shift" class="form-control1 mySelect2" id="shift"
                                                        required>

                                                        @foreach ($shift as $value)
                                                            <option value="{{ $value->shift_name }}"
                                                                @if ($value->shift_name == $cnc_production->shift) selected @endif
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
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1" name="shift_duration" id="shift_duration"
                                                        tabindex="-1" onclick="return false" readonly
                                                        value="{{ $cnc_production->shift_duration }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Setup</strong>
                                                <div class="input-group mb-3">
                                                    <select name="setup" class="form-control1 mySelect2" required>
                                                        <option value="">--Select Setup--</option>
                                                        @foreach ($setup as $value)
                                                            <option value="{{ $value->setup_name }}"
                                                                @if ($value->setup_name == $cnc_production->setup) selected @endif>
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
                                                    <select name="batch_no" class="form-control1 mySelect2" id="batch_no"
                                                        required>
                                                        <option value="{{ $cnc_production->batch_no }}"
                                                            data-batch_qty="{{ $cnc_production->batch_number->batch_qty }}">
                                                            {{ $cnc_production->batch_no }}</option>

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
                                                        id="part_name" value="{{ $cnc_production->part_name }}"
                                                        tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>Customer</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="customer"
                                                        id="customer" value="{{ $cnc_production->customer }}"
                                                        tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>CycleTime</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1" name="cycle_time" id="cycle_time"
                                                        value="{{ $cnc_production->cycle_time }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Operator Name</strong>
                                                <div class="input-group mb-3">
                                                @if($operator_check <= 0)
                                                    <input type="text" value="{{$cnc_production->operator_name}}" class="form-control1" name="operator_name" readonly>

                                               
                                                @else
                                                    <select name="operator_name" required class="form-control1 mySelect2"
                                                        id="operator_name">
                                                        <option value="">--Select Operator--</option>
                                                        @foreach ($operator_name as $value)
                                                            <option value="{{ $value->full_name }}"
                                                                @if ($value->full_name == $cnc_production->operator_name) selected @endif 
                                                                 >
                                                                {{ $value->full_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
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
                                                        <option value="">--Select BD Category--</option>
                                                        @foreach ($bd_category as $value)
                                                            <option value="{{ $value->break_down_category }}"
                                                                @if ($value->break_down_category == $cnc_production->bd_category) selected @endif>
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
                                                        class="form-control1 section1" name="time"
                                                        value="{{ $cnc_production->time }}" id="time" required>
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
                                                        class="form-control1 deduction" name="lunch"
                                                        value="{{ $cnc_production->lunch }}" id="lunch" required>
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
                                                        class="form-control1" name="idle_time"
                                                        value="{{ $cnc_production->idle_time }}" id="idle_time" readonly>
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
                                                        class="form-control1" name="Cnat"
                                                        value="{{ $cnc_production->Cnat }}" id="shi_change"
                                                        tabindex="-1" onclick="return false" tabindex="-1"
                                                        onclick="return false" readonly>
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
                                                        value="{{ $cnc_production->no_opration }}" id="no_opration"
                                                        required>
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
                                                        value="{{ $cnc_production->no_power }}" id="no_power" required>
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
                                                        value="{{ $cnc_production->job_setting }}" id="job_setting"
                                                        required>
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
                                                        value="{{ $cnc_production->job_fault }}" id="job_fault" required>
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
                                                        value="{{ $cnc_production->no_load }}" id="no_load" required>
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
                                                        class="form-control1 total" name="total_loss"
                                                        value="{{ $cnc_production->total_loss }}" id="total_loss"
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
                                                        value="{{ $cnc_production->lod }}" required>
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
                                                        value="{{ $cnc_production->bore }}" required>
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
                                                        value="{{ $cnc_production->width }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Pos Loc</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==3) return false;"
                                                        class="form-control1 tot_rejection" name="pos_loc" id="pos_loc"
                                                        value="{{ $cnc_production->pos_loc }}" required>
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
                                                        value="{{ $cnc_production->flange }}" required>
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
                                                        value="{{ $cnc_production->sod }}" required>
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
                                                        value="{{ $cnc_production->uc_dia }}" required>
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
                                                        value="{{ $cnc_production->track }}" required>
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
                                                        value="{{ $cnc_production->ovality }}" required>
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
                                                        value="{{ $cnc_production->damage }}" required>
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
                                                        value="{{ $cnc_production->od }}" required>
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
                                                        value="{{ $cnc_production->Cnrfbore }}" id="Cnrfbore" required>
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
                                                        value="{{ $cnc_production->face }}" required>
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
                                                        value="{{ $cnc_production->rad_chf }}" required>
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
                                                        class="form-control1 tot_rejection" name="Cnrpw"
                                                        value="{{ $cnc_production->Cnrpw }}" id="Cnrpw" required>
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
                                                        value="{{ $cnc_production->other }}" required>
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
                                                        onKeyPress="if(this.value.length==5) return false;"
                                                        class="form-control1 part_count" name="part_count_start"
                                                        id="part_count_start"
                                                        value="{{ $cnc_production->part_count_start }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Part Count End</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==5) return false;"
                                                        class="form-control1 part_count" name="part_count_end"
                                                        id="part_count_end" value="{{ $cnc_production->part_count_end }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Total Production</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0"
                                                        oninput="this.value = Math.abs(this.value)"
                                                        onKeyPress="if(this.value.length==5) return false;"
                                                        class="form-control1 part_count part_count_total ok_pro"
                                                        name="total_production" id="total_production"
                                                        value="{{ $cnc_production->total_production }}" tabindex="-1"
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
                                                        onKeyPress="if(this.value.length==5) return false;"
                                                        class="form-control1  ok_pro"
                                                        name="total_rejection" id="total_rejection"
                                                        value="{{ $cnc_production->total_rejection }}" tabindex="-1"
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
                                                        onKeyPress="if(this.value.length==5) return false;"
                                                        class="form-control1" name="ok_production" id="ok_production"
                                                        value="{{ $cnc_production->ok_production }}" tabindex="-1"
                                                        onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 50px;"
                                        id="form_submit" data-toggle="tooltip"
                                        title="Ctrl+S to save!"><b>Submit</b></button>
                                    <a href="{{ route('cnc_production.index') }}"><button type="button"
                                            class="btn btn-danger"><b>Cancel</b></button></a>
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
                            @endif
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

            total = parseFloat($('#part_count_end').val()) - parseFloat($('#part_count_start').val());

            if (parseFloat($('#part_count_end').val()) < parseFloat($('#part_count_start').val())) {
                if (parseFloat($('#part_count_end').val()) != 0)
                    Swal.fire('plz enter big value!');
            }
            if (isNaN(total) && total != '') {
                total = 0;
            }
            $("#total_production").val(total);

            var total_rejection = $("input[name='total_rejection']").val();
            var total_production = $("input[name='total_production']").val();
            var batch_qty = $('#batch_no').find(':selected').attr('data-batch_qty');
            if (total_production != 0) {
                // if (batch_qty < total_production) {
                //     Swal.fire('Total Production not greater than batch qty!');
                //     $("#total_production").val('');
                //     return false;
                // }
                $("#total_production").val(total_production);
            }
            $("#ok_production").val(total_production - total_rejection);


        });

        $(document).on("keyup", ".tot_rejection", function() {

            var sum = 0;

            $(".tot_rejection").each(function() {
                sum += parseInt($(this).val());
            });
            $("#total_rejection").val(sum);

            var total_rejection = $("input[name='total_rejection']").val();
            var total_production = $("input[name='total_production']").val();
            var batch_qty = $('#batch_no').find(':selected').attr('data-batch_qty');
            if (total_production != 0) {
                // if (batch_qty < total_production) {
                //     Swal.fire('Total Production not greater than batch qty!');
                //     $("#total_production").val('');
                //     return false;
                // }
                $("#total_production").val(total_production);
            }
            $("#ok_production").val(total_production - total_rejection);

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
