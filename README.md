# blogger-with-laravel

#### blogger website with laravel framework and mysql
### LinkedIn https://www.linkedin.com/posts/activity-7172222554026242048-_JhQ/


##### steps to add another language to your website
    // step 1
    // watch this video to get an overview https://www.youtube.com/watch?v=9Rocw50kpSY
    // step 2
    // all routes you want to add the new language to it add it also to the route group and then you will need to add the lang locale
    // before the route you already used in href when you add the url to that route href="/en/blog" but in the route group you add "/blog" only.
    // the en will be passed as route parameter as specified in groupg "prefix"=>'{locale}' before the /blog and middleware will get the locale and 
    // proceed to the route requested. to access the lang en and lang of any other language you add in the lang folder as you saw in the video
    // you need to add use Lang; in top of the controller file and access it with $title = Lang::get('auth.blog_title'); and if there is another route parameter in the locale route group you add two parameters in the controller method one for locale and other for your route parameter and that's it all for adding a new language to website.
        
