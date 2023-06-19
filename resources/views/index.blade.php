<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant</title>
</head>
@include('layouts.header')
<!-- Restaurant Section Start -->
<div class="restaurant-block padding-top-120 padding-bottom-120 section-bg-white section-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="element-block">
                    <div class="min-height-550">
                        <div class="multilayers-item margin-top-80 position-relative">
                            <div class="image-item">
                                <img class="img-responsive" src="images/index1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="welcome-right padding-left-125">
                    <div class="section-title">
                        <h2>Welcome at</h2>
                        <h3>Sampannee!</h3>
                    </div>
                    <h6 class="small-headline">“Experience authentic Thai cuisine in the heart of Dupont Circle, D.C. at our restaurant, where we serve visually stunning dishes that tantalize the taste buds. ”.</h6>
                    <p>At Sampannee, we take great pride in our Thai heritage. Our culinary journey began in the royal Thai palace, where we honed our skills to serve the esteemed royal family. Today, we are excited to bring the rich flavors of Thai cuisine to the United States. Indulge in our delectable Thai dishes and savor the exotic drinks that will leave a lasting impression on your palate. Join us as we embark on this culinary adventure together!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Restaurant Section End -->
<!-- Restaurant - Menu Section Start -->
<div id="dannys" class="restaurant-menu dark-bg-color min-height-720 position-relative">
    <div class="menu-left-detail padding-top-150">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="menu-inner-left padding-right-90">
                        <div class="section-title">
                            <h2>Restaurant</h2>
                            <h3 class="white">menu</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <p class="gray">We are delighted to offer you the true essence of Thai cuisine, served with a touch of modern elegance. At our restaurant, you'll find a harmonious blend of authentic flavors and contemporary decor, creating a unique dining experience. </p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <p class="gray">Whether you're seeking a hearty brunch, happy hour delights, or an extensive dine-in menu, we have you covered. And if you prefer the comfort of your own home, we provide convenient online ordering and delivery services. Don't let your cravings for Thai food go unsatisfied!</p>
                            </div>
                        </div>
                        <a href="/menu" class="btn btn-secondary">what’s on the menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-right-img"></div>
</div>
<!-- Restaurant - Menu Section End -->

<!-- Specialties Section Start -->

