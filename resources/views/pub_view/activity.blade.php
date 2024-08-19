@extends('pub_view.layouts.app')

@section('title')
Activities
@endsection

@section('content')

        <!-- Featurs Start -->
        <div class="container-fluid service">
            <div class="container">
                <div class="row g-4 justify-content-center" style="margin-top: 180px;">

                    @foreach ($activities as $activity)

                    <div class="col-md-6 col-lg-4">
                        <a href="#">

                            <div class="service-item bg-secondary rounded border border-secondary">
                                <img style="height: 400px;" src="{{ asset('storage/uploads/image/'.$activity->image) }}" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content text-center p-4 rounded mx-auto" style="height: auto;">
                                        <h4 class="text-white">{{ $activity->title }}</h4>
                                        {{-- <h3 class="mb-0">20% OFF</h3> --}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
        <!-- Featurs End -->

@endsection


