<!doctype html>
<html lang="en">

<head>
    @include('partials._head')

</head>

<body>
    <!--Nav bar  -->

    @include('partials._navbar')

    <!--Nav bar  -->
    <div class="container">
         @include('partials._messages')
      

        @yield('content')
         @include('partials._footer')
    </div>
    <!-- end of container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    @include('partials._script') @yield('scripts')
</body>

</html>
