<?php
include('../../../Core/productController.php');
session_start();
$productDb = new ProductController();
    
$search_input = $_POST['search_input'];
$_SESSION['products']=$productDb->searchProduct($search_input);
header("location:product-managment.php");
?>