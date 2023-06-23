
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
                        <li class="active"><a href="/menu" class="scroll">{{$c}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="menu-list-right">
                    <ul class="products-list">
                        <?php $count = 0; ?>
                        @foreach($menu as $m)
                            @if($m->recommendation == 'on')
                                <?php $count++ ?>
                            @if($count < 6)
                        <li class="products-block">
                            <a href="#" class="product-link">
                                <img class="img-responsive" src="https://admin.sampannee.com/images/{{$m->photo}}" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">{{$m->name}}</h2>
                                    <span class="price">${{$m->price}}</span>
                                </div>
                            </a>
                        </li>
                                @endif
                            @endif
                        @endforeach

                        <li class="products-block fancy-pag">
                            <div class="fancy-inner-block">
                                <div class="pag-arrows">
                                    <a href="/menu">next <span class="arrow-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span><span class="arrow-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span></a>
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
@include('layouts.footer')
<!-- Footer End -->
</html>
