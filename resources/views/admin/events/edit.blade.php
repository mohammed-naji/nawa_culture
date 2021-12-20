@extends('admin.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit Event : <span class="text-danger">{{ $event->title }}</span></h1>

    <a href="{{ route('admin.events.index') }}" class="btn btn-outline-dark">Return Back</a>
</div>

@include('admin.errors')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control" value="{{ old('title', $event->title) }}" placeholder="Title" name="title" />
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input class="form-control" type="file" name="image" />
                {{-- @if ($event->image) --}}
                    <img class="mt-1 img-thumbnail" width="200" src="{{asset('uploads/'.$event->image)}}" alt="">
                {{-- @endif --}}
            </div>

            <div class="mb-3">
                <label>Excerpt</label>
                <textarea class="form-control" placeholder="Excerpt" name="excerpt" rows="4">{{ old('excerpt', $event->excerpt) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea class="form-control" placeholder="Content" name="content" rows="7">{{ old('content', $event->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Start Date</label>
                <input type="date" class="form-control" value="{{ old('start_date', $event->start_date) }}" placeholder="start Date" name="start_date" />
            </div>

            <div class="mb-3">
                <label>End Date</label>
                <input type="date" class="form-control" value="{{ old('end_date', $event->end_date) }}" placeholder="End Date" name="end_date" />
            </div>

            <button class="btn btn-primary px-5">Update</button>

        </form>
    </div>
</div>

@stop
