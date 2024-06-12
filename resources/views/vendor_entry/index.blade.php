@extends('admin.layout.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <!-- start page title -->
    {{-- <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Vendor Master</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                    <li class="breadcrumb-item active">Vendor Master</li>
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
                                <h4 class="card-title">Vendor Master Details
                                    @can('vendor_entry-create')
                                        <a href="{{ route('vendor_entry.create') }}" class="btn btn-primary redirect_page" data-toggle="tooltip" title="Ctrl+A to New Entry!"
                                            data-href="{{ route('vendor_entry.create') }}" style="float: right;">
                                            + Add Vendor Master
                                        </a>
                                    </h4>
                                @endcan
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Vendor Name</th>
                                        <th>Contact Person</th>
                                        <th>Mobile Number</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($data as $key => $VendorEntry)
                                        <tr>
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td>{{ $VendorEntry->vendor_name }}</td>
                                            <td>{{ $VendorEntry->contact_person }}</td>
                                            <td>{{ $VendorEntry->mobile_number }}</td>
                                            <td class="text-center">
                                                @can('vendor_entry-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('vendor_entry.edit', $VendorEntry->id) }}">
                                                        <i class="bx bx-pencil" aria-hidden="true"></i>
                                                    </a>
                                                @endcan
                                                @can('vendor_entry-delete')
                                                    {!! Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['vendor_entry.destroy', $VendorEntry->id],
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
