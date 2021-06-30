<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="XU-A-Compatible" content="ie=edge">
        <title>Generic PC part seller</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body class='bg-gray-300' >
        <nav class="p-6 bg-white flex justify-between mb-3">
            <ul class="flex items-center">

                <li>
                    <a href="" class="p-3">Home</a>
                </li>
                <li>
                    <a href="" class="p-3">Dashboard</a>
                </li>
                <li>
                    <a href="" class="p-3">Post</a>
                </li>
            </ul>

            <ul class="flex items-right">
                @auth
                <li>
                    <a href="" class="p-3">User Name</a>
                </li>
                <li>
                    <a href="" class="p-3">Logout</a>
                </li>
                @endauth
                    
                @guest
                <li>
                    <a href="" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="p-3">Register</a>
                </li>
 
                @endguest
                
            </ul>
        </nav>
        @yield('content')
    </body>

</html>