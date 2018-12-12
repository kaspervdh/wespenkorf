<?Php
require("initialization.php");
$username = $_POST["username"];
$password = $_POST["password"];
unset($_SESSION["succesRegister"]);

if (!empty($username) && !empty($password)) {
    unset($_SESSION["errorLogin"]);

    $loginQuery = "SELECT * FROM users WHERE username = '$username'";

    $resource = mysqli_query($connect, $loginQuery);

    $credentials = array();

    $result = mysqli_fetch_assoc($resource);

    $credentials[] = $result;

    foreach ($credentials as $cred) {

        $passAuth = password_verify($password, $cred["password"]);

        if ($_POST["username"] == $cred["username"] && $passAuth == 1) {
            $_SESSION["logged"] = 1;
            unset($_SESSION["errorLogin"]);
            $_SESSION["username"] = $cred["username"];
            $_SESSION["userId"] = $cred["id"];
            $_SESSION["gender"] = $cred["gender"];
            $_SESSION["bio"] = $cred["biography"];
            if (empty($cred["dob"])){
                $_SESSION["dob"] = "Unknown";
            }
            else{
                $_SESSION["dob"] = date_format(new DateTime($cred["dob"]), 'd/m/Y');
            }
            $_SESSION["joindate"] = $cred["joindate"];

            header("Location:../shop.php");
        } else {
            unset($_SESSION["logged"]);
            unset($_SESSION["successRegister"]);
            $_SESSION["errorLogin"] = 1;
            header("Location:../login.php");
        }

    };
} else {
    unset($_SESSION["logged"]);
    $_SESSION["errorLogin"] = 1;
    unset($_SESSION["successRegister"]);
    header("Location:../login.php");
}


?>