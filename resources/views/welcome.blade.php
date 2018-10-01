<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BlogApp | Welcome</title>

        <link rel="icon" href="{{ asset('img/icon.png') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Main navigation -->
        <header>
            <!--Navbar-->
            <nav class="navbar navbar-expand-lg grey-light lighten-5 indigo fixed-top scrolling-navbar">
                <!-- container -->
                <div class="container">
                    <!-- Navbar brand -->
                    <a class="navbar-brand" href="/">BlogApp</a>

                    <!-- Collapse button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars text-dark"></span>
                    </button>

                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse" id="basicExampleNav">

                        <!-- Links -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
                                <a class="nav-link" href="/">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
                                <a class="nav-link" href="/blog">Blog</a>
                            </li>
                            <li class="nav-item {{ Request::is('Contact') ? "active" : "" }}">
                                <a class="nav-link" href="/contact">Contact</a>
                            </li>
                            <li class="nav-item {{ Request::is('About') ? "active" : "" }}">
                                <a class="nav-link" href="/about">About</a>
                            </li>
                        </ul>

                        {{-- right nav bar --}}
                        <ul class="nav-item dropdown navbar-nav navbar-right">

                            @include('partials._messages')
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                            @else
                            <!-- Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div><!--/.container-fluid -->
            </nav><!--end of nav-bar -->
            <!-- Mask -->
            <div class="view" id="intro">
                <div class="container-fluid full-bg-img d-flex align-items-center justify-content-center">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-20 text-center">
                            <!-- heading -->
                            <h2 class="display-3 font-bold mb-2 text-info">BlogApp</h2>

                            <!-- divider -->
                            <hr class="hr-light">

                            <!-- description -->
                            <h6 class="my-4 font-weight-bold text-info">Are you a Content writer, developer, or digital marketer?</h6>
                            <a href="{{ route('login') }}" class="btn btn-outline-white btn-rounded">Get Started<i class="fa fa-book m1-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of mask -->
        </header>
        <!-- end of main navigation -->

        <!-- main layout -->
        <main class="mt-5">
            <div class="container">
                <!-- section:best-features -->
                <section id="best-features" class="text-center">
                    <!-- heading -->
                    <h2 class="mb-4">Best Features</h2>

                    <!-- grid row -->
                    <div class="row d-flex justify-content-center mb-4">
                        <!-- grid column -->
                        <div class="col-md-8">
                            <p>Since most content starts with written words, it doesn't matter what type of content you 
                                produce, you can benefit from knowing the secrets of professional writers.
                                One of the biggest struggles content marketers have is producing enough 
                                content and simultaneously keeping the quality high. That's something professional 
                                writers must work through on a daily basis.
                            </p>
                        </div>
                    </div>

                    <!-- grid row -->
                    <div class="row">
                        <!-- grid column -->
                        <div class="col-md-4 mb-4">
                            <i class="fa fa-camera-retro fa-4x"></i>
                            <h4 class="mb-4 font-weight-bold">Experience</h4>
                            <p class="grey-text">Since most content starts with written words, it doesn't matter what type of content you 
                                    produce, you can benefit from knowing the secrets of professional writers.
                            </p>
                        </div>

                        <div class="col-md-4 mb-4">
                            <i class="fa fa-heart fa-4x"></i>
                            <h4 class="mb-4 font-weight-bold">Heart</h4>
                            <p class="grey-text">Since most content starts with written words, it doesn't matter what type of content you 
                                    produce, you can benefit from knowing the secrets of professional writers.
                            </p>
                        </div>

                        <div class="col-md-4 mb-4">
                            <i class="fa fa-bicycle fa-4x"></i>
                            <h4 class="mb-4 font-weight-bold">Adventure</h4>
                            <p class="grey-text">Since most content starts with written words, it doesn't matter what type of content you 
                                    produce, you can benefit from knowing the secrets of professional writers.
                            </p>
                        </div>
                    </div>
                </section>
                <hr class="my-5">

                
                <!-- section:examples -->
                <section id="examples" class="text-center">
                    <!-- grid row -->
                    <div class="row">
                        <!-- grid column -->
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="view overlay hm-white-slight z-depth-1-half">
                                <img src="/img/bind-blank-blank-page-315790.jpg" class="img-fluid" alt="blog"> 
                                <div class="mask"></div>
                            </div>
                            <h4 class="my-4 font-wieght-bold">Blog Posts</h4>
                            <p class="grey-text">Since most content starts with written words, it doesn't matter what type of content you 
                                    produce, you can benefit from knowing the secrets of professional writers.
                            </p>
                        </div>
                        <!-- grid column -->
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="view overlay hm-white-slight z-depth-1-half">
                                <img src="/img/chips.jpeg" class="img-fluid" alt="blog"> 
                                <div class="mask"></div>
                            </div>
                            <h4 class="my-4 font-wieght-bold">Tech News</h4>
                            <p class="grey-text">Since most content starts with written words, it doesn't matter what type of content you 
                                    produce, you can benefit from knowing the secrets of professional writers.
                            </p>
                        </div>
                        <!-- grid column -->
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="view overlay hm-white-slight z-depth-1-half">
                                <img src="/img/macbook.jpeg" class="img-fluid" alt="blog" height="250px"> 
                                <div class="mask"></div>
                            </div>
                            <h4 class="my-4 font-wieght-bold">Tutorials</h4>
                            <p class="grey-text">Since most content starts with written words, it doesn't matter what type of content you 
                                    produce, you can benefit from knowing the secrets of professional writers.
                            </p>
                        </div>
                    </div>
                </section>
                <hr class="my-5">
                
                <!-- sectioncontact -->
                <section id="contact">
                    <!-- heading -->
                    <h2 class="mb-5 font-weight-bold text-center">Contact us</h2>
                    <!-- grid row -->
                    <div class="row">
                        <!-- grid column -->
                        <div class="col-lg-5 col-md-12">
                            <form action="{{ url('contact') }}" method="POST" class="p-5">
                                {{ csrf_field() }}
                                <div class="md-form form-md">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="email" id="email" name="email" class="form-control">
                                    <label name="email">Email address</label>
                                </div>

                                <div class="md-form form-md">
                                    <i class="fa fa-tag prefix grey-text"></i>
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label name="subject">Subject</label>
                                </div>

                                <div class="md-form form-md">
                                    <i class="fa fa-pencil prefix grey-text"></i>
                                    <textarea type="text" id="message" name="message" class="md-textarea" style="height: 100px;"></textarea>
                                    <label name="message">Message</label>
                                </div>
                                    
                                <input type="submit" value="Send" class="btn btn-success text-center fa fa-paper-plane ml-2">
                                
                            </form>
                        </div>
                        <!-- grid column -->
                        <div class="col-lg-7 col-md-12">
                            <div class="view overlay hm-white-slight z-depth-1-half">
                                <img src="/img/tel.jpeg" class="img-fluid" alt="blog">
                            </div> 
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <!-- end of main layout -->

        <!-- Footer -->
        <footer class="page-footer font-small mdb-color pt-4">
            <!-- Footer Links -->
            <div class="container text-center text-md-left">        
                <!-- Footer links -->
                <div class="row text-center text-md-left mt-3 pb-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">BlogApp</h6>
                        <p>At BlogApp, we are here to serve you better</p>
                    </div>
                    <!-- Grid column -->
            
                    <hr class="w-100 clearfix d-md-none">
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Services</h6>
                        <p><a href="#!">Blog</a></p>
                        <p><a href="#!">Tutorials</a></p>
                        <p><a href="#!">Tech News</a></p>
                        <p><a href="#!">and lots more....</a></p>
                    </div>
                    <hr class="w-100 clearfix d-md-none">
                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                        <p><i class="fa fa-home mr-3"></i>Dept. of Computer Engineering, OAU, Ile-Ife, Osun state, Nigeria</p>
                        <p><i class="fa fa-envelope mr-3"></i> doneazy911@gmail.com</p>
                        <p><i class="fa fa-phone mr-3"></i>+2348125306027</p>
                        <div class="text-center">
                                <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/eazybright12" class="btn-floating btn-sm rgba-white-slight mx-1">
                                    <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/1Doneazy" class="btn-floating btn-sm rgba-white-slight mx-1">
                                    <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://plus.google.com/u/0/111098536892512906572" class="btn-floating btn-sm rgba-white-slight mx-1">
                                    <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.linkedin.com/in/ezekiel-kolawole-237aa8b0/" class="btn-floating btn-sm rgba-white-slight mx-1">
                                    <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                </ul>
                            </div>
                    </div>
                    <!-- Grid column -->            
                </div>
                <!-- Footer links -->
        
                <hr>
            
                <!-- Grid row -->
                <div class="row d-flex align-items-center">
            
                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8">
            
                    <!--Copyright-->
                    <p class="text-center text-md-left">© 2018 Copyright:
                        <a href="https://mdbootstrap.com/bootstrap-tutorial/">
                        <strong> Eazybright</strong>
                        </a>
                    </p>
            
                    </div>            
                </div>
                <!-- Grid row -->
            </div>
            <!-- Footer Links -->
    
        </footer>
        <!-- Footer -->
    
        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    </body>
</html>