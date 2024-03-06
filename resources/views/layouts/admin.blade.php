<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blogger -- Admin - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.min.css">
        <link href="/css/main.css" rel="stylesheet">
       
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
       
        <!--select2-->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    </head>
    <body>

        <div class="w3-sidebar w3-grey w3-bar-block" style="width:22%;">
            <div class="container" style="margin-top: 20px;">
                @php
                    $base_admin_url = '/blog/admin';
                @endphp
                <h4><a href="{{$base_admin_url}}" class="w3-bar-item btn btn-secondary">Dashboard</a></h4>
                <h4><a href="{{$base_admin_url . '/posts'}}" class="w3-bar-item btn btn-secondary">Posts</a></h4>
                <h4><a href="{{$base_admin_url . '/categories'}}" class="w3-bar-item btn btn-secondary">Categories</a></h4>
                <h4><a href="{{$base_admin_url . '/media'}}" class="w3-bar-item btn btn-secondary">Media</a></h4>
                <h4><a href="{{$base_admin_url . '/comments'}}" class="w3-bar-item btn btn-secondary">Comments</a></h4>
                <h4><a href="{{$base_admin_url . '/tags'}}" class="w3-bar-item btn btn-secondary">Tags</a></h4>
                <h4><a href="{{$base_admin_url . '/admins'}}" class="w3-bar-item btn btn-secondary">Admins</a></h4>
            </div>
        </div>
        <div style="margin-left:25%">
            @yield('content')
        </div>

        <footer class="text-center">
            <p>Copyright &copy; 2024 Blogger website</p>
        </footer>

        @yield('form_scripts')
    </body>
</html>