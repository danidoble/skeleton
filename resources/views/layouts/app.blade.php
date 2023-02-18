<!doctype html>
<html lang="en" class="w-full h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="bg-gray-50 text-gray-800 w-full h-full">
<main class="p-4">
    @yield('content')
</main>
<footer class="w-full text-center p-4 text-xs">
    Created by danidoble 2023 <br>
    using components and libraries from symfony, laravel, and others</footer>
</body>
</html>