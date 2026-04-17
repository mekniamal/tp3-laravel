<!DOCTYPE html> 
<html lang="fr"> 
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>@yield('title', 'Todo App')</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head> 
<body>
<div class="container py-4">
    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div> 
    @endif 
    @yield('content') 
</div> 
</body></html> 