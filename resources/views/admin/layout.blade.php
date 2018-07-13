<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('title', 'Admin')</title>
    <!-- Main styles for this application-->
    <link href="{{ asset('console/css/console-app.css') }}" rel="stylesheet">
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
	@include('admin.partials.header')
	<div class="app-body" id='console-app'>
		@include('admin.partials.sidebar')
		<main class="main">
			@yield('content')
		</main>
		@include('admin.partials.aside-menu')
	</div>
	<footer class="app-footer">
	<div>
		<a href="https://www.coderomeos.org">Business Classifieds</a>
		<span>&copy; 2018 coderomeos.</span>
	</div>
	<div class="ml-auto">
		<span>Powered by</span>
		<a href="https://www.coderomeos.org">CodeRomeos</a>
	</div>
	</footer>

    <script src="{{ asset('console/js/console-app.js') }}"></script>
  </body>
</html>