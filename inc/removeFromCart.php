<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/10/2018
 * Time: 4:14 PM
 */

require("initialization.php");



if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
else{
    $_SESSION['cart'] = array_diff($_SESSION['cart'], [$_POST['productId']]);
}

if(empty($_SESSION['cartDisplay'])){
    $_SESSION['cartDisplay'] = array();
}
else{
    $_SESSION['cartDisplay'] = array_diff($_SESSION['cartDisplay'], [$_POST['productId']]);
}

$_SESSION["cartItemCount"] = count($_SESSION["cartDisplay"]);