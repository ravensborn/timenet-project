<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $services = Post::where('type_id' , Post::TYPE_SERVICE)->limit(6)->get();
        $articles = Post::where('type_id' , Post::TYPE_ARTICLE)->limit(3)->get();

        return view('home',[
            'services' => $services,
            'articles' => $articles
        ]);
    }
}
