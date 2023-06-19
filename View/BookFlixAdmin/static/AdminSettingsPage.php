<?php
include('../../../Core/Admin.php');

session_start();
if(!isset($_SESSION['idAdmin']))
{
	header("Location: error404.html");
}
$adminInfo=new CrudAdmin();
$liste=$adminInfo->getAdminByID($_SESSION['idAdmin']);

if(isset($_POST['update-personal']))
{
    $work=$_POST['work'];
    $phone_number=$_POST['phone_number'];
    $country=$_POST['country'];
    $email=$_POST['email'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $responsibility=$_POST['responsibility'];
    $newAdmin=new Admin('',$name,'',$email,$phone_number,$address,$work,$country,$responsibility,'');
    CrudAdmin::UpdateSettingsAdmin($newAdmin,$_SESSION['idAdmin']);

}

if(isset($_POST['update-password']))
{   
    $oldPassword = $_POST['oldPassword'];
    $password = $_POST['password'];
    $confirmePassword = $_POST['confirmePassword'];
    
    if(isset($_POST['oldPassword']) && !empty($_POST['oldPassword']) && ($oldPassword == $_SESSION['passwordAdmin']) && ($password == $confirmePassword))
    {
        $oldPassword = $_POST['oldPassword'];
        $newAdmin = new Admin('', '', $password, '', '', '', '', '', '', '');
        CrudAdmin::UpdatePasswordAdmin($newAdmin, $_SESSION['idAdmin']);
    }
}
if(isset($_POST['delete']))
{
    CrudAdmin::Delete($_SESSION['idAdmin']);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <link href="https://fonts.googleapis.com/css2?family=League+Gothic&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-profile.html" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
							<li class="sidebar-item ">
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
                                <a class="dropdown-item" href="AdminProfile.php"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="AdminLogin.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container">


                <div class="row gutters-sm">
                    <div class="col-md-4 d-none d-md-block">
                        <div class="card my-5">
                            <div class="card-body">
                                <nav class="nav flex-column nav-pills nav-gap-y-1">
                                    <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user mr-2">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>Profile Information
                                    </a>
                                    <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mr-2">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                        </svg>Account Settings
                                    </a>
                                    <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield mr-2">
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                        </svg>Security
                                    </a>
                                    <a href="#notification" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell mr-2">
                                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                        </svg>Notification
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card my-5">
                            <div class="card-header border-bottom mb-3 d-flex d-md-none">
                                <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                                    <li class="nav-item">
                                        <a href="#profile" data-toggle="tab" class="nav-link has-icon active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#account" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                                <circle cx="12" cy="12" r="3"></circle>
                                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                            </svg></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#security" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                            </svg></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#notification" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                            </svg></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body tab-content ">
                                <div class="tab-pane active" id="profile">
                                    <h6>YOUR PROFILE INFORMATION</h6>
                                    <hr>
                                    <form method="post">
                                        <div class="form-group">
                                            
                                            <label for="fullName">Full Name</label>
                                            <input type="text" name="name"class="form-control" id="fullName" aria-describedby="fullNameHelp" placeholder="Enter your fullname" value="<?php echo $liste['name'];?>">
                                            <small id="fullNameHelp" class="form-text text-muted">Your name may appear around here where you are mentioned. You can change or remove it at any time.</small>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fullName">Phone Number</label>
                                                    <input type="text" name="phone_number" class="form-control" id="fullName" placeholder="Enter your full name" value="<?php echo $liste['phone_number'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="url">Email</label>
                                                    <input type="text" name="email" class="form-control" id="url" placeholder="Enter your website address" value="<?php echo $liste['email'];?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fullName">Responsibility</label>
                                                    <input type="text" name="responsibility" class="form-control" id="fullName" placeholder="Enter your full name" value="<?php echo $liste['responsibility'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="url">Address</label>
                                                    <input type="text" name="address" class="form-control" id="url" placeholder="Enter your website address" value="<?php echo $liste['address'];?>">
                                                </div>
                                            </div>
                                        </div><div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="fullName">Work</label>
                                                    <input type="text" name="work" class="form-control" id="fullName" placeholder="Enter your full name" value="<?php echo $liste['work'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="url">Country</label>
                                                    <input type="text" name="country" class="form-control" id="url" placeholder="Enter your website address" value="<?php echo $liste['country'];?>">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group small text-muted">
                                            All of the fields on this page are optional and can be deleted at any time, and by filling them out, you're giving us consent to share this data wherever your user profile appears.
                                        </div>
                                        <button type="submit"name="update-personal" class="btn btn-primary">Update Profile</button>
                                        <button type="reset" class="btn btn-light">Reset Changes</button>
                                    </form>
                                </div>
                                <div class="tab-pane my-5" id="account">
                                    <h6>ACCOUNT SETTINGS</h6>
                                    <hr>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="d-block text-danger">Delete Account</label>
                                            <p class="text-muted font-size-sm">Once you delete your account, there is no going back. Please be certain.</p>
                                        </div>
                                        <button class="btn btn-danger"name="delete" type="submit">Delete Account</button>
                                    </form>
                                </div>
                                <div class="tab-pane" id="security">
                                    <h6>SECURITY SETTINGS</h6>
                                    <hr>
                                    <form method="post">
                                        <div class="form-group">
                                            <label class="d-block">Change Password</label>
                                            <input type="password" name="oldPassword" class="form-control" placeholder="Enter your old password">
                                            <input type="password" name="password" class="form-control mt-1" placeholder="New password">
                                            <input type="password" name="confirmePassword" class="form-control mt-1" placeholder="Confirm new password">
                                            <label class="d-block">Save Update:</label>
                                            <button class="btn btn-info" name="update-password" type="submit">Update Password</button>
                                        </div>
                                    </form>

                                </div>

                                <div class="tab-pane" id="notification">
                                    <h6>NOTIFICATION SETTINGS</h6>
                                    <hr>
                                    <form>
                                        <div class="form-group">
                                            <label class="d-block mb-0">Security Alerts</label>
                                            <div class="small text-muted mb-3">Receive security alert notifications via email</div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" checked="">
                                                <label class="custom-control-label" for="customCheck1">Email each time a vulnerability is found</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2" checked="">
                                                <label class="custom-control-label" for="customCheck2">Email a digest summary of vulnerability</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <label class="d-block">SMS Notifications</label>
                                            <ul class="list-group list-group-sm">
                                                <li class="list-group-item has-icon">
                                                    Comments
                                                    <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked="">
                                                        <label class="custom-control-label" for="customSwitch1"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item has-icon">
                                                    Updates From People
                                                    <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                                        <label class="custom-control-label" for="customSwitch2"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item has-icon">
                                                    Reminders
                                                    <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch3" checked="">
                                                        <label class="custom-control-label" for="customSwitch3"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item has-icon">
                                                    Events
                                                    <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch4" checked="">
                                                        <label class="custom-control-label" for="customSwitch4"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item has-icon">
                                                    Pages You Follow
                                                    <div class="custom-control custom-control-nolabel custom-switch ml-auto">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                                        <label class="custom-control-label" for="customSwitch5"></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
            <script type="text/javascript">

            </script>


        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>