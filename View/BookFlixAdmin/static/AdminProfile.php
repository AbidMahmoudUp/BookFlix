<?php
include('../../../Core/Admin.php');
include('../../../Core/Activities.php');
session_start();

if(!isset($_SESSION['idAdmin']))
{
	header("Location: error404.html");
}
$Activities = new CrudActivities();
$listActivities = $Activities->displayActivitiesProfile($_SESSION['idAdmin']);
if (isset($_POST['submit'])) {
	$address = $_POST['address'];
	$country = $_POST['country'];
	$work = $_POST['work'];

	$newAdmin = new Admin('', '', '', '', '', $address, $work, $country, '', '');
	CrudAdmin::UpdateAboutInfoAdmin($newAdmin, $_SESSION['idAdmin']);
	$description = "You have updated your information";
	$currentDateTime = date('Y-m-d H:i:s');
	$newActivitie = new Activities('', $_SESSION['idAdmin'], $description, $currentDateTime, '');
	CrudActivities::insert($newActivitie);
}
if (isset($_POST['Responsibility-btn'])) {
	$responsibility = $_POST['responsibility'];
	$newAdmin = new Admin('', '', '', '', '', '', '', '', $responsibility, '');
	CrudAdmin::UpdateResponsibilityInfoAdmin($newAdmin, $_SESSION['idAdmin']);
	$description = "You have updated your Responsibility to : " . $responsibility;
	$currentDateTime = date('Y-m-d H:i:s');
	$newActivitie = new Activities('', $_SESSION['idAdmin'], $description, $currentDateTime, '');
	CrudActivities::insert($newActivitie);
}


