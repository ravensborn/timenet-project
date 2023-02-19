<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $services = Post::where('category_id' , 2)->limit(6)->get();
        $articles = Post::where('category_id' , 4)->limit(3)->get();

        return view('home',[
            'services' => $services,
            'articles' => $articles
        ]);
    }
}
