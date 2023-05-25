@include('layouts.header');

<!-- Banner Start -->
<div class="banner">
    <img class="OF-cover img-responsive" src="images/menu-list-banner.jpg" alt="">
    <div class="banner-overlay"></div>
    <div class="banner-title">
        <h5>restaurant</h5>
        <h1>Menu</h1>
        <p>juicy flavours</p>
    </div>
</div>
<!-- Breadcrumb Start -->
<div class="breadcrumb-list clearfix">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">PRODUCTS</li>
        </ol>
    </div>
</div>
<!-- Breadcrumb End -->


<div class="content inner-pg full-shop-width clearfix">
    <div class="container">
        <header class="full-shop-header">
            <h2>Shop</h2>
            <div class="filter-section">
                <p>SHOWING All RESULTS</p>
{{--                <div class="right-filter">--}}
{{--                    <form>--}}
{{--                        <select class="form-control">--}}
{{--                            <option>Default sorting</option>--}}
{{--                            <option>Sort by popularity</option>--}}
{{--                            <option>Sort by average rating</option>--}}
{{--                            <option>Sort by newness</option>--}}
{{--                            <option>Sort by price: low to high</option>--}}
{{--                            <option>Sort by price: high to low</option>--}}
{{--                        </select>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </div>
        </header>
        <div class="menu-list">
            <div class="menu-list-right">
                <ul class="products-list">
            @foreach($menu as $m)

                        <li class="products-block">
                            <a href="/cart/add?product_id={{$m->id}}&quantity=1" class="product-link">
                                <img class="img-responsive" src="images/product-img1.jpg" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">{{$m->name}}</h2>
                                    <span class="price">${{$m->price}}</span>
                                </div>
                            </a>
                            <div class="btn-add-to-cart">
                                <a href="/cart/add?product_id={{$m->id}}&quantity=1" class="btn cart-btn">Add to cart</a>
                            </div>
                        </li>
            @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- Content Page Start -->

<!-- Content Page End -->
