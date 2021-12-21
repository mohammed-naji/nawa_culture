<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Models\Comment;
use App\Models\Enrolled;
use App\Models\Event;
use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class WebsiteController extends Controller
{
    public function index()
    {
        $news = News::all();

        $events = Event::all();

        $projects = Project::all();


        return view('website.index', compact('news', 'events', 'projects'));
    }

    public function news($id)
    {
        $news = News::findOrFail($id);

        return view('website.news-single', compact('news'));
    }

    public function comments(Request $request, $id)
    {
        //$news = News::findOrFail($id);

        // $news->comments()->create([

        // ])

        $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'news_id' => $id
        ]);

        return redirect()->route('website.news', $id);
    }

    public function events($id)
    {
        $event = Event::findOrFail($id);

        return view('website.event-single', compact('event'));
    }

    public function enrolled(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|min:10'
        ]);

        Enrolled::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'event_id' => $id
        ]);

        return redirect()->back()->with('success', 'تم تسجيلك بنجاح');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'email',
            'subject' => 'required|string|max:50',
            'message' => 'required|max:200'
        ]);

        // Send Mail

        Mail::to('admin@nawa.com')->send( new ContactUsMail( $request->except('_token') ) );


        return redirect()->back()->with('success', 'تم ارسال الرسالة');

    }

    public function projects($id)
    {
        $project = Project::findOrFail($id);

        return view('website.project-single', compact('project'));
    }

}
