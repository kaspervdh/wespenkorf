<?php
/**
 * Created by PhpStorm.
 * User: Kaspe
 * Date: 12/7/2018
 * Time: 3:46 PM
 */

require("inc/initialization.php");
require("inc/getCart.php");
require("nav.php");

if(empty($_SESSION["logged"]) || $_SESSION["logged"] == 0){
    header("Location:./login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $website_name; ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo $favicon; ?>"/>
</head>
<body>
<div class="container">
    <h3>Uw winkelwagen:</h3>
    <?php
    if (empty($_SESSION["cartDisplay"])) {

        ?>
        <p>Er zijn nog geen producten in de winkelwagen.</p>

        <?php
    }
    ?>
    <div id="product-container">
        <?php
        if (!empty($_SESSION["cartDisplay"])){
        foreach ($products as $product) {
            ?>
            <div class="product product<?php echo $product['id']; ?>">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator product-image" src="media/products/<?php echo $product['imagePath']; ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?php echo $product['name']; ?></span>
                        <p class="left">€<?php echo $product['price']; ?></p>
                        <p class="right"><?php echo $product['stock']; ?> in stock</p>
                        <br/>
                        <br/>
                        <a class="grab text-darken-4 left grey-text activator">Lees meer...</a>
                        <a class="add-cart right waves-effect red waves-light btn-small"
                           onclick="removeFromCart(<?php echo $product["id"]; ?>);">Verwijderen</a><br/>
                    </div>
                    <div class="card-reveal">
                        <a class="card-title left grey-text text-darken-4"><?php echo $product['name']; ?></a><a
                                class="right card-title grey-text text-darken-4">x</a>
                        <br/>
                        <br/>
                        <p><?php echo $product['description']; ?></p>
                        <br/>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="decisions"><a href="shop.php" class="add-cart left waves-effect blue waves-light btn-large">Verder
                winkelen</a> <a class="add-cart right waves-effect green waves-light btn-large"
                                onclick="placeOrder(<?php echo $_SESSION["userId"]; ?>);">Bestellen</a>
            <?php
            }
            else{
            ?>
            <div class="decisions"><a href="shop.php" class="add-cart left waves-effect blue waves-light btn-large">Naar
                    de winkel</a>
                <?php
                }

                ?>
            </div>
        </div>
</body>
</html>

