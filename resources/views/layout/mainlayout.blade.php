<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.head')
</head>

<body>

    @include('layout.partials.nav')

    @include('layout.partials.header')

    @include('layout.partials.bodyTop')

    @yield('content')

    @include('layout.partials.bodyBottom')

    @include('layout.partials.footer')

    @include('layout.partials.footer-scripts')

</body>

</html>