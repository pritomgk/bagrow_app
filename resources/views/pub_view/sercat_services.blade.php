@extends('pub_view.layouts.app')

@section('title')
Services
@endsection

@section('content')

        <!-- Featurs Start -->

        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <div class="col-lg-10 container-fluid" style="margin-top: 230px;">
                        <div class="row g-4">

                            @foreach ($services as $service)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rounded position-relative fruite-item border border-secondary rounded-bottom">
                                    <div class="p-4">
                                        <div class="fruite-img">
                                            <img src="{{ asset('storage/uploads/image/'.$service->image) }}" class="img-fluid w-100 rounded-top" alt="Service Image">
                                        </div>
                                        {{-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> --}}
                                        <h4>{{ $service->title }}</h4>
                                        <p class="text-left" style="text-align: left;">{{ $service->description }}</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featurs End -->

@endsection


