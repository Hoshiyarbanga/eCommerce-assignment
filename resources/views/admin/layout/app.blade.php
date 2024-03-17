<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ecommerce Project</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		@include('admin.include.navbar')
		@include('admin.include.aside')

		<div class="content-wrapper">
			@yield('admin-content')
		</div>

		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
		</footer>
	</div>
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/demo.js')}}"></script>
	<script src="{{asset('assets/js/adminlte.min.js')}}"></script>
	@yield('js')
</body>

</html>