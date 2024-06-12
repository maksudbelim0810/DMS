@extends('admin.layout.admin')
@section('css')
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" /> --}}
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container .select2-dropdown {
            position: relative;
            top: -40px !important;
            width: 265px !important;
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
    </style>
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="margin-bottom: 49px;
        margin-top: -38px;
        height: 56px;">
            <p style="font-size: large;"><b>{{ $message }}</b> </p>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row">
                    <div class="col-md-12">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-header">
                                <h4 class="card-title">Rejection Disposition Details
                                    @can('rejection_disposition-create')
                                        <a href="{{ route('rejection_disposition.create') }}"
                                            class="btn btn-primary redirect_page" data-toggle="tooltip"
                                            title="Ctrl+A to New Entry!" data-href="{{ route('rejection_disposition.create') }}"
                                            style="float: right;">
                                            + Add Rejection Disposition
                                        </a>
                                    </h4>
                                @endcan
                            </div>
                            <div class="card-body">
                                {{ Form::open(['id' => 'filter_frm', 'method' => 'get', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) }}
                                <div class="row">
    
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <strong>Batch No:</strong>
                                            
                                            <select name="batch_no" class="form-control mySelect2 search_submit" id="batch_no">
                                                <option value="{{ $data['batch_no'] }}">{{ $data['batch_no'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Start Date:</strong>
                                            <input type="date" name="start_date" id="start_date" class="form-control"
                                                value="{{ $data['start_date'] }}">
    
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>End Date:</strong>
                                            <input type="date" name="end_date" id="end_date" class="form-control"
                                                value="{{ $data['end_date'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Part Name :</strong>
                                            {!! Form::text('part_name', $data['part_name'], [
                                                'class' => 'form-control',
                                                'id' => 'part_name',
                                                'required',
                                                'tabindex="-1" onclick="return false" ',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Customer :</strong>
                                            {!! Form::text('customer', $data['customer'], [
                                                'class' => 'form-control',
                                                'id' => 'customer_name',
                                                'tabindex="-1" onclick="return false" ',
                                            ]) !!}
                                        </div>
                                    </div> --}}
    
                                </div>
                                <div class="row mt-2 mb-2">
                                    <div class="col-md-12">
                                        <input style="float: left; margin-right:20px"
                                            class="btn btn-primary filter_save_btn pull-right" id="FilerBtnAjax"
                                            type="button" value="Run" autocomplete="off">
                                        <a style="float: left;margin-left: 5px;"
                                            href="{{ route('rejection_disposition.index') }}"
                                            class="btn btn-danger pull-right mr-2">Reset</a>
                                        {{-- <button style="float: right;" name="pdf" class="btn btn-success" id="pdf"
                                            value="pdf" type="submit">PDF</button> --}}
                                    </div>
                                </div>
                                {{ Form::close() }}

                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Batch No</th>
                                        <th>Part Name</th>
                                        <th>Customer</th>
                                        <th>FR</th>
                                        <th>FR AM</th>
                                        <th>PMR</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($rejection_disposition as $key => $RejectionDisposition)
                                        <td class="text-center">{{ ++$i }}</td>
                                        {{-- <td>{{ !empty($RejectionDisposition->BatchNumber->batch_name) ? $RejectionDisposition->BatchNumber->batch_name : '' }}
                                        </td> --}}
                                        <td>{{ date('d/m/Y', strtotime($RejectionDisposition->date)) }}</td>
                                        <td>{{ $RejectionDisposition->batch_number_id }}
                                        </td>
                                        <td>{{ $RejectionDisposition->part_name }}</td>
                                        <td>{{ $RejectionDisposition->customer }}</td>
                                        <td>{{ $RejectionDisposition->fr }}</td>
                                        <td>{{ $RejectionDisposition->fr_am }}</td>
                                        <td>{{ $RejectionDisposition->pmr }}</td>
                                        <td class="text-center">
                                            @can('rejection_disposition-edit')
                                                <a class="btn btn-primary"
                                                    href="{{ route('rejection_disposition.edit', $RejectionDisposition->id) }}">
                                                    <i class="bx bx-pencil" aria-hidden="true"></i>
                                                </a>
                                            @endcan
                                            @can('rejection_disposition-delete')
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['rejection_disposition.destroy', $RejectionDisposition->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                <button type="submit" class="btn btn-danger" id="delete"><i class="bx bx-trash"
                                                        aria-hidden="true"></i></button>
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $rejection_disposition->withQueryString()->links() !!}
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
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}

    <script type="text/javascript">
        $('.mySelect2').select2({
            placeholder:'--Select Option--',
            selectOnClose: true,
        });
        $(document).ready(function() {
            initAjaxSelect2($("#batch_no"), "{{ URL::to('/refrence_blno_id_from_bl_no_select2_source') }}");
        });
    </script>
@endsection
