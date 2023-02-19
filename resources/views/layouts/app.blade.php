<!doctype html>
<html lang="en" class="w-full h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="bg-gray-50 text-gray-800 w-full h-full flex flex-col">
<main class="p-4 flex-1">
    @yield('content')
</main>
<footer class="w-full text-center p-4 text-xs fixed-bottom">
    Created by <a href="https://github.com/danidoble" target="_blank">danidoble</a> 2023 <br>
    using components and libraries from <a href="https://symfony.com/" target="_blank">Symfony</a>,
    <a href="https://laravel.com/" target="_blank">Laravel</a>, and others.</footer>
</body>
</html>