<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/11/2018
 * Time: 3:17 PM
 */

session_start();  /* starts session */
require("functions.php");  /* includes all necessary functions */
$connect = connectToDatabase();  /* Starts connection to database */


$_GET["cartJson"] = json_encode($_SESSION["cart"]);
echo $_GET["cartJson"];