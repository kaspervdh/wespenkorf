<?php

if (isset($_POST['logout'])) {
    $_SESSION["logged"] = 0;
    header("Location:index.php");
    session_destroy();
}
?>

<nav class="main-nav">
    <div class="nav-wrapper">
<?php

if(!empty($_SESSION["logged"]) == 0){

?>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a class="nav-item" href="index.php">Home</a></li>
        </ul>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="nav-item" href="login.php">Inloggen</a></li>
        </ul>
    </div>
<?php
}
if(!empty($_SESSION["logged"]) == 1){
?>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li ><img href="cart.php" id="shopping-cart" src="media/onsite/shopping_cart.png"/><a href="cart.php" class="cart-amount">
                <?php
                if (isset($_SESSION["cartItemCount"])){
                    echo $_SESSION["cartItemCount"];
                } else {
                    echo 0;
                }?></a></li>
        <li><a class="nav-item" href="shop.php">Shop</a></li>
        <a id="username" data-target='usermenu' data-beloworigin="true" class="dropdown-trigger right nav-item">Account</a>
    </ul>


    <ul id='usermenu' class='nav-dropdown dropdown-content'>
        <li><a class="nav-item" href="profile.php">Mijn account</a></li>
        <li><a  href="shop.php">Shop</a></li>
        <li><form class="logout-form-menu logout form-horizontal" method="POST">
                <button type="submit" name="logout" class="logout-button-menu red waves-effect waves-light btn">Uitloggen</button>
            </form>
        </li>
    </ul>
<?php
}
?>
</nav>
