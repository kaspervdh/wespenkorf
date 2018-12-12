<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/10/2018
 * Time: 4:14 PM
 */

require("initialization.php");

$_SESSION["cartItemCount"] = $_SESSION["cartItemCount"] - 1;

if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
else{
    $_SESSION['cart'] = array_diff($_SESSION['cart'], [$_POST['productId']]);
}

