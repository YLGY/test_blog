<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => Setting::first()->site_name,
            'setting' => Setting::first(),
            'categories' => Category::all()->take(5),
            'first_post' => Post::orderBy('created_at', 'desc')->first(),
            'second_post' => Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first(),
            'third_post' => Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first(),
            'outdoor' => Category::find(2),
            'outdoor_posts' => Category::find(2)->posts()->orderBy('created_at', 'desc')->take(3)->get(),
            'helloworld' => Category::find(1),
            'helloworld_posts' => Category::find(1)->posts()->orderBy('created_at', 'desc')->take(3)->get()
        ]);
    }

    public function single($slug) 
    {
        $post = Post::where('slug', $slug)->first();

        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');

        return view('single', [
            'post' => $post,
            'title' => $post->title,
            'categories' => Category::all()->take(5),
            'setting' => Setting::first(),
            'next' => Post::find($next_id),
            'prev' => Post::find($prev_id),
            'tags' => Tag::all()
        ]);
    }

    public function category($id) 
    {
        $category = Category::find($id);

        return view('category', [
            'category' => $category,
            'title' => $category->name,
            'setting' => Setting::first(),
            'categories' => Category::all()->take(5)
        ]);
    }

    public function tag($id) {
        $tag = Tag::find($id);

        return view('tag', [
            'tag' => $tag,
            'title' => $tag->tag,
            'setting' => Setting::first(),
            'categories' => Category::all()->take(5)
        ]);
    }
}
