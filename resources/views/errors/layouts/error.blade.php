<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html, body{
  margin: 0;
  padding: 0;
  text-align: center;
  font-family: sans-serif;
  background-color: #E7FFFF;
}

h1, a{
  margin: 0;
  padding: 0;
  text-decoration: none;
}

.section{
  padding: 12rem 2rem;
}

.section .error{
  font-size: 150px;
  color: #008B62;
  text-shadow: 
    1px 1px 1px #00593E,    
    2px 2px 1px #00593E,
    3px 3px 1px #00593E,
    4px 4px 1px #00593E,
    5px 5px 1px #00593E,
    6px 6px 1px #00593E,
    7px 7px 1px #00593E,
    8px 8px 1px #00593E,
    25px 25px 8px rgba(0,0,0, 0.2);
}

.page{
  margin: 2rem 0;
  font-size: 20px;
  font-weight: 600;
  color: #444;
}

.back-home{
  display: inline-block;
  border: 2px solid #222;
  color: #fff;
  text-transform: uppercase;
  font-weight: 600;
  padding: 0.75rem 1rem 0.6rem;
  transition: all 0.2s linear;
  box-shadow: 0 15px 15px -11px rgba(0,0,0, 0.4);
  background: #222;
  border-radius: 6px;
}
.back-home:hover{
  background: #222;
  color: #ddd;
}
    </style>
</head>
<body>
    <div class="section">
        <h1 class="error">
            @yield('code')
        </h1>
        <div class="page">
         @yield('message')
        </div>
      </div>
</body>
</html>