@extends('admin.layout.admin')
@section('css')
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" /> --}}
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container .select2-dropdown {
            position: relative;
            top: -40px !important;
            width: 270px !important;
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
            <h4 class="mb-sm-0">MPI Production</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">MPI Production</li>
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
                                <h4 class="card-title">MPI Production Details
                                    @can('mpi_production-create')
                                        <a href="{{ route('mpi_production.create') }}" class="btn btn-primary redirect_page" data-toggle="tooltip" title="Ctrl+A to New Entry!"
                                            style="float: right;" data-href="{{ route('mpi_production.create') }}">
                                            + Add MPI Production
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
                                    </div>
    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Mc No:</strong>
                                            <div class="input-group">
                                                <select name="mc_no" class="form-control mySelect2" required>
                                                    <option value=""></option>
                                                    @foreach ($mc_no as $value)
                                                        <option value="{{ $value->machine_number }}"
                                                            @if ($value->machine_number == $data['mc_no']) selected @endif>
                                                            {{ $value->machine_number }}
    
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Operator Name:</strong>
                                            <div class="input-group">
                                                <select name="operator_name" class="form-control1 mySelect2" id="operator_name"
                                                    required>
                                                    <option value=""></option>
                                                    @foreach ($operator_name as $value)
                                                        <option value="{{ $value->full_name }}">
                                                            {{ $value->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Shift</strong>
                                            <div class="input-group mb-3">
                                                <select name="shift" class="form-control mySelect2" id="shift"
                                                    required>
                                                    <option value=""></option>
                                                    @foreach ($shift as $value)
                                                        <option value="{{ $value->shift_name }}"
                                                            @if ($value->shift_name == $data['shift']) selected @endif>
                                                            {{ $value->shift_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Inspected Qty:</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" min="0"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;"
                                                    class="form-control ok_qty" name="inspected_qty" id="inspected_qty"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Rejection Qty:</strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control ok_qty" name="rejected_qty"
                                                id="rejected_qty" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>OK Qty:</strong>
                                            <div class="input-group">
                                                <input type="number" min="0" value="{{ $data['ok_qty'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;"
                                                    class="form-control section2" name="ok_qty" id="ok_qty">
                                            </div>
                                        </div>
                                    </div> --}}
    
                                </div>
                                <div class="row mt-2 mb-2">
                                    <div class="col-md-12">
                                        <input style="float: left; margin-right:20px" class="btn btn-primary filter_save_btn pull-right"
                                            id="FilerBtnAjax" type="button" value="Run" autocomplete="off">
                                        <a style="float: left;margin-left: 5px;" href="{{ route('mpi_production.index') }}"
                                            class="btn btn-danger pull-right mr-2">Reset</a>
                                            {{-- <button  style="float: right;" name="pdf" class="btn btn-success" id="pdf" value="pdf" type="submit">PDF</button> --}}
                                    </div>
                                </div>
                                {{ Form::close() }}

                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Machine No</th>
                                        <th>Batch No</th>
                                        <th>Part Name & No</th>
                                        <th>Customer Name</th>
                                        <th>Insp Qty</th>
                                        <th>Rej Qty</th>
                                        <th>OK Qty</th>
                                        <th>Inspector</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($mpi_production as $key => $item)
                                        <td class="text-center">{{ ++$i }}</td>
                                        <td>{{ date('d/m/Y',strtotime($item->date) )}}</td>
                                        <td>{{ $item->mc_no }}</td>
                                        <td>{{ $item->batch_number_id }}</td>
                                        <td>{{ $item->part_name }}</td>
                                        <td>{{ $item->customer }}</td>
                                        <td style="text-align-last: end;">{{ $item->inspected_qty }}</td>
                                        <td style="text-align-last: end;">{{ $item->rejected_qty }}</td>
                                        <td style="text-align-last: end;">{{ $item->ok_qty }}</td>
                                        <td>{{ $item->operator_name }}</td>
                                        <td class="text-center">
                                            @can('mpi_production-edit')
                                                <a class="btn btn-primary"
                                                    href="{{ route('mpi_production.edit', $item->id) }}">
                                                    <i class="bx bx-pencil" aria-hidden="true"></i>
                                                </a>
                                            @endcan
                                            @can('mpi_production-delete')
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['mpi_production.destroy', $item->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                <button type="submit" class="btn btn-danger" id="delete"><i class="bx bx-trash"
                                                        aria-hidden="true"></i></button>
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>No Data Available</td>
                                        </tr>
                                    @endforelse
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $mpi_production->withQueryString()->links() !!}
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