<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5000',
            'content' => 'required|min:50|max:500',
        ]);

        // upload file
        $imgname = 'nawa_culture_'.time().rand().$request->file('image')->getClientOriginalName(); // nawa_culture_1254457555875452211face.png

        // Save to databse
        $news = News::create([
            'title' => $request->title,
            'image' => $imgname,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
        ]);

        if($news) {
            $request->file('image')->move(public_path('uploads'), $imgname);
        }


        return redirect()->route('admin.news.index')->with('msg', 'News added successfully')->with('type', 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
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
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:5000',
            'content' => 'required|min:50|max:500',
        ]);

        $news = News::find($id);

        $imgname = $news->image;
        if($request->hasFile('image')) {
            // upload file
            $imgname = 'nawa_culture_'.time().rand().$request->file('image')->getClientOriginalName(); // nawa_culture_1254457555875452211face.png
        }


        // Save to databse
        $news->update([
            'title' => $request->title,
            'image' => $imgname,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
        ]);

        if($request->hasFile('image')) {
            $request->file('image')->move(public_path('uploads'), $imgname);
        }


        return redirect()->route('admin.news.index')->with('msg', 'News updated successfully')->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
        // News::find($id)->delete();
        return redirect()->route('admin.news.index')->with('msg', 'News deleted successfully')->with('type', 'danger');
    }
}
