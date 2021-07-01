<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="XU-A-Compatible" content="ie=edge">
        <title>Generic PC part seller</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body class='bg-gray-900' >
        <nav class="p-6 bg-green-800 flex justify-between mb-3">
            <ul class="flex items-center">
                <li>
                    <a href="/" class="p-3">{{ __('lang.home') }}</a>
                </li>
                @auth
                    <li>
                        <a href="{{route('dashboard',auth()->user())}}" class="p-3">{{ __('lang.dashboard') }}</a>
                    </li>
                @endauth
                <li>
                    <a href="{{route('posts')}}" class="p-3">{{ __('lang.post') }}</a>
                </li>
                
            </ul>
            @php $locale = session()->get('locale'); @endphp
            <div class="flex" id="navbarToggler">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if($locale==='lv')
                            <a class="dropdown-item" href="lang/en">English</a>
                            @else
                            <a class="dropdown-item" href="lang/lv">Latviešu</a>
                            @endif
                        </div>
                    </li>
                </ul>
            
            <ul class="flex items-center">
                @auth
                <li>
                    <a href="" class="p-3">{{auth()->user()->name}}</a>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">{{ __('lang.logout') }}</button>
                    </form>
                </li>
                @endauth
                    
                @guest
                <li>
                    <a href="{{route('login')}}" class="p-3">{{ __('lang.login') }}</a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="p-3">{{ __('lang.register') }}</a>
                </li>
 
                @endguest
                
            </ul>
        </div>
        </nav>
        @yield('content')
    </body>

</html>