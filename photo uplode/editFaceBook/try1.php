<style>
  form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

#preview {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
}

</style>
<form method="POST" action="save_image.php" enctype="multipart/form-data">
  <input type="file" name="image" id="image" accept="image/*">
  <button type="submit">Upload</button>
</form>
<script>
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $('#preview').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]);
      }
  }
  
  $("#image").change(function(){
      readURL(this);
      var formData = new FormData();
      formData.append('image', $('#image')[0].files[0]);
      $.ajax({
          url: 'upload.php',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function(response){
              console.log(response);
          }
      });
  });
</script>
<img src="" id="preview" alt="Preview">

