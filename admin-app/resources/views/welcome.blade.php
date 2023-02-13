@php $title = env('APP_NAME'); @endphp
@section('project_title', $title)

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

  <body >
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

    <h1>Welcome</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <div class="relative flex items-top justify-center 
    min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        
    @if(Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" 
            class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>

        @else
            <a href="{{ url('/login') }}" 
            class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
            @if (Route::has('register'))
                <a href="{{ url('/register') }}" 
                class="text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        @endif
        </div>
        <h1 class="text-5xl">
            Notification
        </h1>
    </div>
</div>




    </body>
</html>
