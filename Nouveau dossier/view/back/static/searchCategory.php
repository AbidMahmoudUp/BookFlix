<?php
include('../../../controller/productController.php');
session_start();
$productDb = new ProductController();
    
$search_input = $_POST['search_input'];
$categories=$productDb->searchCategory($search_input);
$_SESSION['categories'] = $categories;
header("location:Product-Categories.php");
?>