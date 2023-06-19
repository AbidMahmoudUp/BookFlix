
<?php 
include('../../../Core/productController.php');
session_start();
$productDb = new ProductController();


// add and update product


if(isset($_POST['submit']))
{
    
	if(!empty($_POST['name']) && !empty($_POST['reference']) && !empty($_POST['quantity'])  && !empty($_POST['price']) && !empty($_POST['description']) && !empty($_POST['genres']) && !empty($_POST['category']) )
	{
  
   $name=$_POST['name'];
   $reference=$_POST['reference'];
   $quantity=$_POST['quantity'];
   $rating=0;
   $price=$_POST['price'];
   $description=$_POST['description'];
   $genres=$_POST['genres'];
   $category = isset($_POST['category']) ? $_POST['category'] : 'null';
   $last_id=-1;

   $img1="./src/".$_POST['img1'];
   $img2="./src/".$_POST['img2'];
   $img3="./src/".$_POST['img3'];
   $img4="./src/".$_POST['img4'];
   
   $photosnumer=$_POST['photosnumber'];
   $img1_id=-1;
   $img2_id=-1;
   $img3_id=-1;
   $img4_id=-1;
   $imageinsert=false;
  if(!empty($_POST['updating'])){
	$imageinsert=false;
	//UPDATE table image 
	$id=$_POST['updating'];
	$productDb->deleteProductImages($id);
	switch ($photosnumer){
		case 1:
			$productImage1=new ProductsImages($id,1,$img1);
			$img1_id=$productDb->addProductImage($productImage1);
		   break;
		case 2:
			$productImage1=new ProductsImages($id,1,$img1);
		   $img1_id=$productDb->addProductImage($productImage1);

		   $productImage2=new ProductsImages($id,2,$img2);
		   $img2_id=$productDb->addProductImage($productImage2);

			break;
		  case 3:
		   $productImage1=new ProductsImages($id,1,$img1);
		   $img1_id=$productDb->addProductImage($productImage1);

		   $productImage2=new ProductsImages($id,2,$img2);
		   $img2_id=$productDb->addProductImage($productImage2);

		   $productImage3=new ProductsImages($id,3,$img3);
		   $img3_id=$productDb->addProductImage($productImage3);

		   break;
		case 4:
		   $productImage1=new ProductsImages($id,1,$img1);
		   $img1_id=$productDb->addProductImage($productImage1);

		   $productImage2=new ProductsImages($id,2,$img2);
		   $img2_id=$productDb->addProductImage($productImage2);

		   $productImage3=new ProductsImages($id,3,$img3);
		   $img3_id=$productDb->addProductImage($productImage3);
	   
		   $productImage4=new ProductsImages($id,4,$img4);
		   $img4_id=$productDb->addProductImage($productImage4);

		   break;

	}

   }
   else {
	     //ajouter table image 
		 $imageinsert=true;
		 switch ($photosnumer){
			case 1:
				$productImage1=new ProductsImages($last_id,1,$img1);
				$img1_id=$productDb->addProductImage($productImage1);
			   break;
			case 2:
				$productImage1=new ProductsImages($last_id,1,$img1);
			   $img1_id=$productDb->addProductImage($productImage1);
   
			   $productImage2=new ProductsImages($last_id,2,$img2);
			   $img2_id=$productDb->addProductImage($productImage2);
   
				break;
			  case 3:
			   $productImage1=new ProductsImages($last_id,1,$img1);
			   $img1_id=$productDb->addProductImage($productImage1);
   
			   $productImage2=new ProductsImages($last_id,2,$img2);
			   $img2_id=$productDb->addProductImage($productImage2);
   
			   $productImage3=new ProductsImages($last_id,3,$img3);
			   $img3_id=$productDb->addProductImage($productImage3);
   
			   break;
			case 4:
			   $productImage1=new ProductsImages($last_id,1,$img1);
			   $img1_id=$productDb->addProductImage($productImage1);
   
			   $productImage2=new ProductsImages($last_id,2,$img2);
			   $img2_id=$productDb->addProductImage($productImage2);
   
			   $productImage3=new ProductsImages($last_id,3,$img3);
			   $img3_id=$productDb->addProductImage($productImage3);
		   
			   $productImage4=new ProductsImages($last_id,4,$img4);
			   $img4_id=$productDb->addProductImage($productImage4);
   
			   break;
   
		}
   }

  if( $category=="Books")
   {
	 if(!empty($_POST['author']) && !empty($_POST['publisher']))
	 {
         
		 $author=$_POST['author'];
		 $publisher=$_POST['publisher'];
		 $idCategory=$productDb->get_category("books");
		 $Book= new Book( $name, $reference, $quantity, $rating, $price, $img1_id, $img2_id, $img3_id, $img4_id, $description, $idCategory, $genres,$author,$publisher); 
		 if(!empty($_POST['updating']))
		 {
			$id=$_POST['updating'];
			$Book->setId($id);	
			$productDb->UpdateBook($Book); 
		 }
		 else{
			//ajouter new book
			$last_id = $productDb->AddBook($Book);
		 }
	 }
	
   }
   if( $category=="Voice Over")
   {
	 if(!empty($_POST['format']) && !empty($_POST['duration']))
	 {
	     //ajouter new voice
         $format=$_POST['format'];
 		 $duration=$_POST['duration'];
		 $idCategory=$productDb->get_category("voiceover");
		 
		 $VoiceOver= new VoiceOver( $name, $reference, $quantity, $rating, $price, $img1_id, $img2_id, $img3_id, $img4_id, $description, $idCategory, $genres,$format,$duration); 

		 if(!empty($_POST['updating']))
		 {
			$id=$_POST['updating'];
			$VoiceOver->setId($id);	
			$productDb->UpdateVoiceOver($VoiceOver); 	 	 	 
		}
		 else{
			$last_id = $productDb->AddVoiceOver($VoiceOver);	
		}
	 }
	
   }
   if( $category=="Movies")
   {
	 if(!empty($_POST['director']) && !empty($_POST['publisher2']))
	 {
	     //ajouter new movie
		 $director=$_POST['director'];	
		 $publisher2=$_POST['publisher2'];	
		 $idCategory=$productDb->get_category("movies");
		 $Movie= new Movie( $name, $reference, $quantity, $rating, $price, $img1_id, $img2_id, $img3_id, $img4_id, $description, $idCategory, $genres,$director,$publisher2); 
		 if(!empty($_POST['updating']))
		 {
			$id=$_POST['updating'];
			$Movie->setId($id);	
			$productDb->UpdateMovie($Movie); 	 	 	 
		}
		 else{
			$last_id = $productDb->AddMovie($Movie);	      
		}
	 }
	
   }
   if( $category=="Cosplays")
   {
	 if(!empty($_POST['size']) && !empty($_POST['color']))
 	 {
	     //ajouter new cosplay
		 $size = isset($_POST['size']) ? $_POST['size'] : 'null';
		 $color = isset($_POST['color']) ? $_POST['color'] : 'null';
		 $idCategory=$productDb->get_category("cosplays");
		 $Cosplay= new Cosplay( $name, $reference, $quantity, $rating, $price, $img1_id, $img2_id, $img3_id, $img4_id, $description, $idCategory, $genres,$size,$color); 
		 if(!empty($_POST['updating']))
		 {
			$id=$_POST['updating'];
			$Cosplay->setId($id);	
			$productDb->UpdateCosplay($Cosplay); 	 	 	 
		}
		 else{
			$last_id = $productDb->AddCosplay($Cosplay);	      
		}  

	 }
	
   }
   $_POST = array();
   $category="";   
   if($imageinsert==true){
	switch ($photosnumer){
		case 1:
			$productImage1->setidproduct($last_id);
			$productDb->updateProductImage($productImage1);
			break;
		case 2:
			$productImage1->setidproduct($last_id);
			$productDb->updateProductImage($productImage1);
	
			$productImage2->setidproduct($last_id);
			$productDb->updateProductImage($productImage2);
	
			break;
		case 3:
			$productImage1->setidproduct($last_id);
			$productDb->updateProductImage($productImage1);
	
			$productImage2->setidproduct($last_id);
			$productDb->updateProductImage($productImage2);
	
			$productImage3->setidproduct($last_id);
			$productDb->updateProductImage($productImage3);
	
			break;
		case 4:
			$productImage1->setidproduct($last_id);
			$productDb->updateProductImage($productImage1);
	
			$productImage2->setidproduct($last_id);
			$productDb->updateProductImage($productImage2);
	
			$productImage3->setidproduct($last_id);
			$productDb->updateProductImage($productImage3);
			
			$productImage4->setidproduct($last_id);
			$productDb->updateProductImage($productImage4);
	
			break;
	
	   }
   }
  }
 
 header("Location: product-managment.php");

}






