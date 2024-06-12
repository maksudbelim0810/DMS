@extends('admin.layout.admin')
@section('css')
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" /> --}}
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" type="text/css" />
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
    <style>
        .select2-container .select2-dropdown {
            position: relative;
            top: -35px !important;
            width: 245px !important;
            left: -1px !important;
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
            height: 35px;
        }
        .btn {
            border-radius:0px;
        }
  /*      .submit{*/
  /*          float: left;*/
  /*          height: 31px;*/
  /*          position: relative;*/
  /*          margin-right: 15px;*/
  /*          margin-left: 663px;*/
  /*          background: #4f4fb9;*/
  /*          color: white;*/
  /*      }*/
  /*      .reset{*/
            background-color: #04AA6D; /* Green */
  /*border: none;*/
  
  /*padding: 15px 32px;*/
  /*text-align: center;*/
  /*text-decoration: none;*/
  /*display: inline-block;*/
  /*font-size: 16px;*/
  /*          float: left;*/
  /*          height: 31px;*/
  /*          position: relative;*/
  /*          background: #b96d4f;*/
  /*          color: white;*/
  /*      }*/
        
    </style>
@endsection
@section('content')
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success" style="margin-bottom: 49px;
        margin-top: -38px;
        height: 56px;">
            <p style="font-size: large;"><b>{{ $message }}</b> </p>
        </div>
    @endif --}}
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row">
                    <div class="col-md-12">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-header">
                                <h4 class="card-title">Report Viewer
                                </h4>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Transaction:</strong>
                                            {{-- search_submit --}}
                                            <select name="transaction" class="form-control mySelect2 " id="transaction">
                                                <option value=""></option>
                                                <option value="CNC Production">CNC Production</option>
                                                <option value="Dispatch Advice">Dispatch Advice</option>
                                                <option value="MPI Production">MPI Production</option>
                                                <option value="Insert Counsuption Entry">Insert Counsuption Entry</option>
                                                <option value="Rejection Disposition">Rejection Disposition</option>
                                                <option value="Visual & Packing">Visual & Packing</option>
                                                <option value="Grade Sorting Report">Grade Sorting Report</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        {{ Form::open(['id' => 'cnc_production', 'method' => 'post', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) }}

                                        <div class="form-group">
                                            <strong>
                                                <input type="checkbox"  data-name="start_date" class="check_fields" style="margin-right: 3%; margin-top: 2%;"
                                                    name="check_fields" value="0" required >
                                                Start Date:</strong>
                                            <input type="text" placeholder="DD-MM-YYYY" onKeyPress="if(this.value.length==10) return false;" autocomplete="off" name="start_date" id="start_date" class="form-control date_format"
                                                value="{{ $data['start_date'] }}" required>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>
                                                {{-- <input type="checkbox" data-name="end_date" class="check_fields" style="margin-right: 3%; margin-top: 2%;"
                                                    name="check_fields" value="0"> --}}
                                                End Date:</strong>
                                            <input type="text" name="end_date" placeholder="DD-MM-YYYY" onKeyPress="if(this.value.length==10) return false;" autocomplete="off" id="end_date" class="form-control date_format"
                                                value="{{ $data['end_date'] }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-3 display">
                                        <div class="form-group">
                                            <strong><input type="checkbox" id="batch_no_check" data-name="batch_no"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Batch
                                                No:</strong>
                                            {{-- search_submit --}}
                                            <select disabled name="batch_no" class="form-control mySelect2" id="batch_no">
                                                <option value="{{ $data['batch_no'] }}">{{ $data['batch_no'] }}</option>
                                            </select>
                                            <input type="text" id="new_batch_n" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 display">
                                        <div class="form-group">
                                            <strong><input type="checkbox" id="part_name_check" data-name="part_name"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Part Name
                                                :</strong>
                                            {{-- {!! Form::text('part_name', $data['part_name'], [
                                                'class' => 'form-control',
                                                'id' => 'part_name',
                                                ' ',
                                                'tabindex="-1" onclick="return false" ',
                                            ]) !!} --}}
                                            <select disabled name="part_name" class="form-control mySelect2" id="part_name">
                                                <option value=""></option>
                                                <option value="{{ $data['part_name'] }}">{{ $data['part_name'] }}</option>
                                            </select>
                                            <input type="text" id="new_part_n" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 display">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="customer" id="customer_check"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Customer
                                                :</strong>
                                            {{-- {!! Form::text('customer', $data['customer'], [
                                                'class' => 'form-control',
                                                'id' => 'customer_name',
                                                'tabindex="-1" onclick="return false" ',
                                            ]) !!} --}}
                                            <select disabled name="customer" class="form-control mySelect2" id="customer">
                                                <option value="{{ $data['customer'] }}">{{ $data['customer'] }}</option>
                                            </select>
                                            <input type="text" id="new_customer_n" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 shift_section" style="display: none;">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="shift" id="shift_check"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Shift</strong>
                                            <div class="input-group mb-3">
                                                <select disabled name="shift" class="form-control mySelect2"
                                                    id="shift">
                                                    <option value=""></option>
                                                    @foreach ($shift as $value)
                                                        <option value="{{ $value->shift_name }}"
                                                            @if ($value->shift_name == $data['shift']) selected @endif>
                                                            {{ $value->shift_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="setup" id="setup_check"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Setup</strong>
                                            <div class="input-group mb-3">
                                                <select disabled name="setup" class="form-control mySelect2"
                                                    id="setup">
                                                    <option value=""></option>
                                                    @foreach ($setup as $value)
                                                        <option value="{{ $value->setup_name }}"
                                                            @if ($value->setup_name == $data['setup']) selected @endif>
                                                            {{ $value->setup_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mc_no" style="display: none;">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="mc_no" id="mc_no_check"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Mc No:</strong>
                                            <div class="input-group">
                                                <select disabled name="mc_no" id="mc_no" class="form-control mySelect2">
                                                    <option value=""></option>
                                                    @foreach ($mc_no as $value)
                                                        <option value="{{ $value->machine_number }}"
                                                            @if ($value->machine_number == $data['mc_no']) selected @endif>
                                                            {{ $value->machine_number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="operator_name"
                                                    id="operator_name_check" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Operator
                                                Name</strong>
                                            <div class="input-group mb-3">
                                                <select disabled name="operator_name" class="form-control mySelect2"
                                                    id="operator_name">
                                                    <option value="">--Select Operator--</option>
                                                    @foreach ($operator_name as $value)
                                                        <option value="{{ $value->full_name }}"
                                                            @if ($value->full_name == $data['operator_name']) selected @endif>
                                                            {{ $value->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mpi_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="mpi_mc_no" id="mpi_mc_no_check"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">MPI Mc No:</strong>
                                            <div class="input-group">
                                                <select disabled name="mpi_mc_no" id="mpi_mc_no" class="form-control mySelect2">
                                                    <option value=""></option>
                                                    @foreach ($mpi_mc_no as $value)
                                                        <option value="{{ $value->machine_number }}"
                                                            @if ($value->machine_number == $data['mpi_mc_no']) selected @endif>
                                                            {{ $value->machine_number }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mpi_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="mpi_operator_name"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;"
                                                    id="mpi_operator_name_check" name="check_fields" value="0">MPI
                                                Operator
                                                Name:</strong>
                                            <div class="input-group">
                                                <select disabled name="mpi_operator_name" class="form-control mySelect2"
                                                    id="mpi_operator_name">
                                                    <option value=""></option>
                                                    @foreach ($mpi_operator_name as $value)
                                                        <option value="{{ $value->full_name }}"
                                                            @if ($value->full_name == $data['mpi_operator_name']) selected @endif>
                                                            {{ $value->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 insert_consumption_entry">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="insert_name" id="insert_name_check"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Insert Name</strong>
                                            <div class="input-group">
                                                <select disabled name="insert_name" id="insert_name" class="form-control mySelect2">
                                                    <option value="">--Select Name --</option>
                                                    @foreach ($insert_name as $value)
                                                        <option value="{{ $value->insert_name }}"
                                                            @if ($value->insert_name == $data['insert_name']) selected @endif>
                                                            {{ $value->insert_name }}

                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>          
                                    </div>
                                    <div class="col-md-3 visual_packing">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="location" id="location_check"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Unit No</strong>
                                            <div class="input-group">
                                                <select disabled name="location" id="location" class="form-control mySelect2">
                                                    <option value="">--Select Unit --</option>
                                                    @foreach ($location as $value)
                                                        <option value="{{ $value->location_name }}"
                                                            @if ($value->location_name == $data['location']) selected @endif>
                                                            {{ $value->location_name }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 grade_sorting_report">
                                        <div class="form-group ">
                                            <strong><input type="checkbox" data-name="grade_mc_no" id="grade_mc_no_check"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Grade Sorting Mc No:</strong>
                                            <div class="input-group">
                                                <select disabled name="grade_mc_no" id="grade_mc_no" class="form-control mySelect2">
                                                    <option value=""></option>
                                                    @foreach ($grade_mc_no as $value)
                                                        <option value="{{ $value->machine_number }}"
                                                            @if ($value->machine_number == $data['grade_mc_no']) selected @endif>
                                                            {{ $value->machine_number }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 grade_sorting_report">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="inspectors" id="inspectors_check"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Inspectors Name:</strong>
                                            <div class="input-group">
                                                <select disabled name="inspectors" class="form-control mySelect2"
                                                    id="inspectors">
                                                    <option value=""></option>
                                                    @foreach ($inspectors as $value)
                                                        <option value="{{ $value->full_name }}">
                                                            {{ $value->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 visual_packing">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="visual_inspected_qty"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Visual
                                                Qty:</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 total_rejection" style="display: none;">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="total_rejection"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Total
                                                Rejection</strong>
                                            {{-- <div class="input-group mb-3">
                                                <input type="number" min="0"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    value="{{ $data['total_rejection'] }}"
                                                    onKeyPress="if(this.value.length==7) return false;"
                                                    class="form-control" name="total_rejection"
                                                    id="total_rejection">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="no_opration" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">No
                                                Operator</strong>
                                            {{-- <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['no_opration'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="no_opration"
                                                    id="no_opration" value="0">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="no_power" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">No
                                                Power</strong>
                                            {{-- <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['no_power'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="no_power"
                                                    id="no_power" value="0">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="job_setting" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Job
                                                Setting</strong>
                                            {{-- <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['job_setting'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="job_setting"
                                                    id="job_setting" value="0">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="target_production" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Target Production</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="total_loss" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Total Loss</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="lunch" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Lunch</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="idle_time" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Idle Time</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="shift_duration" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Shift Duration</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="operation_effi" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Operation
                                                Efficiency</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="job_fault" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Job
                                                Fault</strong>
                                            {{-- <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['job_fault'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="job_fault"
                                                    id="job_fault" value="0">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="no_load" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">No
                                                Load</strong>
                                            {{-- <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['no_load'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="no_load" id="no_load"
                                                    value="0">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="total_production" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Total Production</strong>
                                            {{-- <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['total_production'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="total_production" id="total_production"
                                                    value="0">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2 cnc_production">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="cycle_time" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Cycle
                                                Time</strong>
                                            {{-- <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['cycle_time'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control productivity" name="cycle_time">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2 ok_qty" style="display: none;">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="ok_qty" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">OK
                                                Qty:</strong>
                                            {{-- <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['ok_qty'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;"
                                                    class="form-control section2" name="ok_qty" id="ok_qty">
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-2 inspected_qty" style="display: none;">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="inspected_qty" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Inspected Qty:</strong>

                                        </div>
                                    </div>
                                    <div class="col-md-2 rejected_qty" style="display: none;">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="rejected_qty" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Rejection Qty:</strong>

                                        </div>
                                    </div>
                                    <div class="col-md-2 visual_packing">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="packed_qty" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Packing
                                                Qty:</strong>

                                        </div>
                                    </div>
                                    <div class="col-md-2 visual_packing">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="box_qty" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Box
                                                Qty:</strong>

                                        </div>
                                    </div>
                                    <div class="col-md-2 visual_packing">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="incharge_name" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Incharge Name</strong>

                                        </div>
                                    </div>
                                    <div class="col-md-2 insert_consumption_entry">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="insert_rate_rs"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Insert Rate
                                                Rs</strong>

                                        </div>
                                    </div>
                                    <div class="col-md-2 insert_consumption_entry">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="insert_use_qty"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Insert Use
                                                Qty</strong>

                                        </div>
                                    </div>
                                    <div class="col-md-2 insert_consumption_entry">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="insert_cost_nos"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Insert Cost Nos</strong>

                                        </div>
                                    </div>
                                    <div class="col-md-2 insert_consumption_entry">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="total_prod_qty"
                                                    class="check_fields" style="margin-right: 3%; margin-top: 2%;" name="check_fields"
                                                    value="0">Production Qty</strong>

                                        </div>
                                    </div>
                                    <div class="col-md-2 grade_sorting_report">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="checked_qty" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Checked
                                                Qty:</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 dispatch_advice">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="dispatch_advice_no" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Dispatch Advice No</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 dispatch_advice">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="dispatch_qty" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Dispatch Qty</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 dispatch_advice">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="box_quantity" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Box Qty</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 dispatch_advice">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="sr_no" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Sr No</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 rejection_disposition">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="fr" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">FR</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 rejection_disposition">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="fr_am" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">FR AM</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 rejection_disposition">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="pmr" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">PMR</strong>
                                        </div>
                                    </div>
                                    <div class="col-md-2 rejection_disposition">
                                        <div class="form-group">
                                            <strong><input type="checkbox" data-name="total" class="check_fields"
                                                    style="margin-right: 3%; margin-top: 2%;" name="check_fields" value="0">Total</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-1 mb-3 display">
                                    <div class="col-md-12">
                                        {{-- <input style="float: left; margin-right:15px"
                                            class="btn btn-primary filter_save_btn pull-right" id="FilerBtnAjax"
                                            type="submit" value="Submit" autocomplete="off"> --}}
                                            <button style="float: left; margin-right:15px; margin-left: 614px;" class="btn btn-primary filter_save_btn pull-right" id="FilerBtnAjax"
                                            type="submit" value="Submit" autocomplete="off">
                                                 Submit
                                            </button>

                                        <a style="float: left; width: 53px;" href="{{ route('home') }}"
                                            class="btn btn-danger pull-right">Reset</a>

                                    </div>
                                </div>
                                {{ Form::close() }}

                                <div id="table_view">
                                </div>

                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div> <!-- end row-->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}
    <!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js" data-modules="effect effect-bounce effect-blind effect-bounce effect-clip effect-drop effect-fold effect-slide"></script>

    <script type="text/javascript">
    $(".date_format").datepicker({
  dateFormat: 'dd-mm-yy', //check change
  changeMonth: true,
  changeYear: true
});
   
        $('.mySelect2').select2({
            placeholder: '--Select Option--',
            selectOnClose: true,
        });
        $(document).ready(function() {
            initAjaxSelect2($("#batch_no"), "{{ URL::to('/refrence_blno_id_from_bl_no_select2_source') }}");
        });
        $(document).ready(function() {
            initAjaxSelect2($("#customer"), "{{ URL::to('/refrence_customer_n_select2_source') }}");
        });
        $(document).ready(function() {
            initAjaxSelect2($("#part_name"), "{{ URL::to('/refrence_Part_n_select2_source') }}");
        });
        $('#new_part_n').hide();
        $('#new_customer_n').hide();
        $('#new_batch_n').hide();
        $(document).on('change', '#batch_no', function() {

            $('#part_name_check').prop('checked', true);
            $('#batch_no_check').prop('checked', true);
            $('#customer_check').prop('checked', true);
            $('#new_part_n').show();
            $('#new_customer_n').show();
            $('#part_name').next(".select2-container").hide();
            $('#customer').next(".select2-container").hide();
            var data = $(this).select2('data')[0];
            var partname = data.attr1;
            var customer = data.attr2;
            $('#new_part_n').val(partname);
            $('#new_customer_n').val(customer);

            // $('#part_name').replaceWith('<input type="text" class="form-control" readonly name="part_name" id="part_name" value="'+partname+'">');
            // $('#customer').replaceWith('<input type="text" class="form-control" readonly name="customer" id="customer" value="'+customer+'">');
        });
        $(document).on('change', '#part_name', function() {

            $('#part_name_check').prop('checked', true);
            $('#batch_no_check').prop('checked', true);
            $('#customer_check').prop('checked', true);
            $('#new_batch_n').show();
            $('#new_customer_n').show();

            $('#batch_no').next(".select2-container").hide();
            $('#customer').next(".select2-container").hide();

            var data = $(this).select2('data')[0];
            var batch_no = data.attr1;
            var customer = data.attr2;


            $('#new_batch_n').val(batch_no);
            $('#new_customer_n').val(customer);
            // $('#batch_no').replaceWith('<input type="text" class="form-control" readonly name="batch_no" id="batch_no" value="'+batch_no+'">');
            // $('#customer').replaceWith('<input type="text" class="form-control" readonly name="customer" id="customer" value="'+customer+'">');

        });
        $(document).on('change', '#customer', function() {
            $('#part_name_check').prop('checked', true);
            $('#batch_no_check').prop('checked', true);
            $('#customer_check').prop('checked', true);
            $('#new_batch_n').show();
            $('#new_part_n').show();

            $('#batch_no').next(".select2-container").hide();
            $('#part_name').next(".select2-container").hide();

            var data = $(this).select2('data')[0];
            var partname = data.attr1;
            var batch_no = data.attr2;

            $('#new_batch_n').val(batch_no);
            $('#new_part_n').val(partname);
            // $('#part_name').replaceWith('<input type="text" class="form-control" readonly name="part_name" id="part_name" value="'+partname+'">');
            // $('#batch_no').replaceWith('<input type="text" class="form-control" readonly name="batch_no" id="batch_no" value="'+batch_no+'">');

        });

        $('.cnc_production').hide();
        $('.display').hide();  
        $('.dispatch_advice').hide();
        $('.mpi_production').hide();
        $('.insert_consumption_entry').hide();
        $('.rejection_disposition').hide();
        $('.visual_packing').hide();
        $('.grade_sorting_report').hide();

        $('#transaction').on('change', function() {
            var transaction = $(this).val();
            ignore: ".ignoreThisClass"
            $('.check_fields').prop('checked', false);
            $('.check_fields').prop('required', false);
            // .each(function() {
            //     yourArray.push($(this).data('name'));
            // });

            $('.display').show();
            // $('.display').find("select disabled").prop('required',true);
            //    alert(transaction);
            if (transaction == 'CNC Production') {
                $('.cnc_production').show();
                $('.shift_section').show();
                $('.total_rejection').show();
                $('.mc_no').show();
                $('.rejected_qty').hide();
                $('.ok_qty').hide();
            } else {
                $('.cnc_production').hide();
                //$('.shift_section').hide();
                //$('.total_rejection').hide();
                //$('.mc_no').hide();
            }
            if (transaction == 'Dispatch Advice') {
                $('.dispatch_advice').show();
                // $('.ok_qty').show();
                $('.shift_section').hide();
                $('.total_rejection').hide();
                $('.rejected_qty').hide();
                $('.inspected_qty').hide();
                $('.mc_no').hide();

                $('.dispatch_advice').find("select disabled").prop('required', true);
            } else {
                $('.dispatch_advice').hide();
                //$('.ok_qty').hide();
                
            }
            if (transaction == 'MPI Production') {
                $('.mpi_production').show();
                $('.inspected_qty').show();
                $('.rejected_qty').show();
                $('.shift_section').show();
                $('.ok_qty').show();
                $('.total_rejection').hide();
                $('.mc_no').hide();

                // $('.mpi_production').find("select disabled").prop('required', true);

            } else {
                $('.mpi_production').hide();
                //$('.inspected_qty').hide();
                // $('.rejected_qty').hide();
                //$('.shift_section').hide();
                //$('.ok_qty').hide();
            }
            if (transaction == 'Insert Counsuption Entry') {
                $('.insert_consumption_entry').show();
                $('.mc_no').show();
                $('.inspected_qty').hide();
                $('.rejected_qty').hide();
                $('.shift_section').hide();
                $('.ok_qty').hide();
                $('.total_rejection').hide();
                // $('.insert_consumption_entry').find("select disabled").prop('required', true);
                // $('.mc_no').find("select disabled").prop('required', true);
            } else {
                $('.insert_consumption_entry').hide();
                //$('.mc_no').hide();
            }
            if (transaction == 'Rejection Disposition') {
                $('.rejection_disposition').show();
                $('.mc_no').hide();
                $('.inspected_qty').hide();
                $('.rejected_qty').hide();
                $('.shift_section').hide();
                $('.ok_qty').hide();
                $('.total_rejection').hide();
                // $('.rejection_disposition').find(".input-group").find("input").prop('required', true);
                $('.rejection_disposition').find("select disabled").prop('required', true);
            } else {
                $('.rejection_disposition').hide();
            }
            if (transaction == 'Visual & Packing') {
                $('.visual_packing').show();
                $('.shift_section').show();
                $('.total_rejection').show();
                $('.mc_no').hide();
                $('.inspected_qty').hide();
                $('.rejected_qty').hide();
                $('.ok_qty').hide();

                // $('.visual_packing').find(".input-group").find("input").prop('required', true);
                $('.visual_packing').find("select disabled").prop('required', true);
                // $('.total_rejection').find(".input-group").find("input").prop('required', true);

            } else {
                $('.visual_packing').hide();
                //$('.shift_section').hide();
                //$('.total_rejection').hide();
            }
            if (transaction == 'Grade Sorting Report') {
                $('.grade_sorting_report').show();
                $('.rejected_qty').show();
                $('.ok_qty').show();
                $('.shift_section').show();
                $('.total_rejection').hide();
                $('.mc_no').hide();
                $('.inspected_qty').hide();

                // $('.grade_sorting_report').find(".input-group").find("input").prop('required', true);
                // $('.grade_sorting_report').find("select disabled").prop('required', true);

            } else {
                $('.grade_sorting_report').hide();
                // $('.rejected_qty').hide();
                //$('.ok_qty').hide();
                //$('.shift_section').hide();
            }
        });

        $(".check_fields").on('change', function(e) {
            if ($('#batch_no_check').is(':checked')) {
                $('#batch_no').prop('disabled', false);
            } else {
                $('#batch_no').prop('disabled', true);
            }
            if ($('#part_name_check').is(':checked')) {
                $('#part_name').prop('disabled', false);
            } else {
                $('#part_name').prop('disabled', true);
            }
            if ($('#customer_check').is(':checked')) {
                $('#customer').prop('disabled', false);
            } else {
                $('#customer').prop('disabled', true);
            }
            if ($('#shift_check').is(':checked')) {
                $('#shift').prop('disabled', false);
            } else {
                $('#shift').prop('disabled', true);
            }
            if ($('#setup_check').is(':checked')) {
                $('#setup').prop('disabled', false);
            } else {
                $('#setup').prop('disabled', true);
            }
            if ($('#mc_no_check').is(':checked')) {
                $('#mc_no').prop('disabled', false);
            } else {
                $('#mc_no').prop('disabled', true);
            }
            if ($('#operator_name_check').is(':checked')) {
                $('#operator_name').prop('disabled', false);
            } else {
                $('#operator_name').prop('disabled', true);
            }
            if ($('#grade_mc_no_check').is(':checked')) {
                $('#grade_mc_no').prop('disabled', false);
            } else {
                $('#grade_mc_no').prop('disabled', true);
            }
            if ($('#mpi_mc_no_check').is(':checked')) {
                $('#mpi_mc_no').prop('disabled', false);
            } else {
                $('#mpi_mc_no').prop('disabled', true);
            }
            if ($('#insert_name_check').is(':checked')) {
                $('#insert_name').prop('disabled', false);
            } else {
                $('#insert_name').prop('disabled', true);
            }
            if ($('#mpi_operator_name_check').is(':checked')) {
                $('#mpi_operator_name').prop('disabled', false);
            } else {
                $('#mpi_operator_name').prop('disabled', true);
            }
            if ($('#location_check').is(':checked')) {
                $('#location').prop('disabled', false);
            } else {
                $('#location').prop('disabled', true);
            }
            if ($('#inspectors_check').is(':checked')) {
                $('#inspectors').prop('disabled', false);
            } else {
                $('#inspectors').prop('disabled', true);
            }
            this.value = this.checked ? 1 : 0;
            e.preventDefault();
            var yourArray = [];
            $("input:checkbox[name=check_fields]:checked").each(function() {
                yourArray.push($(this).data('name'));
            });
            console.log(yourArray);
        });

        $('#cnc_production').submit(function(e) {
            var error = 0;
            e.preventDefault();
            var batch_no = $('#batch_no').val();
            var transaction = $('#transaction').val();
            var mc_no = $('#mc_no').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            var shift = $('#shift').val();
            var setup = $('#setup').val();
            var customer = $('#customer').val();
            var part_name = $('#part_name').val();
            var cycle_time = $('#cycle_time').val();
            var total_rejection = $('#total_rejection').val();
            var no_opration = $('#no_opration').val();
            var no_power = $('#no_power').val();
            var job_fault = $('#job_fault').val();
            var no_load = $('#no_load').val();
            var total_production = $('#total_production').val();
            var operator_name = $('#operator_name').val();
            var ok_qty = $('#ok_qty').val();
            var mpi_mc_no = $('#mpi_mc_no').val();
            var mpi_operator_name = $('#mpi_operator_name').val();
            var inspected_qty = $('#inspected_qty').val();
            var rejected_qty = $('#rejected_qty').val();
            var insert_rate_rs = $('#insert_rate_rs').val();
            var total_prod_qty = $('#total_prod_qty').val();
            var location = $('#location').val();
            var visual_inspected_qty = $('#visual_inspected_qty').val();
            var insert_name = $('#insert_name').val();
            var packed_qty = $('#packed_qty').val();
            var box_qty = $('#box_qty').val();
            var grade_mc_no = $('#grade_mc_no').val();
            var inspectors = $('#inspectors').val();
            var checked_qty = $('#checked_qty').val();


            // if(campaign_name == ''){
            //     error= 1;
            //     $('#campaign_name_error').css('display','block');
            // }

            var checked_value = [];
            $("input:checkbox[name=check_fields]:checked").each(function() {
                checked_value.push($(this).data('name'));
            });
            var flag = "add_campaign";
            if (error == 0) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('getDataFilter') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        checked_value,
                        batch_no,
                        transaction,
                        mc_no,
                        start_date,
                        end_date,
                        shift,
                        setup,
                        customer,
                        part_name,
                        cycle_time,
                        total_rejection,
                        no_opration,
                        no_power,
                        job_fault,
                        no_load,
                        total_production,
                        operator_name,
                        mpi_mc_no,
                        ok_qty,
                        inspected_qty,
                        rejected_qty,
                        mpi_operator_name,
                        insert_name,
                        insert_rate_rs,
                        total_prod_qty,
                        location,
                        visual_inspected_qty,
                        packed_qty,
                        box_qty,
                        grade_mc_no,
                        inspectors,
                        checked_qty,
                        flag
                    },
                    success: function(response) {
                        var {
                            html
                        } = response
                        $("#table_view").html(response.html)

                    },
                    error: function(request, status, error) {
                        console.log('error', error)
                    }
                });
            }
        });
    </script>
@endsection
