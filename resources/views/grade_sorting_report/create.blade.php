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
                                        <h2 class="card-title-lg">Add Grade Sorting Report
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
                                    {!! Form::open(['route' => 'grade_sorting_report.store', 'method' => 'POST']) !!}

                                    <div class="row">




                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-2">
                                            <strong>Inspectors Name</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <select name="inspectors" class="form-control1 mySelect2" id="inspectors"
                                                    required>
                                                    <option value=""></option>
                                                    @foreach ($inspectors as $value)
                                                        <option value="{{ $value->full_name }}">
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
                                                    <option value=""></option>
                                                    @foreach ($mc_no as $value)
                                                        <option value="{{ $value->machine_number }}">
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
                                                    value="{{ Session::get('default_login_date') }}" name="date"
                                                    id="date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Batch No</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <select name="batch_no" class="form-control mySelect2" id="batch_no"
                                                    required>

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
                                                    id="part_no_and_name" tabindex="-1" onclick="return false" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Customer</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="customer" id="customer"
                                                    tabindex="-1" onclick="return false" readonly>
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
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong>Checked Qty</strong>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <input type="number" min="0"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;"
                                                    class="form-control ok_qty" name="checked_qty" id="checked_qty"
                                                    required>
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
                                                    <option value=""></option>
                                                    @foreach ($shift as $value)
                                                        <option value="{{ $value->shift_name }}">
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
                                                <input type="text" class="form-control ok_qty" name="suspected_rej_qty"
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
                                                <input type="text" class="form-control" name="coil_size"
                                                    id="coil_size" required>
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
                                                    class="form-control" name="ok_qty" id="ok_qty" readonly>
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
                                        id="form_submit" data-toggle="tooltip"
                                        title="Ctrl+S to save!"><b>Submit</b></button>
                                    <a href="{{ route('grade_sorting_report.index') }}"><button type="button"
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
        $(document).on('change', '#batch_no', function() {
            var data = $(this).select2('data')[0];
            var partname = data.attr1;
            var customer = data.attr2;

            $("#part_no_and_name").val(partname);
            $("#customer").val(customer);


        });
        $(document).on('change', '#checked_qty', function() {
            var data = $('#batch_no').select2('data')[0];
            // var batch_qty = data.attr4;
            // alert(batch_qty);
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
