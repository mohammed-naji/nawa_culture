@extends('website.master')

@section('content')

<main>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <img class="w-100 event-single-img mb-5" src="{{asset('uploads/'.$project->image)}}" alt="">

                <h1>{{ $project->title }}</h1>
                <h4>{{ $project->target }}$ - {{ $project->donations->sum('amount') }}$</h4>

                @php
                    $p = ($project->donations->sum('amount') / $project->target) * 100;
                @endphp

                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$p}}%;" aria-valuenow="{{$p}}" aria-valuemin="0" aria-valuemax="100">{{$p}}%</div>
                  </div>
            </div>

            <div class="col-md-12 mt-5">
                <p>{{ $project->content }}</p>
            </div>

            <div class="col-md-6 mt-5">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif

                @if ($p <= 100)
                <h2>Donate</h2>
                <form action="{{ route('website.enrolled', $project->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Amount" />
                    </div>
                  <button class="btn btn-primary w-100">Donate</button>
                </form>
                @endif

            </div>

        </div>
    </div>
</main>

@stop
