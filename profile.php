<?php
/**
 * Created by PhpStorm.
 * User: Kaspervdh
 * Date: 10/23/2018
 * Time: 5:29 PM
 */


require("inc/initialization.php");


if (empty($_SESSION["logged"])) {
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

    <div class="orders right">
        <?php include("inc/getOrders.php");
        foreach ($orders as $order) {
            include("inc/getOrderProduct.php");
            foreach ($products as $product) {
                ?>
                <div class="card horizontal order-status">
                    <div class="card-image">
                        <img src="media/products/<?php echo getOrderImage($product["productId"]); ?>">
                    </div>
                    <div class="card-content">
                        <h5><?php echo getOrderName($product["productId"]); ?></h5>
                        <p>Quantity: <?php echo $product["quantity"] ?> </p>
                        <p>Status: <?php
                            $status = $order["status"];
                            if ($status == 1) {
                                echo "Order word verwerkt";
                            }
                            if ($status == 2) {
                                echo "Bij pakketdienst";
                            }
                            if ($status == 3) {
                                echo "Afgeleverd";
                            }
                            ?></p>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="wishlist right">

    </div>
    <div class="adresslist right">
        <div class="card horizontal">
            <div class="card-content">
                <h5>Uw huidige factuuradres</h5>
                <label>Naam</label>
                <p>Hans Verweer</p>
                <label>Straatnaam & huisnummer</label>
                <p>Cornelisstraat 15</p>
                <label>Postcode & woonplaats</label>
                <p>3053 HB, IJSSELMUIDEN</p>
                <label>Land</label>
                <p>Nederland</p><br/>
            </div>
            <a class="btn blue change-btn">Veranderen</a>
        </div>
    </div>
    <div class="change-password right">
        <div class="card checked-change-password">
            <div class="card-content">
                <div class="input-field col s6">
                    <input placeholder="Nieuw wachtwoord" id="password" type="password" class="validate">
                    <label for="first_name">Nieuw wachtwoord</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="Nog een keer" id="password-twice" type="password" class="validate">
                    <label for="first_name">Wachtwoord</label>
                </div>
                <br/>

                <button class="btn blue">Bevestigen</button>
            </div>
        </div>

        <div class="card check-password">
            <div class="card-content">
                <div class="input-field col s6">
                    <input placeholder="Huidig wachtwoord" id="password-verify" type="password"
                           class="validate verifyPassword">
                    <label for="first_name">Huidig wachtwoord</label>
                </div>
                <button class="btn blue" onclick="verifyPassword();">Bevestigen</button>
            </div>
        </div>

    </div>


    <ul class="collection with-header user-options left">
        <li class="collection-header"><h4><?php echo $_SESSION["username"]; ?></h4></li>
        <li class="collection-item"><a onclick="showContent('orders');">Mijn bestellingen</a></li>
        <li class="collection-item"><a onclick="showContent('wishlist');">Mijn verlanglijst</a></li>
        <li class="collection-item"><a onclick="showContent('adresslist');">Factuur adres</a></li>
        <li class="collection-item"><a onclick="showContent('change-password');">Wachtwoord wijzigen</a></li>
        <li class="collection-item"><a class="modal-trigger remove-btn" href="#deleteModal">Verwijder account</a></li>
    </ul>
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
</body>
</html>