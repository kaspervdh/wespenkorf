<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/20/2018
 * Time: 11:39 AM
 */
session_start();  /* starts session */
require("functions.php");  /* includes all necessary functions */
$connect = connectToDatabase();  /* Starts connection to database */

$password = $_POST["password"];

if (!empty($password)) {

    $authQuery = "SELECT * FROM users WHERE username = '{$_SESSION["username"]}'";

    $resource = mysqli_query($connect, $authQuery);

    $credentials = array();

    $result = mysqli_fetch_assoc($resource);

    $credentials[] = $result;

    foreach ($credentials as $cred) {

        $passAuth = password_verify($password, $cred["password"]);
        if ($passAuth == 1){
            $_SESSION["changePassAuth"] = 1;
            echo "verified";
        }
        else{
            echo "verification failed";
            $_SESSION["changePassAuth"] = 2;
        }
    }
}