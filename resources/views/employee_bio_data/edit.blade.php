@extends('admin.layout.admin')
@section('css')
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
        top: -40px !important;
        width: 235px !important;
        left: -2px !important;
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
    }

    .required-field::after {
        content: "*";
        color: red;
    }
</style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Employee Master</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Employee Master</a></li>
                    <li class="breadcrumb-item active">Employee Master</li>
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
                                        <h2 class="card-title-lg">Edit Employee Master
                                            <a href="{{ route('employee_bio_data.index') }}" class="btn btn-primary"
                                                style="float: right;">
                                                Back
                                            </a>
                                        </h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <div class="card-body cnc_select_form">
                                <div class="tab-pane fade show active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                    {!! Form::model($employee_bio_data, [
                                        'method' => 'PATCH',
                                        'route' => ['employee_bio_data.update', $employee_bio_data->id],
                                    ]) !!}
                                    <div class="row align-items-left">
                                        <div class="col">
                                            <h5 class="card-title-lg">Full Name</h5>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong class="required-field">Employee Name</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1 full_name" name="employee_name"
                                                        id="employee_name" value="{{ $employee_bio_data->employee_name }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong class="required-field">Father Name</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1 full_name" name="father_name"
                                                        id="father_name" value="{{ $employee_bio_data->father_name }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong class="required-field">Surname</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1 full_name" name="surname" id="surname"
                                                        value="{{ $employee_bio_data->surname }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong class="required-field">Full Name</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="full_name"
                                                        id="full_name" value="{{ $employee_bio_data->full_name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-left">
                                        <div class="col">
                                            <h5 class="card-title-lg">Present Address Details</h5>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Address Line 1</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="present_address_details_1" id="present_address_details_1"
                                                        value="{{ $employee_bio_data->present_address_details_1 }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Address Line 2</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="present_address_details_2" id="present_address_details_2"
                                                        value="{{ $employee_bio_data->present_address_details_2 }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>City</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="present_city"
                                                        id="present_city" value="{{ $employee_bio_data->present_city }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>State</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="present_state"
                                                        id="present_state" value="{{ $employee_bio_data->present_state }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row align-items-left">
                                        <div class="col">
                                            <h5 class="card-title-lg">Permenant Address Details</h5>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Address Line 1</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="permenant_address_details_1" id="permenant_address_details_1"
                                                        value="{{ $employee_bio_data->permenant_address_details_1 }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Address Line 2</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="permenant_address_details_2"
                                                        id="permenant_address_details_2"
                                                        value="{{ $employee_bio_data->permenant_address_details_2 }}"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>City</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="permenant_city"
                                                        id="permenant_city"
                                                        value="{{ $employee_bio_data->permenant_city }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>State</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="permenant_state"
                                                        id="permenant_state"
                                                        value="{{ $employee_bio_data->permenant_state }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong class="required-field">Date OF Birth</strong>
                                                <div class="input-group mb-3">
                                                    <input type="date" min="1900-01-01" max="2500-01-01" class="form-control1" name="date_of_birth"
                                                        id="date_of_birth"
                                                        value="{{ date('Y-m-d',strtotime($employee_bio_data->date_of_birth) )}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong class="required-field">Date Of Company Join</strong>
                                                <div class="input-group mb-3">
                                                    <input type="date" min="1900-01-01" max="2500-01-01" class="form-control1"
                                                        name="date_of_company_join" id="date_of_company_join"
                                                        value="{{ date('Y-m-d',strtotime($employee_bio_data->date_of_company_join) ) }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Mobile No</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1" name="mobile_no"
                                                        id="mobile_no" value="{{ $employee_bio_data->mobile_no }}"
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Other Skill</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1" name="other_skill"
                                                        id="other_skill" value="{{ $employee_bio_data->other_skill }}"
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-left">
                                        <div class="col">
                                            <h5 class="card-title-lg">Education Qualificational</h5>
                                        </div>
                                        <!--end col-->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong class="content-center"> </strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="educational_qualification_1"
                                                        value="{{ $employee_bio_data->educational_qualification_1 }}"
                                                        id="educational_qualification_1">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <strong></strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1"
                                                        name="educational_qualification_2"
                                                        value="{{ $employee_bio_data->educational_qualification_2 }}"
                                                        id="educational_qualification_2" required>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="row align-items-left">
                                        <div class="col">
                                            <h5 class="card-title-lg">Experience</h5>
                                        </div>
                                        <!--end col-->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <strong class="content-center">Name Of Organization </strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="name_of_organization_1" id="name_of_organization_1"
                                                        value="{{ $employee_bio_data->name_of_organization_1 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>Year</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1" name="year_1"
                                                        id="year_1" value="{{ $employee_bio_data->year_1 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="name_of_organization_2" id="name_of_organization_2"
                                                        value="{{ $employee_bio_data->name_of_organization_2 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1" name="year_2"
                                                        id="year_2" value="{{ $employee_bio_data->year_2 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="name_of_organization_3" id="name_of_organization_3"
                                                        value="{{ $employee_bio_data->name_of_organization_3 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1" name="year_3"
                                                        id="year_3" value="{{ $employee_bio_data->year_3 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="name_of_organization_4" id="name_of_organization_4"
                                                        value="{{ $employee_bio_data->name_of_organization_4 }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1" name="year_4"
                                                        id="year_4" value="{{ $employee_bio_data->year_4 }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-left">
                                        <div class="col">
                                            <h5 class="card-title-lg">Training If Taken Any</h5>
                                        </div>
                                        <!--end col-->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong class="content-center"> </strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="training_if_taken_any_1"
                                                        value="{{ $employee_bio_data->training_if_taken_any_1 }}"
                                                        id="training_if_taken_any_1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong class="content-center"> </strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="training_if_taken_any_2"
                                                        value="{{ $employee_bio_data->training_if_taken_any_2 }}"
                                                        id="training_if_taken_any_2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong class="content-center"> </strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control1"
                                                        name="training_if_taken_any_3"
                                                        value="{{ $employee_bio_data->training_if_taken_any_3 }}"
                                                        id="training_if_taken_any_3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong></strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1"
                                                        name="training_if_taken_any_4"
                                                        value="{{ $employee_bio_data->training_if_taken_any_4 }}"
                                                        id="training_if_taken_any_4">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong class="required-field">Employee Category</strong>
                                                    <div class="input-group mb-3">
                                                        <select name="Oemcname" id="Oemcname"
                                                            class="form-control1 mySelect2" required>
                                                            <option value="">--Select Option--</option>
                                                            @foreach ($emp_category as $value)
                                                                <option value="{{ $value->employee_category }}"
                                                                    @if ($value->employee_category == $employee_bio_data->Oemcname) selected @endif>
                                                                    {{ $value->employee_category }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Marital Status</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control1" name="marital_status"
                                                            id="marital_status"
                                                            value="{{ $employee_bio_data->marital_status }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong class="required-field">Wage 8 Hr Rs</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1" name="wage_8_hr_rs"
                                                            id="wage_8_hr_rs"
                                                            value="{{ $employee_bio_data->wage_8_hr_rs }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong class="required-field">Wage 1 Hr Rs</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control1" name="wage_1_hr_rs"
                                                            id="wage_1_hr_rs"
                                                            value="{{ $employee_bio_data->wage_1_hr_rs }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong class="required-field">Appoint By</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control1" name="appoint_by"
                                                            id="appoint_by" value="{{ $employee_bio_data->appoint_by}}"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong class="required-field">Appoint Date</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="date" min="1900-01-01" max="2500-01-01" class="form-control1" name="appoint_date"
                                                            id="appoint_date"
                                                            value="{{ date('Y-m-d',strtotime($employee_bio_data->appoint_date) )}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Resign Date</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="date" min="1900-01-01" max="2500-01-01" class="form-control1" name="resign_date"
                                                            id="resign_date"
                                                            value="{{ !empty($employee_bio_data->resign_date)? date('Y-m-d',strtotime($employee_bio_data->resign_date) ):''}}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                         <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                        <a href="{{ route('employee_bio_data.index') }}"><button type="button"
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
        $('.full_name').on('change', function() {
            var name = $("input[name='employee_name']").val();
            var f_name = $("input[name='father_name']").val().substr(0, 1);;
            var l_name = $("input[name='surname']").val();
         
            var data = $("#full_name").val(name+' '+f_name+' '+l_name);
        });

    </script>
@endsection