@extends('website.master')

@section('content')
<main>
    <div class="container my-5">
        <div class="row">
          <div class="col-md-6">
            <img src="{{ asset('uploads/'.$news->image) }}" class="w-100" alt="">
          </div>

          <div class="col-md-6">
            <h1>{{ $news->title }}</h1>
            <span class="d-block mb-3">{{ $news->created_at->format('d/m/Y') }}</span>
            <p>{{ $news->content }}</p>
          </div>

          <div class="col-md-12 mt-5">
            <h3>Comments ({{$news->comments->count()}})</h3>

            <ul class="list-unstyled">
                @foreach ($news->comments as $item)
                <li>
                    <b>{{ $item->user->name }}</b>
                    <small>{{ $item->created_at->format('d/m/Y') }}</small>
                    <p>{{ $item->comment }}</p>
                  </li>
                @endforeach

            </ul>

            <h4>Leave Comment</h4>
            @auth
            <form>
                <textarea name="comment" class="form-control mb-3" id="comment" rows="5"></textarea>
                <div class="text-end"><button class="btn btn-primary px-5">Post</button></div>
              </form>
            @endauth

            @guest
                <p>To add comment here you must login here <a href="{{ route('login') }}">Login</a>. You dont have account register here <a href="{{ route('register') }}">Resgister</a></p>
            @endguest
          </div>
        </div>
    </div>
</main>
@stop
