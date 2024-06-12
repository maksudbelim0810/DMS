@extends('admin.layout.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dispatch Advice</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dispatch Advice</a></li>
                        <li class="breadcrumb-item active">Dispatch Advice</li>
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
                                        <h2 class="card-title-lg">Edit Dispatch Advice
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
                                    {!! Form::model($dispatch_advice, [
                                        'method' => 'PATCH',
                                        'route' => ['dispatch_advice.update', $dispatch_advice->id],
                                    ]) !!}

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Date</strong>
                                                <div class="input-group mb-3">
                                                    <input type="date" min="1900-01-01" max="2500-01-01" class="form-control" name="date" id="date"
                                                        value="{{ date('Y-m-d',strtotime($dispatch_advice->date))}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Batch No</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="batch_no"
                                                        id="batch_no" value="{{ $dispatch_advice->batch_no }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Part Name</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="part_name"
                                                        id="part_name" value="{{ $dispatch_advice->part_name }}" tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Customer</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="customer"
                                                        id="customer" value="{{ $dispatch_advice->customer }}" tabindex="-1" onclick="return false" readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Incharge Name</strong>
                                                <div class="input-group mb-3">
                                                    <select name="incharge_name" id="incharge_name" class="form-control">
                                                        <option value="">--Select Option--</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Dispatch Advice No</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="dispatch_advice_no"
                                                        id="dispatch_advice_no"
                                                        value="{{ $dispatch_advice->dispatch_advice_no }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Advice Date</strong>
                                                <div class="input-group mb-3">
                                                    <input type="date" min="1900-01-01" max="2500-01-01" class="form-control" name="advice_date"
                                                        id="advice_date" value="{{ $dispatch_advice->advice_date }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Invoice No</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="invoice_no"
                                                        id="invoice_no" value="{{ $dispatch_advice->invoice_no }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Invoice Date</strong>
                                                <div class="input-group mb-3">
                                                    <input type="date" min="1900-01-01" max="2500-01-01" class="form-control" name="invoice_date"
                                                        id="invoice_date" value="{{ $dispatch_advice->invoice_date }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Drg Rev Edit No Date</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        name="drg_rev_edit_no_date" id="drg_rev_edit_no_date"
                                                        value="{{ $dispatch_advice->drg_rev_edit_no_date }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Batch Total Qty</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="batch_total_qty"
                                                        id="batch_total_qty"
                                                        value="{{ $dispatch_advice->batch_total_qty }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>F.Rejection</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="f_rejection"
                                                        id="f_rejection" value="{{ $dispatch_advice->f_rejection }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>T.Rejection</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="t_rejection"
                                                        id="t_rejection" value="{{ $dispatch_advice->t_rejection }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>OK Qty</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="ok_qty"
                                                        id="ok_qty" value="{{ $dispatch_advice->ok_qty }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>AMFR</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control section2" name="amfr"
                                                        id="amfr" value="{{ $dispatch_advice->amfr }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Total Mc No</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="total_mc_no"
                                                        id="total_mc_no" value="{{ $dispatch_advice->total_mc_no }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>TR</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control section2" name="tr"
                                                        id="tr" value="{{ $dispatch_advice->tr }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>FR</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control section2" name="fr"
                                                        id="fr" value="{{ $dispatch_advice->fr }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>PMR</strong>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control section2" name="pmr"
                                                        id="pmr" value="{{ $dispatch_advice->pmr }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <strong>Total Qty</strong>
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control total1" name="total_qty"
                                                        id="total_qty" value="{{ $dispatch_advice->total_qty }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row control-group increment">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <strong>Sr.No</strong>
                                                @foreach(json_decode($dispatch_advice->sr_no)  as  $key=>$no)
                                                @if($key == 0)
                                                <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control number user_field"
                                                            name="sr_no[]" id="sr_no"
                                                            value="{{$no}}">
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Box Quantity</strong>
                                                @foreach(json_decode($dispatch_advice->box_quantity)  as $key=>$box_quantity)
                                                @if($key == 0)
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control user_field"
                                                        name="box_quantity[]" id="box_quantity"
                                                        value="{{ $box_quantity }}">
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Nos.Per Box</strong>
                                                @foreach(json_decode($dispatch_advice->nos_per_box)  as $key=>$nos_per_box)
                                                @if($key == 0)
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control user_field"
                                                        name="nos_per_box[]" id="nos_per_box"
                                                        value="{{ $nos_per_box }}">
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Total Nos</strong>
                                                @foreach(json_decode($dispatch_advice->total_nos)  as $key=>$total_nos)
                                                @if($key == 0)
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control user_field"
                                                        name="total_nos[]" id="total_nos"
                                                        value="{{ $total_nos }}">
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Weight Per Nos</strong>
                                                @foreach(json_decode($dispatch_advice->weight_per_nos)  as $key=>$weight_per_nos)
                                                @if($key == 0)
                                                <div class="input-group mb-3">
                                                    <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control user_field"
                                                        name="weight_per_nos[]" id="weight_per_nos"
                                                        value="{{ $weight_per_nos }}">
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <strong>Total Weight</strong>
                                                @foreach(json_decode($dispatch_advice->total_weight)  as $key=>$total_weight)
                                                @if($key == 0)
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control section1 user_field"
                                                        name="total_weight[]" id="total_weight"
                                                        value="{{ $total_weight }}">
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <div class="input-group mt-3">
                                                    <button class="btn btn-success" type="button"><i
                                                            class="glyphicon glyphicon-plus"></i>Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clone hide">
                                        <div class="row control-group">
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    @foreach(json_decode($dispatch_advice->sr_no)  as $key=>$no)
                                                    @if($key > 0)
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control number user_field"
                                                            name="sr_no[]" id="sr_no"
                                                            value="{{$no}}">
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    @foreach(json_decode($dispatch_advice->box_quantity)  as $key=>$box_quantity)
                                                    @if($key > 0)
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control user_field"
                                                            name="box_quantity[]" id="box_quantity"
                                                            value="{{ $box_quantity }}">
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    @foreach(json_decode($dispatch_advice->nos_per_box)  as $key=>$nos_per_box)
                                                    @if($key > 0)
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control user_field"
                                                            name="nos_per_box[]" id="nos_per_box"
                                                            value="{{ $nos_per_box }}">
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    @foreach(json_decode($dispatch_advice->total_nos)  as $key=>$total_nos)
                                                    @if($key > 0)
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control user_field"
                                                            name="total_nos[]" id="total_nos"
                                                            value="{{ $total_nos }}">
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    @foreach(json_decode($dispatch_advice->weight_per_nos)  as $key=>$weight_per_nos)
                                                    @if($key > 0)
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control user_field"
                                                            name="weight_per_nos[]" id="weight_per_nos"
                                                            value="{{ $weight_per_nos }}">
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    @foreach(json_decode($dispatch_advice->total_weight)  as $key=>$total_weight)
                                                    @if($key > 0)
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control section1 user_field"
                                                            name="total_weight[]" id="total_weight"
                                                            value="{{ $total_weight }}">
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <button class="btn btn-danger" type="button"><i
                                                                class="glyphicon glyphicon-remove"></i> Remove</button>
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
                                                <input type="text" class="form-control empty_total"
                                                    name="total_weight_of_empty_boxs" id="total_weight_of_empty_boxs"
                                                    value="{{ $dispatch_advice->total_weight_of_empty_boxs }}" disabled>
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
                                                    name="grand_total_weight" id="grand_total_weight"
                                                    value="{{ $dispatch_advice->grand_total_weight }}" disabled>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2 mt-2">
                                            <strong style="float: right">Remark</strong>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="remarks" id="remarks"
                                                    value="{{ $dispatch_advice->remarks }}">
                                            </div>
                                        </div>
                                        <div class="col-md-1">

                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                     <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                    <a href="{{ route('dispatch_advice.index') }}"><button type="button"
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
    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });
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
        });

        $(document).on("keyup", ".user_field", function() {
            $('.user_field').blur(function() {
                var count = $('.user_field').not(function() {
                    return this.value;
                }).length;
                $(".empty_total").val(count);
            });
        });
    </script>
@endsection
