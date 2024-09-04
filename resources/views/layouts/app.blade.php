<!-- resources/views/layouts/app.blade.php -->

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>App Name - @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
       

      </head>
    <body>
        <style>
            .wrap-login {
              display: flex;
            }
            .sidebar-left {
              width: 20%;
              /* height: 100vmin; */
              background-color: whitesmoke;
            }
            .main {
              width: 80%;
              /* height: 100vmin; */
              background-color: rgba(205, 252, 252, 0.066);
            }
            li {
              padding: 15px;
            }
            li a {
              text-decoration: none;
            }
            table {
                  width: 100%;
                  border-collapse: collapse;
              }
              th, td {
                  border: 1px solid #dddddd;
                  text-align: left;
                  padding: 8px;
              }
              th {
                  background-color: #f2f2f2;
              }
              .main {
                padding:15px;
              }
          </style>
        <div class="container-fluid wrap-login">
            <div class="sidebar-left">
                <ul>
                  <li><a href="/dashboard">dashboard</a></li>
                  <li><a href="/product">product</a></li>
                  <li><a href="/product">product</a></li>
                  <li><a href="/product">product</a></li>
                  <li><a href="/logout" style="color: red;">Logout</a></li>
                </ul>
              </div>
            @yield('content')
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
