<?php

function resize_image($file, $size) {
    list($width, $height, $type) = getimagesize($file);
  
    switch ($size) {
      case 'small':
        $new_width = 200;
        $new_height = 200;
        break;
      case 'medium':
        $new_width = 400;
        $new_height = 400;
        break;
      case 'large':
        $new_width = 800;
        $new_height = 800;
        break;
      default:
        $new_width = $width;
        $new_height = $height;
        
    }
  
    switch ($type) {
      case IMAGETYPE_JPEG:
        $thumb = imagecreatetruecolor($new_width, $new_height);
        $source = imagecreatefromjpeg($file);
        break;
      case IMAGETYPE_PNG:
        $thumb = imagecreatetruecolor($new_width, $new_height);
        $source = imagecreatefrompng($file);
        imagealphablending($thumb, false);
        imagesavealpha($thumb, true);
        break;
      default:
        return false;
    }
  
    // Add border-radius to the image
    $bg_color = imagecolorallocatealpha($source, 255, 255, 255, 127);
    imagefill($source, 0, 0, $bg_color);
    $radius = 40; // Border radius in pixels
    imagefilledellipse($source, $radius, $radius, $radius*2, $radius*2, $bg_color);
    imagefilledellipse($source, $width-$radius, $radius, $radius*2, $radius*2, $bg_color);
    imagefilledellipse($source, $radius, $height-$radius, $radius*2, $radius*2, $bg_color);
    imagefilledellipse($source, $width-$radius, $height-$radius, $radius*2, $radius*2, $bg_color);
  
    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
  
    imagealphablending($thumb, false);
    imagesavealpha($thumb, true);
  
    $filename = 'application/' . uniqid() . '.png';
    imagepng($thumb, $filename);
  
    imagedestroy($thumb);
    imagedestroy($source);
  
    return $filename;
  }
  

  


if (isset($_POST['submit'])) {
	$file = $_FILES['file'];
	$size = $_POST['size'];

	// Check for errors
	if ($file['error'] !== UPLOAD_ERR_OK) {
		echo 'Error uploading file. Please try again.';
		exit;
	}

	// Check file type
	if (exif_imagetype($file['tmp_name']) !== IMAGETYPE_JPEG) {
		echo 'Invalid file type. Please upload a JPEG image.';
		exit;
	}

	// Upload and resize image
	$filename = resize_image($file['tmp_name'], $size);

	// Display thumbnail
	echo '<img src="' . $filename . '">';
}

?>
