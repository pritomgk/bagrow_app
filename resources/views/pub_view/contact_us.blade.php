@extends('pub_view.layouts.app')

@section('title')
contact us
@endsection

@section('content')

        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12 pt-3">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h2 class="text-primary">Get in touch</h2>
                                <p class="mb-4">Contact with us for any information.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">

                            @if (session()->has('error'))
                            <p class="mb-0 alert alert-danger text-center">{{ session()->get('error') }}</p>
                            @endif
                            @if (session()->has('success'))
                            <p class="mb-0 alert alert-success text-center">{{ session()->get('success') }}</p>
                            @endif

                            <form action="contact_us_info" method="POST" class="">
                                @csrf
                                <input type="text" name="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                                <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                                <input type="text" name="phone" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Phone Number">
                                <textarea name="message" class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Your Message"></textarea>
                                <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Address</h4>
                                    <p class="mb-2">House-42, Road-02, Sector-09. Uttara, Dhaka</p>
                                    <p class="mb-2">Reg. No : SW/MOA/24750</p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded mb-4 bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Mail Us</h4>
                                    <p class="mb-2"><a href="mailto:bagrowgroup@gmail.com">bagrowgroup@gmail.com</a></p>
                                </div>
                            </div>
                            <div class="d-flex p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div>
                                    <h4>Telephone</h4>
                                    <p class="mb-2"><a href="tel:+8801711479884">+8801711-479884</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <div class="mx-auto col-md-6 text-center py-3 my-2 border-secondary bg-white">
                                    <h4>Factory Office</h4>
                                </div>
                                <iframe class="rounded w-100"
                                style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.4673001095703!2d90.1394531!3d24.779447299999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37562fbaae06cad1%3A0xeeb27d12af7b90d3!2sBagrow%20Company%20Limited!5e0!3m2!1sen!2sbd!4v1722512166648!5m2!1sen!2sbd" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

@endsection


