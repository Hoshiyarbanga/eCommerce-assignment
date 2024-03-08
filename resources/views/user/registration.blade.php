<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration page</title>
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
				<h3 class="login-box-msg">Sign up to start </h3>
				<form action="{{route('register')}}" method="post">
					@csrf
					<div class="input-group mt-3">
						<input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="error">
						@error('name')
						<p class="text-danger">{{$message}}</p>
						@enderror
					</div>
					<div class="input-group mt-3">
						<input type="tel" name="phone" class="form-control" placeholder="Phone"
							value="{{old('phone')}}">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-mobile"></span>
							</div>
						</div>
					</div>
					<div class="error">
						@error('phone')
						<p class="text-danger">{{$message}}</p>
						@enderror
					</div>
					<div class="input-group mt-3">
						<input type="email" name="email" class="form-control" placeholder="Email"
							value="{{old('email')}}">
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
					<div class="input-group mt-3">
						<input type="password" name="password" class="form-control" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="error">
						@error('password')
						<p class="text-danger">{{$message}}</p>
						@enderror
					</div>
					<div class="row mt-3">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
						</div>
					</div>
				</form>
				<p class="mb-1 mt-3">
					<a href="{{route('admin-login')}}">Already Have An Account</a>
				</p>
			</div>
		</div>
	</div>
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/demo.js')}}"></script>
</body>

</html>