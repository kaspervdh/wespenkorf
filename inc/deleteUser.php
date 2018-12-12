<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 11/20/2018
 * Time: 3:39 PM
 */
require("initialization.php");


    $deleteQuery = "DELETE FROM users WHERE id='{$_SESSION["userId"]}'";
    mysqli_query($connect, $deleteQuery);

if ($deleteQuery) {

    session_destroy();
    header("Location:../index.php");
}