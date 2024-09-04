<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <style>
        .wrap-login {
            display:flex;
            width:100%;
            height:100vh;
        }

        .form-login {
            margin:auto;
            padding:15px;
            border:2px solid black;
            border-radius: 10px;
        }
    </style>

    <div class="container-fluid wrap-login">
        <div class="form-login">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="" method="post">
                @csrf
                <div class="mb-5">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                <div class="mb-5">
                    <label for="inputPassword5" class="form-label">Password</label>
                    <input name="password" type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                </div>
                <button class="btn btn-primary" type="submit">Login</button>
                <a class="btn btn-warning" href="/register">Register</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
