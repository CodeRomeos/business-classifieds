
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
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
	@include('admin.partials.footer')

    <script src="{{ asset('console/js/console-app.js') }}"></script>
  </body>
</html>