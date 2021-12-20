@extends('admin.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Add New Events</h1>

    <a href="{{ route('admin.events.index') }}" class="btn btn-outline-dark">Return Back</a>
</div>

@include('admin.errors')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
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
                <label>Excerpt</label>
                <textarea class="form-control" placeholder="Excerpt" name="excerpt" rows="4">{{ old('excerpt') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Content</label>
                <textarea class="form-control" placeholder="Content" name="content" rows="7">{{ old('content') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Start Date</label>
                <input type="date" class="form-control" value="{{ old('start_date') }}" placeholder="start Date" name="start_date" />
            </div>

            <div class="mb-3">
                <label>End Date</label>
                <input type="date" class="form-control" value="{{ old('end_date') }}" placeholder="End Date" name="end_date" />
            </div>

            <button class="btn btn-success px-5">Add</button>

        </form>
    </div>
</div>

@stop
