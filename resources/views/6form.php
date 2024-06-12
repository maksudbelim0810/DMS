



                                {{ Form::open(['id' => 'mpi_production', 'method' => 'get', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) }}
                                <div class="row">
    
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <strong>Batch No:</strong>
                                            {{-- search_submit --}}
                                            <select name="batch_no" class="form-control mySelect2 " id="batch_no">
                                                <option value="{{ $data['batch_no'] }}">{{ $data['batch_no'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                    </div>
    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input style="float: left; margin-right:20px" class="btn btn-primary filter_save_btn pull-right"
                                            id="FilerBtnAjax" type="button" value="Run" autocomplete="off">
                                        <a style="float: left;margin-left: 5px;" href="{{ route('mpi_production.index') }}"
                                            class="btn btn-danger pull-right mr-2">Reset</a>
                                            <button  style="float: right;" name="pdf" class="btn btn-success" id="pdf" value="pdf" type="submit">PDF</button>
                                    </div>
                                </div>
                                {{ Form::close() }}


                               
                                {{ Form::open(['id' => 'insert_consumption_entry', 'method' => 'get', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) }}
                                <div class="row">
    
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <strong>Batch No:</strong>
                                            {{-- search_submit --}}
                                            <select name="batch_no" class="form-control mySelect2 " id="batch_no">
                                                <option value="{{ $data['batch_no'] }}">{{ $data['batch_no'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                            {!! Form::text('customer_name', $data['customer_name'], [
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
                                            <strong>Insert Name</strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="insert_name"
                                                    value="{{ $data['insert_name'] }}" id="insert_name" tabindex="-1"
                                                    onclick="return false">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Insert Rate Rs</strong>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="insert_rate_rs"
                                                    value="{{ $data['insert_rate_rs'] }}" id="insert_rate_rs"
                                                    tabindex="-1" onclick="return false">
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                                <div class="row  mb-3">
                                    <div class="col-md-12">
                                        <input style="float: left; margin-right:20px"
                                            class="btn btn-primary filter_save_btn pull-right" id="FilerBtnAjax"
                                            type="button" value="Run" autocomplete="off">
                                        <a style="float: left;margin-left: 5px;"
                                            href="{{ route('insert_consumption_entry.index') }}"
                                            class="btn btn-danger pull-right mr-2">Reset</a>
                                        <button style="float: right;" name="pdf" class="btn btn-success" id="pdf"
                                            value="pdf" type="submit">PDF</button>
                                    </div>
                                </div>
                                {{ Form::close() }}
                                


                                {{ Form::open(['id' => 'rejection_disposition', 'method' => 'get', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) }}
                                <div class="row">
    
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <strong>Batch No:</strong>
                                            {{-- search_submit --}}
                                            <select name="batch_no" class="form-control mySelect2 " id="batch_no">
                                                <option value="{{ $data['batch_no'] }}">{{ $data['batch_no'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
    
                                </div>
                                <div class="row  mb-3  mt-3">
                                    <div class="col-md-12">
                                        <input style="float: left; margin-right:20px"
                                            class="btn btn-primary filter_save_btn pull-right" id="FilerBtnAjax"
                                            type="button" value="Run" autocomplete="off">
                                        <a style="float: left;margin-left: 5px;"
                                            href="{{ route('rejection_disposition.index') }}"
                                            class="btn btn-danger pull-right mr-2">Reset</a>
                                        <button style="float: right;" name="pdf" class="btn btn-success" id="pdf"
                                            value="pdf" type="submit">PDF</button>
                                    </div>
                                </div>
                                {{ Form::close() }}



                                {{ Form::open(['id' => 'visual_packing', 'method' => 'get', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) }}
                                <div class="row">
    
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <strong>Batch No:</strong>
                                            {{-- search_submit --}}
                                            <select name="batch_no" class="form-control mySelect2 " id="batch_no">
                                                <option value="{{ $data['batch_no'] }}">{{ $data['batch_no'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                            <strong>Unit No</strong>
                                            <div class="input-group">
                                                <select name="location" class="form-control1 mySelect2" required>
                                                    <option value="">--Select Unit --</option>
                                                    @foreach ($location as $value)
                                                        <option value="{{ $value->location_name }}"
                                                            @if ($value->location_name == $data['location']) selected @endif>
                                                            {{ $value->location_name }}
    
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
                                            <strong>Visual Qty:</strong>
                                            <div class="input-group mb-3">
                                                <input type="number" min="0"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;"
                                                    class="form-control box_qty" name="visual_inspected_qty" id="visual_inspected_qty"
                                                    value="{{ $data['visual_inspected_qty'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Packing Qty:</strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="packed_qty"
                                                id="packed_qty" value="{{ $data['packed_qty'] }}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Box Qty:</strong>
                                            <div class="input-group">
                                                <input type="number" min="0" value="{{ $data['box_qty'] }}"
                                                    oninput="this.value = Math.abs(this.value)"
                                                    onKeyPress="if(this.value.length==5) return false;"
                                                    class="form-control section2" name="box_qty" id="box_qty">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <strong>Total Rejection:</strong>
                                            <div class="input-group">
                                                <input type="number" value="{{ $data['total_rejection'] }}"  min="0" oninput="this.value = Math.abs(this.value)" onKeyPress="if(this.value.length==3) return false;" class="form-control" name="total_rejection"
                                                    id="total_rejection" tabindex="-1" onclick="return false">
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                                <div class="row mb-3 mt-3">
                                    <div class="col-md-12">
                                        <input style="float: left ; margin-right:20px"
                                            class="btn btn-primary filter_save_btn pull-right" id="FilerBtnAjax"
                                            type="button" value="Run" autocomplete="off">
                                        <a style="float: left;margin-left: 5px;" href="{{ route('visual_packing.index') }}"
                                            class="btn btn-danger pull-right mr-2">Reset</a>
                                            <button  style="float: right;" name="pdf" class="btn btn-success" id="pdf" value="pdf" type="submit">PDF</button>
                                    </div>
                                </div>
                                {{ Form::close() }}



                                {{ Form::open(['id' => 'grade_sorting_report', 'method' => 'get', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) }}
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class="form-group">
                                            <strong>Batch No:</strong>
                                            {{-- search_submit --}}
                                            <select name="batch_no" class="form-control mySelect2 " id="batch_no">
                                                <option value="{{ $data['batch_no'] }}">{{ $data['batch_no'] }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                    </div>
                                    
                                </div>
                                <div class="row mt-3  mb-3">
                                    <div class="col-md-12">
                                        <input style="float: left; margin-right:20px"
                                            class="btn btn-primary filter_save_btn pull-right" id="FilerBtnAjax"
                                            type="button" value="Run" name="run" autocomplete="off">
    
                                        <a style="float: left;margin-left: 5px;"
                                            href="{{ route('grade_sorting_report.index') }}"
                                            class="btn btn-danger pull-right mr-2">Reset</a>
                                        <button style="float: right;" name="pdf" class="btn btn-success" id="pdf"
                                            value="pdf" type="submit">PDF</button>
                                    </div>
                                </div>
                                {{ Form::close() }}