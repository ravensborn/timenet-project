<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        visitor()->visit();

        $services = Post::where('category_id', 2)
            ->where('is_hidden', false)
            ->limit(6)->get();
        $articles = Post::where('category_id', 4)
            ->where('is_hidden', false)
            ->limit(3)->get();

        return view('home', [
            'services' => $services,
            'articles' => $articles
        ]);
    }
}
