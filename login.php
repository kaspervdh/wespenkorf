<?php
require("inc/initialization.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $website_name;?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo $favicon; ?>"/>
</head>
<body>
<?php
include("nav.php");
?>

<div class="container logform-container">
    <h3 class="center">Inloggen</h3>

    <br/>
<?php
if (!empty($_SESSION["logged"])){
    header("Location: index.php");
}
else{

    echo('<form class="login-form login form-horizontal" method="POST" action="inc/auth.php">');
    if (!empty($_SESSION["errorLogin"])) {
        echo ('<div class="msg msg-danger">
                  <bold>Fout!</bold> Verkeerde login gegevens.
                  Probeer het nog eens.
                </div>');
    };
    if (!empty($_SESSION["successRegister"])) {
        echo ('<div class="msg msg-success">
                  <bold>U bent geregistreerd en kunt nu inloggen.</bold>
                </div>');
    };
    echo('
        <br/>
        <br/>
        <div class="form-group">
            <label class="control-label col-sm-2">Gebruikersnaam:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username" id="email" placeholder="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Wachtwoord:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" id="pwd" placeholder="">
            </div>
        </div>
        <div class="form-group">
        <br/>
        <br/>
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn blue btn-success">Inloggen</button>
                <a class="blue waves-effect waves-light btn" href="register.php">Nog geen account? Registreer.</a>
            </div>
        </div>
    </form>');
}
?>

</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>