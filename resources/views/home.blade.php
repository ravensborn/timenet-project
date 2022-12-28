@extends('layouts.master')


@section('content')

    <!-- Hero -->
    <div class="overflow-hidden">
        <div class="container content-space-t-2 content-space-b-1">
            <div class="row justify-content-lg-between align-items-md-center">
                <div class="col-md-6 col-lg-5 mb-7 mb-md-0">
                    <!-- Heading -->
                    <div class="mb-5">
                        <span class="text-cap">Who we are?</span>
{{--                        <h1 class="display-4 mb-3">TimeNet</h1>--}}
                        <img width="350px" style="margin-bottom: 30px;" src="{{ asset('images/logo-dark.png') }}" alt="Logo Dark">
                        <p class="lead">A network expertise company works in the fields of providing internet access.</p>
                    </div>
                    <!-- End Title & Description -->

                    <div class="d-grid d-sm-flex gap-3">
                        <a class="btn btn-dark btn-transition" href="#caseStudies">Case studies</a>
                        <a class="btn btn-link" href="#">Learn more <i class="bi-chevron-right small ms-1"></i></a>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-md-6">
                    <div class="w-100 bg-soft-primary rounded-2">
                        <img class="img-fluid rounded-2" src="https://img.freepik.com/free-photo/large-buildings-with-dome-lights_1127-2223.jpg?w=900&t=st=1672254235~exp=1672254835~hmac=57121291301fde63f0e2a2b02a22bb19b406a1d95589214993ae95b7139bdce7" alt="Image Description">
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Hero -->

    <!-- Services -->
    <div class="container content-space-2">
        <!-- Heading -->
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
            <h2>A network expertise company works in the fields of providing internet access.</h2>
        </div>
        <!-- End Heading -->

        <div class="text-center mb-10">
            <!-- List Checked -->
            <ul class="list-inline list-checked list-checked-primary">
                <li class="list-inline-item list-checked-item">Routing & Switching.</li>
                <li class="list-inline-item list-checked-item">Cloud Networking</li>
                <li class="list-inline-item list-checked-item">Security Appliances & Firewalls.</li>
            </ul>
            <!-- End List Checked -->
        </div>

        <div class="row mb-5 mb-md-0">
            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                <!-- Card -->
                <div class="card card-sm h-100">
                    <div class="p-2">
                        <img class="card-img" src="https://img.freepik.com/premium-photo/aerial-panoramic-city-view-chicago-downtown-area-day-time-illinois-usa-birds-eye-view-skyscrapers-skyline-social-media-hologram-concept-networking-establishing-new-people-connections_269648-1121.jpg?w=996" alt="Image Description">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">Routing and switching</h4>
                        <p class="card-text">
                            Comprehensive LAN & WAN services, including IP/MPLS features, supported by our expertise in design, planning, implementation, and network management.
                        </p>

                        <!-- List Pointer -->
                        <ul class="list-pointer mb-0">
                            <li class="list-pointer-item">Advanced Analytics</li>
                            <li class="list-pointer-item">Organization</li>
                        </ul>
                        <!-- End List Pointer -->
                    </div>

                    <a class="card-footer card-link border-top" href="#">Learn more <i class="bi-chevron-right small ms-1"></i></a>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                <!-- Card -->
                <div class="card card-sm h-100">
                    <div class="p-2">
                        <img class="card-img" src="https://img.freepik.com/premium-photo/panoramic-view-san-francisco-skyline-daytime-from-hill-side-financial-district-residential-neighborhoods-social-media-hologram-concept-networking-establishing-new-people-connections_269648-6772.jpg?w=996" alt="Image Description">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">Cloud Networking</h4>
                        <p class="card-text">
                            A next-generation infrastructure that flexibly allocates shared resources – within and across data centers.
                        </p>

                        <!-- List Pointer -->
                        <ul class="list-pointer mb-0">
                            <li class="list-pointer-item">Cost Transformation</li>
                            <li class="list-pointer-item">Customer Experience</li>
                            <li class="list-pointer-item">Mergers and Acquisitions</li>
                        </ul>
                        <!-- End List Pointer -->
                    </div>

                    <a class="card-footer card-link border-top" href="#">Learn more <i class="bi-chevron-right small ms-1"></i></a>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->

            <div class="col-sm-6 col-lg-4">
                <!-- Card -->
                <div class="card card-sm h-100">
                    <div class="p-2">
                        <img class="card-img" src="https://img.freepik.com/premium-photo/panoramic-view-skyscrapers-modern-cityscape-capital-emirate-dubai-technology-concept-double-exposure_269648-9412.jpg?w=996" alt="Image Description">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">Security Appliances & Firewalls</h4>
                        <p class="card-text">Discover an easier way to manage network security of your organization.</p>

                        <!-- List Pointer -->
                        <ul class="list-pointer mb-0">
                            <li class="list-pointer-item">Enterprise Technology</li>
                            <li class="list-pointer-item">Private Equity</li>
                            <li class="list-pointer-item">Sustainability</li>
                        </ul>
                        <!-- End List Pointer -->
                    </div>

                    <a class="card-footer card-link border-top" href="#">Learn more <i class="bi-chevron-right small ms-1"></i></a>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Services-->

    <!-- Who works with us -->
    <div class="container content-space-2">
        <!-- Heading -->
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-6">
            <h2>TimeNet is trusted by many enterprises, and more than 33,000 users.</h2>
        </div>
        <!-- End Heading -->

        <div class="row justify-content-center text-center">
            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/amazon-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/kaplan-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/google-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/airbnb-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/shopify-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/vidados-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/capsule-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/forbes-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/business-insider-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/hubspot-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->

            <div class="col-4 col-sm-3 col-md-2 py-3">
                <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('themes/front/assets/svg/brands/layar-dark.svg') }}" alt="Logo">
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Who works with us -->

    <!-- Articles -->
    <div class="container content-space-2">
        <!-- Heading -->
        <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5">
            <h2>Articles from TimeNet</h2>
        </div>
        <!-- End Heading -->

        <div class="overflow-hidden">
            <div class="row gx-lg-7">
                <div class="col-sm-6 col-lg-4 mb-5">
                    <!-- Card -->
                    <a class="card card-flush h-100 aos-init aos-animate" href="#" data-aos="fade-up">
                        <img class="card-img" src="https://img.freepik.com/free-photo/man-with-holographic-tablet_1112-647.jpg?w=996&t=st=1672254030~exp=1672254630~hmac=0751a05cf22f24946ca531de1b793de5417c10d10235f70fded0b8520de12fc9" alt="Image Description">
                        <div class="card-body">
                            <span class="card-subtitle text-body">Read the blog</span>
                            <h4 class="card-title text-inherit">Have a meaningful impact</h4>
                            <p class="card-text text-body">Opportunities to Front who have proven to be good at executing on them.</p>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col-sm-6 col-lg-4 mb-5">
                    <!-- Card -->
                    <a class="card card-flush h-100 aos-init aos-animate" href="#" data-aos="fade-up" data-aos-delay="150">
                        <img class="card-img" src="https://img.freepik.com/free-photo/businessman-holding-tablet-with-virtual-application_1112-775.jpg?w=996&t=st=1672254061~exp=1672254661~hmac=437bdea6d16be740d3ddd80b1c0fc0efea3a7bb8867a723b59874bfa5b613005" alt="Image Description">
                        <div class="card-body">
                            <span class="card-subtitle text-body">Read the blog</span>
                            <h4 class="card-title text-inherit">Documentation</h4>
                            <p class="card-text text-body">Whether you're a startup or a global enterprise, learn how to integrate with Front.</p>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                <!-- End Col -->

                <div class="col-sm-6 col-lg-4 mb-5">
                    <!-- Card -->
                    <a class="card card-flush h-100 aos-init aos-animate" href="#" data-aos="fade-up" data-aos-delay="200">
                        <img class="card-img" src="https://img.freepik.com/free-photo/businessman-holding-virtual-3d-projection-arms_651396-902.jpg?w=996&t=st=1672254095~exp=1672254695~hmac=ac1d4139fd485c35f2052a6087fce5b3afbb4b7b51ab05530549927213f77dc9" alt="Image Description">
                        <div class="card-body">
                            <span class="card-subtitle text-body">Learn about other solutions</span>
                            <h4 class="card-title text-inherit">Explore the Snippets tool</h4>
                            <p class="card-text text-body">Quickly Front sample components, copy-paste codes.</p>
                        </div>
                    </a>
                    <!-- End Card -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>

        <!-- Card Info -->
        <div class="text-center">
            <div class="card card-info-link card-sm">
                <div class="card-body">
                    Want to read more? <a class="card-link ms-2" href="#">Go here <span class="bi-chevron-right small ms-1"></span></a>
                </div>
            </div>
        </div>
        <!-- End Card Info -->
    </div>
    <!-- End Articles -->


@endsection
