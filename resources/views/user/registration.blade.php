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
				<form action="{{route('store-user')}}" class="needs-validation" method="post" novalidate>
					@csrf
					<div class="input-group mt-3">
						<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}">
					</div>
					<div class="input-group mt-3">
						<input type="tel" name="phone" maxlength="10" id="mobile" class="form-control" placeholder="Phone"
							value="{{old('phone')}}">
					</div>
					<div class="input-group mt-3">
						<input type="email" name="email" id="email" class="form-control" placeholder="Email"
							value="{{old('email')}}">
					</div>
					<div class="input-group mt-3">
						<input type="password" name="password" id="password" class="form-control" placeholder="Password">
					</div>
					<div class="row mt-3">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
						</div>
					</div>
				</form>
				<p class="mb-1 mt-3">
					<a href="{{route('user-login')}}">Already Have An Account</a>
				</p>
			</div>
		</div>
	</div>
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/js/demo.js')}}"></script>
	<script>
const signUpForm = () => {
  const inputRegex = {
      name: /^[A-Za-z]+$/,
      mobile:/^[0-9]+$/ ,
      email: /^[a-zA-Z0-9._%+-]+@[a-z.-]+\.[a-z]{3,}$/,
      password:/^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/,
  };
  
  Object.keys(inputRegex).forEach(id => {
      const input = document.getElementById(id);
      if (input) {
          input.addEventListener('input', () => {
              const regex = inputRegex[id];
              const errorDiv = document.getElementById(`${id}-error`);
              if (!regex.test(input.value)) {
                  input.classList.add('is-invalid');
                  if (!errorDiv) {
                      const div = document.createElement('div');
                      div.id = `${id}-error`;
                      div.classList.add('invalid-feedback');
                      div.innerText = `Please enter a valid ${id}.`;
                      input.parentNode.insertBefore(div, input.nextSibling);
                  }
              } else {
                  input.classList.remove('is-invalid');
                  if (errorDiv) {
                      errorDiv.remove();
                  }
              }
          });
      }
  });
  
  const form = document.querySelector('.needs-validation');
  if (form) {
      form.addEventListener('submit', event => {
          let isValid = true;
          Object.keys(inputRegex).forEach(id => {
              const input = document.getElementById(id);
              const errorDiv = document.getElementById(`${id}-error`);
              if (input && !inputRegex[id].test(input.value)) {
                  input.classList.add('is-invalid');
                  isValid = false;
                  if (!errorDiv) {
                      const div = document.createElement('div');
                      div.id = `${id}-error`;
                      div.classList.add('invalid-feedback');
                      div.innerText = `Please enter a valid ${id}.`;
                      input.parentNode.insertBefore(div, input.nextSibling);
                  }
              } else {
                  input.classList.remove('is-invalid');
                  if (errorDiv) {
                      errorDiv.remove();
                  }
              }
          });
          
          if (!isValid) {
              event.preventDefault();
              event.stopPropagation();
          } else {
              form.classList.add('was-validated');
          }
      }, false);
  }
};
signUpForm();
	</script>
</body>

</html>