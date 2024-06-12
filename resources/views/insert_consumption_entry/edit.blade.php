@extends('admin.layout.admin')
@section('css')
{{-- <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" /> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
<style>
    .select2-container .select2-dropdown {
        position: relative;
        top: -40px !important;
        width: 230px !important;
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
        height: 39px;
    }
</style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Insert Consumption Entry</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Insert Consumption Entry</a></li>
                        <li class="breadcrumb-item active">Insert Consumption Entry</li>
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
                                        <h2 class="card-title-lg">Edit Insert Consumption Entry</h2>
                                        <a href="{{ route('insert_consumption_entry.index') }}" class="btn btn-primary"
                                            style="float: right;">
                                            Back
                                        </a>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <div class="card-body">
                                <div class="tab-pane fade show active p-3 pt-3" id="LogIn_Tab" role="tabpanel">
                                    {!! Form::model($insert_consumption_entry, [
                                        'method' => 'PATCH',
                                        'route' => ['insert_consumption_entry.update', $insert_consumption_entry->id],
                                    ]) !!}


                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Batch No:</strong>
                                                <div class="input-group mb-3">
                                                    <select name="batch_no" class="form-control mySelect2" id="batch_no" required>
                                                        <option value="{{$insert_consumption_entry->batch_no}}" data-batch_qty="{{$insert_consumption_entry->batch_number->batch_qty}}">{{$insert_consumption_entry->batch_no}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Customer Name</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="customer_name"
                                                        value="{{ $insert_consumption_entry->customer_name }}"
                                                        id="customer_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Part Type Category</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="part_type_category"
                                                        value="{{ $insert_consumption_entry->part_type_category }}" id="part_type_category">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Part Name</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="part_name"
                                                        value="{{ $insert_consumption_entry->part_name }}" id="part_name">
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Mc No:</strong>
                                                <div class="input-group mb-3">
                                                    <select name="mc_no" class="form-control mySelect2" required>
                                                         
                                                        @foreach ($mc_no as $value)
                                                            <option value="{{ $value->machine_number }}"
                                                                @if ($value->machine_number == $insert_consumption_entry->mc_no) selected @endif>
                                                                {{ $value->machine_number }}

                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Opration Name</strong>
                                                <div class="input-group mb-3">
                                                    <select name="opration_name" class="form-control mySelect2" required>
                                                         
                                                        @foreach ($opration_name as $value)
                                                            <option value="{{ $value->machine_opration }}"
                                                                @if ($value->machine_opration == $insert_consumption_entry->opration_name) selected @endif>
                                                                {{ $value->machine_opration }}

                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Insert Short Name</strong>
                                                <div class="input-group mb-3">
                                                    <select name="insert_short_name" class="form-control mySelect2" id="insert_short_name" required>
                                                        <option value="">--Select Short Name--</option>
                                                        @foreach ($insert_short as $value)
                                                            <option value="{{ $value->short_name }}"
                                                                @if ($value->short_name == $insert_consumption_entry->insert_short_name) selected @endif
                                                                data-insertname="{{ $value->name }}"
                                                                data-insertrate="{{ $value->rate }}">
                                                                {{ $value->short_name }}

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
                                                    <input type="date" min="1900-01-01" max="2500-01-01" class="form-control" name="date"
                                                        value="{{date('Y-m-d', strtotime($insert_consumption_entry->date)) }}" id="date" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Insert Name</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="insert_name"
                                                        value="{{ $insert_consumption_entry->insert_name }}"
                                                        id="insert_name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Insert Rate Rs</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="insert_rate_rs" tabindex="-1" onclick="return false"
                                                        readonly value="{{ $insert_consumption_entry->insert_rate_rs }}"
                                                        id="insert_rate_rs" min="0" oninput="this.value = Math.abs(this.value)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Total Prod Qty</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control insert_cost" name="total_prod_qty"
                                                        value="{{ $insert_consumption_entry->total_prod_qty }}"
                                                        id="total_prod_qty" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==8) return false;" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Insert Use Qty</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control insert_cost" name="insert_use_qty"
                                                        value="{{ $insert_consumption_entry->insert_use_qty }}"
                                                        id="insert_use_qty" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==4) return false;" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Insert Cost / Nos</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="insert_cost_nos"
                                                        value="{{ $insert_consumption_entry->insert_cost_nos }}"
                                                        id="insert_cost_nos" onKeyPress="if(this.value.length==3) return false;" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                     <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                    <a href="{{ route('insert_consumption_entry.index') }}"><button type="button"
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
            var part_type = data.attr3;
            
            $("#part_name").val(partname);
            $("#part_type_category").val(part_type);
            $("#customer_name").val(customer);
        });
        $(document).ready(function() {
            initAjaxSelect($("#batch_no"), "{{ URL::to('/refrence_blno_id_from_bl_no_select2_source') }}");
        });

        function initAjaxSelect($selector, $source_url) {
            $selector.select2({

                placeholder: "--Select Option-- ",
                selectOnClose: true,
                width: "100%",
                allowClear: true,
                minimumInputLength: 0,
                //                tags: true,
                ajax: {
                    url: $source_url,
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.results,
                            pagination: {
                                more: (params.page * 5)
                            }
                        };
                    },
                    cache: true
                },
                templateSelection: function(data, container) {
                    $(data.element).attr('partname', data.attr1);
                    $(data.element).attr('customer', data.attr2);
                    $(data.element).attr('part_type', data.attr3);
                    return data.text;
                }
            });
        }

        $("#insert_short_name").on('change', function() {
            var name = $(this).find(':selected').data('insertname');
            var rate = $(this).find(':selected').data('insertrate');
            $("#insert_name").val(name);
            $("#insert_rate_rs").val(rate);
        });
        $(document).on("keyup", ".insert_cost", function() {
            var total = 0;
            var total_prod_qty = parseFloat($("input[name='total_prod_qty']").val());
            var insert_rate_rs = parseFloat($("input[name='insert_rate_rs']").val());
            var insert_use_qty = parseFloat($("input[name='insert_use_qty']").val());
            total = (insert_rate_rs * insert_use_qty)/total_prod_qty.toFixed(3);
            if ( isNaN(total) || total == '') {
                total = 0;
            }
            total=(Math.round(total * 100) / 100).toFixed(3);
            $("#insert_cost_nos").val(total);
        });
        $(document).on('change', '#total_prod_qty', function() {
            var batch_qty = $('#batch_no').find(':selected').data('batch_qty');
            var total_prod_qty = $("input[name='total_prod_qty']").val();
            if (total_prod_qty != 0) {
                // if (batch_qty < total_prod_qty) {
                //     Swal.fire('Total Prod Qty not greater than Batch Qty');
                //     $("#total_prod_qty").val('');
                //     return false;
                // }
                $("#total_prod_qty").val(total_prod_qty);
            }
        });
    </script>
@endsection

