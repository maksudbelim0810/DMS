@extends('admin.layout.admin')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" />
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
                                        <h2 class="card-title-lg">Add Batch Master
                                            <a href="{{ route('batch_number.index') }}" class="btn btn-primary"
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

                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger" style="padding-bottom: 0px;">
                                            <ul style="font-size: large;">
                                                @foreach ($errors->all() as $error)
                                                    <li> <b>{{ $error }}</b> </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif



                                    {!! Form::open(['route' => 'batch_number.store', 'method' => 'POST']) !!}
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Batch Name:</strong>
                                                {!! Form::text('batch_name', old('batch_name'), ['placeholder' => 'Batch Name', 'class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Part Name :</strong>
                                                <select name="part_name" id="part_name" class="form-control mySelect2" required>
                                                    <option value="">--Select Part Name--</option>
                                                    @foreach ($part_category as $value)
                                                        <option value="{{ $value->part_name }}"
                                                            {{ old('part_name') == $value->part_name ? 'selected' : '' }}
                                                        data-customer="{{$value->customer_name}}"
                                                        data-part_type="{{$value->part_type_category}}">
                                                            {{ $value->part_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Customer Name :</strong>
                                                <input type="text" value="{{ old('customer_name')}}" class="form-control" name="customer_name" id="customer_name" tabindex="-1" onclick="return false" readonly>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Part Type Category :</strong>
                                                <input type="text" value="{{ old('part_type_category')}}" class="form-control" name="part_type_category" id="part_type_category" tabindex="-1" onclick="return false" readonly>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Batch Start Date:</strong>
                                                {!! Form::date('batch_start_date', null, ['class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Batch Comp Date:</strong>
                                                {!! Form::date('batch_comp_date', null, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group m-3">
                                                <strong>Batch Qty:</strong>
                                                {!! Form::text('batch_qty', null, ['placeholder' => 'Batch Qty', 'class' => 'form-control', 'required']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" style="margin-right: 50px;" style="margin-right: 50px;" id="form_submit"><b>Submit</b></button>
                                        <a href="{{ route('batch_number.index') }}"><button type="button"
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

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.mySelect2').select2({
            placeholder: "--Select Option-- ",
            selectOnClose: true
        });
        
        $(document).on('change', '#part_name', function() {
           
            var partname = $(this).find(':selected').data('part_type');
            var customer =$(this).find(':selected').data('customer') ;

            $("#part_type_category").val(partname);
            $("#customer_name").val(customer);
        });
    </script>
@endsection
