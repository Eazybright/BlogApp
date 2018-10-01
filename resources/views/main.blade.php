<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
        
        @yield('stylesheets')
    </head>
    <body>
        @include('partials._navs')
        {{-- container --}}
        <div class="container">

            @include('partials._messages')

            @yield('content')
            
        </div>
        <!-- end of container -->
        @include('partials._footer')

        @include('partials._javascript')
    
        @yield('scripts')
    </body>
</html>