//display  products
$products=$productDb->readProducts();
if (isset($_SESSION['products']) && !empty($_SESSION['products'])) {
	// If the session variable is set and not empty
	$products = $_SESSION['products'];
	$_SESSION['products']=null;
  } else {
	// If the session variable is not set or empty
	$products=$productDb->readProducts();
  }


//delete  products
if(isset($_GET['delete']))
{
	$product_id = $_GET['delete'];
	$product_deleted=$productDb->getProductById($product_id,$products);
	$category =$product_deleted->getCategory();
	//delete from product
    $productDb->deleteProduct($product_id);
	$productDb->deleteProductImages($product_id);


	header("Location: product-managment.php");

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

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

	<title>Product Managment</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-VvFyfSnm8O9Oy9auGpouJZ1zqwRmL6aPz6pY35/Syq3+jrEgld9QDg/B1FV7QjZCzNl7IbBWTwYy7P/6UPGdVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-FY5l5i2vqx8rl88WjKX9xrPMLo3qC/Sg4EM4L2eKw1roLmk1+x+bTRRiETf19XoBmejKg3piZ4c4StQOUpZjKw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-H+4e4/z4t+vlQn4nQz9d9nt9JxSx1tKE+ZNK+D1tuvRy5o5wEfhfP5OK5clpXVh3J3OErO7PFI0d8yXL3p+f3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<link href="css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-uxKjw7y6PQdDf7c4m04gUVMSZmzQ2XhtVlBDAIPTl5V7F5PJjnf5g8bFZOJzvZK94NBo+Bh9tMCq3C2/yy/7Kw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="css/style-popup-product.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/charts-chartjs.html" />

	<title>Chart.js | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	
</head>



<body>
	<div class="wrapper">
	<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle"><img src="../src/img/logo/LOGOWEBSITE 4.png" alt=""></span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
                     
					<li class="sidebar-item">
						<a class="sidebar-link" href="index.html">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-header">
					 Admin Management
					</li>
					<li class="sidebar-item ">
						<a class="sidebar-link" href="AdminProfile.php">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="AdminDisplay.php">
							<i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Admin Management</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="AdminClientPage.php">
							<i class="align-middle" data-feather="book"></i> <span class="align-middle">Client Management</span>
						</a>
					</li>
					<li class="sidebar-header">
					Event Managment
					</li>
					<li class="sidebar-item ">
			  			<a class="sidebar-link" href="evennement-managment.php">
                          <i class="align-middle" data-feather="book"></i> 
						  <span class="align-middle">Evennement Managment</span>
                        </a>
						<ul class="sidebar-nav" style="padding-left:1.5em;font-size:0.9em;">
							<li class="sidebar-item ">
							   <a  class="sidebar-link" href="typeevent.php">
								 <span class="align-middle">Event Type</span>
							   </a>	
							</li>
						</ul>
					</li>
					<li class="sidebar-header">
					Product Managment
					</li>
					<li class="sidebar-item active">
			  			<a class="sidebar-link" href="Product-managment.php">
                          <i class="align-middle" data-feather="book"></i> 
						  <span class="align-middle">Product Managment</span>
                        </a>
						<ul class="sidebar-nav" style="padding-left:1.5em;font-size:0.9em;">
							<li class="sidebar-item ">
							   <a  class="sidebar-link" href="Product-Categories.php">
								 <span class="align-middle">Categories</span>
							   </a>	
							</li>
						</ul>
					</li>
					<li class="sidebar-header">
					Livraison Managment
					</li>
					<li class="sidebar-item ">
			  			<a class="sidebar-link" href="livraison.php">
                          <i class="align-middle" data-feather="book"></i> 
						  <span class="align-middle">Livraison Managment</span>
                        </a>
						<ul class="sidebar-nav" style="padding-left:1.5em;font-size:0.9em;">
							<li class="sidebar-item">
							   <a  class="sidebar-link" href="livreur.php">
								 <span class="align-middle">Livreur Managment</span>
							   </a>	
							</li>
						</ul>
					</li>
					<li class="sidebar-header">
					 Commandes Management
					</li>
					<li class="sidebar-item ">
						<a class="sidebar-link" href="commandes.php">
							<i class="align-middle" data-feather="user"></i> <span class="align-middle">Commandes Management</span>
						</a>
					</li>
				</ul>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Upgrade to Pro</strong>
						<div class="mb-3 text-sm">
							Are you looking for more components? Check out our premium version.
						</div>
						<div class="d-grid">
							<a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
						</div>
					</div>
				</div>
			</div>
 </nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">Charles Hall</span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="AdminLogin.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content ">
				<div class="d-flex align-items-center justify-content-between mb-3" >
					 <div class="input-group" style="width: 300px !important;">
					 <form action="searchProduct.php" method="post"  class="input-group" style="width: 300px !important;">
                         <input type="text" class="form-control" placeholder="Search" name="search_input">
                         <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="submit" name="search_submit" id="search_submit">
                           <i class="fas fa-search"></i>
                          </button>
                         </div>
                       </form>
					 </div>
					 <button  class="btn btn-primary rounded-circle" id="open-popup-Admin" class="" type="button" 
						style="
						font-size: 1rem;
						padding: 3px !important;
						width: 33px;
						height: 33px;
						border-radius: 50%;
						"
					 >
						<i class="fas fa-plus"></i>
					 </button>

					 <div id="popup-container-Admin" class="popup-container-Admin" style="width: 28%;">
						<a href="product-managment.php" id="close-popup-Admin"><i class="fas fa-times"></i></a>
						<div id="popup-content-Admin" class="">
							
							<h4 class="model-titel">Add a new Product </h4>
							<form action="product-managment.php" method="post">
								<!--product name-->
								<label for="name">Name:</label>
								<input type="text" placeholder="" id="name" name="name" >
								<!--refernce name-->
								<label for="reference">Reference:</label>
								<input type="text" placeholder="" id="reference" name="reference" >
								<!--product quantity-->
					            <label for="quantity">Quantity:</label>
								<input type="number" placeholder="" id="quantity" name="quantity" min="0" " step="1">
						  		<!--product price-->
								<label for="price">Price:</label>
								<input type="number" placeholder="" id="price" name="price" min="0"  step="0.1">
								<!--Number Of Photos-->
								<label for="photosnumber">Number Of Photos :</label>
								<select name="photosnumber" id="photosnumber"class="form-select mb-3" onchange="showFields2()">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
				
								<!--product image 1-->
								<label style="color: #5A8D9B; font-size:1em; cursor:pointer;" class="img1-field" for="img1">image source 1 <i class="fas fa-image"></i></label>
								<input class="img1-field" type="file" id="img1" name="img1">
                                <!--product image 2-->
								<label style="color: #5A8D9B; font-size:1em; cursor:pointer;" class="img2-field" for="img2">image source 2 <i class="fas fa-image"></i></label>
								<input class="img2-field" type="file" id="img2" name="img2">
						        <!--product image 3-->
					            <label style="color: #5A8D9B; font-size:1em; cursor:pointer;" class="img3-field" for="img3">image source 3 <i class="fas fa-image"></i></label>
								<input class="img3-field" type="file" id="img3" name="img3">
								<!--product image 4-->
								<label style="color: #5A8D9B; font-size:1em; cursor:pointer;"  class="img4-field" for="img4">image source 4 <i class="fas fa-image"></i></label>
								<input class="img4-field" type="file" id="img4" name="img4">
								<!--product  description -->
								<label for="description">description:</label>
								<textarea class="form-control" name="description" id="description" rows="2" minlength="2" placeholder="Textarea"></textarea>
								<!--product genres-->
								<label for="genres">Genres:</label>
								<select name="genres" id="genres"class="form-select mb-3" >
									<option value="Drama">Drama</option>
									<option value="Fantasy" >Fantasy</option>
									<option value="Comic">Comic</option>
									<option value="Mystery" >Mystery</option>
									<option value="Classics">Classics</option>
									<option value="Fantasy" >Fantasy</option>
									<option value="Romance">Romance</option>
									<option value="Suspense" >Suspense</option>
									<option value="Historical">Historical</option>
									<option value="Action" >Action</option>
									<option value="Fashion" >Fashion</option>
								</select>
								<!--product  catagory -->
								<label for="category">Category:</label>
								<select name="category" id="category"class="form-select mb-3" onchange="showFields()">
									<option value="Books">Books</option>
									<option value="Voice Over" >Voice Over</option>
									<option value="Movies">Movies</option>
									<option value="Cosplays" >Cosplays</option>
								</select>
                                 <!-- Book fields -->
                                 <label class="book-field" for="author">Author:</label>
                                 <input class="book-field"  type="text" placeholder="" id="author" name="author" >		
								 <label class="book-field"  for="publisher">publisher:</label>
								 <input class="book-field"  type="text" placeholder="" id="publisher" name="publisher" >		
                                 <!-- Movie fields -->
								 <label class="movie-field" for="director">Director:</label>
								 <input class="movie-field"  type="text" placeholder="" id="director" name="director" >		
								 <label class="movie-field"  for="publisher2">publisher:</label>
								 <input class="movie-field"  type="text" placeholder="" id="publisher2" name="publisher2" >	
						         <!-- cosplays fields -->
					     		 <label class="cosplays-field" for="size">Size:</label>
								  <select name="size" id="size" class="cosplays-field form-select mb-3" id="size" name="size">
									<option option="XS" >XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
									<option value="XXL">XXL</option>
									<option value="XXXL">XXXL</option>
								</select>
					     		 <label class="cosplays-field"  for="color">Color:</label>
								  <select name="color" id="color" class="cosplays-field form-select mb-3" id="color" name="color">
									<option  option="Red">Red</option>
									<option option="Green">Green</option>
									<option option="Blue">Blue</option>
									<option option="Yellow">Yellow</option>
									<option option="Black">Black</option>
									<option option="White">White</option>
								</select>
								<!-- voice over fields -->
								<label class="voice-field"for="format">Format:</label>
								<input class="voice-field"type="text" placeholder="" id="format" name="format" >
								<label class="voice-field"for="duration">Duration:</label>
								<input class="voice-field"type="number" placeholder="Min" id="duration" name="duration" >


								<div class="d-flex align-items-center justify-content-between mb-3  ">
									<a href="product-managment.php" class="btn btn-secondary btn-block mt-3" style="border-radius: 5px;">Cancel</a>
									<button type="submit" name="submit" id="submit"class="btn btn-primary btn-block mt-3" style="border-radius: 5px;">Add</button>
									<input type="hidden" id="updating" name="updating" >
								  </div>
						  </form>
						</div>
					 </div>
					 <div id="popup-overlay-Admin" class="popup-overlay-Admin"></div>
				     </div>				
					 <script src="js/script-popup-product.js"></script>

				<div class="container-fluid p-0">
						
					<div class="row">
						<div class="col-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Projects</h5>
									
								</div>
							
								<table class="table table-hover my-0">
									<thead>
										<tr>
										    <th class="d-none d-xl-table-cell">Id Product</th>
											<th>Product Name</th>
											<th class="d-none d-xl-table-cell">Reference</th>
											<th>Price</th>
											<th class="d-none d-md-table-cell">Category</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									      <?php foreach ($products as $product): ?>
										       <tr>
										           <td class="d-none d-xl-table-cell"  >
												   <span class="badge bg-danger" ><?php echo $product->getId(); ?> </span>
												    </td>
											       <td class=""name="product-name"><img src="<?php echo $productDb->selectPathImage($product->getImg1()); ?>" class=" rounded-circle mx-2 " name="product-img" style="width: 45px; height: 45px;" ><?php echo $product->getName(); ?></td>
											       <td class="d-none d-xl-table-cell" ><?php echo $product->getReference(); ?></td>
											       <td><span class="badge bg-success" ><?php echo $product->getPrice().' TND'; ?></span></td>
											       <td class="d-none d-md-table-cell" ><?php echo $product->getCategory(); ?></td>
											       <td>
											            <a  href="product-managment.php?product-id=<?= $product->getId(); ?>"  style="margin: 10px;"   id="<?php echo $product->getId() ; ?>"  class="btn btn-secondary open-more-details" name="ReadMore">Read More</a>
												        <a href="product-managment.php?update=<?= $product->getId(); ?>" style="margin:10px;" class="btn btn-primary open-popup-ElseWhere" name="modify" id="update-button">Modify</a>
												        <a href="product-managment.php?delete=<?= $product->getId(); ?>" style="margin: 10px;" class="btn btn-danger" name="delete">Delete</a>
											       </td>
										       </tr>
										  <?php endforeach; ?>   
									</tbody>
								</table>
                             
								<div id="popup-container" style="  min-width: 350px; padding: 20px;" >
									  <a href="product-managment.php" id="close-popup"><i class="fas fa-times"></i></a>
									  <div id="popup-content"  style="  max-width: 600px;min-width: 400px;">
										   <h2 class="card-title mb-0" style="font: size 3em;">More Details</h2>
										   <br>
										   <div class="books-details" style="display:none;">
										       <label for="authorr">Author:</label>
											   <span id="authorr">xxx</span>    
											   <br>
											   <label for="punlisherr">Punlisher:</label>
											   <span id="punlisherr" >xxxx</span> 
										   </div>
										   <div class="movies-details" style="display:none;">	
										       <label for="directorr">Director:</label>
											   <span id="directorr">xxx</span>    
											   <br>
											   <label for="punlisherr2">Punlisher:</label>
											   <span id="punlisherr2" >xxxx</span> 										
										   </div>
											<div class="voice-details" style="display:none;">
											   <label for="formatt">Format:</label>
											   <span id="formatt">xxx</span>    
											   <br>
											   <label for="durationn">Duration:</label>
											   <span id="durationn"class="badge bg-warning" >xxxx</span> 
											</div>
											<div class="cosplays-details" style="display:none;">
											<label for="sizee">Size:</label>
											   <span id="sizee">xxx</span>    
											   <br>
											   <label for="colorr">Color:</label>
											   <span id="colorr" >xxxx</span> 
											</div>
										    <br>
										   <div class="product-deatils">
										       <label for="genress">Genres:</label>
											   <span id="genress">xxx</span> 
											   
											   <br>

											   <label for="quant">Quantity:</label>
											   <span id="quant" class="badge bg-danger">xxxx</span> 

											   <br>

											   <label for="paragraph"><span>Description:</span></label>
											   <p id="paragraph">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga animi sed iure a nemo quis mollitia sunt, reiciendis repellat eum modi fugiat id repellendus, perferendis ea cupiditate, temporibus hic minima!</p>	
										   </div>
										  <br><br>
										  <a href="product-managment.php"  class="btn btn-primary">Return </a>
									  </div>
								  </div>						
								</div>
								<div id="popup-overlay"></div>
					</div>


				</div>
					
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="js/app.js"></script>
	<script src="js/fields.js"></script>
    <script src="updatepopup-admin.js"></script>



</body>

</html>



<?php

//read more
if(isset($_GET['product-id'])){
    $product_id = $_GET['product-id'];
	$product_readmore=$productDb->getProductById($product_id,$products);
	//search produc
	$genres = $product_readmore->getGenres();
	$quantity = $product_readmore->getQuantity();
	$description =$product_readmore->getDescription();
	$category =$product_readmore->getCategory();




    echo '   <script src="js/readmore.js"> </script>	';
	echo '<script>
	         const genress = document.getElementById("genress");
	         genress.innerHTML = "'.$genres.'";
			 
	         const quant = document.getElementById("quant");
	         quant.innerHTML = "'.$quantity.'";
	         const paragraph = document.getElementById("paragraph");
	         paragraph.innerHTML = "'.$description.'";

       </script>';





	   if($category=="Books")
	   {
		$results=$productDb->readBook($product_id);
		echo '<script>    
		readmore("'.$category.'","'.$results[0]['author'].'","'.$results[0]['publisher'].'");  </script>';
	   }
	   else if($category=="Voice Over")
	   {
		$results=$productDb->readvoice($product_id);
		echo '<script>    readmore("'.$category.'","'.$results[0]['format'].'","'.$results[0]['duration'].' min");  
		</script>';
	   }
	   else if($category=="Movies")
	   {
		$results=$productDb->readmovie($product_id);
		echo '<script>    readmore("'.$category.'","'.$results[0]['director'].'","'.$results[0]['publisher'].'");  </script>';
	   }
	   else if($category=="Cosplays")
	   {
		$results=$productDb->readcosplay($product_id);
		echo '<script>    readmore("'.$category.'","'.$results[0]['size'].'","'.$results[0]['color'].'");  </script>';


	   }
   




}

?>


<?php 
if(isset($_GET['update']))
{
	$product_id = $_GET['update'];
	$product_readmore=$productDb->getProductById($product_id,$products);
	//search produc
	$Name= $product_readmore->getName();
	$Reference= $product_readmore->getReference();
	$rating= $product_readmore->getRating();
	$price= $product_readmore->getPrice();
	$img1=$product_readmore->getImg1();
	$img2=$product_readmore->getImg2();
	$img3=$product_readmore->getImg3();
	$img4=$product_readmore->getImg4();
    $img1Path='NONE';
	$img2Path='NONE';
	$img3Path='NONE';
	$img4Path='NONE';
	$counterNone=0;
	if($img1!="-1"){
        $img1Path=$productDb->SelectPathImage($img1);
	    $counterNone++;
	}
	if($img2!="-1"){
		$img2Path=$productDb->SelectPathImage($img2);
	    $counterNone++;
	}
	if($img3!="-1"){
		$img3Path=$productDb->SelectPathImage($img3);
	    $counterNone++;
	}
	if($img4!="-1"){
		$img4Path=$productDb->SelectPathImage($img4);
	    $counterNone++;
	}

 


	$genres = $product_readmore->getGenres();
	$quantity = $product_readmore->getQuantity();
	$description =$product_readmore->getDescription();
	$category =$product_readmore->getCategory();

	   if($category=="Books")
	   {
		$results=$productDb->readBook($product_id);
		echo'<script>
		        const author=document.querySelector("#author");
		        author.value="'.$results[0]['author'].'";
		        const publisher=document.querySelector("#publisher");
		        publisher.value="'.$results[0]['publisher'].'";
		    </script>' ;
	   }
	   else if($category=="Voice Over")
	   {
		$results=$productDb->readvoice($product_id);
		echo'<script>
		        const format=document.querySelector("#format");
		        format.value="'.$results[0]['format'].'";
		        const duration=document.querySelector("#duration");
		        duration.value="'.$results[0]['duration'].'";
		    </script>' ;
	   }
	   else if($category=="Movies")
	   {
		$results=$productDb->readmovie($product_id);
		echo'<script>
		        const director=document.querySelector("#director");
		        director.value="'.$results[0]['director'].'";
		        const publisher2=document.querySelector("#publisher2");
		        publisher2.value="'.$results[0]['publisher'].'";
		    </script>' ;
	   }
	   else if($category=="Cosplays")
	   {
		$results=$productDb->readcosplay($product_id);
		echo'<script>
		        const size=document.querySelector("#size");
		        size.value="'.$results[0]['size'].'";
		        const color=document.querySelector("#color");
		        color.value="'.$results[0]['color'].'";
		    </script>' ;
	   }



 echo '<script>
    const updating = document.querySelector("#updating");
    updating.value = "' . $product_id . '";
    const bookInputs=document.querySelectorAll(".book-field");
    const movieInputs =document.querySelectorAll(".movie-field");
    const cosplaysInputs =document.querySelectorAll(".cosplays-field");
    const voiceInputs =document.querySelectorAll(".voice-field");


     movieInputs.forEach(input => {
       input.style.display="none";
     });

     cosplaysInputs.forEach(input => {
       input.style.display="none";
     });

     voiceInputs.forEach(input => {
       input.style.display="none";
     });
	setTimeout(() => {
        popupContainerAdmin.style.opacity = "0";
        popupContainerAdmin.style.transform="translate(-50%, -50%) scale(0)";
        popupContainerAdmin.style.display = "block";
        popupOverlayAdmin.style.display = "block";
        // Add an animation to the popup window using CSS transitions
        setTimeout(() => {
            popupContainerAdmin.style.opacity = "1";
            popupContainerAdmin.style.transform="translate(-50%, -50%) scale(1)";
        }, 200); // Wait for 50ms before starting the animation
    }, 200);
    

	//set the values 

	const modelTitel=document.querySelector(".model-titel");
	modelTitel.innerHTML="Update a new Product";
	const updateSubmit=document.querySelector("#submit");
	updateSubmit.innerHTML="Update";
	const Name=document.querySelector("#name");
	Name.value="'.$Name.'";
	const Reference=document.querySelector("#reference");
	Reference.value="'.$Reference.'";
	const quantity=document.querySelector("#quantity");
	quantity.value="'.$quantity.'";
	const price=document.querySelector("#price");
	price.value="'.$price.'";
	const description=document.querySelector("#description");
	description.value="'.$description.'";
	const genres=document.querySelector("#genres");
	genres.value="'.$genres.'";
	const category=document.querySelector("#category");
	category.value="'.$category.'";
	const photosnumber=document.querySelector("#photosnumber");
	photosnumber.value="'.$counterNone.'";
	showFields();
	showFields2();
   
   

    
    </script>';

}
?>







