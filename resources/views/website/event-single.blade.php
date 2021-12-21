@extends('website.master')

@section('content')

<main>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <img class="w-100 event-single-img mb-5" src="{{asset('uploads/'.$event->image)}}" alt="">

                <h1>{{ $event->title }}</h1>
                <h4>{{ $event->start_date }} - {{ $event->end_date }}</h4>

            </div>

            <div class="col-md-12 mt-5">
                <p>{{ $event->content }}</p>
            </div>

            <div class="col-md-6 mt-5">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif

                <h2>Enroll in this event</h2>
                <form action="{{ route('website.enrolled', $event->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Name" />
                    </div>
                    <div class="mb-3">
                      <label>Mobile</label>
                      <input class="form-control" name="mobile" placeholder="Mobile" />
                  </div>
                  <button class="btn btn-primary w-100">Enroll</button>
                </form>
            </div>

        </div>
    </div>
</main>

@stop
