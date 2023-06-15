
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Website Title -->
    <title>HS One</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/widgets/chat.css') }}">
   <link rel="shortcut icon" href="{{ asset('images/icon.ico') }}" type="image/x-icon">

    
    {{-- <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script> --}}

    @include('admin.layouts.style')
</head>

<body id="body" >
  <div id="app">



        {{-- Inclusão do sidebar --}}

        @include('admin.layouts.sidebar')

        <div id="main" class='layout-navbar'>
            {{-- Inclusão do navbar --}}
            @include('admin.layouts.navbar')
            <div id="main-content">

                <div class="page-heading">
                    {{-- Inclusão dos cards --}}
                    @yield('cards')
                    {{-- Conteudo principal  --}}
                    @yield('content')

                </div>

                {{-- @include('admin.layouts.footer') --}}


                @include('admin.layouts.footer')

            </div>
        </div>
    </div>

    @yield('scripts')
    <script>
      let fullScreen = ()=>{
                        var element = document.documentElement;
                        element.requestFullscreen()
                            .then(function() {

                            })
                            .catch(function(error) {
                                // element could not enter fullscreen mode
                            });
                    }
    </script>
</body>
</html>













