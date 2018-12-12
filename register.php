<?php
require("inc/initialization.php");

if (!empty($_SESSION["logged"]) == 1){
    header("Location: index.php");
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
</head>
<body>
<?php
include("nav.php");
?>

<div class="container logform-container">
    <h3 class="center">Registreren</h3>
    <br/>
    <?php
    echo('<form class="login-form login form-horizontal" method="POST" action="inc/reg.php">');
    if (!empty($_SESSION["errorRegister"])) {
        echo ('<div class="msg msg-danger"> <bold>Fout!</bold> </span>Controleer of alle vereiste velden zijn ingevuld.</div>');
    };
    if (!empty($_SESSION["usernameExists"])) {
        echo ('<div class="msg msg-danger"> 
              <bold>Fout!</bold> Gebruikersnaam "' . $_SESSION["usernameExists"]  . '" is al in gebruik.
            </div>');
    };

    if (!empty($_SESSION["passwordMismatch"])) {
        echo ('<div class="msg msg-danger"> 
              <bold>Fout!</bold> Wachtwoorden komen niet overeen.
            </div>');
    };

    echo('
    
    <div class="form-group">
        <label class="control-label col-sm-2">Gebruikersnaam:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="username" id="email" placeholder="*">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Email:</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="email" placeholder="* example@gmail.com">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Geslacht:</label>
        <div class="col-sm-10">
            <p>
              <label>
                <input name="gender" type="radio" value="man" />
                <span>Man</span>
              </label>
            </p>
            <p>
              <label>
                <input name="gender" type="radio" value="vrouw" />
                <span>Vrouw</span>
              </label>
         </p>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Wachtwoord:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="pwd" placeholder="*">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Bevestig wachtwoord:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="passwordConfirm" id="pwd" placeholder="*">
        </div>
    </div>
    <div class="form-group">
    <a>* Is vereist.</a><br/><br/>
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn blue btn-success">Registreer</button>
        </div>
    </div>
</form>');
    ?>

</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>