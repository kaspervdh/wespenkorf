<?php
require("inc/initialization.php");

if(empty($_SESSION["logged"]) || $_SESSION["logged"] == 0){
    header("Location:./login.php");
}
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

<div id="product-container">
    <?php
    require("inc/getProducts.php");
    foreach($products as $product)
    {
        ?>
        <div class="product">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator product-image" src="media/products/<?php echo $product['imagePath']; ?>">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><?php echo $product['name']; ?></span>
                    <p class="left">€<?php echo $product['price']; ?></p><p class="right"><?php echo $product['stock']; ?> in stock</p>
                    <br/>
                    <br/>
                    <a class="grab text-darken-4 left grey-text activator">Lees meer...</a>
                    <a class="add-cart right waves-effect blue waves-light btn-small" onclick="addToCart(<?php echo $product["id"]; ?>);">In winkelwagen</a><br/>
                </div>
                <div class="card-reveal">
                    <a class="card-title left grey-text text-darken-4"><?php echo $product['name']; ?></a><a class="right card-title grey-text text-darken-4">x</a>
                    <br/>
                    <br/>
                    <p><?php echo $product['description']; ?></p>
                    <br/>
                    <a class="add-cart waves-effect blue waves-light btn-small" onclick="addToCart(<?php echo $product["id"]; ?>);">In winkelwagen</a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

    </body>
</html>
