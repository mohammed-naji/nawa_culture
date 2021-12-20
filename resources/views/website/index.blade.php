@extends('website.master')
@section('content')
<main data-bs-spy="scroll" data-bs-target="#main-nav" data-bs-offset="0" class="scrollspy-example" tabindex="0">

    <section id="hero">

      <div class="overlay">
        <div>
          <h1>Welcome To Nawa Culture</h1>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus in aliquam, nemo perferendis non est?</p>
          <a class="btn btn-primary" href="#about">More About Us</a>
        </div>
      </div>

    </section>

    <div class="latest-news">
      <span>Latest News</span>
      <marquee onmouseover="this.stop();" onmouseout="this.start();">
          @foreach ($news as $new)
          <a href="{{ route('website.news', $new->id) }}">{{ $new->title }}</a>
            @if (!$loop->last)
            |
            @endif
          @endforeach
      </marquee>
    </div>

    <!-- Start About Section -->
    <section id="about" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>About Us</h2>
            <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt beatae veniam eaque, explicabo nulla obcaecati corporis error eius ipsam placeat repellat quaerat ipsum sapiente! Repellendus nulla eveniet voluptates velit quaerat, aut, voluptate culpa porro harum, doloribus nam. Quam sunt assumenda unde esse reprehenderit mollitia et qui quasi obcaecati? Deserunt officia explicabo laborum soluta libero laboriosam optio dolor officiis consectetur, exercitationem consequatur assumenda eligendi, facere autem ipsa provident similique blanditiis dicta perspiciatis quibusdam? Doloribus ratione delectus quo aut sint doloremque voluptatem sapiente perferendis, officia quas. Error inventore quasi reiciendis repudiandae laborum eos culpa pariatur! Tenetur consectetur omnis itaque sed molestiae modi.</p>
          </div>
          <div class="col-md-6">
            <img class="w-100" src="{{ asset('websiteasset/images/117A0833m.jpg') }}" alt="">
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->



    <!-- Start Events Section -->
    <section id="events" class="py-5 bg-light">
      <div class="container">
        <h2 class="text-center">Our Events</h2>

        <div class="row mt-5 align-items-center justify-content-center">
          <div class="col-md-5">
            <h3>Event Title</h3>
            <h6>Event Subtitle</h6>
            <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo non soluta corporis impedit provident iure doloribus quasi, quo esse, voluptates.</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>

          <div class="col-md-5">
            <img class="w-100" src="{{ asset('websiteasset/') }}" alt="">
          </div>
        </div>

        <div class="row flex-row-reverse mt-5 align-items-center justify-content-center">
          <div class="col-md-5">
            <h3>Event Title</h3>
            <h6>Event Subtitle</h6>
            <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo non soluta corporis impedit provident iure doloribus quasi, quo esse, voluptates.</p>
            <a href="#" class="btn btn-primary">Read More</a>
          </div>

          <div class="col-md-5">
            <img class="w-100" src="{{ asset('websiteasset/images/117A0833m.jpg') }}" alt="">
          </div>
        </div>
      </div>
    </section>
    <!-- End Events Section -->



    <!-- Start News Section -->
    <section id="news" class="py-5 text-center">

      <div class="container">
        <h2>News</h2>

        <div class="row mt-5">
          <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary w-100">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary w-100">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary w-100">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary w-100">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- End News Section -->


    <!-- Start Gallery Section -->
    <section id="gallery" class="py-5 bg-light">
      <div class="container">
        <div class="owl-carousel">
          <div> <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" alt=""> </div>
          <div> <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" alt=""> </div>
          <div> <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" alt=""> </div>
          <div> <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" alt=""> </div>
          <div> <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" alt=""> </div>
          <div> <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" alt=""> </div>
          <div> <img src="{{ asset('websiteasset/images/117A0833m.jpg') }}" alt=""> </div>
        </div>
      </div>
    </section>
    <!-- End Gallery Section -->


    <!-- Start Contact Section -->
    <section id="contact" class="py-5">

      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13619.562676632266!2d34.35968577099332!3d31.417138202459924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd84c2293da045%3A0x8c3c868834340e87!2z2K_ZitixINin2YTYqNmE2K0!5e0!3m2!1sar!2s!4v1639576809303!5m2!1sar!2s" width="100%" height="410" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
          <div class="col-md-5">
            <h3 class="mb-4">For any question please contact us</h3>
            <form action="" method="">
              <div class="mb-3">
                <input type="text" placeholder="Name" name="name" class="form-control">
              </div>
              <div class="mb-3">
                <input type="email" placeholder="Email" name="email" class="form-control">
              </div>
              <div class="mb-3">
                <input type="text" placeholder="Subject" name="subject" class="form-control">
              </div>
              <div class="mb-3">
                <textarea placeholder="Message" name="message" rows="5" class="form-control"></textarea>
              </div>
              <button class="btn btn-primary w-100"><i class="fas fa-paper-plane"></i> Send</button>
            </form>
          </div>
        </div>
      </div>

    </section>
    <!-- End Contact Section -->

  </main>
@stop
