<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="csrf-token" content="{!! csrf_token() !!}">

	<title>@yield('seo-title') | {{ config('app.name') }}</title>
	<meta name="description" content="@yield('seo-description')" />
	<meta name="keywords" content="@yield('seo-keywords')" />

	 <!-- Twitter Card data -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content="@yield('seo-title')">
	<meta name="twitter:description" content="@yield('seo-description')">
	<meta name="twitter:image" content="@yield('seo-image')">

	<!-- Open Graph data -->
	<meta property="og:title" content="@yield('seo-title')" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="@yield('seo-url')" />
	<meta property="og:image" content="@yield('seo-image')" />
	<meta property="og:description" content="@yield('seo-description')" />
	<meta property="og:site_name" content="@yield('seo-title') | {{ config('app.name') }}" />

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="@yield('seo-title')">
	<meta itemprop="description" content="@yield('seo-description')">
	<meta itemprop="image" content="@yield('seo-image')">

	<!-- Google web fonts ============================================ -->
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Exo+2:200,300,400,500,600,600italic,700">

	<link href="/img/icon/apple-touch-icon-144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="/img/icon/apple-touch-icon-114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="/img/icon/apple-touch-icon-72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="/img/icon/apple-touch-icon-57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="/img/icon/apple-touch-icon-png" rel="icon" type="image/png">
	<link href="/img/icon/favicon.ico" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Plugins -->
	<link href="{{ mix('/css/vendor.min.css') }}" rel="stylesheet">
	<link href="{{ mix('/css/directory.css') }}" rel="stylesheet">

    <!-- Page CSS -->
    @stack('custom-css')
</head>

<body class="breadcrumb-white footer-top-dark">
	<!-- Start Body Content Wrapper -->
	<div id="page">

		<!-- Start header (topbar) -->
		@include('layouts.partials.header')

		<div id="main-wrapper">
			@yield('content')
		</div>

		@include('layouts.partials.footer')
	</div>
	<!-- End Body Content Wrapper -->

	<!-- JavaScripts -->
	<script src="//maps.googleapis.com/maps/api/js?key={{ config('edir.google_maps') }}&amp;libraries=weather,geometry,visualization,places,drawing" type="text/javascript"></script>
	<script src="{{ mix('/js/vendor.min.js') }}"></script>
	@stack('custom-js')
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	  ga('create', '{{ config('app.google_analytics') }}', 'auto');
	  ga('send', 'pageview');
	</script>
</body>
</html>