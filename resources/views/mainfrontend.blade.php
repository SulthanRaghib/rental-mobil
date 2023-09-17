<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href={{ asset('assets/img/logo.png') }}>
    @yield('styles')
</head>

<body>
    @include('partials.frontend.navbar')

    @yield('content')

    @include('partials.frontend.footer')
</body>

</html>
