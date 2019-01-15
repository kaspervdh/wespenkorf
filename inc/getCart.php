<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/10/2018
 * Time: 4:02 PM
 */

if (isset($_SESSION["cart"]) && isset($_SESSION["cartDisplay"])) {

    $cart = join("','", $_SESSION["cartDisplay"]);
    $selectProductsQuery = "SELECT * FROM products WHERE id IN ('". $cart ."')";
    $resource = mysqli_query($connect, $selectProductsQuery);
    $products = array();

    while($result = mysqli_fetch_assoc($resource))
    {
        $products[] = $result;
    };
}


