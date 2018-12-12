<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/10/2018
 * Time: 3:41 PM
 */

require("initialization.php");

$_SESSION["cartItemCount"] = $_SESSION["cartItemCount"] + 1;

if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

$product_array["product"][] = $_POST['productId'];

array_push($_SESSION['cart'], $product_array["product"]);


