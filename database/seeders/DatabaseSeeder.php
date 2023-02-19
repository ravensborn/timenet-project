<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'TimeNet Admin',
            'email' => 'yad@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $postProductCatalogCategory = \App\Models\Category::factory([
            'name' => 'Product Catalog',
            'model' => Post::class,
        ])->create();

        $postServiceCategory = \App\Models\Category::factory([
            'name' => 'Services',
            'model' => Post::class,
        ])->create();

        $postSolutionCategory = \App\Models\Category::factory([
            'name' => 'Solutions',
            'model' => Post::class,
        ])->create();

        $postArticleCategory = \App\Models\Category::factory([
            'name' => 'Articles',
            'model' => Post::class,
        ])->create();

        $defaultProductCategory = \App\Models\Category::factory([
            'name' => 'Default',
            'model' => Product::class,
        ])->create();


        Post::factory(14)->create([
            'category_id' => $postSolutionCategory->id,
        ]);

        Post::factory(14)->create([
            'category_id' => $postProductCatalogCategory->id,
        ]);

        Post::factory(14)->create([
            'category_id' => $postArticleCategory->id,
        ]);

        Product::factory(12)->create([
            'category_id' => $defaultProductCategory->id,
        ]);


        $posts = Post::whereIn('category_id', [1,3,4, 5])->get();

        foreach ($posts as $post) {

            $path = public_path('images/examples/900x660.jpg');

            $post->addMedia($path)
                ->preservingOriginal()
                ->toMediaCollection('cover');
        }

        $this->call([
            TimeNetSeeder::class,
        ]);

    }
}
