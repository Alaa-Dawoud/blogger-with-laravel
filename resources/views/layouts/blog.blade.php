<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.min.css">
        <link href="/css/main.css" rel="stylesheet">
  </head>
  <body>
    @yield('header')
    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <!--blog and blog/post-url goes here-->
            <div class="col col-lg-8 col-md-auto col-sm-auto">
                @yield('content')
            </div>
            <!--search, categories and tags goes here-->
            <div class="col col-lg-4 col-md-auto col-sm-auto" style="margin-top: 120px;">
                <div>
                    <h3>search bar goes here</h3>
                </div>
                <div>
                    <h3>categories goes here</h3>
                </div>
                <div>
                    <h3>tags goes here</h3>
                </div>
            </div>
        </div>
    </div>
        


    <footer class="text-center">
        <p>Copyright &copy; 2024 Blogger website</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>