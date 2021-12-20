<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $news = News::all();

        $events = Event::all();


        return view('website.index', compact('news', 'events'));
    }

    public function news($id)
    {
        $news = News::findOrFail($id);

        return view('website.news-single', compact('news'));
    }
}
