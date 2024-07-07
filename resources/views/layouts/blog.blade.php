@php
    use App\Models\Category;
    use App\Models\Tag;
@endphp
<!DOCTYPE html>
@php
    if(app()->getLocale()=="ar"){
        $direction="rtl";
    }else{
        $direction="ltr";
    }
@endphp
<html dir="{{$direction}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <div class="dropdown" style="background-color:blueviolet;">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            {{app()->getLocale()=="en"?"English":"العربية"}}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @php
                $inverse_locale = app()->getLocale()=="ar"?"en":"ar";
                // http://127.0.0.1/en/blog/..........
                // 0    1      2    3      
                // $url_locale = explode('/',url()->current())[3];
                // var_dump($part);
                //inversing blog title
                $new_url = str_replace(app()->getLocale(),$inverse_locale,url()->current());
            @endphp
            <li><a class="dropdown-item" href="{{$new_url}}">{{app()->getLocale()=="en"?"العربية":"English"}}</a></li>
        </ul>
    </div>
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
                    <form action={{"/".app()->getLocale()."/blog"}} method="GET">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                    </form>
                </div>
                <div>
                    <h3 style="margin-top: 8px;">@lang('auth.blog.categories')</h3>
                    <hr>
                    <ul>
                        @php
                            $categories = Category::all();
                        @endphp
                        @foreach ($categories as $category)
                            <a href={{"/".app()->getLocale()."/blog/category/".$category->name}}><li>{{$category->name}}</li></a>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3>@lang('auth.blog.tags')</h3>
                    <hr>
                    @php
                        $tags = Tag::all();
                    @endphp
                    @foreach ($tags as $tag)
                        @php
                            $tag_url = str_replace(" ", "%20", $tag->name);
                        @endphp
                        <span><a class="btn btn-secondary" style="border-radius: 1rem;" href={{"/".app()->getLocale()."/blog/tag/".$tag_url}}>{{$tag->name}}</a></span>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
</body>
</html>
