@extends('admin.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit projects : <span class="text-danger">{{ $project->title }}</span></h1>

    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-dark">Return Back</a>
</div>

@include('admin.errors')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control" value="{{ old('title', $project->title) }}" placeholder="Title" name="title" />
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input class="form-control" type="file" name="image" />
                {{-- @if ($project->image) --}}
                    <img class="mt-1 img-thumbnail" width="200" src="{{asset('uploads/'.$project->image)}}" alt="">
                {{-- @endif --}}
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea class="form-control" placeholder="Content" name="content" rows="7">{{ old('content', $project->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Target</label>
                <input type="text" class="form-control" value="{{ old('target', $project->target) }}" placeholder="Target" name="target" />
            </div>

            <button class="btn btn-primary px-5">Update</button>

        </form>
    </div>
</div>

@stop
