<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Inter', sans-serif;
                font-family: 'Pacifico', cursive;
                font-family: 'Poppins', sans-serif;
            }
        </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-white/75">
         @include('layouts.partials.header')
         <main>
             @yield('content')
         </main>

        <script>
            const menuButton = document.getElementById('menuButton');
            const menu = document.getElementById('mobileMenu');

            menuButton.addEventListener('click', () => {
                menu.classList.toggle('-translate-y-[125%]');
            });
        </script>
    </body>
</html>
