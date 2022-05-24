<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Link;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        $categories = Category::all();

        return view('pages.blogs', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::latest()->get();
        $categories = Category::all();

        return view('admin.blog_form', ['posts' => $posts, 'categories' => $categories]);
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
            'title' => 'string|required|unique:posts|max:2000',
            'content' => 'string|required|unique:posts|max:50000',
            'category_id' => 'integer|required',
        ]);

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $images = array();

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $images[] = Storage::disk('public')->put('images/posts', $file);
            }
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => Auth::id(),
            'category_id' => $request->category_id,
            'images' => $request->hasFile('images') ? implode('|', $images) : null,
        ]);

        return back()->with('success', 'successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $posts = Post::where('slug', '!=', $slug)->orderBy('created_at', 'desc')->paginate(4);
        $links = Link::get();
        $categories = Category::orderBy('title', 'asc')->get();

        return view('pages.blog-item', ['post' => $post, 'posts' => $posts, 'links' => $links, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_post = Post::findOrFail($id);
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::all();

        return view('admin.blog_form', ['edit_post' => $edit_post, 'posts' => $posts, 'categories' => $categories]);
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
            'title' => 'string|required|max:2000',
            'content' => 'string|required|max:50000',
            'category_id' => 'integer|required',
        ]);

        $images = array();

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $images[] = Storage::disk('public')->put('images/posts', $file);
            }

            Post::findOrFail($id)->update([
                'images' => implode('|', $images),
            ]);
        }

        Post::findOrFail($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => Auth::id(),
            'category_id' => $request->category_id,
        ]);

        return redirect('admin/posts/create')->with('success', 'successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return back()->with('success', 'successfully deleted!');
    }
}
