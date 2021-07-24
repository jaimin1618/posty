<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-insiders.4a070ac/tailwind.min.css" rel="stylesheet">
        <title>Posty: Home</title>
        
    </head>
    <body class=bg-gray-200>
        
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
                <li class="p-3"><a href="{{route('home')}}">Home</a></li>
                <li class="p-3"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="p-3"><a href="{{route('posts')}}">Post</a></li>
            </ul>
            
            
            
            <ul class="flex items-center">
                
                @auth
                    <li class="p-3">
                        <a href="">{{auth()->user()->name}}</a>
                    </li>
                    <li class="p-3">
                        {{-- FOR SECURITY --}}
                        <form action="{{route('logout')}}" method="post" class="p-3 inline">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                        
                    </li>
                @endauth
                @guest
                    <li class="p-3">
                        <a href="{{route('login')}}">Login</a>
                    </li>
                    
                    <li class="p-3">
                        <a href="{{route('register')}}">Register</a>
                    </li> {{-- route('register') will find Route::get(..,...)->name('register') --}}
                @endguest
                
                {{--
                ABOVE IS BETTER WAY TO DO THIS
                @if (auth()->user())
                    <li class="p-3">
                        <a href="">Jaimin Chokhawala</a>
                    </li>
                    <li class="p-3">
                        <a href="">Logout</a>
                    </li>
                @else
                    <li class="p-3">
                        <a href="">Login</a>
                    </li>
                    
                    <li class="p-3">
                        <a href="{{route('register')}}">Register</a>
                    </li>
                @endif
                
                --}}
                
            </ul>
        </nav>
        @yield('content')
        
    </body>
</html>
{{-- route('register') will find Route::get(..,...)->name('register') --}}