@php
    use App\Models\Category;
    use App\Models\Tag;
@endphp
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
                    <form action="/blog" method="GET">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                    </form>
                </div>
                <div>
                    <h3 style="margin-top: 8px;">Categories</h3>
                    <hr>
                    <ul>
                        @php
                            $categories = Category::all();
                        @endphp
                        @foreach ($categories as $category)
                            <a href={{"/blog/category/".$category->name}}><li>{{$category->name}}</li></a>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3>Tags</h3>
                    <hr>
                    @php
                        $tags = Tag::all();
                    @endphp
                    @foreach ($tags as $tag)
                        @php
                            $tag_url = str_replace(" ", "%20", $tag->name);
                        @endphp
                        <span><a class="btn btn-secondary" style="border-radius: 1rem;" href={{"/blog/tag/".$tag_url}}>{{$tag->name}}</a></span>
                    @endforeach
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