@extends('admin_view.layout.app')

@section('title')
Add Product
@endsection

@section('content')
<div class="col-lg-7 mx-auto">
    <div class="p-5">
        <div class="text-center">
            <h2 class="h4 text-gray-900 mb-4">Product!</h2>
        </div>
        <form class="user" method="POST" enctype="multipart/form-data" action="{{ route('admin.add_product_info') }}">

            @if (session()->has('error'))
                <p class="mb-0 alert alert-danger">{{ session()->get('error') }}</p>
            @endif
            @if (session()->has('success'))
                <p class="mb-0 alert alert-success">{{ session()->get('success') }}</p>
            @endif

            @csrf

            <div class="form-group">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" name="title" class="form-control" id="exampleFirstName" placeholder="Title">
                    @error('title')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <select name="procat_id" class="form-control" id="">
                        <option value="">Select</option>
                        @foreach ($procats as $procat)
                        <option value="{{ $procat->procat_id }}">{{ $procat->title }}</option>
                        @endforeach
                    </select>
                    @error('title')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
                @error('description')
                <p class="mb-0 alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <p class="mb-0 alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary btn-user btn-block">
                Add
            </button>
        </form>
    </div>
</div>
@endsection


