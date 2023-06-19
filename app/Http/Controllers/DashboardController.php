<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\FaqItem;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\SubscriberList;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Rap2hpoutre\FastExcel\FastExcel;
use Shetabit\Visitor\Models\Visit;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index()
    {
        $statistics = [
            [
                'icon' => 'bi bi-clipboard-data',
                'name' => 'Homepage visits',
                'data' => number_format(Visit::where('url', route('home'))->count()),
            ]
        ];
        return view('pages.dashboard.overview', [
            'statistics' => $statistics
        ]);
    }

    public function usersIndex()
    {
        return view('pages.dashboard.users.index');
    }

    public function usersShow(User $user)
    {

        $activity = Activity::where('causer_type', User::class)
            ->where('subject_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.dashboard.users.show', [
            'activity' => $activity,
            'user' => $user
        ]);
    }

    public function usersEdit(User $user)
    {

        return view('pages.dashboard.users.edit', [
            'user' => $user
        ]);
    }

    public function ordersIndex()
    {
        return view('pages.dashboard.orders.index');
    }

    public function ordersShow(Order $order)
    {
        return view('pages.dashboard.orders.show', [
            'order' => $order
        ]);
    }

    public function productsIndex()
    {
        return view('pages.dashboard.products.index');
    }

    public function productsCreate()
    {
        return view('pages.dashboard.products.create');
    }

    public function productsEdit($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('pages.dashboard.products.edit', [
            'product' => $product
        ]);
    }

    public function productsMediaManager(Product $product)
    {
        return view('pages.dashboard.products.media-manager', [
            'product' => $product,
        ]);
    }

    public function postsIndex()
    {
        return view('pages.dashboard.posts.index');
    }

    public function postsCreate()
    {
        return view('pages.dashboard.posts.create');
    }

    public function postsEdit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('pages.dashboard.posts.edit', [
            'post' => $post
        ]);
    }

    public function postsMediaManager($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();

        return view('pages.dashboard.posts.media-manager', [
            'post' => $post,
        ]);
    }

    public function postsMediaUpload($slug): \Illuminate\Http\JsonResponse
    {

        request()->validate([
            'file' => 'required|image|max:2048'
        ]);

        $file = \request()->file('file');

        $post = Post::where('slug', $slug)->firstOrFail();
        $name = time() . '_' . Str::random(5);
        $media = $post->addMedia($file)
            ->usingName($name)
            ->usingFileName($name . '.' . $file->getClientOriginalExtension())
            ->toMediaCollection('images');

        return response()->json([
            'location' => $media->getFullUrl()
        ], 200);
    }


    public function categoriesIndex()
    {
        return view('pages.dashboard.categories.index');
    }

    public function categoriesCreate()
    {
        return view('pages.dashboard.categories.create');
    }

    public function categoriesEdit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('pages.dashboard.categories.edit', [
            'category' => $category
        ]);
    }


    public function brandsIndex()
    {
        return view('pages.dashboard.brands.index');
    }

    public function brandsCreate()
    {
        return view('pages.dashboard.brands.create');
    }

    public function brandsEdit($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();

        return view('pages.dashboard.brands.edit', [
            'brand' => $brand
        ]);
    }

    public function commentsIndex()
    {
        return view('pages.dashboard.comments.index');
    }

    public function promoCodeIndex()
    {
        return view('pages.dashboard.promo-codes.index');
    }

    public function promoCodeCreate()
    {
        return view('pages.dashboard.promo-codes.create');
    }

    public function menuBuilderIndex()
    {
        return view('pages.dashboard.menu-builder.index');
    }

    public function menuBuilderEdit(Menu $menu)
    {
        return view('pages.dashboard.menu-builder.edit', [
            'menu' => $menu
        ]);
    }

    public function teamMemberIndex()
    {
        return view('pages.dashboard.team-members.index');
    }

    public function teamMemberCreate()
    {
        return view('pages.dashboard.team-members.create');
    }

    public function teamMemberEdit(TeamMember $teamMember)
    {
        return view('pages.dashboard.team-members.edit', [
            'teamMember' => $teamMember
        ]);
    }

    public function downloadCenterIndex()
    {
        return view('pages.dashboard.download-center.index');
    }

    public function downloadCenterCreate()
    {
        return view('pages.dashboard.download-center.create');
    }

    public function faqItemIndex()
    {
        return view('pages.dashboard.faq-items.index');
    }

    public function faqItemCreate()
    {
        return view('pages.dashboard.faq-items.create');
    }

    public function faqItemEdit(FaqItem $faqItem)
    {
        return view('pages.dashboard.faq-items.edit', [
            'faqItem' => $faqItem
        ]);
    }

    public function subscriberListIndex()
    {
        return view('pages.dashboard.subscriber-list.index');
    }

    public function subscriberListDownload()
    {
        $list = SubscriberList::all();
        return (new FastExcel($list))->download('subscriber-list.xlsx');
    }

    public function manageWebsiteThemeIndex() {
        return view('pages.dashboard.manage-website-theme.index');
    }

}
