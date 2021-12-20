@extends('admin.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>All projects</h1>

    <a href="{{ route('admin.projects.create') }}" class="btn btn-outline-success">Add New projects</a>
</div>

@include('admin.message')


<table class="table">
    <tr class="table-primary">
        <th>ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Target</th>
        <th>Amount</th>
        <th>Actions</th>
    </tr>

    @foreach ($projects as $project)
    <tr>
        <td>{{ $project->id }}</td>
        <td>{{ $project->title }}</td>
        <td><img width="100" src="{{asset('uploads/'.$project->image)}}" alt=""></td>
        <td>{{ $project->target }}</td>
        <td>
            @php
                $amount = $project->donations()->sum('amount');
                $precentage = ($amount / $project->target) * 100;
            @endphp
            {{ $amount }}
            <span class="badge badge-success">%{{round($precentage, 2)}}</span>
        </td>
        <td>
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach


</table>


@stop
