@extends('admin.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit News : <span class="text-danger">{{ $news->title }}</span></h1>

    <a href="{{ route('admin.news.index') }}" class="btn btn-outline-dark">Return Back</a>
</div>

@include('admin.errors')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control" value="{{ old('title', $news->title) }}" placeholder="Title" name="title" />
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input class="form-control" type="file" name="image" />
                {{-- @if ($news->image) --}}
                    <img class="mt-1 img-thumbnail" width="200" src="{{asset('uploads/'.$news->image)}}" alt="">
                {{-- @endif --}}
            </div>

            <div class="mb-3">
                <label>Excerpt</label>
                <textarea class="form-control" placeholder="Excerpt" name="excerpt" rows="4">{{ old('excerpt', $news->excerpt) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea class="form-control" placeholder="Content" name="content" rows="7">{{ old('content', $news->content) }}</textarea>
            </div>

            <button class="btn btn-primary px-5">Update</button>

        </form>
    </div>
</div>

@stop
