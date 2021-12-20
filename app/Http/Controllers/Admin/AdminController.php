<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrolled;
use App\Models\Event;
use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $news_count = News::count();
        $projects_count = 8;
        $events_count = Event::count();
        $enrollments_count = Enrolled::count();

        return view('admin.index', compact('news_count', 'projects_count', 'events_count', 'enrollments_count'));
    }
}
