@extends('admin.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Add New projects</h1>

    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-dark">Return Back</a>
</div>

@include('admin.errors')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control" value="{{ old('title') }}" placeholder="Title" name="title" />
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input class="form-control" type="file" name="image" />
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea class="form-control" placeholder="Content" name="content" rows="7">{{ old('content') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Target</label>
                <input type="text" class="form-control" value="{{ old('target') }}" placeholder="Target" name="target" />
            </div>

            <button class="btn btn-success px-5">Add</button>

        </form>
    </div>
</div>

@stop
