<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.overview');
    }

    public function users()
    {
        return view('pages.dashboard.users');
    }

    public function orders()
    {
        return view('pages.dashboard.orders');
    }

    public function products()
    {
        return view('pages.dashboard.products');
    }

    public function posts() {
        return view('pages.dashboard.posts');
    }

}
