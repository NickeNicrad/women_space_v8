<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::latest()->first();

        return view('pages.about', ['about' => $about]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abouts = About::all();

        return view('admin.about_form', ['abouts' => $abouts]);
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
            'content' => 'string|required',
            'category' => 'string|required',
        ]);

        $images = array();

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $images[] = Storage::disk('public')->put('images/about', $file);
            }
        }

        About::updateOrCreate(
            ['category' => $request->category],
            [
                'title' => $request->title,
                'content' => $request->content,
                'category' => $request->category,
                'images' => $request->hasFile('images') ? implode('|', $images) : '',
            ]);

        return back()->with('success', 'successfull created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $abouts = About::all();

        return view('admin.about_form', ['abouts' => $abouts, 'edit_about' => $about]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'content' => 'string|required',
            'category' => 'string|required',
        ]);

        $images = array();

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $images = Storage::disk('public')->put('images/about', $file);
            }
        }

        About::findOrFail($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'images' => $request->hasFile('images') ? implode('|', $images) : '',
        ]);

        return back()->with('success', 'successfull updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {

    }
}
