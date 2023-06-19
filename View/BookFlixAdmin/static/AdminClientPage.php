<?php
include('../../../Core/User.php');
include('../../../Core/Reclamation.php');
include('../../../Core/Admin.php');





session_start();
if(!isset($_SESSION['idAdmin']))
{
	header("Location: error404.html");
}
$Client = new CrudUser();
$listClient = $Client->Display_users();
$Reclamation = new CrudReclamation();
$listReclamation = $Reclamation->DisplayAllReclamation();
$listeOfBadWords= array('badword1','badword2','badword3');

if(isset($_POST['ban']))
{
	CrudUser::Delete($_POST['ban']);
	header('Location:AdminClientPage.php');
}


if(isset($_GET['idReclamation']) && isset($_GET['change']))
{	echo "<table><td>loooooooooool</td></table>";
	$status=$_GET['change'];
	CrudReclamation::UpdateStatusReclamation($_GET['idReclamation'],$status);
	header("Location:AdminClientPage.php");
	
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

	<title>Blank Page | AdminKit Demo</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-VvFyfSnm8O9Oy9auGpouJZ1zqwRmL6aPz6pY35/Syq3+jrEgld9QDg/B1FV7QjZCzNl7IbBWTwYy7P/6UPGdVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-FY5l5i2vqx8rl88WjKX9xrPMLo3qC/Sg4EM4L2eKw1roLmk1+x+bTRRiETf19XoBmejKg3piZ4c4StQOUpZjKw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-H+4e4/z4t+vlQn4nQz9d9nt9JxSx1tKE+ZNK+D1tuvRy5o5wEfhfP5OK5clpXVh3J3OErO7PFI0d8yXL3p+f3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<link href="css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-uxKjw7y6PQdDf7c4m04gUVMSZmzQ2XhtVlBDAIPTl5V7F5PJjnf5g8bFZOJzvZK94NBo+Bh9tMCq3C2/yy/7Kw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="css/stylePopUpBan.css">
	<link rel="stylesheet" href="css/style-popup.css">
	<script src="js/popUpClientBan.js"></script>
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

					<li class="sidebar-item active">
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
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0">Display Clients</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>

											<th>ID User</th>
											<th class="d-none d-md-table-cell">Username</th>
											<th class="d-none d-xl-table-cell">Email</th>
											<th class="d-none d-xl-table-cell">phoneNumber</th>
											<th class="d-none d-xl-table-cell">Action</th>


										</tr>
									</thead>
									<tbody>
										<?php foreach ($listClient as $row) { ?>
											<tr>

												<td class="d-none d-xl-table-cell"><?php echo $row['id']; ?></td>
												<td class="d-none d-xl-table-cell"><?php echo $row['username']; ?></td>
												<td><span class="badge bg-success"><?php echo $row['email']; ?></span></td>
												<td class="d-none d-md-table-cell"><?php echo $row['phone_number']; ?></td>
												<td>
													<form method="post"><button type="submit"  value="<?php echo $row['id'];?>" name="ban"  class=" delete btn btn-danger border-0" style="background:transparent; color:crimson;" data-toggle="modal"><i class="fa fas fa-trash" data-toggle="tooltip" title="Delete">&#xE872;</i></button></td></form>
												<div id="popup-container-Ban">
													<button id="close-popup-Ban"><i class="fas fa-times"></i></button>
													<div id="popup-content-Ban">
														<form method="post">
															<label for="responsibility">Responsibility:</label>
															<span class="input-icon"><i class="fas fa-user"></i></span>
															<input type="text" placeholder="Add a new Responsibility" id="responsibility" name="responsibility" required>
															<br><br>
															<button type="submit" name="Responsibility-btn" class="btn btn-primary">Submit</button>
														</form>
													</div>
												</div>
												<div id="popup-overlay-Ban"></div>
											</tr>
										<?php } ?>

									</tbody>
								</table>
							</div>
						</div>

						<script>
							
// Wait for the page to load before adding event listeners
$(document).ready(function() {
  // Get all the delete buttons with the id "id-openPopUpBan"
  var deleteButtons = document.querySelectorAll("#id-openPopUpBan");
  deleteButtons.forEach(function(button) {
    // Add a click event listener to each delete button
    button.addEventListener("click", function() {
      // Show the pop-up
      $('#popup-container-Ban').fadeIn(300);
      $('#popup-overlay-Ban').fadeIn(300);
    });
  });
  // Close the pop-up when the close button or the overlay is clicked
  $('#close-popup-Ban, #popup-overlay-Ban').click(function() {
    $('#popup-container-Ban').fadeOut(300);
    $('#popup-overlay-Ban').fadeOut(300);
  });
});


						</script>
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0">Display Reclamation</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>

											<th>ID User</th>
											<th class="d-none d-md-table-cell">Username</th>
											<th class="d-none d-xl-table-cell">Topic</th>
											<th class="d-none d-xl-table-cell">Description</th>
											<th>Status</th>

										</tr>
									</thead>
									<tbody>
									<?php


foreach ($listReclamation as $row) {
    
    $description = $row['description'];
    foreach ($listeOfBadWords as $bad_word) {
        $description = str_ireplace($bad_word, str_repeat('*', strlen($bad_word)), $description);
    }
?>
    <tr>
        <td><?php echo $row['idClient']; ?></td>
        <td class="d-none d-xl-table-cell"><?php echo $row['username']; ?></td>
        <td class="d-none d-xl-table-cell"><?php echo $row['topic']; ?></td>
        <td class="d-none d-md-table-cell"><?php echo $description; ?></td>
        <td class="d-none d-xl-table-cell">
            <a class="<?php if($row['statusReclamation']=="In Progress")echo " btn btn-warning"; elseif($row['statusReclamation']=="Done")echo "btn btn-success";else echo"btn btn-danger";?>"
            href="AdminClientPage.php?idReclamation=<?php echo $row['idReclamation']; ?>&change=<?php echo $row['statusReclamation']; ?>"><?php echo $row['statusReclamation'] ;?>  </a>
        </td>
    </tr>
<?php } ?>

									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Reclamation Fliter</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>


			</main>

			<script>
				function toggleButton(button) {
					var id = button.getAttribute('data-id');
					if (button.classList.contains("btn-warning")) {
						button.classList.remove("btn-warning");
						button.classList.add("btn-success");
						button.textContent = "Done";
						updateStatus(id, "Done");

					} else if (button.classList.contains("btn-success")) {
						button.classList.remove("btn-success");
						button.classList.add("btn-danger");
						button.textContent = "Cancel";
						updateStatus(id, "Cancel");
					} else {
						button.classList.remove("btn-danger");
						button.classList.add("btn-warning");
						button.textContent = "In Progress";
						updateStatus(id, "In Progress");
					}
				}

				function updateStatus(id, status) {
					var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							console.log(this.responseText);
						}
					};
					xhttp.open("POST", "updateStatus.php", true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.send("id=" + id + "&status=" + status);
				}
			</script>

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



</body>

</html>