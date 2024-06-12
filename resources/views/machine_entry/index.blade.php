@extends('admin.layout.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Machine Master</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Machine Master</li>
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
                                <h4 class="card-title">Machine Master Details
                                    @can('machine_entry-create')
                                        <a href="{{ route('machine_entry.create') }}" class="btn btn-primary redirect_page" data-toggle="tooltip" title="Ctrl+A to New Entry!"
                                            data-href="{{ route('machine_entry.create') }}" style="float: right;">
                                            + Add Machine Master
                                        </a>
                                    </h4>
                                @endcan
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <thead class="text-center">

                                        <tr>
                                            <th>No</th>
                                            <th>Machine Department</th>
                                            <th>Machine Name</th>
                                            <th>Machine Number</th>
    
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $key => $MachineEntry)
                                        <tr>
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td class="text-center">{{ $MachineEntry->machine_department }}</td>
                                            <td class="text-center">{{ $MachineEntry->machine_name }}</td>
                                            <td class="text-center">{{ $MachineEntry->machine_number }}</td>

                                            <td class="text-center">
                                                @can('machine_entry-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('machine_entry.edit', $MachineEntry->id) }}">
                                                        <i class="bx bx-pencil" aria-hidden="true"></i>
                                                    </a>
                                                @endcan
                                                @can('machine_entry-delete')
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['machine_entry.destroy', $MachineEntry->id],
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
    @endsection
