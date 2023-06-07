<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class PageController extends Controller
{

   public function faq() {
       return view('pages.faq');
   }

    public function downloads() {
        return view('pages.downloads');
    }

    public function soon() {
        return view('pages.coming-soon');
    }

    public function about() {

       $teamMembers = TeamMember::where('is_visible', true)->orderBy('order', 'asc')->get();

       return view('pages.about', [
           'teamMembers' => $teamMembers
       ]);
    }

    public function banned() {

        return view('pages.banned');
    }
}
