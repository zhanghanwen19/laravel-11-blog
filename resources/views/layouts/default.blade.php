<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title', config('app.name', 'Lu Stormstout'))</title>
</head>
<body>
@yield('content')
</body>
</html>
