<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item dropdown me-1">
                        @isset($messagesRecived)
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bi bi-envelope bi-sub fs-4 text-warning'></i>
                            <span class="badge text-warning">{{ $total == 1 ? '' :'('. $total .')'  }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            @foreach ($messagesRecived as $message)
                            <li>
                                <h6 class="dropdown-header">{{ $message->transmittor->name }}</h6>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('talk',$message->transmittor->id) }}">{{ Str::substr($message->content,0,10) }}...</a></li>
                            <hr>
                            @endforeach

                        </ul>

                        @else
                        <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Mail</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">No new message</a></li>

                        </ul>
                        @endisset


                    </li>

                    <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <h6 class="dropdown-header">Notifications</h6>
                            </li>
                            <li><a class="dropdown-item">No notification available</a></li>

                        </ul>

                    </li>
                </ul>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                <h6 class="mb-0 text-gray-600">{{ Auth::user()->name }}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{ Auth()->user()->role }}</p>
                            </div>
                            <div class="user-img d-flex align-items-center">
                                <div class="avatar">
                                    <img src="{{ url('images/'.Auth::user()->img) }}">
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        {{-- <li>
                            <h6 class="dropdown-header">Hello,{{ Auth::user()->name }} </h6>
                        </li> --}}
                        <li>
                            <a class="dropdown-item" href="{{ route('users.edit',Auth::user()->id) }}"><i class="icon-mid bi bi-person me-2"></i> My
                                Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                Settings
                            </a>
                        </li>

                            <hr class="dropdown-divider">
                        </li>


                            <a href="{{ route('logout') }} "class="dropdown-item"
                                     onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                        </a>


                    </ul>

                </div>
            </form>
            </div>
        </div>
    </nav>
</header>
{{--
<nav class="navbar navbar-expand-lg navbar-dark menu shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="">
        <h4>HS One </h4>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="">Services</a></li>
          <li class="nav-item"><a class="nav-link active" href="">Testimonials</a></li>
          <li class="nav-item"><a class="nav-link active" href="">faq</a></li>
          <li class="nav-item"><a class="nav-link active" href="">portfolio</a></li>
          <li class="nav-item"><a class="nav-link active" href="">contact</a></li>
        <li class="nav-item"><a class="nav-link active" href=""></a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('admin.users.index') }}">Dashboard</a></li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-jet-dropdown-link>
            </form>
          @if (Route::has('login'))
                @auth
                    @if (Auth::user()->role == 'admin')


                    @else

                    @endif

                @else
                <li class="nav-item  "> <a class="nav-link btn btn-outline-primary login-btn" href="{{ route('login') }}">Login </a>

                <li class="nav-item "> <a class="nav-link btn  btn-outline-primary login-btn" href="{{ route('register') }}"> Register</a>
                @endauth

            @endif
        </ul>

      </div>
    </div>
  </nav> --}}
