@extends('admin.layout.admin')
@section('css')
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" /> --}}
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container .select2-dropdown {
            position: relative;
            top: -40px !important;
            width: 255px !important;
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
                                <h4 class="card-title">Grade Sorting Report
                                    {{-- @can('grade_sorting_report-create') --}}
                                    <a href="{{ route('grade_sorting_report.create') }}"
                                        class="btn btn-primary redirect_page" data-toggle="tooltip"
                                        title="Ctrl+A to New Entry!" data-href="{{ route('grade_sorting_report.create') }}"
                                        style="float: right;">
                                        + Add Grade Sorting Report
                                    </a>
                                </h4>
                                {{-- @endcan --}}
                            </div>
                            <div class="card-body">
                                {{ Form::open(['id' => 'filter_frm', 'method' => 'get', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) }}
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <strong>Batch No:</strong>
                                            
                                            <select name="batch_no" class="form-control mySelect2 search_submit " id="batch_no">
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
                                            {!! Form::text('part_no_and_name', $data['part_no_and_name'], [
                                                'class' => 'form-control',
                                                'id' => 'part_no_and_name',
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
                                            <strong>Inspectors Name:</strong>
                                            <div class="input-group">
                                                <select name="inspectors" class="form-control1 mySelect2" id="inspectors"
                                                    required>
                                                    <option value=""></option>
                                                    @foreach ($inspectors as $value)
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
                                            <strong>Checked Qty:</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" min="0"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;"
                                                    class="form-control ok_qty" name="checked_qty" id="checked_qty"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Rejection Qty:</strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control ok_qty" name="suspected_rej_qty"
                                                id="suspected_rej_qty" required>
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
                                        <input style="float: left; margin-right:20px"
                                            class="btn btn-primary filter_save_btn pull-right" id="FilerBtnAjax"
                                            type="button" value="Run" name="run" autocomplete="off">
    
                                        <a style="float: left;margin-left: 5px;"
                                            href="{{ route('grade_sorting_report.index') }}"
                                            class="btn btn-danger pull-right mr-2">Reset</a>
                                        {{-- <button style="float: right;" name="pdf" class="btn btn-success" id="pdf"
                                            value="pdf" type="submit">PDF</button> --}}
                                    </div>
                                </div>
                                {{ Form::close() }}

                                <table class="table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Date</th>
                                            <th>Machine No</th>
                                            <th>Batch No</th>
                                            <th>Part Name & No</th>
                                            <th>Customer Name</th>
                                            <th>Checked Qty</th>
                                            <th>Rej Qty</th>
                                            <th>OK Qty</th>
                                            <th>Inspector</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($grade_sorting_report as $item)
                                            <tr>
                                                <td class="text-center">{{ ++$i }}</td>
                                                <td>{{ date('d/m/Y', strtotime($item->date)) }}</td>
                                                <td>{{ $item->mc_no }}</td>
                                                <td>{{ $item->batch_no }}</td>
                                                <td>{{ $item->part_no_and_name }}</td>
                                                <td>{{ $item->customer }}</td>
                                                <td style="text-align-last: end;">{{ $item->checked_qty }}</td>
                                                <td style="text-align-last: end;">{{ $item->suspected_rej_qty }}</td>
                                                <td style="text-align-last: end;">{{ $item->ok_qty }}</td>
                                                <td>{{ $item->inspectors }}</td>
                                                <td class="text-center">
                                                    {{-- @can('grade_sorting_report-edit') --}}
                                                    <a class="btn btn-primary"
                                                        href="{{ route('grade_sorting_report.edit', $item->id) }}"><i
                                                            class="bx bx-pencil"></i>
                                                    </a>
                                                    {{-- @endcan
                                            @can('grade_sorting_report-delete') --}}
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['grade_sorting_report.destroy', $item->id],
                                                        'style' => 'display:inline',
                                                    ]) !!}
                                                    <button type="submit" class="btn btn-danger" id="delete"><i class="bx bx-trash"
                                                            aria-hidden="true"></i></button>
                                                    {!! Form::close() !!}
                                                    {{-- @endcan --}}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>No Data Available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $grade_sorting_report->withQueryString()->links() !!}
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
            placeholder: '--Select Option--',
            selectOnClose: true,
        });
        $(document).ready(function() {
            initAjaxSelect2($("#batch_no"), "{{ URL::to('/refrence_blno_id_from_bl_no_select2_source') }}");
        });
    </script>
@endsection
