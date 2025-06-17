<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
    @extends('layouts.plain')

    @section('title', 'My page without header and footer')

    @section('content')
        <h1>This page has no header or footer</h1>
    @endsection

</body>
</html>
