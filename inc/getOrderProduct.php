<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/19/2018
 * Time: 3:37 PM
 */


$query = "SELECT * FROM orderproduct WHERE `orderId` = '{$order["id"]}'";

$resource = mysqli_query($connect, $query);

$products = array();

while($result = mysqli_fetch_assoc($resource))
{
    $products[] = $result; // all your games are now in array $games
};
