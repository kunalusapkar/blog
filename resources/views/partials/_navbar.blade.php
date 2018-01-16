<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/blog">Blog <span class="sr-only"></span></a>
            </li>
            </li> <a class="nav-link" href="/about">About Us </a>
            </li>
          </li> <a class="nav-link" href="/contactus">Contact Us </a>
            </li>
            @if (Auth::check())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hello {{Auth::user()->name}}
                  </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/posts">Post</a>

                    <a class="dropdown-item" href="auth/logout">Logout</a>
                </div>
            </li>

            @else
            <a href="{{route('login')}}" class="btn btn-default">Login</a>
            @endif

        </ul>

    </div>
</nav>
