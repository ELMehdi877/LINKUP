<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>

    <header>
        <a href="/login">Login</a> |
        <a href="/register">Register</a>
    </header>

    <hr>

    @yield('content')

</body>
</html>