<?php
include('../database/connect.php');
include('handling/handling_index.php');
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
    <link rel="stylesheet" href="../assets/css/users/home.css"> 
    <title>Home Page</title>
</head>
<header>
    <?php
    include('nav.php');
    ?>
</header>
<body>
    <div class=".container-fluid float-md-start">
        <!-- Slideshow container -->
        <div class="slideshow-container slide-wrapper">
            <!-- Full-width images with number and caption text -->
            <div class="mySlides">
                <div class="numbertext">1 / 3</div>
                <img src="../assets/img/others/slide1.png" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">2 / 3</div>
                <img src="../assets/img/others/slide2.png" style="width:100%">
            </div>

            <div class="mySlides">
                <div class="numbertext">3 / 3</div>
                <img src="../assets/img/others/slide3.png" style="width:100%">
            </div>
            <!-- The dots/circles -->
            <div style="text-align:center" class="dot-slide">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
    </div>    
    <!-- category-banner -->
    <div class="category--container">
        <a href="">
            <div class="category--item">
                <img class="imageradius" src="../assets/img/others/banner-cat.png" alt="category1">
            </div>
        </a>
        <a href="">
            <div class="category--item">
                <img class="imageradius" src="../assets/img/others/banner-toys.png" alt="category2">
            </div>
        </a>
        <a href="">
            <div class="category--item">
                <img class="imageradius" src="../assets/img/others/banner-dog.png" alt="category3">
            </div>
        </a>
    </div>
    <!-- suppliers information-->
    <div class="supplier--container">
        <div class="supplier--photo">
            <img class="imageradius" style="max-width: 800px;" src="../assets/img/others/slide2.png" alt="supplier-photo">
        </div>
        <div class="supplier--info">
            <h3>BEST SUPPLIER</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quibusdam aut fugit asperiores consectetur
                error ab! Culpa laborum dolorem, qui eaque, recusandae assumenda voluptatibus debitis cupiditate, facilis
                voluptatem totam reprehenderit?
            </p>
        </div>
    </div>
    <!--Trending Products-->
    <div id="trendingProducts">
        <p class="h2 text-center">Trending Products</p>
    </div>

    <div class="row ml-0 mr-0 justify-content-center" id="categories">

        <?php
        $query_trending_type = mysqli_query($con, "SELECT product_types.product_type_id, product_type_name FROM count_sales, products, product_types WHERE count_sales.product_id=products.product_id AND products.product_type_id=product_types.product_type_id ORDER BY count_sale DESC LIMIT 3;");
        while ($row = mysqli_fetch_array($query_trending_type)) {
            ?>
            <div class="box-e col col-lg-2">
                <a href="page_category.php?product_type_id=<?php echo htmlentities($row['product_type_id']); ?>" class="custom-underline"><?php echo htmlentities($row['product_type_name']); ?></a>
            </div>
        <?php } ?>
    </div>

    <!--Product Photos-->
    <div class="products__grid--container">
        <?php
        $infor_product = "products.product_id, product_name, product_price, product_image_1, discount";
        $query_products = mysqli_query($con, "SELECT " . $infor_product . " FROM products, count_sales, product_types, coupons WHERE products.product_type_id=product_types.product_type_id AND product_types.coupon_id=coupons.coupon_id AND count_sales.product_id=products.product_id ORDER BY count_sale DESC LIMIT 3;");
        while ($row = mysqli_fetch_array($query_products)) {
            ?>
            <a style="color: rgb(22, 22, 22)" href="product_detail.php?product_id=<?php echo htmlentities($row['product_id']); ?>">
                <img class="imageradius" src="../assets/img/image_products/<?php echo htmlentities($row['product_image_1']); ?>" alt="product1">
                <p class="h6 text-center product-name"><?php echo htmlentities(substr($row['product_name'], 0, 25)); ?>...</p>
                <p class="h6 text-center product-price">
                    <del style="margin-right: 4px">$<?php echo htmlentities($row['product_price']); ?></del>
                    <strong>$<?php echo htmlentities(round($row['product_price'] - ($row['product_price'] * ($row['discount'] / 100)), 2)); ?></strong>
                </p>
            </a>
        <?php } ?>
    </div>

    <!--'Show All' Button-->
    <div class="row justify-content-center" id="show-button">
        <button class="show-button" role="button">
            <a href="page_product.php?next_page=0">Show all</a>
        </button>
    </div>

    <!-- sale off banner -->
    <div class="saleoff--container">
        <div class="saleoff--item">
            <img class="imageradius" src="../assets/img/others/sale-off-1.jpg" alt="saleoff1">
        </div>
        <div class="saleoff--item">
            <img class="imageradius" src="../assets/img/others/sale-off-2.png" alt="saleoff2">
        </div>
    </div>

    <!--OUR PARTNERS-->
    <div id="partners">
        <p class="h2 text-center">Our Partners</p>
        <p class="h7 text-center">Vision, commitment, partnership</p>
    </div>

    <div class="grid-container partner-photos">
        <div class="col partner-logo">
            <img src="../assets/img/others/logo1.png" alt="logo1">
        </div>
        <div class="col partner-logo">
            <img src="../assets/img/others/logo2.png" alt="logo2">
        </div>
        <div class="col partner-logo">
            <img src="../assets/img/others/logo3.png" alt="logo3">
        </div>
        <div class="col partner-logo">
            <img src="../assets/img/others/logo4.png" alt="logo4">
        </div>
    </div>
    <br>
    <div class="grid-container partner-photos">
        <div class="col partner-logo">
            <img src="../assets/img/others/logo5.png" alt="logo5">
        </div>
        <div class="col partner-logo">
            <img src="../assets/img/others/logo6.png" alt="logo6">
        </div>
        <div class="col partner-logo">
            <img src="../assets/img/others/logo7.png" alt="logo7">
        </div>
        <div class="col partner-logo">
            <img src="../assets/img/others/logo8.png" alt="logo8">
        </div>
    </div>
    <!--follow us-->
    <br>
    <div class="follow-us">
        <p class="h4 text-center">FOLLOW US ON FACEBOOK</p>
        <div class="follow-photos">
            <div class="follow-content ">
                <img src="../assets/img/others/follow1.jpg" alt="Slide1">
            </div>
            <div class="follow-content ">
                <img src="../assets/img/others/follow2.jpg" alt="Slide2">
            </div>
            <div class="follow-content ">
                <img src="../assets/img/others/follow3.jpg" alt="Slide3">
            </div>
            <div class="follow-content">
                <img src="../assets/img/others/follow4.jpg" alt="Slide4">
            </div>
        </div>
    </div>
    <script src="../assets/js/users/home.js"></script>
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