<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donation;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
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
            'target' => 'required'
        ]);

        // upload file
        $imgname = 'nawa_culture_'.time().rand().$request->file('image')->getClientOriginalName(); // nawa_culture_1254457555875452211face.png

        // Save to databse
        $project = Project::create([
            'title' => $request->title,
            'image' => $imgname,
            'content' => $request->content,
            'target' => $request->target,
        ]);

        if($project) {
            $request->file('image')->move(public_path('uploads'), $imgname);
        }

        return redirect()->route('admin.projects.index')->with('msg', 'Project added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:5000',
            'content' => 'required|min:50|max:500',
            'target' => 'required'
        ]);

        $imgname = $project->image;

        if($request->hasFile('image')) {
        // upload file
        $imgname = 'nawa_culture_'.time().rand().$request->file('image')->getClientOriginalName(); // nawa_culture_1254457555875452211face.png
        }

        // Save to databse
        $project->update([
            'title' => $request->title,
            'image' => $imgname,
            'content' => $request->content,
            'target' => $request->target,
        ]);

        if($request->hasFile('image')) {
            $request->file('image')->move(public_path('uploads'), $imgname);
        }

        return redirect()->route('admin.projects.index')->with('msg', 'Project updated successfully')->with('type', 'dark');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);
        return redirect()->route('admin.projects.index')->with('msg', 'Project deleted successfully')->with('type', 'danger');
    }

    public function donations()
    {
        $donations = Donation::all();
        
        return view('admin.projects.donations', compact('donations'));
    }
}
