<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Post;
use App\Models\WebsiteTheme;
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

        $websiteTheme = WebsiteTheme::where('is_selected', true)->first();

        $bannerArray = [
            'image' => '',
            'backgroundOverlay' => '',
            'backgroundPosition' => '',
        ];

        if ($websiteTheme) {

            $banner = $websiteTheme->getFirstMedia('website-banner');

            $bannerArray['image'] = $banner->getFullUrl();

            if ($banner->hasCustomProperty('background-overlay')) {
                $bannerArray['backgroundOverlay'] = $banner->getCustomProperty('background-overlay') . ',';
            }

            if ($banner->hasCustomProperty('background-position')) {
                $bannerArray['backgroundPosition'] = $banner->getCustomProperty('background-position');
            }
        }

        return view('home', [
            'features' => $features,
            'articles' => $articles,
            'brands' => $brands,
            'banner' => $bannerArray,
        ]);
    }
}
