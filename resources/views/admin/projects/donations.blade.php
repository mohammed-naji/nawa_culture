@extends('admin.master')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>All donations <span class="text-danger">({{$donations->sum('amount')}}$)</span> </h1>

</div>

@include('admin.message')


<table class="table">
    <tr class="table-primary">
        <th>ID</th>
        <th>Project</th>
        <th>Amount</th>
        <th>Donated At</th>
    </tr>

    @foreach ($donations as $donation)
    <tr>
        <td>{{ $donation->id }}</td>
        <td>{{ $donation->project->title }}</td>
        <td>{{ $donation->amount }}</td>
        <td>{{ $donation->created_at->diffForHumans() }}</td>
    </tr>
    @endforeach


</table>


@stop
