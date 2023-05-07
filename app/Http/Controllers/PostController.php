<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index($grid_type = 'grid', $slug = '')
    {
        if ($slug) {

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


    public function show($slug)
    {



        $post = Post::where('slug', $slug)->first();

        visitor()->visit($post);

        $comments = collect();

        if ($post->is_commentable) {
            $comments = $post->approved_comments;
        }

        $related_posts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(4)
            ->inRandomOrder()
            ->get();

        $categories = Category::whereIn('model', [Post::class,Product::class])->get();

        return view('pages.posts.show', [
            'post' => $post,
            'comments' => $comments,
            'related_posts' => $related_posts,
            'categories' => $categories,
        ]);

    }
}
