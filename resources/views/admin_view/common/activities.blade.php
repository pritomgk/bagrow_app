@extends('admin_view.layout.app')

@section('title')
Activities
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
                        <th>Description</th>
                        {{-- <th>Age</th> --}}
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->title }}</td>
                            <td><img width="100px" height="100px" src="{{ asset('storage/uploads/image/'.$activity->image) }}" alt="Image"></td>
                            <td>{{ $activity->description }}</td>
                            <td>{{ $activity->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.update_activity', ['activity_id'=>$activity->activity_id]) }}" class="btn btn-warning">Update</a>
                                <a href="{{ route('admin.delete_activity', ['activity_id'=>$activity->activity_id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
