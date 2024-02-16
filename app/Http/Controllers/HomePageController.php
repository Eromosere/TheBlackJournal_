<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $travelTipsCategory = 'travel tips';

        $travelTipsPosts = Post::with('category')
            ->whereHas('category', function ($query) use ($travelTipsCategory) {
                $query->where('name', $travelTipsCategory);
            })
            ->take(4)
            ->latest()
            ->get();

        // category
        $posts = Post::with('category')->whereHas('category', function ($query) {
            $query->where('name', 'tasteful tales');
        })->take(4)->latest()->get();

        return view('welcome', compact('posts','travelTipsPosts'));
    }

    public function show($slug)
    {
        $post = Post::with('comments')->where('slug', $slug)->first();

        if (!$post) {
            return abort(404);
        }

        return view('single-blog-post', compact('post'));
    }

    public function tastefulTales()
    {
        $posts = Post::with('category')->whereHas('category', function ($query) {
            $query->where('name', 'tasteful tales');
        })->latest()->paginate();

        return view('pages.tasteful-tales', compact('posts'));
    }

    public function travelTips()
    {
        $travelTipsCategory = 'travel tips';

        $travelTipsPosts = Post::with('category')
            ->whereHas('category', function ($query) use ($travelTipsCategory) {
                $query->where('name', $travelTipsCategory);
            })
            ->latest()->paginate();

        return view('pages.travel-tips', compact('travelTipsPosts'));
    }

    public function aboutUs()
    {
        return view('pages.about-us');
    }
}
