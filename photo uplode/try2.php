<!DOCTYPE html>
<html>
<head>
	<title>Upload and Resize Image</title>
	<style>
		.form-group {
			margin-bottom: 20px;
		}
		label {
			display: block;
			margin-bottom: 5px;
		}
		input[type=file] {
			display: block;
			margin-bottom: 10px;
		}
		button[type=submit] {
			display: block;
			margin-top: 10px;
		}
		.thumbnail {
			max-width: 100%;
			max-height: 400px;
			border-radius: 50%;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Upload and Resize Image</h1>
		<form action="uplode.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="file">Select Image:</label>
				<input type="file" id="file" name="file">
			</div>
			<div class="form-group">
				<label for="size">Select Size:</label>
				<select id="size" name="size">
					<option value="small">Small</option>
					<option value="medium">Medium</option>
					<option value="large">Large</option>
				</select>
			</div>
			<button type="submit" name="submit">Upload and Resize</button>
		</form>
	</div>
</body>
</html>
