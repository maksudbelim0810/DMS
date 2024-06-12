@extends('admin.layout.admin')
@section('css')
    {{-- <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    <style>
        .select2-container .select2-dropdown {
            position: relative;
            top: -40px !important;
            width: 239px !important;
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
            height: 37px;
        }
    </style>

@endsection
@section('content')
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
                                        <h2 class="card-title-lg">Add Dispatch Advice
                                        <a href="{{ route('dispatch_advice.index') }}" class="btn btn-primary"
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
                                    {!! Form::open(['route' => 'dispatch_advice.store', 'method' => 'POST']) !!}

                                    <div class="row">
                                        <div class="col-md-2" style="padding-left: 0px;">
                                            <div class="form-group">
                                                <strong>Date</strong>
                                                <div class="input-group mb-3">
                                                    <input type="date" min="1900-01-01" max="2500-01-01" class="form-control" name="date" value="{{ Session::get('default_login_date') }}"
                                                        id="date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Batch No</strong>
                                                <div class="input-group mb-3">
                                                    <select name="batch_no" class="form-control mySelect2"
                                                    id="batch_no" required>
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Part Name</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="part_name"
                                                        id="part_name" tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Customer</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="customer"
                                                        id="customer" tabindex="-1" onclick="return false" readonly> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Incharge Name</strong>
                                                <div class="input-group mb-3">
                                                    <select name="incharge_name" id="incharge_name" class="form-control mySelect2" required>
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
                                    <div class="row">
                                        <div class="col-md-1" style="padding-left: 0px;">
                                            <div class="form-group">
                                                <strong>Dis Adv</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" class="form-control" name="dispatch_advice_no"
                                                        id="dispatch_advice_no" tabindex="-1" onclick="return false" readonly value="{{$new_dispatch_advice_no}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Advice Date</strong>
                                                <div class="input-group mb-3">
                                                    <input type="date" min="1900-01-01" max="2500-01-01" class="form-control" name="advice_date" value="{{ Session::get('default_login_date') }}"
                                                        id="advice_date">
                                                </div>
                                            </div>
                                        </div>
                                    <!--    <div class="col-md-2">-->
                                    <!--        <div class="form-group">-->
                                    <!--            <strong>Invoice No</strong>-->
                                    <!--            <div class="input-group mb-3">-->
                                    <!--                <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control" name="invoice_no"-->
                                    <!--                    id="invoice_no">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->

                                    <!--</div>-->

                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-2">-->
                                    <!--        <div class="form-group">-->
                                    <!--            <strong>Invoice Date</strong>-->
                                    <!--            <div class="input-group mb-3">-->
                                    <!--                <input type="date" min="1900-01-01" max="2500-01-01" class="form-control" name="invoice_date"-->
                                    <!--                    id="invoice_date">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Drg Rev Edit No Date</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="drg_rev_edit_no_date"
                                                        id="drg_rev_edit_no_date">
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-2">-->
                                        <!--    <div class="form-group">-->
                                        <!--        <strong>Batch Total Qty</strong>-->
                                        <!--        <div class="input-group mb-3">-->
                                        <!--            <input type="text" class="form-control" name="batch_total_qty"-->
                                        <!--                id="batch_total_qty">-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    <!--    <div class="col-md-2">-->
                                    <!--        <div class="form-group">-->
                                    <!--            <strong>F.Rejection</strong>-->
                                    <!--            <div class="input-group mb-3">-->
                                    <!--                <input type="text" class="form-control" name="f_rejection"-->
                                    <!--                    id="f_rejection">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->

                                    <!--</div>-->
                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-2">-->
                                    <!--        <div class="form-group">-->
                                    <!--            <strong>T.Rejection</strong>-->
                                    <!--            <div class="input-group mb-3">-->
                                    <!--                <input type="text" class="form-control" name="t_rejection"-->
                                    <!--                    id="t_rejection">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>OK Qty</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control section2" name="ok_qty"
                                                        id="ok_qty" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>AMFR</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control section2" name="amfr"
                                                        id="amfr">
                                                </div>
                                            </div>
                                        </div>
                                    <!--    <div class="col-md-2">-->
                                    <!--        <div class="form-group">-->
                                    <!--            <strong>Total Mc No</strong>-->
                                    <!--            <div class="input-group mb-3">-->
                                    <!--                <input type="text" class="form-control" name="total_mc_no"-->
                                    <!--                    id="total_mc_no">-->
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--    </div>-->

                                    <!--</div>-->
                                    <!--<div class="row">-->
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>TR</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control section2" name="tr"
                                                        id="tr">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>FR</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control section2" name="fr"
                                                        id="fr">
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="col-md-2">-->
                                        <!--    <div class="form-group">-->
                                        <!--        <strong>PMR</strong>-->
                                        <!--        <div class="input-group mb-3">-->
                                        <!--            <input type="text" class="form-control section2" name="pmr"-->
                                        <!--                id="pmr">-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Total Qty</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control total1" name="total_qty"
                                                        id="total_qty" tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="add_block">
                                        <div class="row">
                                            <div class="col-md-1" style="padding-left: 0px;">
                                                <div class="form-group">
                                                    <strong>Sr.No</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control number user_field"
                                                            name="sr_no[]" value="1" id="sr_no" data-row="1" tabindex="-1" onclick="return false" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <strong>Box Quantity</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control total_nos user_field"
                                                            name="box_quantity[]" id="box_quantity_1" data-row="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <strong>Nos.Per Box</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control total_nos user_field"
                                                            name="nos_per_box[]" id="nos_per_box_1" data-row="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <strong>Total Nos</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control final_total_nos total_weight user_field"
                                                            name="total_nos[]" id="total_nos_1" data-row="1" tabindex="-1" onclick="return false" readonly> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <strong>Weight Per Nos(Kg)</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" step="0.01" onKeyPress="if(this.value.length==5) return false;" step="0.01" class="form-control total_weight user_field"
                                                            name="weight_per_nos[]" id="weight_per_nos_1" data-row="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <strong>Total Weight</strong>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" onKeyPress="if(this.value.length==5) return false;" class="form-control g_total_weight section1 user_field"
                                                            name="total_weight[]" id="total_weight_1" data-row="1" tabindex="-1" onclick="return false" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <div class="input-group mt-3">
                                                        <button class="btn btn-success elementCopys" type="button"><i
                                                                class="glyphicon glyphicon-plus"></i>Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <strong>Total Weight of Empty Boxes</strong>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control g_total_weight empty_total"
                                                    name="total_weight_of_empty_boxs" id="total_weight_of_empty_boxs">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <strong>Total Weight</strong>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control total"
                                                    name="grand_total_weight" id="grand_total_weight" tabindex="-1" onclick="return false" readonly>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <strong>Remark</strong>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="remarks"
                                                id="remarks">
                                            </div>
                                        </div>

                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong style="float: right"></strong>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="remarks"
                                                    id="remarks">
                                            </div>
                                        </div>
                                        <div class="col-md-1">

                                        </div>

                                    </div> --}}
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
                                    <a href="{{ route('dispatch_advice.index') }}"><button type="button"
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
    <div class="copy_block d-none">
        <div class="row control-group newEliment">
            <div class="col-md-1" style="padding-left: 0px;">
                <div class="form-group">
                    <div class="input-group mb-3">
                            <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control number user_field total_nos"
                                name="sr_no[]" id="sr_no"
                                value="" tabindex="-1" onclick="return false" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control user_field total_nos"
                            name="box_quantity[]" id="box_quantity"
                            value="">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control user_field"
                            name="nos_per_box[]" id="nos_per_box"
                            value="">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control user_field total_weight final_total_nos"
                            name="total_nos[]" id="total_nos"
                            value="">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control total_weight  user_field"
                            name="weight_per_nos[]" id="weight_per_nos"
                            value="">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control section1 total_weight user_field"
                            name="total_weight[]" id="total_weight"
                            value="">
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <button class="btn btn-danger elementRemove" type="button"><i
                                class="glyphicon glyphicon-remove"></i> Remove</button>
                    </div>
                </div>
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
            placeholder: "--Select Incharge-- ",
            selectOnClose: true
        });
        $(document).on('change', '#ok_qty', function() {
            var data = $('#batch_no').select2('data')[0];
            var batch_qty = data.attr4;
            // alert(batch_qty);
            var ok_qty = $("input[name='ok_qty']").val();
            if (ok_qty != 0) {
                // if (batch_qty < ok_qty) {
                //     Swal.fire('OK Qty not greater than Batch Qty');
                //     $("#ok_qty").val('');
                //     return false;
                // }
                $("#ok_qty").val(ok_qty);
            }
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
        $(document).on("keyup", ".section1", function() {
            var sum = 0;
            $(".section1").each(function() {
                sum += +$(this).val();
                $(".total").val(sum);
            });
        });
        $(document).on("keyup", ".section2", function() {
            var sum = 0;
            $(".section2").each(function() {
                sum += +$(this).val();
                $(".total1").val(sum);
            });
            var data = $('#batch_no').select2('data')[0];
            var batch_qty = data.attr4;
            var total_qty = $("input[name='total_qty']").val();
            if (total_qty != 0) {
                // if (batch_qty < total_qty) {
                //     Swal.fire('Total Qty not greater than Batch Qty');
                //     $("#total_qty").val('');
                //     return false;
                // }
                $("#total_qty").val(total_qty);
            }
        });
        //  $(document).on('change', '#total_qty', function() {
            
        // });

        $(document).on("keyup", ".user_field", function() {
            $('.user_field').blur(function() {
                var count = $('.user_field').not(function() {
                    return this.value;
                }).length;
                // $(".empty_total").val(count);
                // alert(count);
            });
        });
        $(document).on("keyup", ".total_nos", function() {
            var data_row=$(this).data('row');
           
            var box_quantity = $( "#box_quantity_"+data_row).val();
            var nos_per_box = $( "#nos_per_box_"+data_row ).val();
            $( "#total_nos_"+data_row ).val(box_quantity * nos_per_box); 
        });
        $(document).on("keyup", ".total_weight", function() {
            var data_row=$(this).data('row');

            var box_quantity = $( "#total_nos_"+data_row ).val();
            var nos_per_box = $( "#weight_per_nos_"+data_row ).val();
            $( "#total_weight_"+data_row).val(box_quantity * nos_per_box); 
        });
        $(document).on("keyup", ".g_total_weight", function() {
           
            var numItems = $('.newEliment').length;

            var e_total_w = $( "#total_weight_of_empty_boxs").val();
            var final_total_weight=0;
            for (let index = 1; index <= numItems; index++) {

                var total_w = $( "#total_weight_"+index).val();
                final_total_weight+=parseInt(total_w);
            }
            $( "#grand_total_weight" ).val(parseInt(final_total_weight) + parseInt(e_total_w)); 
        });
        
        $(document).on("click", ".elementCopys", function () {
            // $(".add_block").append($(".copy_block").html());
            add_more()
        });
        
        $(document).on("click", ".elementRemove", function () {
            $(this).parent().parent().parent().parent().remove();
        });
        
        function add_more(){
            var numItems = $('.newEliment').length;
            num_row = numItems + 1;
            var html = '';
            html += '<div class="newEliment row control-group" id="div_block_'+num_row+'">';
                html += '<div class="col-md-1" style="padding-left: 0px;">';
                    html += '<div class="form-group">';
                        html += '<div class="input-group mb-3">';
                            html += '<input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==5) return false;" class="form-control number user_field" data-row="'+num_row+'" name="sr_no[]" id="sr_no_'+num_row+'" value="'+num_row+'" tabindex="-1" onclick="return false" readonly>';
                        html += '</div>';
                    html += '</div>';
                html += '</div>';
    
                html += '<div class="col-md-2">';
                    html += '<div class="form-group">';
                        html += '<div class="input-group mb-3">';
                            html += '<input type="text" class="form-control total_nos user_field" name="box_quantity[]" data-row="'+num_row+'" id="box_quantity_'+num_row+'" value="">';
                        html += '</div>';
                    html += '</div>';
                html += '</div>';
    
                html += '<div class="col-md-2">';
                    html += '<div class="form-group">';
                        html += '<div class="input-group mb-3">';
                            html += '<input type="text" class="form-control total_nos user_field" name="nos_per_box[]" data-row="'+num_row+'" id="nos_per_box_'+num_row+'" value="">';
                        html += '</div>';
                    html += '</div>';
                html += '</div>';
    
                html += '<div class="col-md-2">';
                    html += '<div class="form-group">';
                        html += '<div class="input-group mb-3">';
                            html += '<input type="text" class="form-control total_weight  user_field" name="total_nos[]" data-row="'+num_row+'" id="total_nos_'+num_row+'" value="" tabindex="-1" onclick="return false" readonly>';
                        html += '</div>';
                    html += '</div>';
                html += '</div>';
    
                html += '<div class="col-md-2">';
                    html += '<div class="form-group">';
                        html += '<div class="input-group mb-3">';
                            html += '<input type="text" class="form-control total_weight  user_field" name="weight_per_nos[]" data-row="'+num_row+'" id="weight_per_nos_'+num_row+'" value="">';
                        html += '</div>';
                    html += '</div>';
                html += '</div>';
    
                html += '<div class="col-md-2">';
                    html += '<div class="form-group">';
                        html += '<div class="input-group mb-3">';
                            html += '<input type="text" class="form-control g_total_weight section1 user_field" name="total_weight[]" data-row="'+num_row+'" id="total_weight_'+num_row+'" value="" tabindex="-1" onclick="return false" readonly>';
                        html += '</div>';
                    html += '</div>';
                html += '</div>';
    
                html += '<div class="col-md-1">';
                    html += '<div class="form-group">';
                        html += '<div class="input-group mb-3">';
                            html += '<button class="btn btn-danger elementRemove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>';
                        html += '</div>';
                    html += '</div>';
                html += '</div>';
            html += '</div>';
    
            $(".add_block").append(html);
        }
        
    </script>
@endsection