@extends('website.master')
@section('content')
    <main data-bs-spy="scroll" data-bs-target="#main-nav" data-bs-offset="0" class="scrollspy-example" tabindex="0">

        <section id="hero">

            <div class="overlay">
                <div>
                    <h1>Welcome To Nawa Culture</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus in aliquam, nemo perferendis non
                        est?</p>
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
                        <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt beatae
                            veniam eaque, explicabo nulla obcaecati corporis error eius ipsam placeat repellat quaerat ipsum
                            sapiente! Repellendus nulla eveniet voluptates velit quaerat, aut, voluptate culpa porro harum,
                            doloribus nam. Quam sunt assumenda unde esse reprehenderit mollitia et qui quasi obcaecati?
                            Deserunt officia explicabo laborum soluta libero laboriosam optio dolor officiis consectetur,
                            exercitationem consequatur assumenda eligendi, facere autem ipsa provident similique blanditiis
                            dicta perspiciatis quibusdam? Doloribus ratione delectus quo aut sint doloremque voluptatem
                            sapiente perferendis, officia quas. Error inventore quasi reiciendis repudiandae laborum eos
                            culpa pariatur! Tenetur consectetur omnis itaque sed molestiae modi.</p>
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

                {{-- flex-row-reverse --}}
                @php
                    $i = 1;
                @endphp

                {{-- $loop->even --}}

                @foreach ($events as $event)
                    <div
                        class="row mt-5 {{ $i % 2 == 1 ? 'flex-row-reverse' : '' }} align-items-center justify-content-center">
                        <div class="col-md-5">
                            <h3>{{ $event->title }}</h3>
                            <h6>{{ $event->start_date }} - {{ $event->end_date }}</h6>
                            <p class="lead">{{ $event->excerpt ?? Str::words($event->content, 10, '...') }}</p>
                            <a href="{{ route('website.events', $event->id) }}" class="btn btn-primary">Read More</a>
                        </div>

                        <div class="col-md-5">
                            <img class="w-100" src="{{ asset('uploads/' . $event->image) }}" alt="">
                        </div>
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach

            </div>
        </section>
        <!-- End Events Section -->



        <!-- Start News Section -->
        <section id="news" class="py-5 text-center">

            <div class="container">
                <h2>News</h2>

                <div class="row mt-5">
                    @foreach ($news as $new)
                        <div class="col-md-3">
                            <div class="card news-card">
                                <img src="{{ asset('uploads/' . $new->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $new->title }}</h5>
                                    <p class="card-text">{{ $new->excerpt ?? Str::words($new->content, 10, '...') }}
                                    </p>
                                    <a href="{{ route('website.news', $new->id) }}" class="btn btn-primary w-100">Go
                                        somewhere</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </section>
        <!-- End News Section -->


        <!-- Start Projects Section -->
        <section id="projects" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center">Our Projects</h2>

                @foreach ($projects as $project)
                    <div
                        class="row mt-5 {{ $loop->even ? 'flex-row-reverse' : '' }} align-items-center justify-content-center">
                        <div class="col-md-5">
                            <h3>{{ $project->title }}</h3>
                            <h6>{{ $project->target }}$</h6>
                            <p class="lead">{{ $project->excerpt ?? Str::words($project->content, 10, '...') }}</p>
                            <a href="{{ route('website.projects', $project->id) }}" class="btn btn-primary">Read More</a>
                        </div>

                        <div class="col-md-5">
                            <img class="w-100" src="{{ asset('uploads/' . $project->image) }}" alt="">
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
        <!-- End Events Section -->


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
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13619.562676632266!2d34.35968577099332!3d31.417138202459924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd84c2293da045%3A0x8c3c868834340e87!2z2K_ZitixINin2YTYqNmE2K0!5e0!3m2!1sar!2s!4v1639576809303!5m2!1sar!2s"
                            width="100%" height="410" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="col-md-5">

                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif





                        <h3 class="mb-4">For any question please contact us</h3>
                        <form action="{{ route('website.contact') }}" method="post">
                            @csrf
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
