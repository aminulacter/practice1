<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Using Media Embed with Auto Embed</title>
 
</head>

<body>
  <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script>
  var options = {
    filebrowserImageBrowseUrl: '/filemanager?type=Images',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
  };
</script>
 <script>
    CKEDITOR.replace( 'summary-ckeditor', options );
    // CKEDITOR.config.height = 300;
    // CKEDITOR.config.width = 600;
    // CKEDITOR.config.extraPlugins = "Youtube";
</script>
</body>

</html>