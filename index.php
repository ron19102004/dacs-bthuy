<!DOCTYPE html>
<html lang="en">

<head>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/views/layouts/head.php");
    ?>
    <title>Minishop - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="./views/pages/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="./views/pages/css/animate.css">
    <link rel="stylesheet" href="./views/pages/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./views/pages/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./views/pages/css/magnific-popup.css">
    <link rel="stylesheet" href="./views/pages/css/aos.css">
    <link rel="stylesheet" href="./views/pages/css/ionicons.min.css">
    <link rel="stylesheet" href="./views/pages/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="./views/pages/css/jquery.timepicker.css">
    <link rel="stylesheet" href="./views/pages/css/flaticon.css">
    <link rel="stylesheet" href="./views/pages/css/icomoon.css">
    <link rel="stylesheet" href="./views/pages/css/style.css">
</head>

<body class="goto-here">
    <div class="py-1 bg-black">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <?php require($_SERVER['DOCUMENT_ROOT'] . "/views/components/info-top.php");
                ?>
            </div>
        </div>
    </div>
    <?php require($_SERVER['DOCUMENT_ROOT'] . "/views/components/nav.php");
    ?>
    <!-- END nav -->
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                        <img class="one-third order-md-last img-fluid" src="images/bg-1.png" alt="">
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">#New Arrival</span>
                                <div class="horizontal">
                                    <h1 class="mb-4 mt-3">New computer collection</h1>
                                    <p class="mb-4">Immerse yourself in the world of advanced technology and experience inspiring moments with us.</p>

                                    <p><a href="#" class="btn-custom">Discover Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                        <img class="one-third order-md-last img-fluid" src="images/category-page-mod-xps-13-9320-sl-right-800x620.avif" alt="">
                        <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">#New Arrival</span>
                                <div class="horizontal">
                                    <h1 class="mb-4 mt-3">Our unique collection of electronic accessories</h1>
                                    <p class="mb-4">Selected from top brands, these exquisite products will add style and modernity to your everyday life. Give your device a new touch and explore the great variety in our store today!</p>

                                    <p><a href="#" class="btn-custom">Discover Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-bag"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Free Shipping</h3>
                            <p>Free Shipping - an excellent opportunity to experience convenient shopping service without worrying about delivery costs, straight to your door!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Support Customer</h3>
                            <p> Ensuring your satisfaction is our priority.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services p-4 py-md-5">
                        <div class="icon d-flex justify-content-center align-items-center mb-4">
                            <span class="flaticon-payment-security"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Secure Payments</h3>
                            <p>Your transactions, protected at every step.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="mb-4">New Product</h2>
                    <p>Quality products, expert advice and a seamless online shopping experience await you at MINGC!</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" id="list_product">
                <script>
                    $(() => {
                        $.get("./routes/product.route.php", {
                            method: 'get_all'
                        }, (data) => {
                            const resp = JSON.parse(data);
                            const html = resp.map(item => {
                                return `<div class="col-sm-12 col-md-12 col-lg-4 d-flex">
                                    <div class="product d-flex flex-column">
                                        <a href="<?php echo $url; ?>views/pages/product-details.php?id-product=${item?.product?.id_pd}" class="img-prod">
                                            <img class="img-fluid" src="${item.product.img}" alt="Colorlib Template">
                                            <div class="overlay"></div>
                                        </a>
                                        <div class="text py-3 pb-4 px-3">
                                            <div class="d-flex">
                                                <div class="cat">
                                                    <span>${item?.brand?.name}</span>
                                                </div>
                                                <div class="rating">
                                                    <p class="text-right mb-0">
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                    </p>
                                                </div>
                                            </div>
                                            <h3>
                                                <a href="<?php echo $url; ?>views/pages/product-details.php?id-product=${item?.product?.id_pd}">
                                                ${item?.product?.name_pd}
                                                </a>
                                            </h3>
                                            <div class="pricing">
                                                <p class="price">
                                                <span>${item?.product?.price_pd}VND</span>
                                                </p>
                                            </div>
                                            <p class="bottom-area d-flex px-3">
                                                <a href="#" onclick="add_to_cart(${item?.product?.id_pd},1);" class="add-to-cart text-center py-2 mr-1">
                                                    <span>Add to cart <i class="ion-ios-add ml-1"></i></span>
                                                </a>
                                                <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
                                            </p>
                                        </div>
                                    </div>
                                 </div>`
                            })
                            $('#list_product').html(html.join(' '));
                        })
                    })
                    const add_to_cart = (id_product, soluong) => {
                        $.post('./routes/cart.route.php', {
                            method: 'add_to_cart',
                            ID_sp: id_product,
                            soluong: soluong
                        }, (data) => {
                            const res = JSON.parse(data);
                            if (res.success === false) {
                                alert(res.message)
                                return;
                            }
                            location.reload();
                        })
                    }
                </script>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-choose ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-4">
                    <div class="choose-wrap divider-one img p-5 d-flex align-items-end" style="background-image: url(./views/pages/images/choose-1.jpg);">

                        <div class="text text-center text-white px-2">
                            <span class="subheading">Headphone</span>
                            <h2>New Collection</h2>
                            <p>Immerse yourself in sound: Explore our collection of premium headphones for an immersive audio experience.</p>
                            <p><a href="shop.php" class="btn btn-black px-3 py-2">Shop now</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row no-gutters choose-wrap divider-two align-items-stretch">
                        <div class="col-md-12">
                            <div class="choose-wrap full-wrap img align-self-stretch d-flex align-item-center justify-content-end" style="background-image: url(./views/pages/images/choose-2.jpg);">
                                <div class="col-md-7 d-flex align-items-center">
                                    <div class="text text-white px-5">
                                        <span class="subheading">Laptop</span>
                                        <h2>New Collection</h2>
                                        <p>Don't miss the chance to find the right product and discover new experiences with just one click. Get ready, great things await!</p>
                                        <p><a href="shop.php" class="btn btn-black px-3 py-2">Shop now</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row no-gutters">
                                <div class="col-md-6">
                                    <div class="choose-wrap wrap img align-self-stretch bg-light d-flex align-items-center">
                                        <div class="text text-center px-5">
                                            <span class="subheading">Summer Sale</span>
                                            <h2>Exclusive Offer</h2>
                                            <p>Shop now and enjoy unbeatable prices on selected items, limited time only!"

                                            </p>
                                            <p><a href="shop.php" class="btn btn-black px-3 py-2">Shop now</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="choose-wrap wrap img align-self-stretch d-flex align-items-center" style="background-image: url(./views/pages/images/choose-3.jpg);">
                                        <div class="text text-center text-white px-5">
                                            <span class="subheading"></span>
                                            <h2>Best Sellers</h2>
                                            <p>"Explore our Best Sellers collection - handpicked favorites that redefine style and function."</p>
                                            <p><a href="shop" class="btn btn-black px-3 py-2">Shop now</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="services-flow">
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-bag"></span>
                            </div>
                            <div class="text">
                                <h3>Free Shipping</h3>
                                <p class="mb-0">Free Shipping - an excellent opportunity to experience convenient shopping service without worrying about delivery costs, straight to your door!</p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-heart-box"></span>
                            </div>
                            <div class="text">
                                <h3>Valuable Gifts</h3>
                                <p class="mb-0">Explore our range of valuable gifts waiting for you with every purchase - because you deserve something extra special</p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-payment-security"></span>
                            </div>
                            <div class="text">
                                <h3>Warranty and After-sales Service:</h3>
                                <p class="mb-0">Provide clear information about warranty policies, after-sales support services, and contact quickly when support is needed.</p>
                            </div>
                        </div>
                        <div class="services-2 p-4 d-flex ftco-animate">
                            <div class="icon">
                                <span class="flaticon-customer-service"></span>
                            </div>
                            <div class="text">
                                <h3>All Day Support</h3>
                                <p class="mb-0">Get comprehensive support and guidance at any hour of the day – your satisfaction is our commitment.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="heading-section ftco-animate mb-5">
                        <h2 class="mb-4">Our satisfied customer says</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                    </div>
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap">
                                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-gallery">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 heading-section text-center mb-4 ftco-animate">
                    <h2 class="mb-4">Follow Us On Instagram</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                </div>
            </div>
        </div>
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(./views/pages/images/gallery-1.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(./views/pages/images/gallery-2.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(./views/pages/images/gallery-3.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(./views/pages/images/gallery-4.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(./views/pages/images/gallery-5.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(./views/pages/images/gallery-6.jpg);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-instagram"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row">
                <div class="mouse">
                    <a href="#" class="mouse-icon">
                        <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                    </a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Minishop</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Menu</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Shop</a></li>
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Journal</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Help</h2>
                        <div class="d-flex">
                            <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                <li><a href="#" class="py-2 d-block">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>
    <script src="./views/pages/js/jquery.min.js"></script>
    <script src="./views/pages/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="./views/pages/js/popper.min.js"></script>
    <script src="./views/pages/js/bootstrap.min.js"></script>
    <script src="./views/pages/js/jquery.easing.1.3.js"></script>
    <script src="./views/pages/js/jquery.waypoints.min.js"></script>
    <script src="./views/pages/js/jquery.stellar.min.js"></script>
    <script src="./views/pages/js/owl.carousel.min.js"></script>
    <script src="./views/pages/js/jquery.magnific-popup.min.js"></script>
    <script src="./views/pages/js/aos.js"></script>
    <script src="./views/pages/js/jquery.animateNumber.min.js"></script>
    <script src="./views/pages/js/bootstrap-datepicker.js"></script>
    <script src="./views/pages/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="./views/pages/js/google-map.js"></script>
    <script src="./views/pages/js/main.js"></script>
</body>


</html>