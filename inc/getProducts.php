<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/10/2018
 * Time: 2:05 PM
 */


$selectProductsQuery = "SELECT * FROM `products`";


$resource = mysqli_query($connect, $selectProductsQuery);

$products = array();

while($result = mysqli_fetch_assoc($resource))
{
    $products[] = $result; // all your games are now in array $games
};


