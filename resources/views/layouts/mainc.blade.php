<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/tasks.css') }}">
</head>
<body>
    <div class="container">
    <header>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-rounded">
             Tasks Manager
        </a>
    </header>
        @yield('content')
    </div>
</body>
</html>
