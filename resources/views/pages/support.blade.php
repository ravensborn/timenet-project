@extends('layouts.master')


@section('content')

    <!-- Breadcrumb -->
    <div class="bg-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-sm">
                    <h4 class="mb-0">Support</h4>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">{{ config('env.APP_NAME') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Support
                            </li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="container content-space-t-2">
        <!-- Heading -->
        <div class="text-center mx-md-auto mb-5">
            <h2>Get Expert Support</h2>

            <p>
                Thank you for choosing our products/services, and we appreciate your trust in us. We look forward to
                assisting you and making sure you have a smooth and enjoyable experience. Don't hesitate to reach out to
                us – we're here to help!
            </p>

            <p>
                <a href="mailto:info@time-net.net">
                    <i class="bi bi-envelope"></i>
                    info@time-net.net
                </a>
                &nbsp;
                <a href="tel:+9647503807676">
                    <i class="bi bi-telephone"></i>
                    +964 (750) 380-7676
                </a>
            </p>

            <hr>
        </div>

        <div>
            <p class="text-center">Locate Us on the Map</p>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12874.275909137674!2d43.9963447!3d36.2256701!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x400718ae16e4dc03%3A0x65a2a5aa8ee81a5c!2sTime%20Net!5e0!3m2!1sen!2siq!4v1688945043584!5m2!1sen!2siq"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>
    <div class="container content-space-b-2">
        <div class="bg-dark rounded-2"
             style="background-image: url('{{ asset('themes/front/assets/svg/components/wave-pattern-light.svg') }}');">
            <div class="container-xl container-fluid content-space-1 content-space-md-2 px-4 px-md-8 px-lg-10">
                <div class="row justify-content-lg-between align-items-lg-center">
                    <div class="col-md-10 col-lg-5 mb-9 mb-lg-0">
                        <!-- Info -->
                        <h1 class="text-white">Get Support</h1>
                        <p class="text-white-70">Whatever your goal - we will get your there.</p>
                        <!-- End Info -->

                        <div class="border-top border-white-10 my-5" style="max-width: 10rem;"></div>

                        <!-- Blockquote -->
                        <figure>
                            <div class="mb-4">
                                <img class="avatar avatar-xl avatar-4x3" src="{{ asset('images/logo.png') }}"
                                     alt="Logo">
                            </div>

                            <blockquote class="blockquote blockquote-light">
                                Need assistance? Fill out the form below and our support team will get back to you as
                                soon as possible. We're here to help you with any questions or concerns you may have.
                            </blockquote>

                        </figure>
                        <!-- End Blockquote -->
                    </div>

                    <div class="col-lg-6">
                        <!-- Card -->
                        <div class="card card-lg">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h3 class="card-title">Fill out the form and we'll be in touch as soon as
                                        possible.</h3>
                                </div>

                                <!-- Form -->
                                <form>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <!-- Form -->
                                            <div class="mb-3">
                                                <label class="form-label visually-hidden" for="name">Name</label>
                                                <input type="text" class="form-control form-control-lg" name="name"
                                                       id="name" placeholder="Name" aria-label="Name">
                                            </div>
                                            <!-- End Form -->
                                        </div>
                                        <!-- End Col -->
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->

                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <!-- Form -->
                                            <div class="mb-3">
                                                <label class="form-label visually-hidden" for="email">Email
                                                    address</label>
                                                <input type="email" class="form-control form-control-lg" name="email"
                                                       id="email" placeholder="email@site.com"
                                                       aria-label="email@site.com">
                                            </div>
                                            <!-- End Form -->
                                        </div>
                                        <!-- End Col -->
                                    </div>
                                    <!-- End Row -->


                                    <!-- Form -->
                                    <div class="mb-3">
                                        <label class="form-label visually-hidden"
                                               for="hireUsFormDetails">Details</label>
                                        <textarea class="form-control form-control-lg" name="hireUsFormNameDetails"
                                                  id="hireUsFormDetails" placeholder="Tell us about your project"
                                                  aria-label="Tell us about your project" rows="4"></textarea>
                                    </div>
                                    <!-- End Form -->


                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-dark btn-lg">Send inquiry</button>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
