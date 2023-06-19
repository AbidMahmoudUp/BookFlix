<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the uploaded file
  $file = $_FILES['photo'];

  // Validate the file
  $valid_types = ['image/jpeg', 'image/png', 'image/gif'];
  $valid_extension = ['jpg', 'jpeg', 'png', 'gif'];

  $file_path = $file['tmp_name'];
  $file_info = getimagesize($file_path);
  $file_type = $file_info['mime'];
  $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

  if (!in_array($file_type, $valid_types) || !in_array($file_extension, $valid_extension)) {
    die('Invalid file type');
  }

  // Move the file to a permanent location
  $target_dir = 'application/';
  $target_file = $target_dir . basename($file['name']);
  move_uploaded_file($file_path, $target_file);

  // Update the user's profile in the database
  $user_id = 123; // Replace with the actual user ID
  $photo_url = $target_file; // Replace with the actual photo URL

  // TODO: Update the user's profile in the database
}
?>
<form method="post" enctype="multipart/form-data">
  <input type="file" name="photo">
  <input type="submit" value="Update photo">
</form>
