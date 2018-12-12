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
<body class="homepage">
<?php
include("nav.php");
?>

<div class="container center">
    <h1 id="header" class="center">Buy great products from our warehouse.</h1>
    <br/>
    <a href="register.php" id="join-nu-button" class="waves-effect waves-light red btn">Start shopping</a>
</div>


<p class="center bottom" id="copyright-footer">Copyright © 2018 Wespenkorf.nl</p>

</body>
</html>