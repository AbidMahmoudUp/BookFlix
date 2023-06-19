
<?php 
include('../../../controller/productController.php');
$productDb = new ProductController();
session_start();

//add or update category
if(isset($_POST['submit']))
{
    if(!empty($_POST['name']))
    {
        $CategoryName=$_POST['name'];

        if(!empty($_POST['updating']))
        {
            $id=$_POST['updating'];
            $productDb->modifyCategory($id, $CategoryName);
        }
        else
        {
            $productDb->addCategory($CategoryName);
        }
        header("location:Product-Categories.php");
    }
}

//display categories


if (isset($_SESSION['categories']) && !empty($_SESSION['categories'])) {
	// If the session variable is set and not empty
	$categories = $_SESSION['categories'];
	$_SESSION['categories']=null;
  } else {
	// If the session variable is not set or empty
	$categories = $productDb->displayCategories();
  }


//delete category
if(isset($_GET['delete']))
{
	$id = $_GET['delete'];
    $productDb->deleteCategory($id);
    header("location:Product-Categories.php");
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
	
</head>



<body>
	<div class="wrapper">
	<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.php">
          <span class="align-middle">AdminKit</span>
           </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-profile.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
					</li>
					<li class="sidebar-item active">
			  			<a class="sidebar-link" href="evennement-managment.php">
                          <i class="align-middle" data-feather="book"></i> 
						  <span class="align-middle">Evennement Managment</span>
                        </a>
						<ul class="sidebar-nav" style="padding-left:1.5em;font-size:0.9em;">
							<li class="sidebar-item">
							   <a  class="sidebar-link" href="reservation.php">
								 <span class="align-middle">Reservation</span>
							   </a>	
							</li>
						</ul>
					</li>

					<li class="sidebar-item active">
			  			<a class="sidebar-link" href="Product-managment.php">
                          <i class="align-middle" data-feather="book"></i> 
						  <span class="align-middle">Product Managment</span>
                        </a>
						<ul class="sidebar-nav" style="padding-left:1.5em;font-size:0.9em;">
							<li class="sidebar-item">
							   <a  class="sidebar-link" href="Product-Categories.php">
								 <span class="align-middle">Categories</span>
							   </a>	
							</li>
						</ul>
					</li>

					<li class="sidebar-header">
						Plugins & Addons
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.php">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.php">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
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
								<a class="dropdown-item" href="#">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content ">
				<div class="d-flex align-items-center justify-content-between mb-3" >
					 <div class="input-group" style="width: 300px !important;">
					   <form action="searchCategory.php" method="post"  class="input-group" style="width: 300px !important;">
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
						<a href="Product-Categories.php" id="close-popup-Admin"><i class="fas fa-times"></i></a>
						<div id="popup-content-Admin" class="">
							
							<h4 class="model-titel">Add a new Category </h4>
							<form action="Product-Categories.php" method="post" style="height: 200px;">
								<!--product name-->
								<label for="name">Name:</label>
								<input type="text" placeholder="" id="name" name="name" >
                                <br>
								<div class="d-flex align-items-center justify-content-between mb-3  ">
									<a href="Product-Categories.php" class="btn btn-secondary btn-block mt-3" style="border-radius: 5px;">Cancel</a>
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
										    <th>Id Category</th>
											<th>Category Name</th>
                                            <th>Actions</th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach ($categories as $category): ?>
										       <tr>
										           <td   >
												       <span class="badge bg-success" ><?php echo $category["idcategory"]; ?></span>
												   </td>
											       <td class=""name="product-name"><?php echo $category["namecategory"]; ?></td>
											       <td>
												        <a href="Product-Categories.php?update=<?= $category["idcategory"]; ?>" style="margin:10px;" class="btn btn-primary open-popup-ElseWhere" name="modify" id="update-button">Modify</a>
												        <a href="Product-Categories.php?delete=<?= $category["idcategory"]; ?>" style="margin: 10px;" class="btn btn-danger" name="delete">Delete</a>
											       </td>
										       </tr>
                                       <?php endforeach; ?>                                
									</tbody>
								</table>
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
if(isset($_GET['update']))
{
	$category_id = $_GET['update'];
    $category_name=$productDb->get_Idcategory($category_id);
 echo '<script>
    const updating = document.querySelector("#updating");
    updating.value = "' . $category_id . '";

	const modelTitel=document.querySelector(".model-titel");
	modelTitel.innerHTML="Update a new Product";

	const updateSubmit=document.querySelector("#submit");
	updateSubmit.innerHTML="Update";

	const Name=document.querySelector("#name");
	Name.value="'.$category_name.'";

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
    
    </script>';

}
?>



