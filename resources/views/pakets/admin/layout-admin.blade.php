<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap-4.5.0-dist/css/bootstrap.css') }}">
    <script src="{{ asset('bootstrap-4.5.0-dist/js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap-4.5.0-dist/js/bootstrap.js') }}"></script>
    @yield('title')
    

</head>
<body>

<div class="mb-5">
<div class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('icon/icon1.png') }}" alt="" width="90" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('admin.index')}}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('wisata.index') }}" class="nav-link">Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('hotel.index') }}" class="nav-link">Hotel</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('resto.index') }}" class="nav-link">Restoran</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('paket.index') }}" class="nav-link active">Paket<span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    @if(auth()->guard('customer')->check())
                    <li class="nav-item">
                        <strong>
                        <a href="{{route('customer.logout')}}" class="nav-link">Logout</a>
                        </strong>
                    </li>
                    @else
                    <li class="nav-item">
                        <strong>
                        <a href="{{ route('customer.loginForm') }}" class="nav-link">Login</a>
                        </strong>
                    </li>
                    <li class="nav-item">
                        <strong>
                        <a href="{{ route('customer.registerForm')}}" class="nav-link">Register</a>
                        </strong>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
</div>
<br>
    
    
@yield('content')

<br>
<div class="container">
    <br>
        <h2 class="text-center"><span class="badge badge-pill badge-secondary">@SetilnyaLombok</span></h2>
    <br>
</div>





    <link rel="stylesheet" href="{{ asset('bootstrap-4.5.0-dist/css/bootstrap.css') }}">
    <script src="{{ asset('bootstrap-4.5.0-dist/js/bootstrap.js') }}"></script>
</body>
    
</html>