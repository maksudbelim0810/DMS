@extends('admin.layout.admin')
@section('css')
    {{-- <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    <style>
        .select2-container .select2-dropdown {
            position: relative;
            top: -40px !important;
            width: 315px !important;
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
            height: 37px;
        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Grade Sorting Report</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Grade Sorting Report</a></li>
                        <li class="breadcrumb-item active">Grade Sorting Report</li>
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
                                        <h2 class="card-title-lg">Edit Grade Sorting Report
                                            <a href="{{ route('grade_sorting_report.index') }}" class="btn btn-primary"
                                                style="float: right;">
                                                Back
                                            </a>
                                        </h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <div class="card-body">
                                <div class="tab-pane fade show active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                    {!! Form::model($grade_sorting_report, [
                                        'method' => 'PATCH',
                                        'route' => ['grade_sorting_report.update', $grade_sorting_report->id],
                                    ]) !!}

                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Inspectors Name</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <select name="inspectors" class="form-control1 mySelect2" id="inspectors"
                                                    required>
                                                     
                                                    @foreach ($inspectors as $value)
                                                        <option value="{{ $value->full_name }}"
                                                            @if ($value->full_name == $grade_sorting_report->inspectors) selected @endif>
                                                            {{ $value->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>M/C No</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <select name="mc_no" class="form-control mySelect2" required>
                                                     
                                                    @foreach ($mc_no as $value)
                                                        <option value="{{ $value->machine_number }}"
                                                            @if ($value->machine_number == $grade_sorting_report->mc_no) selected @endif>
                                                            {{ $value->machine_number }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Date</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="date" min="1900-01-01" max="2500-01-01" class="form-control"
                                                    name="date" id="date"
                                                    value="{{ date('Y-m-d', strtotime($grade_sorting_report->date)) }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Batch No</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <select name="batch_no" class="form-control mySelect2" id="batch_no"
                                                    required>
                                                    <option value="{{ $grade_sorting_report->batch_no }}"
                                                        data-batch_qty="{{ $grade_sorting_report->batch_number->batch_qty }}">
                                                        {{ $grade_sorting_report->batch_no }}</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Part No & Name</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="part_no_and_name"
                                                    value="{{ $grade_sorting_report->part_no_and_name }}"
                                                    id="part_no_and_name" tabindex="-1" onclick="return false" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Customer</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="customer" id="customer"
                                                    value="{{ $grade_sorting_report->customer }}" tabindex="-1"
                                                    onclick="return false" readonly>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Grade</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="grade" id="grade"
                                                    value="{{ $grade_sorting_report->grade }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Checked Qty</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="number" min="0"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;" class="form-control ok_qty"
                                                    name="checked_qty" value="{{ $grade_sorting_report->checked_qty }}"
                                                    id="checked_qty" required>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Shift</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <select name="shift" class="form-control mySelect2" id="shift"
                                                    required>
                                                     
                                                    @foreach ($shift as $value)
                                                        <option value="{{ $value->shift_name }}"
                                                            @if ($value->shift_name == $grade_sorting_report->shift) selected @endif>
                                                            {{ $value->shift_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mt-2">
                                            <strong>Suspected/Rej/Qty</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="number" min="0"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;"
                                                    class="form-control ok_qty" name="suspected_rej_qty"
                                                    value="{{ $grade_sorting_report->suspected_rej_qty }}"
                                                    id="suspected_rej_qty" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Coil Size</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="number" min="0"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;"
                                                    class="form-control" name="coil_size"
                                                    value="{{ $grade_sorting_report->coil_size }}" id="coil_size"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>OK Qty</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="number" min="0"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;"
                                                    class="form-control" name="ok_qty"
                                                    value="{{ $grade_sorting_report->ok_qty }}" id="ok_qty" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title-lg" style="margin-left: 370px;">Configure Parameters
                                            </h4>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mt-2">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Part 1" tabindex="-1" onclick="return false" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Part 2" tabindex="-1" onclick="return false" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Frequency</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="frequency"
                                                    value="{{ $grade_sorting_report->frequency }}" id="frequency">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Pusher Dly</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="pusher_dly"
                                                    value="{{ $grade_sorting_report->pusher_dly }}" id="pusher_dly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Gain db</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="gain_db"
                                                    value="{{ $grade_sorting_report->gain_db }}" id="gain_db">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>
                                                Box Group P</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="box_group_p"
                                                    value="{{ $grade_sorting_report->box_group_p }}" id="box_group_p">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Phase</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="phase"
                                                    value="{{ $grade_sorting_report->phase }}" id="phase">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Box Group N</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="box_group_n"
                                                    value="{{ $grade_sorting_report->box_group_n }}" id="box_group_n">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Dy Gain</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="dy_gain"
                                                    value="{{ $grade_sorting_report->dy_gain }}" id="dy_gain">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Bal Shift X</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="bal_shift_x"
                                                    value="{{ $grade_sorting_report->bal_shift_x }}" id="bal_shift_x">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Filter Lp</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="filter_lp"
                                                    value="{{ $grade_sorting_report->filter_lp }}" id="filter_lp">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Bal Shift Y</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="bal_shift_y"
                                                    value="{{ $grade_sorting_report->bal_shift_y }}" id="bal_shift_y">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Part In Level</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="part_in_level"
                                                    value="{{ $grade_sorting_report->part_in_level }}"
                                                    id="part_in_level">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Sort Dly</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="sort_dly"
                                                    value="{{ $grade_sorting_report->sort_dly }}" id="sort_dly">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title-lg" style="margin-left: 430px;">Threshold</h4>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>V1</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="v1"
                                                    value="{{ $grade_sorting_report->v1 }}" id="v1">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>H1</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="h1"
                                                    value="{{ $grade_sorting_report->h1 }}" id="h1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>V2</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="v2"
                                                    value="{{ $grade_sorting_report->v2 }}" id="v2">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>H2</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="h2"
                                                    value="{{ $grade_sorting_report->h2 }}" id="h2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <strong>Suspected Checked By</strong>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="suspected_checked_by"
                                                    value="{{ $grade_sorting_report->suspected_checked_by }}"
                                                    id="suspected_checked_by">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Grade Validation</strong>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="grade_validation"
                                                    value="{{ $grade_sorting_report->grade_validation }}"
                                                    id="grade_validation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Coil Validation</strong>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="coil_validation"
                                                    value="{{ $grade_sorting_report->coil_validation }}"
                                                    id="coil_validation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Prepared By</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="prepared_by"
                                                    value="{{ $grade_sorting_report->prepared_by }}" id="prepared_by">
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Checked By</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="checked_by"
                                                    value="{{ $grade_sorting_report->checked_by }}" id="checked_by">
                                            </div>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" id="form_submit"><b>Submit</b></button>
                                    <a href="{{ route('grade_sorting_report.index') }}"><button type="button"
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
    {{-- <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.mySelect2').select2({
            placeholder: "--Select Option-- ",
            selectOnClose: true
        });
        $(document).on('change', '#batch_no', function() {
            var data = $(this).select2('data')[0];
            var partname = data.attr1;
            var customer = data.attr2;

            $("#part_no_and_name").val(partname);
            $("#customer").val(customer);
        });
        $(document).on('change', '#checked_qty', function() {
            var batch_qty = $('#batch_no').find(':selected').data('batch_qty');
            var checked_qty = $("input[name='checked_qty']").val();
            if (checked_qty != 0) {
                // if (batch_qty < checked_qty) {
                //     Swal.fire('checked qty not greater than batch qty');
                //     $("#checked_qty").val('');
                //     return false;
                // }
                $("#checked_qty").val(checked_qty);
            }
        });
        $(document).on('change', '.ok_qty', function() {
            var checked_qty = $("input[name='checked_qty']").val();
            var suspected_rej_qty = $("input[name='suspected_rej_qty']").val();
            if (suspected_rej_qty != 0) {
                 if (parseInt(checked_qty) < parseInt(suspected_rej_qty)) {
                    Swal.fire('Suspected Rej Qty not greater than checked qty');

                    $("#ok_qty").val('');
                    return false;
                }
            }
            $("#ok_qty").val(parseInt(checked_qty) - parseInt(suspected_rej_qty));

        });
        $(document).ready(function() {
            initAjaxSelect2($("#batch_no"), "{{ URL::to('/refrence_blno_id_from_bl_no_select2_source') }}");
        });
    </script>
@endsection
