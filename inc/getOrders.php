<?php
/**
 * Created by PhpStorm.
 * User: Kaspervdh
 * Date: 12/12/2018
 * Time: 10:12 PM
 */


$selectOrdersQuery = "SELECT * FROM `orders` WHERE `userId` = {$_SESSION["userId"]}";
$resource = mysqli_query($connect, $selectOrdersQuery);
$orders = array();

while($result = mysqli_fetch_assoc($resource))
{
    $orders[] = $result;
};