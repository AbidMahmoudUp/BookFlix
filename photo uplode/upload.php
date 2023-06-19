<?php
if (isset($_FILES['myFile'])) {
    $maxDim = 800;
    $file_name = $_FILES['myFile']['tmp_name'];
    list($width, $height, $type, $attr) = getimagesize($file_name);
    if ($width > $maxDim || $height > $maxDim) {
        $target_filename = $_FILES['myFile']['name'];
        $target_filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $target_filename);
        $target_filename = $target_filename . ".png";
        $ratio = $width/$height;
        if ($ratio > 1) {
            $new_width = $maxDim;
            $new_height = $maxDim/$ratio;
        } else {
            $new_width = $maxDim*$ratio;
            $new_height = $maxDim;
        }
        $src = imagecreatefromstring(file_get_contents($file_name));
        $dst = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagedestroy($src);
        imagepng($dst, $target_filename); // adjust format as needed
        imagedestroy($dst);
        echo "The file has been uploaded and resized successfully as $target_filename.";
    } else {
        move_uploaded_file($_FILES['myFile']['tmp_name'], $_FILES['myFile']['name']);
        echo "The file has been uploaded successfully as " . $_FILES['myFile']['name'] . ".";
    }
}
?>
