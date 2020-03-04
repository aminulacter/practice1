<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Using Media Embed with Auto Embed</title>
 
</head>

<body>
  <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>

  <div class="input-group" id="app">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
   <input id="thumbnail" class="form-control" type="text" name="filepath">
 </div>
 <img id="holder" style="margin-top:15px;max-height:100px;">

 <script src="{{ asset('/js/app.js')}}"></script>

  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
  <script>
     var route_prefix = "filemanager";
     $('#lfm').filemanager('image');
  var options = {
    filebrowserImageBrowseUrl: '/filemanager?type=Images',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
  };
  


    CKEDITOR.replace( 'summary-ckeditor', options );
    // CKEDITOR.config.height = 300;
    // CKEDITOR.config.width = 600;
    // CKEDITOR.config.extraPlugins = "Youtube";
</script>
</body>

</html>