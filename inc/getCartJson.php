<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/11/2018
 * Time: 3:17 PM
 */

require("initialization.php");

array_push($_SESSION['cart'], $_SESSION["userId"]);
$_SESSION["cartJson"] = json_encode($_SESSION["cart"]);
echo $_SESSION["cartJson"];