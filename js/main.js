$(document).ready(function () {
    $('.modal').modal();

    $('.orders').show();
    $('.wishlist').hide();
    $('.adresslist').hide();
    $('.change-password').hide();
    $('.checked-change-password').hide();
    $('.check-password').hide();


    $('.dropdown-trigger').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: false, // Does not change width of dropdown to that of the activator
        gutter: ($('.dropdown-content').width() * 3) / 2.5 + 5, // Spacing from edge
        belowOrigin: true, // Displays dropdown below the button
        alignment: 'left' // Displays dropdown with edge aligned to the left of button
    });
});

function showContent(type){

    if (type == "orders") {
        $('.orders').show();
        $('.wishlist').hide();
        $('.adresslist').hide();
        $('.change-password').hide();
    }
    if (type == "wishlist") {
        $('.wishlist').show();
        $('.orders').hide();
        $('.adresslist').hide();
        $('.change-password').hide();
    }
    if (type == "adresslist") {
        $('.adresslist').show();
        $('.orders').hide();
        $('.wishlist').hide();
        $('.change-password').hide();

    }
    if (type == "change-password") {
        $('.change-password').show();
        $('.check-password').show();
        $('.checked-change-password').hide();
        $('.orders').hide();
        $('.wishlist').hide();
        $('.adresslist').hide();
    }

    if (type == "checked-change-password") {
        $('.change-password').show();
        $('.checked-change-password').show();
        $('.check-password').hide();
        $('.orders').hide();
        $('.wishlist').hide();
        $('.adresslist').hide();
    }
}

function addToCart(productId) {

    console.log(productId);

    $.ajax({
        type: "POST",
        url: "inc/addToCart.php",
        data: {
            productId: productId
        },

        success: function (data) {
            console.log(data);
            var currentVal = parseInt($(".cart-amount").text());    //get current cart amount
            var newVal = currentVal + 1;    //add 1
            $(".cart-amount").text(newVal);     //set new amount
            var toastHTML = '<a href="cart.php">Added to cart</a>';
            M.toast({html: toastHTML});
        }
    });
}

function removeFromCart(productId) {
    $.ajax({
        type: "POST",
        url: "inc/removeFromCart.php",
        data: {
            productId: productId
        },

        success: function () {

            var currentVal = parseInt($(".cart-amount").text());    //get current cart amount
            var newVal = currentVal - 1;    //subtract 1
            $(".cart-amount").text(newVal);     //set new amount

            $(".product" + productId).remove();
            var toastHTML = '<a>Removed from cart</a>';
            M.toast({html: toastHTML});
        }
    });

}

function verifyPassword() {             //function to change passwords
    var password = $(".verifyPassword").val();
    $.ajax({                            //Check if given password is correct
        type: "POST",
        url: "inc/checkPassword.php",
        data: {
            password: password
        },

        success: function (data) {
            if (data == "verified") {    //Given password is correct show change password
                showContent("checked-change-password");

                $.ajax({
                    type: "POST",
                    url: "inc/checkPassword.php",
                    data: {
                        password: password,
                        passwordTwice: passwordTwice
                    },

                    success: function (data) {
                        if (data == "verified") {
                            showContent("checked-change-password");
                            var toastHTML = '<a>Password verified</a>';
                            M.toast({html: toastHTML});
                        }
                    }
                });
            }
        }
    });
}
function placeOrder(userId) {

    $.ajax({ //Get json
        url: "inc/getCartJson.php",
        type: "GET",
        success: function (data) {
        console.log(data);
        var jsonString = JSON.parse(data);
            console.log(jsonString);

            $.ajax({ //Post to db
                url: "inc/placeOrder.php",
                type: "POST",
                data: {
                    userId: userId
                },
                success: function (data) {
                    console.log(data);
                    if (data == "failed") {
                        var toastHTML = '<a>Error!</a>';
                        M.toast({html: toastHTML});
                    }
                    else{
                        $(".product").remove();
                        $(".no-products").text("Er zijn nog geen producten in de winkelwagen.");
                        $(".cart-amount").text(0);
                        var toastHTML = '<a href="profile.php">Order placed!</a>';
                        M.toast({html: toastHTML});
                    }



                    $.ajax({ //post to arduino
                        url: "http://192.168.0.20/", //IP of Arduino
                        type: "POST",
                        data: jsonString,
                        dataType: 'jsonp',
                        contentType: 'application/json',
                        crossDomain: true,
                        success: function (data) {


                        }
                    });

                }
            });
        }
    });
}