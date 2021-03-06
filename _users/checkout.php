<?php
include('../database/connect.php');
include('handling/handling_checkout.php');
if (!isset($_SESSION['account_id'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="../assets/img/others/logo_mini.png" rel="icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->

    <link rel="stylesheet" href="../assets/css/users/footer.css"> 
    <link rel="stylesheet" href="../assets/css/users/header.css"> 
    <link rel="stylesheet" href="../assets/css/users/checkout.css"> 
    <title>Checkout</title>
</head>
<header>
    <?php
    include('nav.php');
    ?>
</header>
<body>  
    <div class=".container-fluid">
        <!-- banner -->
        <div class="banner">
            <img src="../assets/img/others/banner-checkout.png" alt="checkout-banner">
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <?php
            $quantity = 0;
            $total = 0;
            $order_product_all_id = '';
            $order_all_quantity = '';
            if (!isset($_GET['product_id'])) {
                //use to choose cart delete
                $_SESSION['delete_cart'] = 1;

                //take the product information to checkout
                $infor_product = "products.product_id, product_name, product_price, discount, cart_quantity";
                $table_link = "products, product_types, coupons, carts";
                $link = "products.product_type_id=product_types.product_type_id AND product_types.coupon_id=coupons.coupon_id AND carts.product_id=products.product_id";
                $query_product_checkout = mysqli_query($con, "SELECT $infor_product FROM $table_link WHERE $link AND account_id=" . $_SESSION['account_id'] . ";");
            } else {
                //use to choose cart delete
                $_SESSION['delete_cart'] = 0;

                //take the product information to checkout with one product
                $GLOBALS['quantity'] = $_GET['cart_quantity'];
                $GLOBALS['order_product_all_id'] = $_GET['product_id'] . ",";
                $infor_product = "products.product_id, product_name, product_price, discount";
                $table_link = "products, product_types, coupons";
                $link = "products.product_type_id=product_types.product_type_id AND product_types.coupon_id=coupons.coupon_id";
                $query_product_checkout = mysqli_query($con, "SELECT $infor_product FROM $table_link WHERE $link AND products.product_id=" . $_GET['product_id'] . ";");
            }
            $info_account = "account_id, account_name, email, account_address, phone";
            $query_account = mysqli_query($con, "SELECT $info_account FROM accounts WHERE account_id=" . $_SESSION['account_id'] . ";");
            $row_account = mysqli_fetch_array($query_account);
            ?>
            <div class="row checkout__page">
                <div class="col-md-6">
                    <div class="section__title">Bill Detail</div>
                    <!-- Name -->
                    <div class="input__field">
                        <div class="input__field__title">Your name*</div>
                        <input type="text" name="order_name" placeholder="Your name" value="<?php echo htmlentities($row_account['account_name']); ?>" required>
                        <!--<div class="text-danger">
                            D??ng n??y s??? hi???n l??n khi kh??ch h??ng kh??ng nh???p th??ng tin
                        </div>-->
                    </div>
                    <!-- email input -->
                    <div class="input__field">
                        <div class="input__field__title">Your email*</div>
                        <input type="text" value="<?php echo htmlentities($row_account['email']); ?>" disabled>
                    </div>
                    <!-- select country
                    <div class="input__field">
                        <div class="input__field__title">Province/City*</div>
                        <select class="input__field__selector" name="order_address_province">
                            <option selected>Choose Province</option>
                            <option value="An Giang">An Giang</option>
                            <option value="B?? R???a V??ng T??u">B?? R???a V??ng T??u</option>
                            <option value="B???c Li??u">B???c Li??u</option>
                            <option value="B???c Giang">B???c Giang</option>
                            <option value="B???c K???n">B???c K???n</option>
                            <option value="B???c Ninh">B???c Ninh</option>
                            <option value="B??nh D????ng">B??nh D????ng</option>
                            <option value="B??nh ?????nh">B??nh ?????nh</option>
                            <option value="B??nh Ph?????c">B??nh Ph?????c</option>
                            <option value="B??nh Thu???n">B??nh Thu???n</option>
                            <option value="C?? Mau">C?? Mau</option>
                            <option value="Cao B???ng">Cao B???ng</option>
                            <option value="C???n Th??">C???n Th??</option>
                            <option value="???? N???ng">???? N???ng</option>
                            <option value="?????k L???k">?????k L???k</option>
                            <option value="?????k N??ng">?????k N??ng</option>
                            <option value="??i???n Bi??n">??i???n Bi??n</option>
                            <option value="?????ng Nai">?????ng Nai</option>
                            <option value="?????ng Th??p">?????ng Th??p</option>
                            <option value="Gia Lai">Gia Lai</option>
                            <option value="H?? Giang">H?? Giang</option>
                            <option value="H?? Nam">H?? Nam</option>
                            <option value="H?? N???i">H?? N???i</option>
                            <option value="H?? T??nh">H?? T??nh</option>
                            <option value="H???i D????ng">H???i D????ng</option>
                            <option value="H???i Ph??ng">H???i Ph??ng</option>
                            <option value="H???u Giang">H???u Giang</option>
                            <option value="H??a B??nh">H??a B??nh</option>
                            <option value="TP. H??? Ch?? Minh">Th??nh ph??? H??? Ch?? M??nh</option>
                            <option value="Hu???">Hu???</option>
                            <option value="H??ng Y??n">H??ng Y??n</option>
                            <option value="Ki??n Giang">Ki??n Giang</option>
                            <option value="Kh??nh H??a">Kh??nh H??a</option>
                            <option value="H??ng Y??n">H??ng Y??n</option>
                            <option value="Nha Trang">Nha Trang</option>
                            <option value="Hu???">Hu???</option>
                            <option value="S??c Tr??ng">S??c Tr??ng</option>
                            <option value="S??n La">S??n La</option>
                            <option value="Th??i Nguy??n">Th??i Nguy??n</option>
                            <option value="Thanh H??a">Thanh H??a</option>
                            <option value="Tr?? Vinh">Tr?? Vinh</option>
                            <option value="Tuy??n Quang">Tuy??n Quang</option>
                            <option value="Tr?? Giang">Tr?? Giang</option>
                            <option value="V??nh Long">V??nh Long</option>
                            <option value="V??nh Ph??c">V??nh Ph??c</option>
                            <option value="Y??n B??i">Y??n B??i</option>
                        </select>
                    </div>-->
                    <!-- street address -->
                    <div class="input__field">
                        <div class="input__field__title">Street Address*</div>
                        <input type="text" name="order_address" placeholder="Street Address" value="<?php echo htmlentities($row_account['account_address']); ?>">
                    </div>
                    <div class="input__field">
                        <div class="input__field__title">Phone*</div>
                        <input type="text" name="order_phone" placeholder="Phone" value="<?php echo htmlentities($row_account['phone']); ?>">
                    </div>

                    <div class="input__field">
                        <div class="input__field__title">Order note (optional)</div>
                        <textarea class="input__field__textarea" name="order_notes" placeholder="Write something"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="section__title">Your Order</div>
                    <div class="border__order">
                        <table class="table table-condensed">
                            <tr>
                                <th>Product</th>
                                <th>Number</th>
                                <th>Subtotal</th>
                            </tr>
                            <?php
                            while ($row_product = mysqli_fetch_array($query_product_checkout)) {
                                if (!isset($_GET['product_id'])) {
                                    $GLOBALS['quantity'] = $row_product['cart_quantity'];
                                    $GLOBALS['order_product_all_id'] .= $row_product['product_id'] . ',';
                                } else {
                                    $GLOBALS['order_product_all_id'] = $_GET['product_id'] . ",";
                                }
                                //take the quantity of check out to push in your orders
                                $GLOBALS['order_all_quantity'] .= $GLOBALS['quantity'] . ',';
                                $GLOBALS['total'] += ($row_product['product_price'] - ($row_product['product_price'] * ($row_product['discount'] / 100))) * $GLOBALS['quantity'];
                                ?>
                                <tr>
                                    <td><?php echo htmlentities($row_product['product_name']); ?></td>
                                    <td><?php echo htmlentities($GLOBALS['quantity']); ?></td>
                                    <td>$<?php echo htmlentities(($row_product['product_price'] - ($row_product['product_price'] * ($row_product['discount'] / 100))) * $GLOBALS['quantity']); ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <hr class="line">
                        <div class="body__order__row">
                            <b>Sub-Total</b>
                            <div>$<?php echo $total; ?></div>
                        </div>
                        <hr class="line">
                        <div class="body__order__row">
                            <b>
                                <b class="body__ordershipping">SHIPPING</b>
                                <div class="body_ordershipping__type">COD - Cash On Delivery</div>
                            </b>
                            <div>$2</div>
                        </div>
                        <hr class="line">
                        <div class="body__order__row">
                            <b>TOTAL</b>
                            <b class="body__ordertotal__total ">$<?php echo $total + 2; ?></b>
                        </div>
                        <hr class="line">
                        <div>
                            <input name="order_product_all_id" type="hidden" value="<?php echo $order_product_all_id; ?>">
                            <input name="order_all_quantity" type="hidden" value="<?php echo $order_all_quantity; ?>">
                        </div>
                        <div class="placeorder">
                            <input name="orders" type="submit" value="Place Order" type="submit" class="btn placeorder--btn">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $('#burger-top').click(() => {
                // $(".modal-overlay").show();
                $('#burger-top').css('display', 'none');
                $('#close-top').css('display', 'inline-block');
                $(".panel").slideToggle();
            });

            $('#close-top').click(() => {
                $('#burger-top').css('display', 'inline-block');
                $('#close-top').css('display', 'none');
                $(".panel").slideToggle();
            });

            // Shopping cart dropdown
            $('#topnav__item__cart').click(() => {
                $('.cart__dropdown').slideDown();

            });

            $(document).click(function (e) {
                if ($(e.target).is('.cart__dropdown, #topnav__item__cart *'))
                    return;
                $('.cart__dropdown').slideUp();
            });


            // $('#topnav__item__cart').click(() => {
            //     $('.cart__dropdown').slideUp();
            // })

            //Sticky navbar
            const navbarOffset = $('.navbar__topnav').offset();
            window.onscroll = function () {
                StickNavBar(navbarOffset.top)
            };

            // console.log(offset.top);
        });


        function StickNavBar(navbarOffset) {
            if (window.pageYOffset >= 80) {
                $('.navbar__topnav').addClass('navbar__topnav-sticky ');
                $(".panel").addClass('panel-stickey');

            } else {
                $('.navbar__topnav').removeClass('navbar__topnav-sticky ');
                $(".panel").removeClass('panel-stickey');

            }
        }

        function RemoveDropDownItem(id) {
            $.ajax({
                url: '/cart/remove/' + id,
                type: 'GET'
            }).done(function (response) {
                RemoveItemInCart(response);
            });
        }

        function RemoveItemInCart(response) {
            var newDropDownItems = $('.cart__dropdown__list', $($.parseHTML(response)));
            if (newDropDownItems) {
                $('.cart__dropdown__list').empty();
                $('.cart__dropdown__list').append(newDropDownItems);
            }

            var newCartItems = $('#changing-cart', $($.parseHTML(response)));
            if (newCartItems) {
                $('#changing-cart').empty();
                $('#changing-cart').append(newCartItems);
            }
        }
    </script>
</body>
</html>