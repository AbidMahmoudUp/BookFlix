<?php
include('Model/User.php'); 

$userController = new CrudUser();

$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

$userController->Verifie($userEmail,$userPassword);

?>