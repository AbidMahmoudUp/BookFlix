<?php
include('../../Core/productController.php');
$productDb = new ProductController();
session_start();

$search_input = $_POST['searchproduct'];
$_SESSION['products']=$productDb->searchProduct($search_input);
header("location:shop.php");
?>