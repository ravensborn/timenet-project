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

    public function usersIndex()
    {
        return view('pages.dashboard.users.index');
    }

    public function ordersIndex()
    {
        return view('pages.dashboard.orders.index');
    }

    public function productsIndex()
    {
        return view('pages.dashboard.products.index');
    }

    public function postsIndex() {
        return view('pages.dashboard.posts.index');
    }

}
