<meta property="og:site_name" content="CCC" />
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="300" />
<meta property="og:url" content="{{ request()->fullUrl() }}"><!-- Url del sitio -->
<meta property="og:type" content="@yield('type')" /> <!-- Tipo de contenido -->
<meta property="og:title" content="@yield('title')"> <!-- Titulo de la publicación -->
<meta property="og:description" content="@yield('description')"> <!-- Resumen de la publicación -->
<meta property="og:image" content="@yield('image')"> <!-- Visualizar imagen principal -->
<!-- Meta IOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-title" content="@yield('description')">
<link rel="apple-touch-icon" sizes="16x16" href="{{ url('images/icon.png') }}">

<!-- Declarative manifest -->
<meta name="theme-color" content="#9ca8b5">
