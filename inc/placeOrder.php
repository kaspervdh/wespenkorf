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

echo $token = getToken(25);

// count duplicates in array_count_values() function
$quantity = array_count_values($_SESSION["cartDisplay"]);

print_r($quantity);
$orderId = 1;

foreach($quantity as count($quantity)){
    $productOrderQuery = "insert into `orderproduct` (`orderId`, `productId`, `quantity`) values (`{$orderId}`";
    foreach($_SESSION['cartDisplay'] as $key => $productId)
    {
        $productOrderQuery .= "$productId";
    }
    $productOrderQuery .= ")";
}
echo $productOrderQuery;


