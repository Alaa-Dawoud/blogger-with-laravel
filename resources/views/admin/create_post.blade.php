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
                <option value="hosting">Hosting</option>
                <option value="vps">VPS</option>
                <option value="gaming">Gaming</option>
            </select>
        </div>
        <label class="form-label mt-4">Page Tags :</label>
        {{-- <div class="tags-input"> 
            
            <ul id="tags"></ul> 
            <input type="text" id="input-tag"
                placeholder="Enter tag name"/> 
        </div> --}}
        <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
            <option value="AL">Alabama</option>
            <option value="Ha">Hawaii</option>
            <option value="Ca">California</option>
            <option value="WY">Wyoming</option>
        </select>
        <div>
            <label for="editor1" class="form-label mt-4">Post Content :</label>
            <textarea name="editor1" id="editor1" rows="10" cols="80" placeholder="Enter your post content here" required></textarea>
        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
</form>
@endsection

@section('form_scripts')

<script> 
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        $('.js-example-basic-multiple').select2();
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