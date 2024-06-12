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
                <h4 class="mb-sm-0">Part Master</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Part Master</a></li>
                        <li class="breadcrumb-item active">Part Master</li>
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
                                        <h2 class="card-title-lg">Add Part Master
                                        <a href="{{ route('part_entry.index') }}" class="btn btn-primary"
                                            style="float: right;">
                                            Back
                                        </a></h2>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <div class="card-body">
                                <div class="tab-pane fade show active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                    {!! Form::open(['route' => 'part_entry.store', 'method' => 'POST']) !!}

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Part No</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control part_n" name="part_no"
                                                        id="part_no" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Part Category</strong>
                                                <div class="input-group mb-3">
                                                    <select name="part_category" id="part_category" class="form-control mySelect2 part_n" required>
                                                        <option value="">--Select Part--</option>
                                                        @foreach ($part_category as $value)
                                                            <option value="{{ $value->part_category }}">
                                                                {{ $value->part_category }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Part Name</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control part_customer" name="part_name"
                                                        id="part_name" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Part Type Category</strong>
                                                <div class="input-group mb-3">
                                                    <select name="part_type_category" class="form-control mySelect2" required>
                                                        <option value="">--Select Part Type--</option>
                                                        @foreach ($part_type_category as $value)
                                                            <option value="{{ $value->part_type_category }}">
                                                                {{ $value->part_type_category }}

                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Customer Name</strong>
                                                    <div class="input-group mb-3">
                                                        <select name="customer_name" id="customer_name"
                                                            class="form-control mySelect2 part_customer" required>
                                                            <option value="">--Select Option--</option>
                                                            @foreach ($customer as $value)
                                                            <option value="{{ $value->name }}">
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Part And Customer Name</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="part_and_customer_name"
                                                            id="part_and_customer_name" readonly>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Drg Rev Edit No Date</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" name="drg_rev_edit_no_date"
                                                            id="drg_rev_edit_no_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Forging Rate</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="forging_rate"
                                                            id="forging_rate">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Prof Mc Rate</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="prof_mc_rate"
                                                            id="prof_mc_rate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Cnc Rate</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="cnc_rate"
                                                            id="cnc_rate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Mpi Rate</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="mpi_rate"
                                                            id="mpi_rate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Visual Rate</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="visual_rate"
                                                            id="visual_rate">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Packing Rate</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="packing_rate"
                                                            id="packing_rate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Forging W (Kg)</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" step="0.01" class="form-control" name="forging_w"
                                                            id="forging_w">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Proof Mc W (Kg)</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" step="0.01" class="form-control" name="proof_mc_w"
                                                            id="proof_mc_w">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <strong>Finish W (Kg)</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" step="0.01" class="form-control" name="finish_w"
                                                            id="finish_w">
                                                    </div>
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
                                    <a href="{{ route('part_entry.index') }}"><button type="button"
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

    <script type="text/javascript">
        $('.mySelect2').select2({
            placeholder: "--Select Option-- ",
            selectOnClose: true
        });
        $(document).on('change', '.part_customer', function() {
            var partname = $("input[name='part_name']").val();
            var customer = $('.part_customer').find(':selected').val();
            var data = $("#part_and_customer_name").val(partname+'-'+customer);
        });
        $(document).on('change', '.part_n', function() {
            var partname = $("input[name='part_no']").val();
            var part_category = $('#part_category').find(':selected').val();
            var data = $("#part_name").val(partname+part_category);
        });
    </script>
@endsection
