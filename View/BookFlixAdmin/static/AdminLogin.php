<?php
include('../../../Core/Admin.php');

if(isset($_POST['Login']))
{
   $AdminController = new CrudAdmin();
   
   $AdminEmail = $_POST['email'];
   $AdminPassword = $_POST['password'];
   if($AdminEmail != null && $AdminEmail!= ""){
	   
	   $_SESSION['AdminEmail'] = $AdminEmail;
   }
   if($AdminPassword!=null && $AdminPassword!=""){
	   $_SESSION['AdminPassword'] = $AdminPassword;
   }
   if($AdminEmail != null && $AdminEmail!= "" && $AdminPassword!=null && $AdminPassword!="")
   {
	   $AdminController->Verifie($AdminEmail,$AdminPassword);
	   
	 
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Sign In | AdminKit Demo</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/style-login.css">

</head>

<body>
	<div class="content">
		<div class="container">
		  <div class="row">
			<div class="col-md-6">
			  <img src="img/photos/LoginPhoto.png" alt="Image" class="img-fluid">
			</div>
			<div class="col-md-6 contents">
			  <div class="row justify-content-center">
				<div class="col-md-8 ">
				  <div class="mb-4 mt-5">
				  <h3>Sign In</h3>
				  
				</div>
				<form action="#" method="post">
				  <div class="form-group first">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" id="username">
	
				  </div>
				  <div class="form-group last mb-4">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" id="password">
					
				  </div>
				  
				  <div class="d-flex mb-5 align-items-center">
					<label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
					  <input type="checkbox" checked="checked"/>
					  <div class="control__indicator"></div>
					</label>
					<span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
				  </div>
	
				  <input type="submit" value="Log In" name="Login" class="btn btn-block btn-primary">
				</form>
				</div>
			  </div>
			  
			</div>
			
		  </div>
		</div>
	  </div>
	
	  
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/LoginPage.js"></script>
		<script src="js/app.js"></script>
	</body>

</html>