<div class="specialties-section section-bg-white padding-top-120 padding-bottom-220 section-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="element-block">
                    <div class="min-height-550">
                        <div class="multilayers-item margin-minus-left-120 position-relative">
                            <div class="image-item">
                                <img class="img-responsive" src="images/index3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="specialties-right padding-left-125 padding-top-65">
                    <div class="section-title">
                        <h2>Drink</h2>
                        <h3>with us</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <p>Indulge in a delightful selection of beverages at Sampannee! Our extensive drink menu is designed to complement your dining experience perfectly. </p>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <p>Whether you're in the mood for a classic favorite, a special creation unique to Sampannee, or a refreshing mocktail, we have something to satisfy every palate.</p>
                        </div>
                    </div>
{{--                    <a href="menu–stretched.html" class="btn btn-primary">view all</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Specialties Section End -->


<!-- Todays Specialties Start -->

<!-- Menu List Start -->
<div id="menulist" class="menu-list clearfix">
    <div class="container">
        <div class="row gutter-0">
            <div class="col-sm-12 col-md-3">
                <div class="menu-list-left">
                    <div class="menu-list-title">
                        <h4>restaurant</h4>
                        <h2>menu</h2>
                    </div>
                    <ul>
                        @foreach($category as $c)
                        <li class="active"><a href="#menulist" class="scroll">{{$c}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="menu-list-right">
                    <ul class="products-list">
                        <li class="products-block">
                            <a href="single-shop-item.html" class="product-link">
                                <img class="img-responsive" src="images/product-img1.jpg" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">Oven Roasted duck with special sousage</h2>
                                    <span class="price">$25.00</span>
                                </div>
                            </a>
                            <div class="btn-add-to-cart">
                                <a href="cart-page.html" class="btn cart-btn">Add to cart</a>
                            </div>
                        </li>
                        <li class="products-block">
                            <a href="single-shop-item.html" class="product-link">
                                <img class="img-responsive" src="images/product-img2.jpg" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">Oven Roasted duck with special sousage</h2>
                                    <span class="price">$25.00</span>
                                </div>
                            </a>
                            <div class="btn-add-to-cart">
                                <a href="cart-page.html" class="btn cart-btn">Add to cart</a>
                            </div>
                        </li>
                        <li class="products-block">
                            <a href="single-shop-item.html" class="product-link">
                                <img class="img-responsive" src="images/product-img3.jpg" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">Oven Roasted duck with special sousage</h2>
                                    <span class="price">$25.00</span>
                                </div>
                            </a>
                            <div class="btn-add-to-cart">
                                <a href="cart-page.html" class="btn cart-btn">Add to cart</a>
                            </div>
                        </li>
                        <li class="products-block">
                            <a href="single-shop-item.html" class="product-link">
                                <img class="img-responsive" src="images/product-img4.jpg" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">Oven Roasted duck with special sousage</h2>
                                    <span class="price">$25.00</span>
                                </div>
                            </a>
                            <div class="btn-add-to-cart">
                                <a href="cart-page.html" class="btn cart-btn">Add to cart</a>
                            </div>
                        </li>
                        <li class="products-block">
                            <a href="single-shop-item.html" class="product-link">
                                <img class="img-responsive" src="images/product-img5.jpg" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">Oven Roasted duck with special sousage</h2>
                                    <span class="price">$25.00</span>
                                </div>
                            </a>
                            <div class="btn-add-to-cart">
                                <a href="cart-page.html" class="btn cart-btn">Add to cart</a>
                            </div>
                        </li>
                        <li class="products-block">
                            <a href="single-shop-item.html" class="product-link">
                                <img class="img-responsive" src="images/product-img6.jpg" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">Oven Roasted duck with special sousage</h2>
                                    <span class="price">$25.00</span>
                                </div>
                            </a>
                            <div class="btn-add-to-cart">
                                <a href="cart-page.html" class="btn cart-btn">Add to cart</a>
                            </div>
                        </li>
                        <li class="products-block">
                            <a href="single-shop-item.html" class="product-link">
                                <img class="img-responsive" src="images/product-img7.jpg" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">Oven Roasted duck with special sousage</h2>
                                    <span class="price">$25.00</span>
                                </div>
                            </a>
                            <div class="btn-add-to-cart">
                                <a href="cart-page.html" class="btn cart-btn">Add to cart</a>
                            </div>
                        </li>
                        <li class="products-block">
                            <a href="single-shop-item.html" class="product-link">
                                <img class="img-responsive" src="images/product-img8.jpg" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">Oven Roasted duck with special sousage</h2>
                                    <span class="price">$25.00</span>
                                </div>
                            </a>
                            <div class="btn-add-to-cart">
                                <a href="cart-page.html" class="btn cart-btn">Add to cart</a>
                            </div>
                        </li>
                        <li class="products-block fancy-pag">
                            <div class="fancy-inner-block">
                                <div class="pag-arrows">
                                    <a href="full-shop-width.html">next <span class="arrow-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span><span class="arrow-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu List End -->


<!-- Reservations Start -->
<div class="reservation-map clearfix">
    <div class="row gutter-0">
        <div class="col-sm-12 col-md-6">
            <div class="reservation-block padding-right-155 padding-left-155 display-flex vertical-center">
                <div class="reserv-image-block">
                    <div class="reserv-image"></div>
                    <div class="reserv-overlay"></div>
                </div>

            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="reservation-block padding-right-155 padding-left-155 display-flex vertical-center">
                <div class="reservation-detail flx-align-self">
                    <h3 class="black">reservations</h3>
                    <p class="black">Planning a memorable celebration? Look no further! Our restaurant offers the perfect setting to commemorate your joyous occasion. Reserve your table today, and let us create an extraordinary dining experience filled with delectable dishes and warm hospitality.
                        <a class="black" href="#"></a></p>
{{--                    <a href="reservation-form.html" class="btn btn-secondary">ONLINE</a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Reservations End -->


<!-- Footer Start -->
<footer class="footer padding-top-120 padding-bottom-100 clearfix">
    <div class="container">
        <!-- Footer Top Start -->
        <div class="f-top clearfix">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                </div>

                <div class="col-sm-12 col-md-2 col-lg-1">
                    <div class="f-nav">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="/menu">menu</a></li>
{{--                            <li><a href="reservation-form-and-content.html">Reservation</a></li>--}}
{{--                            <li><a href="blog-main.html">blog</a></li>--}}
                            <li><a href="/shop">Shop</a></li>
{{--                            <li><a href="contact-google-map.html">Contact</a></li>--}}
                        </ul>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="f-social-follower">
{{--                        <a class="btn btn-default" href="reservation-form.html" role="button">online reservation</a>--}}
                        <div class="f-follower">
                            <h6>follow</h6>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                </div>
            </div>
        </div>
        <!-- Footer Top End -->

        <!-- Footer Bottom Start -->
        <div class="f-bottom clearfix">
            <p>Supported by:
                Unite Innovatech | sale@uniteinnovatech.com | 571-435-7647 All rights reserved.</p>
        </div>
        <!-- Footer Bottom End -->
    </div>
</footer>
<!-- Footer End -->
</html>
