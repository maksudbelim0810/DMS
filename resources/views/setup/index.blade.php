@extends('admin.layout.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Setup Master</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Setup Master</li>
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
                                <h4 class="card-title">Setup Master
                                    @can('setup-create')
                                        <a href="{{ route('setup.create') }}" class="btn btn-primary redirect_page" data-toggle="tooltip" title="Ctrl+A to New Entry!"
                                            data-href="{{ route('setup.create') }}" style="float: right;">
                                            + Add Setup Master
                                        </a>
                                    </h4>
                                @endcan
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <thead class="text-center">
                
                                        <tr>
                                            <th>No</th>
                                            <th>Setup Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($setup as $key => $item)
                                            <tr class="text-center">
                                                <td class="text-center">{{ ++$i }}</td>
                                                <td>{{ $item->setup_name }}</td>
                                                <td class="text-center">
                                                    @can('setup-edit')
                                                        <a class="btn btn-primary"
                                                            href="{{ route('setup.edit', $item->id) }}"><i
                                                                class="bx bx-pencil"></i>
                                                        </a>
                                                    @endcan
                                                    @can('setup-delete')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['setup.destroy', $item->id], 'style' => 'display:inline']) !!}
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
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $setup->withQueryString()->links() !!}
                                </div>

                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->


                </div> <!-- end row-->


            </div>
        @endsection
