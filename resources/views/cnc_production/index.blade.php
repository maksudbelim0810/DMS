@extends('admin.layout.admin')
@section('css')
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" type="text/css" />
    <link href="{{ asset('admin/assets/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .select2-container .select2-dropdown {
            position: relative;
            top: -40px !important;
            width: 240px !important;
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
                                <h4 class="card-title">CNC Production
                                    @can('cnc_production-create')
                                        <a href="{{ route('cnc_production.create') }}" class="btn btn-primary redirect_page"
                                            data-toggle="tooltip" title="Ctrl+A to New Entry!"
                                            data-href="{{ route('cnc_production.create') }}" style="float: right;">
                                            + Add CNC Production
                                        </a>
                                    </h4>
                                @endcan

                            </div>
                            <div class="card-body">
                                {{ Form::open(['id' => 'filter_frm', 'method' => 'get', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) }}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Batch No:</strong>
                                            {{-- search_submit --}}
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
                                            <strong>Setup</strong>
                                            <div class="input-group mb-3">
                                                <select name="setup" class="form-control mySelect2" id="setup"
                                                    required>
                                                    <option value=""></option>
                                                    @foreach ($setup as $value)
                                                        <option value="{{ $value->setup_name }}"
                                                            @if ($value->setup_name == $data['setup']) selected @endif>
                                                            {{ $value->setup_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                            <strong>Cycle Time</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['cycle_time'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control productivity" name="cycle_time" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Total Rejection</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" min="0"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    value="{{ $data['total_rejection'] }}"
                                                    onKeyPress="if(this.value.length==7) return false;"
                                                    class="form-control rejection_total ok_pro" name="total_rejection"
                                                    id="total_rejection">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>No Oprator</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['no_opration'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="no_opration"
                                                    id="no_opration" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>No Power</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['no_power'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="no_power"
                                                    id="no_power" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Job Setting</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['job_setting'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="job_setting"
                                                    id="job_setting" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Job Fault</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['job_fault'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="job_fault"
                                                    id="job_fault" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>No Load</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" min="0" value="{{ $data['no_load'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==3) return false;"
                                                    class="form-control section1 deduction" name="no_load" id="no_load"
                                                    value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Operator Name</strong>
                                            <div class="input-group mb-3">
                                                <select name="operator_name" required class="form-control mySelect2"
                                                    id="operator_name">
                                                    <option value="">--Select Operator--</option>
                                                    @foreach ($operator_name as $value)
                                                        <option value="{{ $value->full_name }}"
                                                            @if ($value->full_name == $data['operator_name']) selected @endif>
                                                            {{ $value->full_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div>
                                <div class="row  mt-2 mb-2">
                                    <div class="col-md-12">
                                        <input style="float: left; margin-right:20px"
                                            class="btn btn-primary filter_save_btn pull-right" id="FilerBtnAjax"
                                            type="button" value="Run" autocomplete="off">
                                        <a style="float: left; margin-left: 5px;"
                                            href="{{ route('cnc_production.index') }}"
                                            class="btn btn-danger pull-right mr-2">Reset</a>

                                        {{-- <button style="float: right;" name="pdf" class="btn btn-success"
                                            id="pdf" value="pdf" type="submit">PDF</button>

                                        <a style="float:right;" href="{{ route('cnc_production.export') }}"
                                            class="btn btn-warning pull-right mr-2">Export</a> --}}
                                    </div>
                                </div>
                                {{ Form::close() }}
                                <div class="table_div">
                                    <table class="table table-bordered">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>M/C No</th>
                                                <th>Shift</th>
                                                <th>Part Name</th>
                                                <th>Total Prod 1st Setup</th>
                                                <th>Total Prod 2nd Setup</th>
                                                <th>Total Prod 3rd Setup</th>
                                                <th>TR</th>
                                                <th>PMR</th>
                                                <th>FR</th>
                                                <th>Total Prod</th>
                                                <th>Target Prod</th>
                                                <th>Prod Loss</th>
                                                <th>Oper Effi%</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($cnc_production as $key => $item)
                                                <tr>
                                                    <td class="text-center">{{ ++$i }}</td>
                                                    <td class="text-center">{{ date('d/m/Y', strtotime($item->date)) }}
                                                    </td>

                                                    <td>{{ $item->mc_no }}</td>
                                                    <td>{{ $item->shift }}</td>
                                                    <td>{{ $item->part_name }}</td>
                                                    
                                                    <td>
                                                    @if(intval($item->setup)==1)
                                                    {{$item->setup}}
                                                    @else
                                                        0
                                                    @endif
                                                    </td>
                                                    <td>
                                                    @if(intval($item->setup)==2)
                                                    {{$item->setup}}
                                                    @else
                                                    0
                                                    @endif
                                                    </td>
                                                    <td>
                                                    @if(intval($item->setup)==3)
                                                    {{$item->setup}}
                                                    @else
                                                        0
                                                    @endif
                                                    </td>
                                    
                                                    <td>{{ $item->tr }}</td>
                                                    <td>{{ $item->pmr }}</td>
                                                    <td>{{ $item->fr }}</td>
                                                    <td>{{ $item->total_production }}</td>
                                                    <td></td>
                                                    <td></td>
                                                    @php 
                                                    
                                                    
                                                    $shift_duration = intVal($item->shift_duration) * 60;
                                                    $cycle_time = $item->cycle_time;
                                                    
                                                    $a = $item->time;
                                                    $b = $item->lunch;
                                                    $c = $item->no_opration;
                                                    $d = $item->no_power;
                                                    $e = $item->job_setting;
                                                    $f = $item->job_fault;
                                                    $g = $item->no_load;
                                                    
                                                    $time_loses = $a + $b + $c + $d + $e + $f + $g;
                                                    $total_run_time = $shift_duration - $time_loses;
                                                    $insert_change = (5.83333333333333 * $total_run_time) / 60;
                                                    $net_run_time = $total_run_time - $insert_change;
                                                    
                                                    $target_production = ( $net_run_time * 60 ) / $cycle_time;
                                                    
                                                    $operation_effi = ( $item->total_production / $target_production ) * 100;
                                                    
                                                    @endphp
                                                    <td>{{ round($operation_effi,2) }}</td>

                                                    {{-- <td style="text-align-last: right;">{{ $item->ok_production }}</td> --}}

                                                    <td class="text-center">
                                                        @can('cnc_production-edit')
                                                            <a class="btn btn-primary"
                                                                href="{{ route('cnc_production.edit', $item->id) }}"><i
                                                                    class="bx bx-pencil"></i>
                                                            </a>
                                                        @endcan
                                                        @can('cnc_production-delete')
                                                            {!! Form::open([
                                                                'method' => 'DELETE',
                                                                'route' => ['cnc_production.destroy', $item->id],
                                                                'style' => 'display:inline',
                                                            ]) !!}
                                                            <button type="submit" class="btn btn-danger" id="delete" id="delete"><i
                                                                    class="bx bx-trash" aria-hidden="true"></i></button>
                                                            {!! Form::close() !!}
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>No Data Available</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center">
                                    {!! $cnc_production->withQueryString()->links() !!}
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
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
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


        var table = $('#cnc').DataTable({
            dom: 'Brt',
            buttons: ['excel', 'pdf', 'print'],

        });
        // table.destroy();


       
    </script>
@endsection
