<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/20/2018
 * Time: 11:55 AM
 */
session_start();  /* starts session */
require("functions.php");  /* includes all necessary functions */
$connect = connectToDatabase();  /* Starts connection to database */



$query = "UPDATE users
                    SET password = '$password'
                    WHERE username = '{$_SESSION["username"]}'";

mysqli_query($connect, $query);