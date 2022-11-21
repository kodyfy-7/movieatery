<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>76Edica :: Home</title>
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    <script src="{{ asset('front/assets/vendors/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/loader.js') }}"></script> --}}
</head>
<body>
    {{-- <div class="edica-loader"></div> --}}
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{ route('welcome') }}">Movi<b>Eatery</b></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('welcome') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                            <div class="dropdown-menu" aria-labelledby="blogDropdown">
                                @foreach ($categories as $category)
                                    <a class="dropdown-item" href="">{{ $category->title }}</a>
                                @endforeach
                                <a class="dropdown-item" href="blog.html"><strong>Show More</strong></a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            @guest
                                <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                                <div class="dropdown-menu" aria-labelledby="blogDropdown">
                                    @if (Route::has('login'))
                                        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @endif

                                    @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                </div>
                            @else
                                <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                <div class="dropdown-menu" aria-labelledby="blogDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            @endguest
                        </li>
                        <li class="nav-item">
                            <form action="/">
                                @csrf
                                <input type="text" placeholder="search" name="search" class="form-control">
                                {{-- <button type="submit">Go</button> --}}
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="blog">
        <div class="container">
            {{-- <h1 class="edica-page-title" data-aos="fade-up">Blog</h1> --}}

            @yield('content')
            @hasSection('sidebar')
                    <div class="col-md-4 sidebar" data-aos="fade-left">
                        <div class="widget widget-post-carousel">
                            <h5 class="widget-title">Movie Lists</h5>
                            <div class="post-carousel">
                                <div id="carouselId" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselId" data-slide-to="1"></li>
                                        <li data-target="#carouselId" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        @forelse ($posts as $post)
                                        <figure class="carousel-item active">
                                            <img src="{{ $post->image }}" alt="First slide">
                                            <figcaption class="post-title">
                                                <a href="{{ route('movies.show', $post->id) }}">{{ $post->title }}</a>
                                            </figcaption>
                                        </figure>
                                        @empty
                                            <p>Coming soon</p>
                                        @endforelse
                                        {{-- @foreach ($categories as $category)
                                            <a class="dropdown-item" href="">{{ $category->title }}</a>
                                        @endforeach --}}
                                        {{-- <figure class="carousel-item active">
                                            <img src="{{ asset('front/assets/images/blog_widget_carousel.jpg') }}" alt="First slide">
                                            <figcaption class="post-title">
                                                <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                            </figcaption>
                                        </figure>
                                        <figure class="carousel-item">
                                                <img src="{{ asset('front/assets/images/blog_7.jpg') }}" alt="First slide">
                                                <figcaption class="post-title">
                                                    <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                                </figcaption>
                                        </figure>
                                        <div class="carousel-item">
                                                <img src="{{ asset('front/assets/images/blog_5.jpg') }}" alt="First slide">
                                                <figcaption class="post-title">
                                                    <a href="#!">Front becomes an official Instagram Marketing Partner</a>
                                                </figcaption>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="widget widget-post-list">
                            <h5 class="widget-title">Post List</h5>
                            <ul class="post-list">
                                <li class="post">
                                    <a href="#!" class="post-permalink media">
                                        <img src="{{ asset('front/assets/images/blog_widget_1.jpg') }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">Front becomes an official Instagram Marketing Partner</h6>
                                        </div>
                                    </a>
                                </li>
                                <li class="post">
                                    <a href="#!" class="post-permalink media">
                                        <img src="{{ asset('front/assets/images/blog_widget_2.jpg') }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">Front becomes an official Instagram Marketing Partner</h6>
                                        </div>
                                    </a>
                                </li>
                                <li class="post">
                                    <a href="#!" class="post-permalink media">
                                        <img src="{{ asset('front/assets/images/blog_widget_3.jpg') }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">Front becomes an official Instagram Marketing Partner</h6>
                                        </div>
                                    </a>
                                </li>
                                <li class="post">
                                    <a href="#!" class="post-permalink media">
                                        <img src="{{ asset('front/assets/images/blog_widget_4.jpg') }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">Front becomes an official Instagram Marketing Partner</h6>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget-title">Categories</h5>
                            <img src="{{ asset('front/assets/images/blog_widget_categories.jpg') }}" alt="categories" class="w-100">
                        </div> --}}
                    </div>
                </div>
 
                <div class="clearfix"></div>
            @endif
                

        </div>

    </main>

    <section class="edica-footer-banner-section">
        <div class="container">
            <div class="footer-banner" data-aos="fade-up">
                <h1 class="banner-title">Random Quotes.</h1>
                <p class="banner-text">You could not live with your own failure. Where did that bring you, back to me.</p>
            </div>
        </div>
    </section>
    <footer class="edica-footer" data-aos="fade-up">
        <div class="container">
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <a href="index.html" class="footer-brand-wrapper">
                        <img src="{{ asset('front/assets/images/logo.svg') }}" alt="edica logo">
                    </a>
                    <p class="contact-details">hello@edica.com</p>
                    <p class="contact-details">+23 3000 000 00</p>
                    <nav class="footer-social-links">
                        <a href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a href="#!"><i class="fab fa-twitter"></i></a>
                        <a href="#!"><i class="fab fa-behance"></i></a>
                        <a href="#!"><i class="fab fa-dribbble"></i></a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="footer-nav">
                        <a href="#!" class="nav-link">Company</a>
                        <a href="#!" class="nav-link">Android App</a>
                        <a href="#!" class="nav-link">ios App</a>
                        <a href="#!" class="nav-link">Blog</a>
                        <a href="#!" class="nav-link">Partners</a>
                        <a href="#!" class="nav-link">Careers</a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="footer-nav">
                        <a href="#!" class="nav-link">FAQ</a>
                        <a href="#!" class="nav-link">Reporting</a>
                        <a href="#!" class="nav-link">Block Storage</a>
                        <a href="#!" class="nav-link">Tools & Integrations</a>
                        <a href="#!" class="nav-link">API</a>
                        <a href="#!" class="nav-link">Pricing</a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <div class="dropdown footer-country-dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="footerCountryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="flag-icon flag-icon-gb flag-icon-squared"></span> United Kingdom <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="footerCountryDropdown">
                            <button class="dropdown-item" href="#">
                                <span class="flag-icon flag-icon-us flag-icon-squared"></span> United States
                            </button>
                            <button class="dropdown-item" href="#">
                                <span class="flag-icon flag-icon-au flag-icon-squared"></span> Australia
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-content">
                <nav class="nav footer-bottom-nav">
                    <a href="#!">Privacy & Policy</a>
                    <a href="#!">Terms</a>
                    <a href="#!">Site Map</a>
                </nav>
                <p class="mb-0">© Edica. 2020 <a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer" class="text-reset">bootstrapdash</a> . All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('front/assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
      </script>
</body>

</html>