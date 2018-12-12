<?php
/**
 * Created by PhpStorm.
 * User: Kaspervdh
 * Date: 10/23/2018
 * Time: 5:29 PM
 */


require("inc/initialization.php");

if (empty($_SESSION["logged"])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION["username"]; ?></title>
</head>
<body>
<?php
include("nav.php");
?>
<div class="container">

    <div class="card horizontal">
        <div class="card-stacked">
            <div class="card-content">
                <ul class="collection with-header user-options">
                    <li class="collection-header"><h4><?php echo $_SESSION["username"]; ?></h4></li>
                    <li class="collection-item"><a href="orders.php">Mijn bestellingen</a></li>
                    <li class="collection-item"><a href="wishlist.php">Mijn verlanglijst</a></li>
                    <li class="collection-item"><a href="adressbook.php">Mijn adresboek</a></li>
                    <li class="collection-item"><a href="change-password">Wachtwoord wijzigen</a></li>
                </ul>
                <a class="right waves-effect waves-light red btn modal-trigger" href="#deleteModal">Verwijder account</a>
            </div>

            <div class="orders">
                orders
            </div>
            <div class="wishlist">
                wishlist
            </div>
            <div class="adresslist">
                adresslist
            </div>
            <div class="change-password">
                change-password
            </div>





            <div id="deleteModal" class="modal">
                <div class="modal-content">
                    <h4>Weet je zeker dat je je account wilt verwijderen?</h4>
                </div>
                <div class="modal-footer">
                    <a href="inc/deleteUser.php?videoId=&userId=<?php echo $_SESSION["userId"]; ?>"
                       class="waves-effect waves-green btn-flat">Ja</a>
                    <a class="modal-close waves-effect waves-green btn-flat">Nee</a>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>