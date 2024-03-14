<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel Shop :: Administrative Panel</title>
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="{{asset('assets/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="card card-outline card-primary">
			<div class="card-body">
				<h3 class="login-box-msg">Log in </h3>
				@if (session()->has('error'))
				<div class="alert alert-danger" role="alert">
					{{session()->get('error')}}
				</div>
				@endif

				@if (session()->has('success'))
				<div class="alert alert-success" role="alert">
					{{session()->get('success')}}
				</div>
				@endif
				<form action="{{route('verify-user')}}" method="post">
					@csrf
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="email" placeholder="Email">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="error">
						@error('email')
						<p class="text-danger">{{$message}}</p>
						@enderror
					</div>
					<div class="error">
						@error('password')
						<p class="text-danger">{{$message}}</p>
						@enderror
					</div>
                    <div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block">Send OTP</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/demo.js')}}"></script>
</body>

</html>