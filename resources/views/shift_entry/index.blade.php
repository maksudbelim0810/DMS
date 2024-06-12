@extends('admin.layout.admin')
@section('content')
<!-- Content Header (Page header) -->
 <!-- start page title -->
 {{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Shift Master</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Shift Master</li>
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
                            <h4 class="card-title">Shift Master
                            @can('shift_entry-create')
                            <a href="{{ route('shift_entry.create') }}" class="btn btn-primary redirect_page" data-toggle="tooltip" title="Ctrl+A to New Entry!" data-href="{{ route('shift_entry.create') }}" style="float: right;">
                                + Add Shift Master
                            </a></h4>
                            @endcan
                        </div>
                        <div class="card-body">
                           
                        <table class="table table-bordered">
                          <tr class="text-center">
                            <th>No</th>
                            <th>Shift Name</th>
                            <th>Shift Duration</th>
                            <th>Insert Change</th>
                            <th>Lunch Recess</th>
                            <th>Action</th>
                          </tr>
                          @foreach ($data as $key => $ShiftEntry)
                          <tr class="text-center">
                            <td class="text-center">{{ ++$i }}</td>
                            <td>{{ $ShiftEntry->shift_name }}</td>
                            <td>{{ $ShiftEntry->shift_duration }} </td>
                            <td>{{ $ShiftEntry->insert_change }} </td>
                            <td>{{ $ShiftEntry->lunch_recess }} </td>
                            <td>
                              @can('shift_entry-edit')
                              <a class="btn btn-primary" href="{{ route('shift_entry.edit',$ShiftEntry->id) }}">
                                <i class="bx bx-pencil" aria-hidden="true"></i>
                              </a>
                              @endcan
                              @can('shift_entry-delete')
                              {!! Form::open(['method' => 'DELETE','route' => ['shift_entry.destroy', $ShiftEntry->id],'style'=>'display:inline']) !!}
                              <button type="submit" class="btn btn-danger" id="delete"><i class="bx bx-trash" aria-hidden="true"></i></button>
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
@endsection