@extends('layouts.master')


@section('content')



    <div class="bg-img-start"
         style="background-image: url({{ asset('themes/front/assets/svg/components/card-11.svg') }});">
        <div class="container content-space-t-3 content-space-t-lg-5 content-space-b-2">
            <div class="w-md-75 w-lg-50 text-center mx-md-auto">
                <h1>Download Center</h1>
                <p>Software, Tools, Documentations, Manuals and Drivers.</p>
            </div>
        </div>
    </div>

    <!-- Card Grid -->
    @livewire('website.download-center.index')
    <!-- End Card Grid -->




@endsection
