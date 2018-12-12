<?php
/**
 * Created by PhpStorm.
 * User: Kaspervdh
 * Date: 10/23/2018
 * Time: 12:55 PM
 */


session_start();
include('functions.php');
$connect = connectToDatabase();
$username = $_POST["username"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$password = $_POST["password"];
$passwordConfirm = $_POST["passwordConfirm"];



if (!empty($username) && !empty($password) && !empty($passwordConfirm) && !empty($email)) {
    if ($password == $passwordConfirm){


        unset($_SESSION["errorRegister"]);
        unset($_SESSION["passwordMismatch"]);

        $checkNameQuery = "SELECT * FROM users WHERE username = '$username'";

        $resource = mysqli_query($connect, $checkNameQuery);

        $credentials = array();

        $result = mysqli_fetch_assoc($resource);

        $credentials[] = $result;

        if ($result != false)
        {

            $_SESSION["usernameExists"] = $username;
            header("Location:../register.php");
        }
        else{

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            $regQuery = "INSERT INTO users (username, password, gender, email, ipadress, joindate)
                                        VALUES
                                          ('$username', '$hashedPwd', '$gender', '$email', '" . $_SERVER['REMOTE_ADDR'] . "', NOW())
                            ";

            mysqli_query($connect, $regQuery);

            if ($regQuery){
                $_SESSION["successRegister"] = 1;
                unset($_SESSION["errorLogin"]);
                mkdir("../media/users/$username");
                mkdir("../media/users/$username/avatar");
                mkdir("../media/users/$username/videos");
                header("Location:../login.php");
            }
            else{
                $_SESSION["errorRegister"] = 1;
                header("Location:../register.php");
            }
        }
    }
    else{
        $_SESSION["passwordMismatch"] = 1;
        header("Location:../register.php");
    }
} else {
    $_SESSION["errorRegister"] = 1;
    header("Location:../register.php");
}

if (!empty($_SESSION["logged"] == 1)){
    header("Location:../index.php");
}


?>