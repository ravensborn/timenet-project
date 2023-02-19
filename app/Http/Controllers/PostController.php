<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index($grid_type = 'grid', $slug = '')
    {


        if($slug) {

            $category = Category::where('slug', $slug)->first();

            $posts = Post::where('category_id', $category->id)->paginate(12);

            return view('pages.posts.index', [
                'posts' => $posts,
                'category' => $category,
                'grid_type' => $grid_type
            ]);
        }

        return abort(404);
    }
//    public function index($grid_type, $post_type_name)
//    {
//        if ($post_type_name) {
//
//            $type_id = Post::convertStringToTypeId($post_type_name);
//
//            if (!$type_id) {
//                abort(404);
//            }
//
//            $posts = Post::where('type_id', $type_id)->paginate(9);
//
//            return view('pages.posts.index', [
//                'grid_type' => $grid_type,
//                'post_type_name' => $post_type_name,
//                'posts' => $posts
//            ]);
//        }
//
//        return abort(404);
//    }


    public function show($slug)
    {

        $post = Post::where('slug', $slug)->first();

//        $related_posts = Post::where('category_id', $post->category_id)->limit(4)->inRandomOrder()->get();
        $related_posts = Post::limit(4)->inRandomOrder()->get();

        return view('pages.posts.show', ['post' => $post , 'related_posts' => $related_posts]);

    }
}
