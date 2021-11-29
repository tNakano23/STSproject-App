<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">


        <!-- Styles -->
        {{-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> --}}
    </head>
    <body>
        <div class="content">
            <div class="flex">
                <div class="main-container">
                    <h1>Nayutist</h1>
                    <h2>for all attention seeker</h2>
                </div>

                {{-- <div class="main-btn-box"> --}}
                    <ol class="ol-btn">
                            @if (Route::has('login'))
                            <div class="btn-box">
                                @auth
                        <li>
                                    <a href="{{ url('/timeline') }}" class="left-btn">Timeline</a>
                        </li>
                        <li>
                            <a class="dropdown-item right-btn" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" >
                            {{ __('Logout') }}
                            </a>
                        </li>
                    </ol>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @else
                    <ol class="ol-btn">
                        <li>
                                <a href="{{ route('login') }}" class="left-btn">Login</a>
                        </li>
                                @if (Route::has('register'))
                        <li>
                                <a href="{{ route('register') }}" class="right-btn">Register</a>
                        </li>
                    </ol>
                            @endif
                        @endauth
                    {{-- </div> --}}
                    @endif

                </div>
            </div>
        </div>
    </body>
</html>
