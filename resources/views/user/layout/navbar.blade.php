


<!-- Header -->
<nav class="navbar navbar-expand-lg bg-dark shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="{{url ('/home')}}">
             <img src="" class="img-rounded-circle">Alumni FEB
        </a>   

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: white"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url ('/')}}" style="color:white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url ('/alumni')}}" style="color:white">Alumni</a>
                    </li>
                    @auth
                        @if(auth()->user()->role == "Alumni")
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url ('/biodata')}}" style="color:white">Biodata</a>
                            </li>
                        @endif
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url ('/login')}}" style="color:white">Login</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <form class="w-100" action="/logout" method="post">
                                @csrf
                                <button class="nav-link" type="submit" style="color:white; background:transparent">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
            
        </div>

    </div>
</nav>
<!-- Close Header -->