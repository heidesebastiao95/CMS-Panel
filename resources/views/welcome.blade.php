<html lang="en"><head>
   

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/pages/error.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.svg') }}" type="image/x-icon">
    <title>HS One</title>
</head>

<body>
    <div id="error">


        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                {{-- <img class="img-error" src="{{ url('images/error-403.png') }}" alt="Not Found"> --}}
                <div class="text-center">
                    <h1 class="error-title">Welcome</h1>
                    <p class="fs-5 text-gray-600">You are authenticated now,  to see this page.</p>
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('dashboard') }}" class="btn btn-lg btn-outline-primary mt-2">Go Dashboard</a>
                    @else
                    <form action="{{ route('logout') }}" method="post">
                        @csrf

                        <button type="submit" class="btn btn-lg btn-outline-primary mt-3">Logout</button>
                    </form>
                    @endif
                    
                </div>
            </div>
        </div>


    </div>


</body></html>