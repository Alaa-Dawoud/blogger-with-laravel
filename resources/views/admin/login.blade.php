<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.min.css">
        <link href="/css/main.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <h3>Login</h3>
        <p style="background-color:red;">{{ session('error') }}</p>
        <form action="/blog/admin/login" method="POST">
            @csrf
            <fieldset>
                <div>
                    <label class="col-form-label mt-4" for="inputDefault">Your Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{old("name")}}" id="inputDefault" required>
                </div>
                <div>
                    <label class="col-form-label mt-4" for="inputDefault">Your Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" id="inputDefault" required>
                </div>
        
                <button type="submit" class="btn btn-primary form_button">Submit</button>
            </fieldset>
        </form>    
    </div>
    <footer class="text-center">
        <p>Copyright &copy; 2024 Blogger website</p>
    </footer>
  </body>
</html>