$entitie = new CrudAdmin();
$adminInfo = $entitie->getAdminByID($_SESSION['idAdmin']);


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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<link href="https://fonts.googleapis.com/css2?family=League+Gothic&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-profile.html" />

	<title>Profile | AdminKit Demo</title>
	<link rel="stylesheet" href="css/style-popup.css">
	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<style>


	</style>
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
					<li class="sidebar-item active">
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
					<li class="sidebar-item ">
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
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="AdminSettingsPage.php" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark">Charles Hall</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="AdminSettingsPage.php"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="AdminLogin.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Profile</h1>
						<!-- <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
      Get more page examples
  </a> -->
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Profile Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="data:image/png;base64,<?php echo base64_encode($adminInfo['picture']); ?>" alt="Admin Picture" class="img-fluid rounded-circle mb-2" width="128" height="128" />

									<form method="post" action="upload-photo.php" enctype="multipart/form-data">
										<div class="input-group justify-content-center" style="left:19%; bottom: 24px; ">
											<label class="input-group-text small camera-icon bg-transparent border-0 " for="file-input">
												<i class="fas fa-camera" style="color: #454040; font-size: 18px; cursor: pointer;"></i>
											</label>
											<input type="file" id="file-input" accept="image/*" name="myFile" class="form-control d-none">
											<input id="upload-btn" type="submit" hidden>
										</div>
									</form>
									<script>
										const fileInput = document.getElementById('file-input');
										const uploadBtn = document.getElementById('upload-btn');

										fileInput.addEventListener('change', () => {
											// simulate a click on the upload button to trigger the form submission
											uploadBtn.click();
										});
									</script>

									<h5 class="card-title mb-0"><?php echo($adminInfo['name']);?></h5>
									<div class="text-muted mb-2"><?php echo($adminInfo['responsibility']);?></div>

									<div>
										<a class="btn btn-primary btn-sm" href="#">Follow</a>
										<a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
									</div>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center ">
										<h5 class="h6 card-title mb-0">Responsibility</h5>
										<button type="button" id="open-popup" class="class= btn btn-secondary btn-sm rounded-circle " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pencil-alt"></i></button>


										<div id="popup-container">
											<button id="close-popup"><i class="fas fa-times"></i></button>
											<div id="popup-content">
												<form method="post">
													<label for="responsibility">Responsibility:</label>
													<span class="input-icon"><i class="fas fa-user"></i></span>
													<input type="text" placeholder="Add a new Responsibility" id="responsibility" name="responsibility" required>
													<br><br>
													<button type="submit" name="Responsibility-btn" class="btn btn-primary">Submit</button>
												</form>
											</div>
										</div>
										<div id="popup-overlay"></div>

									</div>

									<div class=" justify-content-between align-items-center ">
										<a href="#" class="badge bg-primary mt-4   " style="margin-left: 12%;"><?php echo $adminInfo['responsibility']; ?></a>

									</div>
								</div>


								<div id="popup-overlay"></div>

								<script src="script.js"></script>
								<hr class="my-0" />
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center ">
										<h5 class="h6 card-title mb-0">About</h5>
										<button type="button" id="open-popup-About" class=" btn btn-secondary btn-sm rounded-circle " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pencil-alt"></i></button>

									</div>
									<div id="popup-container-About">
										<button id="close-popup-About"><i class="fas fa-times"></i></button>
										<div id="popup-content-About">
											<form method="post">

												<h4 class="model-titel">Admin Information </h4>
												<form>
													<label for="address">Address:</label>
													<span class="input-icon-About-address" id="address-icon"><i class="fas fa-map-marker-alt"></i></span>
													<input type="text" placeholder="" id="address" name="address" required>

													<label for="work">Work:</label>
													<div class="input-group-prepend">
														<span class="input-icon-About-work" id="work-icon"><i class="fas fa-briefcase"></i></span>
													</div>
													<input type="text" placeholder="" id="work" name="work" required>

													<label for="country">Country:</label>
													<span class="input-icon-About-country" id="country-icon"><i class="fas fa-globe"></i></span>
													<input type="text" placeholder="" id="country" name="country" required>


													<div class="d-flex align-items-center justify-content-between mb-3  ">
														<button href="#" class="btn btn-secondary btn-block mt-3" style="border-radius: 5px;">Cancel</button>
														<button href="#" class="btn btn-primary btn-block mt-3" name="submit" style="border-radius: 5px;">Add</button>

													</div>
												</form>
										</div>
									</div>
									<div id="popup-overlay-About"></div>

									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#"><?php echo $adminInfo['address']; ?></a></li>

										<li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#"><?php echo $adminInfo['work']; ?></a></li>
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#"><?php echo $adminInfo['country']; ?></a></li>
									</ul>
								</div>
								<hr class="my-0" />
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center ">
										<h5 class="h6 card-title mb-0">Elsewhere</h5>
									</div>

									<ul class="list-unstyled mb-0">
										<li class="mb-1"><a href="#">staciehall.co</a></li>
										<li class="mb-1"><a href="#">Twitter</a></li>
										<li class="mb-1"><a href="#">Facebook</a></li>
										<li class="mb-1"><a href="#">Instagram</a></li>
										<li class="mb-1"><a href="#">LinkedIn</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Activities</h5>
								</div>
								<div class="card-body h-100">
									<?php foreach ($listActivities as $row) {
										// convert database timestamp to Unix timestamp
										$timestamp = strtotime($row['date']);

										// calculate time difference in seconds
										$diff = time() - $timestamp;

										// display time difference in minutes, hours, or days
										if ($diff < 60) {
											$time_diff = $diff . " seconds ago";
										} else {
											$diff = round($diff / 60);
											if ($diff < 60) {
												$time_diff = $diff . " minutes ago";
											} else {
												$diff = round($diff / 60);
												if ($diff < 24) {
													$time_diff = $diff . " hours ago";
												} else {
													$diff = round($diff / 24);
													$time_diff = $diff . " days ago";
												}
											}
										}
									?>
										<div class="d-flex align-items-start">
											<img src="data:image/png;base64,<?php echo base64_encode($adminInfo['picture']); ?>" width="36" height="36" class="rounded-circle me-2" alt="Vanessa Tucker">
											<div class="flex-grow-1">
												<small class="float-end text-navy"><?php echo $time_diff; ?></small>
												<strong><?php echo $row['description']; ?></strong><br />
												<small class="text-muted"><?php echo $row['date']; ?></small>
											</div>
											
										</div>
										<hr />
									<?php } ?>



									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Charles Hall">
										<div class="flex-grow-1">
											<small class="float-end text-navy">30m ago</small>
											<strong>Charles Hall</strong> posted something on <strong>Christina Mason</strong>'s timeline<br />
											<small class="text-muted">Today 7:21 pm</small>

											<div class="border text-sm text-muted p-2 mt-1">
												Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus
												pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante.
											</div>

											<a href="#" class="btn btn-sm btn-danger mt-1"><i class="feather-sm" data-feather="heart"></i> Like</a>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1h ago</small>
											<strong>Christina Mason</strong> posted a new blog<br />

											<small class="text-muted">Today 6:35 pm</small>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-2.jpg" width="36" height="36" class="rounded-circle me-2" alt="William Harris">
										<div class="flex-grow-1">
											<small class="float-end text-navy">3h ago</small>
											<strong>William Harris</strong> posted two photos on <strong>Christina Mason</strong>'s timeline<br />
											<small class="text-muted">Today 5:12 pm</small>

											<div class="row g-0 mt-1">
												<div class="col-6 col-md-4 col-lg-4 col-xl-3">
													<img src="img/photos/unsplash-1.jpg" class="img-fluid pe-2" alt="Unsplash">
												</div>
												<div class="col-6 col-md-4 col-lg-4 col-xl-3">
													<img src="img/photos/unsplash-2.jpg" class="img-fluid pe-2" alt="Unsplash">
												</div>
											</div>

											<a href="#" class="btn btn-sm btn-danger mt-1"><i class="feather-sm" data-feather="heart"></i> Like</a>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-2.jpg" width="36" height="36" class="rounded-circle me-2" alt="William Harris">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1d ago</small>
											<strong>William Harris</strong> started following <strong>Christina Mason</strong><br />
											<small class="text-muted">Yesterday 3:12 pm</small>

											<div class="d-flex align-items-start mt-1">
												<a class="pe-3" href="#">
													<img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
												</a>
												<div class="flex-grow-1">
													<div class="border text-sm text-muted p-2 mt-1">
														Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.
													</div>
												</div>
											</div>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2" alt="Christina Mason">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1d ago</small>
											<strong>Christina Mason</strong> posted a new blog<br />
											<small class="text-muted">Yesterday 2:43 pm</small>
										</div>
									</div>

									<hr />
									<div class="d-flex align-items-start">
										<img src="img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2" alt="Charles Hall">
										<div class="flex-grow-1">
											<small class="float-end text-navy">1d ago</small>
											<strong>Charles Hall</strong> started following <strong>Christina Mason</strong><br />
											<small class="text-muted">Yesterdag 1:51 pm</small>
										</div>
									</div>

									<hr />
									<div class="d-grid">
										<a href="#" class="btn btn-primary">Load more</a>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a> &copy;
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
	<script src="js/script-popup.js"></script>

</body>

</html>