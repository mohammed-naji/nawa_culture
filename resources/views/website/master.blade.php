<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>

  <link rel="stylesheet" href="{{ asset('websiteasset/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('websiteasset/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('websiteasset/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('websiteasset/css/owl.theme.default.min.css') }}">

  <link rel="stylesheet" href="{{ asset('websiteasset/css/style.css') }}">

</head>

<body>

  <header>

    <nav id="main-nav" class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ route('website.home') }}">
          <img width="50" src="{{ asset('websiteasset/images/logo.png') }}" alt="">
          NAWA Culture
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#hero">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#events">Events</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#news">News</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#gallery">Image Gallery</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-search"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                  <form action="">
                    <div class="input-group px-2 header-search">
                      <input type="text" class="form-control" placeholder="Search..">
                      <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                    </div>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>

  @yield('content')

  <footer class="py-5 bg-light">
    <p class="m-0 text-center">All Copyright reserved to <a href="https://mohamednaji.com">Mohammed Naji</a> <i
        class="far fa-copyright"></i> 2022 </p>
  </footer>


</body>
<script src="{{ asset('websiteasset/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('websiteasset/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('websiteasset/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('websiteasset/js/main.js') }}"></script>
</body>

</html>
