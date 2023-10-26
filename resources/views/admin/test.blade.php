@extends('admin.layouts.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <select name="videos" id="videos" class="form-control">
        <option value="">Selectionner une video</option>
        <option value="https://www.youtube.com/embed/Jz4sTGlEXPk">video 1</option>
        <option value="https://www.youtube.com/embed/Ws6xCV3En_M">video 2</option>
        <option value="https://www.youtube.com/embed/bKu9zX9XBws">video 3</option>
      </select>
</div>
      <div class="col-md-8">
          <iframe id="player" width="100%" height="418px" src="" frameborder="0" allowfullscreen allow="autoplay"></iframe>
      </div>
    
  </div>
</div>
@endsection

@section('script')
<script>
 $(document).ready(function() {

   $('#videos').click(function() {
    var video = $(this).children('option:selected').val();
    $('#player').attr('src', video);
   });
 });

</script>
@endsection