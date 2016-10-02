<!DOCTYPE html>
<html lang="en">
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.7.0/summernote.css" rel="stylesheet">
</head>
<body>
 
<form class="form-horizontal">
<div class="form-group">
    <label for="title" class="control-label col-sm-2">Title</label>
    <div class="col-sm-10">
        {{ Form::text('title', NULL, ['class' => 'form-control', 'placeholder' => 'Title', 'id' => 'title', 'required']) }}
    </div>
</div>
<div class="form-group">
    <label for="message" class="control-label col-sm-2">Content</label>
    <div class="col-sm-10">
        {{ Form::textarea('message', NULL, ['class' => 'form-control', 'placeholder' => 'Message', 'id' => 'message', 'required']) }}
    </div>
</div>
</form>
 
<!-- Load all JS at footer for faster website loading.. -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.7.0/summernote.js"></script>

<script>
$(document).ready(function() {
var IMAGE_PATH = 'http://localhost:8000/images/thread/';

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content')     }
});
$('#message').summernote({
    height: 400,
    onImageUpload: function(files) {
        data = new FormData();
        data.append("image", files[0]);
        $.ajax({
            data: data,
            type: "POST",
            url: "/image/upload",
            cache: false,
            contentType: false,
            processData: false,
            success: function(filename) {
                var file_path = IMAGE_PATH + filename;
                console.log(file_path);
                $('#message').summernote("insertImage", file_path);
            }
        });
    }
});

});
   
</script>
</body>
</html>