<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nayutist(ナユティスト)</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <script src="{{ ('js/app.js') }}"></script>

</head>
<body>

        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Nayutist') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>


    <div class="wrapper">
        <form action="/timeline" method="post">
            @csrf
            <div class="post-box">
                <input type="text" name="post" placeholder="伝えよう">
                <button type="submit" class="submit-btn">投稿</button>
            </div>
        </form>

        <div class="postContent-wrapper">
            @foreach($posts as $post)
            {{--  --}}
            <div class="postContent-box">
                <a href="{{ route('showProfile', [$post->user->id]) }}"><img src="{{ asset('storage/images/'. $post->user->avatar) }}" alt="" class="postContentbox-img"></a>
                {{-- mages/'. $post->use　こうやって繋げるんだね. --}}
                <div>{{ $post->user->name }}</div> 
                {{-- $postのリレーション先のuserのname --}}
                <div>{{ $post->post }}</div>
                <div class="destroy-btn">
                    @if ($post->user_id === Auth::user()->id)
                        <form action="{{ route('destroy', [$post->id]) }}"　method="post">
                            @csrf
                            <input type="submit" value="削除">
                        </form>
                    @endif
                </div>
            </div>
            <div style="padding: 10px 40px" class="postContent-like-box">
                @if ($post->likedBy(Auth::user())->count() > 0)
                <a href="./likes/{{ $post->likedBy(Auth::user())->firstOrfail()->id }}"><i class="fas fa-heart"></i></a>
                @else
                <a href="/posts/{{ $post->id }}/likes"><i class="far fa-heart"></i></a>
                @endif
                {{ $post->likes->count()}}
            </div>
            {{--  --}}
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>


</body>
</html>