@extends('admin.layout.admin')
@section('css')
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" /> --}}
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container .select2-dropdown {
            position: relative;
            top: -40px !important;
            width: 310px !important;
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
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Batch Master</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Batch Master</li>
                    </ol>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- end page title -->

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
                                <h4 class="card-title">Batch Master Details
                                    @can('batch_number-create')
                                        <a href="{{ route('batch_number.create') }}" class="btn btn-primary redirect_page" data-toggle="tooltip" title="Ctrl+A to New Entry!"
                                            style="float: right;" data-href="{{ route('batch_number.create') }}">
                                            + Add Batch Master
                                        </a>
                                    </h4>
                                @endcan
                                {{ Form::open(['id' => 'filter_frm', 'method' => 'get', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) }}
                                <div class="row">
                                   <div class="col-md-4 ">
                                        <div class="form-group">
                                            {{ Form::label('batch_no', 'Batch No', ['class' => 'control-label']) }}
                                            {{-- search_submit --}}
                                            <select name="batch_no" class="form-control mySelect2 " id="batch_no">
                                                <option value="{{ $data['batch_no'] }}">{{ $data['batch_no'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{ Form::label('start_date', 'Start Date', ['class' => 'control-label']) }}
                                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $data['start_date'] }}">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{ Form::label('end_date', 'End Date', ['class' => 'control-label']) }}
                                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $data['end_date'] }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-4">
                                        <input style="float: left; margin-right:20px"
                                            class="btn btn-primary filter_save_btn pull-right" id="FilerBtnAjax"
                                            type="button" value="Run" name="run" autocomplete="off">

                                        <a style="float: left;margin-left: 5px;"
                                            href="{{ route('batch_number.index') }}"
                                            class="btn btn-danger pull-right mr-2">Reset</a>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Batch Name</th>
                                        <th>Part Name & No</th>
                                        <th>Customer Name</th>
                                        <th>Batch Qty</th>
                                        <th>Batch Date</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($batch_data as $key => $batchNumber)
                                        <tr>
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td>{{ $batchNumber->batch_name }}</td>
                                            <td>{{ $batchNumber->part_name }}</td>
                                            <td>{{ $batchNumber->customer_name }}</td>
                                            <td style="text-align-last: end;">{{ $batchNumber->batch_qty }}</td>
                                            <td>{{date('d/m/Y', strtotime($batchNumber->batch_start_date) )  }}</td>
                                            <td class="text-center">
                                                @can('batch_number-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('batch_number.edit', $batchNumber->id) }}">
                                                        <i class="bx bx-pencil" aria-hidden="true"></i>
                                                    </a>
                                                @endcan
                                                @can('batch_number-delete')
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['batch_number.destroy', $batchNumber->id],
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
                                    {!! $data->withQueryString()->links() !!}
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