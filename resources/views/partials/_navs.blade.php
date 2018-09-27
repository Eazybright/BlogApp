
<!-- Main navigation -->
<header class=" spacing-bottom">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg grey-light indigo lighten-5 fixed-top scrolling-navbar">
        <!-- container -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="/">BlogApp</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
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
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                    @else
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user">   {{ auth::user()->name }}</i>
                        </a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('/posts') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
                            <a class="dropdown-item"  href="{{ route('categories.index') }}">Categories</a>
                            <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
                            <a class="dropdown-item" href="#">Settings</a>
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
</header>