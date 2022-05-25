<!DOCTYPE html>
<html lang="es">

<head>
    @include('Components.Metadata.Head')
    @include('Components.Styles.Design')
</head>

<body>
    @include('Components.Navigations.HeadNavbar')
    @include('Components.Navigations.HeadInfo')
    @yield('content')
    @include('Components.Navigations.Footer')
</body>

</html>
