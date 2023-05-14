<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        visitor()->visit();

        $features = Post::where('category_id', 5)
            ->where('is_hidden', false)
            ->limit(6)->get();
        $articles = Post::where('category_id', 4)
            ->where('is_hidden', false)
            ->limit(3)->get();
        $brands = Brand::where('is_displayable_on_website', true)
            ->get();

        return view('home', [
            'features' => $features,
            'articles' => $articles,
            'brands' => $brands
        ]);
    }
}
