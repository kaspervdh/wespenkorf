<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/11/2018
 * Time: 3:20 PM
 */

session_start();  /* starts session */
require("functions.php");  /* includes all necessary functions */
$connect = connectToDatabase();  /* Starts connection to database */

$token = getToken(25);

// count duplicates in array_count_values() function
$productsCart = array_count_values($_SESSION["cartDisplay"]);


$newOrderQuery = "INSERT INTO `orders` (`id`, `userId`, `trackingCode`, `status`, `date`) 
                      VALUES (NULL, {$_SESSION["userId"]}, '{$token}', 1, '11-11-11')";
    mysqli_query($connect, $newOrderQuery);

$highestOrderQuery = "SELECT MAX(`id`) FROM `orders`";

$resource = mysqli_query($connect, $highestOrderQuery);

$highestOrder = mysqli_fetch_row($resource);

$orderId = $highestOrder[0];
foreach ($productsCart as $productId => $quantity){
      $productOrderQuery = "insert into `orderproduct` (`orderId`, `productId`, `quantity`)
                             values ({$orderId}, {$productId}, {$quantity})";

      mysqli_query($connect, $productOrderQuery);

    if($productOrderQuery) // will return true if succefull else it will return false
    {
        unset($_SESSION["cartDisplay"]);
        unset($_SESSION["cartItemCount"]);
    }
    else{
        echo "failed";
    }
}







