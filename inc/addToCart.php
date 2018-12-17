<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/10/2018
 * Time: 3:41 PM
 */

session_start();  /* starts session */
require("functions.php");  /* includes all necessary functions */
$connect = connectToDatabase();  /* Starts connection to database */



//Display array
if(empty($_SESSION["cartDisplay"])) {
    $_SESSION['cartDisplay'] = array();
    array_push($_SESSION['cartDisplay'], $_POST['productId']);
}
else{
array_push($_SESSION['cartDisplay'], $_POST['productId']);
}


// Array to be JSON to send
$productId = $_POST['productId'];
$userId = $_SESSION["userId"];

// CHECK IF SESSION IS EMPTY OR NOT
if(empty($_SESSION["cart"])) {
    $_SESSION["cart"] = array('userId' => $userId, 'productId1' => $productId);
} else {
    $size = count($_SESSION["cart"]);
    $_SESSION["cart"]['productId' . $size ] = $productId;
}

//Cart counter
$_SESSION["cartItemCount"] = count($_SESSION["cartDisplay"]);

print_r($_SESSION["cart"]);
print_r($_SESSION['cartDisplay']);

