$(document).ready(function () {
    $('.modal').modal();

    $('.dropdown-trigger').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: false, // Does not change width of dropdown to that of the activator
        gutter: ($('.dropdown-content').width() * 3) / 2.5 + 5, // Spacing from edge
        belowOrigin: true, // Displays dropdown below the button
        alignment: 'left' // Displays dropdown with edge aligned to the left of button
    });
});

function addToCart(productId) {

    console.log(productId);

    $.ajax({
        type: "POST",
        url: "inc/addToCart.php",
        data: {
            productId: productId
        },

        success: function () {

            var currentVal = parseInt($(".cart-amount").text());    //get current cart amount
            var newVal = currentVal + 1;    //add 1
            $(".cart-amount").text(newVal);     //set new amount
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
        }
    });

}

function placeOrder(userId) {

    $.ajax({ //Get json
        url: "inc/getCartJson.php",
        type: "GET",
        success: function (data) {
        console.log(data);

            // $.ajax({ //Post to db
            //     url: "inc/placeOrder.php",
            //     type: "POST",
            //     data: {
            //         productId: productId,
            //         userId: userId
            //     },
            //     success: function (data) {
            //
            //         // $.ajax({ //post to arduino
            //         //     url: "1.1.1.1", //IP of Arduino
            //         //     type: "POST",
            //         //     data: {productId: productId},
            //         //     dataType: 'jsonp',
            //         //     contentType: 'application/json',
            //         //     crossDomain: true,
            //         //     success: function (data) {
            //         //
            //         //
            //         //     }
            //         // });
            //     }
            // });
        }
    });
}