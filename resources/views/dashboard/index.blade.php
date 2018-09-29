<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BlogApp | Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="icon" href="img/icon.png">
</head>

<body>
    {{-- @include('partials._navs') --}}
    <!-- Page Content -->
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3> <span class="fa fa-bank"></span> Dashboard </h3>
            </div>

            <ul class="list-unstyled components">
                <p>
                    <span class="d-inline-block mr-1"></span>
                    <span class="fa fa-user"> {{ Auth::user()->name }} </span>
                </p>
                <hr class="separator">
                <li class="active">
                    <a href="/" aria-expanded="false"> <span class="fa fa-home"></span> Home</a>
                </li>
                <li>
                    <a href="{{ route('posts.create') }}"><span class="fa fa-user-plus"></span> Add Post</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-certificate"></span> Categories </a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-tags"></span> Tags </a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-user-md"></span> Edit Profile</a>
                </li>
                
                <li>

                    <a href=""   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <span class="fa fa-sign-out"></span> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    </a>
                </li>
            </ul>

        </nav>
        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-expand-sm navbar-dark px-0 py-0 text-light" id="navbar-head">
                    <div class="container">
                        <button type="button" id="sidebarCollapse" class="btn pl-1 btn-link text-light">
                                <i class="fa fa-bars text-dark" style="font-size:25px"></i>
                        </button>
                    </div>
                </nav>
            <section class="p-4 ">
                <div class="container-fluid">
                    <div class="row table-responsive">
                        <div class="col-md-12">
                            <h1 class="text-center">All Posts</h1>
                            <table class="table table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Created At</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <th>{{ $post->id }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ substr(strip_tags($post->body), 0, 50) }} {{ strlen(strip_tags($post->body)) > 50 ? "..." : ""}}</td>
                                            <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('posts.show', $post->id)}}" class="btn btn-default btn-sm">View</a>  
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm" style="margin-top: 10px;">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



   {{-- @include('partials._footer') --}}

    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}">
    </script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>


</body>

</html>