@php
use App\Models\Tag;
use App\Models\Category;
@endphp
@extends('layouts.admin')

@section('title')
    {{ 'Add Post' }}
@endsection

@section('content')
<h3>
    Add post
</h3>
<form action="/blog/admin/posts" method="POST" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <legend>New Post</legend>
        <div>
            <label class="col-form-label mt-4" for="inputDefault">Post Title:</label>
            <input type="text" name="post_title" class="form-control" placeholder="Enter post title" id="inputDefault" required>
        </div>
        <div>
            <label for="formFile" class="form-label mt-4">Post Image :</label>
            <input class="form-control" name="post_img" type="file" id="formFile" required>
        </div>
        <div>
            <label for="category" class="form-label mt-4">Page Category :</label>
            {{-- <select name="category" class="form-select" id="exampleSelect1">
                
            </select> --}}
            <select class="js-example-basic-single" name="category">
                <!--get categories from database-->
                @php
                    $categories = Category::all();
                @endphp
                @foreach ($categories as $category)
                    <option value={{$category->name}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="tags[]" class="form-label mt-4">Page Tags :</label>
            <select class="js-example-tokenizer" name="tags[]" multiple="multiple">
                <!--get tags from database-->
                @php
                    $tags = Tag::all();
                @endphp
                @foreach ($tags as $tag)
                    <option value={{$tag->name}}>{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="editor1" class="form-label mt-4">Post Content :</label>
            <textarea name="editor1" id="editor1" rows="10" cols="80" placeholder="Enter your post content here" required></textarea>
        </div>

        
        <button type="submit" class="btn btn-primary form_button">Submit</button>
    </fieldset>
</form>
@endsection

@section('form_scripts')

<script> 
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('.js-example-tokenizer').select2({
            tags: true,
            tokenSeparators: [',']
        });
    });
</script>
<!--
scripts for text area
-->
<script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script> 
<script> 
    // Replace the <textarea id="editor1"> with a CKEditor 
    // instance, using default configuration. 
    CKEDITOR.replace( 'editor1' ); 
</script>
@endsection