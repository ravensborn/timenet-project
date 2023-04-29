@extends('layouts.dashboard')

@section('content')

   <div class="mb-3">
       <img src="{{ asset('images/logo-dark.png') }}" alt="TimeNet Logo" width="200px">
   </div>
    <h1 class="h3 mb-3">Welcome back, {{ ucwords(auth()->user()->name) }}</h1>

   <p>
       TimeNet Control Panel, that helps you manage the website modules, including users, posts, products, and orders.
   </p>


@endsection
