<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','programing class')</title>
</head>
<body>
    <ul>
        <a href="php"><li>php page</li></a>
        <a href="js"><li>js page</li></a>
    </ul>
    @yield("content")
</body>
</html>