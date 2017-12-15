var productID, btnString = 'cart';

$(document).ready(function () {
    $(".col-sm-4").fadeIn("slow");
    initialLoad();
});

function initialLoad() {
    $('#menu1').addClass('active');
    $('[data-toggle="tooltip"]').tooltip();

    $('button[name="addButton"]').click(function () {
        btnString = 'cart';
        productID = $(this).val();
    });
    $('button[name="wishButton"]').click(function () {
        productID = $(this).val();
        btnString = 'wish';
    });
    $('button[name="infoButton"]').click(function () {
        productID = $(this).val();
        btnString = 'info';
    });

    // Attach a submit handler to the form
    $("#productsForm").submit(function (event) {
        // Stop form from submitting normally
        event.preventDefault();
        if (!isLogin && btnString !== 'info') {
            swal(
                'Please login first!',
                '',
                'error'
            );
            return;
        }
        // Send the data using post
        var posting;
        if (btnString === 'cart')
            posting = $.post("php-action/add-cart.php", {hidden_id: productID});
        else if (btnString === 'info')
            window.location = "product-info.php?pid=" + productID;
        else
            posting = $.post("php-action/add-wishlist.php", {hidden_id: productID});
        // Put the results in a div
        posting.done(function (data) {
            switch (data) {
                case "success-cart":
                    swal(
                        'Added!',
                        'Your selected product has been added to cart',
                        'success'
                    ).then(function () {
                        location.reload();
                    });
                    break;
                case "success-wishlist":
                    swal(
                        'Added!',
                        'Your selected product has been added to wishlist',
                        'success'
                    );
                    break;
                case "already added to wishlist":
                    swal(
                        'product exists!',
                        'This product is ' + data,
                        'warning'
                    );
                    break;
                default:
                    alert(data);
            }
        });
    });
}

function slideShow() {
    $("#slides").slidesjs({
        width: 740, //Original 940
        height: 270, //Original 528
        play: {
            active: true,
            auto: true,
            interval: 4000,
            swap: true
        }
    });
}