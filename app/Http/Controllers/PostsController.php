<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Post;
use App\Category;
use App\Tag;
use Auth;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::orderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if (count($categories) == 0 || $tags->count() == 0) {
            Session::flash('info', 'You must have some categories and tags before adding post');
            return redirect()->back();
        }

        $tags = Tag::all();

        return view('admin.posts.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        /*
        $featured = $request->featured;
        $featured_new_name = time() . $featured->getClientOriginalName();
        */


        $featured_path = $request->file('featured')->store('public');

        
        $post = Post::create([
            'title' => $request->title,
            'featured' => $featured_path,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]);
        
        $post->tags()->attach($request->tags);

        $post->save();

        $request->session()->flash('success', 'Post created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit', 
            [
                'post' => $post,
                'categories' => $categories,
                'tags' => Tag::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($id);
        if ($request->hasFile('featured')) {
            $featured_path = $request->file('featured')->store('public');
            $post->featured = $featured_path;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();
        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post update successfully');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'You trash the post successfully');
        return redirect()->back();
    }

    public function trashed() {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        $post->forceDelete();

        Session::flash('success', 'Post deleted permanently');
        return redirect()->back();
    }

    public function restore($id) {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Post restore successfully');
        return redirect()->route('posts.index');
    }
}
