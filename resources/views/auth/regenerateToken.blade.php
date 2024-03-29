<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
</head>
<body>
    <div id="content" class="container py-5 container-limit--md">

        <div class="card">
          <div class="p-5 container container-limit--sm">
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session()->get('success')}}
            </div>
            @endif
            <div id="forgottenPassword">
              <h1>Link Expired</h1>
              <p>Your verification link has expired, Please regenrate link via enter your correct Username or Email</p>
              <form action="{{route('xyz')}}" method="post">
                @csrf
                <div class="col-lg-5">
                    <input class="form-control" type="email" name="email" placeholder="Enter your Username/email">
                </div>
                <button class="btn btn-primary mt-2 ml-2" type="submit">Submit</button>
              </form>
            </div>
          </div>
        </div>
      
      </div>
      <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>