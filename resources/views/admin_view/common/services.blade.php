@extends('admin_view.layout.app')

@section('title')
Services
@endsection

@section('content')

<!-- Page Heading -->
<h2 class="h3 mb-2 text-gray-800">Tables</h2>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables,
    please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-header py-3">

        @if (session()->has('error'))
            <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
        @endif
        @if (session()->has('success'))
            <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
        @endif

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Service Category</th>
                        <th>Description</th>
                        {{-- <th>Age</th> --}}
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Service Category</th>
                        <th>Description</th>
                        {{-- <th>Age</th> --}}
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->title }}</td>
                            <td><img width="100px" height="100px" src="{{ asset('storage/uploads/image/'.$service->image) }}" alt="Image"></td>
                            <td>
                                @foreach ($sercats as $sercat)
                                @if ($sercat->sercat_id == $service->sercat_id)
                                {{ $sercat->title }}
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $service->description }}</td>
                            <td>{{ $service->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.update_service', ['service_id'=>$service->service_id]) }}" class="btn btn-warning">Update</a>
                                <a href="{{ route('admin.delete_service', ['service_id'=>$service->service_id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

