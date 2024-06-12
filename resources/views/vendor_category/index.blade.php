@extends('admin.layout.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Vendor Category</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Vendor Category</li>
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
                                <h4 class="card-title">Vendor Category
                                    @can('vendor_category-create')
                                        <a href="{{ route('vendor_category.create') }}" class="btn btn-primary redirect_page" data-toggle="tooltip" title="Ctrl+A to New Entry!"
                                            data-href="{{ route('vendor_category.create') }}" style="float: right;">
                                            + Add Vendor Category
                                        </a>
                                    </h4>
                                @endcan
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <thead class="text-center">
                
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($vendor_category as $key => $item)
                                            <tr>
                                                <td class="text-center">{{ ++$i }}</td>
                                                <td>{{ $item->vendor_category }}</td>
                                                <td class="text-center">
                                                    @can('vendor_category-edit')
                                                        <a class="btn btn-primary"
                                                            href="{{ route('vendor_category.edit', $item->id) }}"><i
                                                                class="bx bx-pencil"></i>
                                                        </a>
                                                    @endcan
                                                    @can('vendor_category-delete')
                                                        {!! Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['vendor_category.destroy', $item->id],
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
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $vendor_category->withQueryString()->links() !!}
                                </div>

                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->


                </div> <!-- end row-->


            </div>
        @endsection
