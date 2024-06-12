@extends('admin.layout.admin')
@section('css')
    {{-- <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    <style>
        .select2-container .select2-dropdown {
            position: relative;
            top: -40px !important;
            width: 290px !important;
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
            height: 35px;
        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Rejection Disposition</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Rejection Disposition</a></li>
                        <li class="breadcrumb-item active">Add Rejection Disposition</li>
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
                                        <h2 class="card-title-lg">Add Rejection Disposition
                                        <a href="{{ route('mpi_production.index') }}" class="btn btn-primary"
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

                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif



                                    {!! Form::open(['route' => 'rejection_disposition.store', 'method' => 'POST']) !!}
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group m-3">
                                                <strong>Date :</strong>
                                                {!! Form::date('date', Session::get('default_login_date'), ['class' => 'form-control','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group m-3">
                                                <strong>Batch Number :</strong>
                                                <select name="batch_number_id" class="form-control mySelect2"
                                                    id="batch_number_id" required>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group m-3">
                                                <strong>Part Name :</strong>
                                                {!! Form::text('part_name', null, [
                                                    
                                                    'class' => 'form-control',
                                                    'id' => 'part_name','required','tabindex="-1" onclick="return false" readonly'
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group m-3">
                                                <strong>Customer :</strong>
                                                {!! Form::text('customer', null, [
                                                    
                                                    'class' => 'form-control',
                                                    'id' => 'customer_name','tabindex="-1" onclick="return false" readonly'
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group m-3">
                                                <strong>Incharge Name :</strong>
                                                <select name="incharge_name" class="form-control mySelect2" required>
                                                    <option value="">--Select Incharge --</option>
                                                    @foreach ($incharge as $value)
                                                        <option value="{{ $value->full_name }}">
                                                            {{ $value->full_name }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group m-3">
                                                <strong>FR :</strong>
                                                {!! Form::text('fr', null, ['class' => 'form-control total','required',"onKeyPress"=>"isNumber(event)",'maxlength'=>'7']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group m-3">
                                                <strong>FR AM :</strong>
                                                {!! Form::text('fr_am', null, ['class' => 'form-control total','required',"onKeyPress"=>"isNumber(event)",'maxlength'=>'7']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group m-3">
                                                <strong>PMR :</strong>
                                                {!! Form::text('pmr', null, ['class' => 'form-control total','required',"onKeyPress"=>"isNumber(event)",'maxlength'=>'7']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group m-3">
                                                <strong>Total :</strong>
                                                {!! Form::text('total', null, ['class' => 'form-control','required',"onKeyPress"=>"if(this.value.length==7) return false;" ,'id'=>'final_total','readonly'=>'readonly']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4">
                                            <div class="form-group m-3">
                                                <strong>Remarks :</strong>
                                                {!! Form::text('remarks', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                             <button type="submit" class="btn btn-primary" style="margin-right: 50px;" id="form_submit" data-toggle="tooltip" title="Ctrl+S to save!"><b>Submit</b></button>
                                            <a href="{{ route('rejection_disposition.index') }}"><button type="button"
                                                    class="btn btn-danger"><b>Cancel</b></button></a>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
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
    {{-- <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.mySelect2').select2({
            placeholder: "--Select Option-- ",
            selectOnClose: true
        });

        $(document).on('change', '#batch_number_id', function() {
            var data = $(this).select2('data')[0];
            var partname = data.attr1;
            var customer = data.attr2;

            $("#part_name").val(partname);
            $("#customer_name").val(customer);
        });
        $(document).on("input", ".total", function(evt) {

            var sum = 0.00;
            $(".total").each(function() {
                sum += parseFloat($(this).val());
            });
            
            if(sum > 0){
                $('#final_total').val((Math.round(sum * 100) / 100).toFixed(2));
            } else {
                $('#final_total').val(0.00);
            }
        });
        function isNumber(event,val) {
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        }
        $(document).ready(function() {
            initAjaxSelect2($("#batch_number_id"), "{{ URL::to('/refrence_blno_id_from_bl_no_select2_source') }}");
        });

        
    </script>
@endsection
