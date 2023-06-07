@extends('layouts.dashboard')

@section('content')

    <div class="mb-3">
        <img src="{{ asset('images/logo-dark.png') }}" alt="TimeNet Logo" width="200px">
    </div>
    <h1 class="h3 mb-3">Welcome back, {{ ucwords(auth()->user()->name) }}</h1>

    <p>
        TimeNet Control Panel, that helps you manage the website modules, including users, posts, products, and orders.
    </p>

    <hr>

    <div class="row">
        <h5>Website Stats</h5>
        @foreach($statistics as $statistic)
            <div class="col-md-3 col-6">
                <div class="bg-white rounded shadow p-3 d-flex justify-content-between">
                    <div>
                        <i class="{{ $statistic['icon'] }}"></i>
                        {{ $statistic['name'] }}
                    </div>
                    <div>
                        {{ $statistic['data'] }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
