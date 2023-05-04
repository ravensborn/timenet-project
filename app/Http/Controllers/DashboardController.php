<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

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

    public function ordersShow(Order $order) {
        return view('pages.dashboard.orders.show', [
            'order' => $order
        ]);
    }

    public function productsIndex()
    {
        return view('pages.dashboard.products.index');
    }

    public function postsIndex()
    {
        return view('pages.dashboard.posts.index');
    }

}
