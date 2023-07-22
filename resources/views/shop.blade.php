@include('layouts.header')

<!-- Banner Start -->
<div class="banner">
    <img class="OF-cover img-responsive" src="images/Shop.png" alt="">
    <div class="banner-overlay"></div>
    <div class="banner-title">
        <h5>restaurant</h5>
        <h1>Online Ordering</h1>
        <p></p>
    </div>
</div>
<!-- Breadcrumb Start -->
<div class="breadcrumb-list clearfix">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Online Ordering</li>
        </ol>
    </div>
</div>
<!-- Breadcrumb End -->


<div class="content inner-pg full-shop-width clearfix">
    <div class="container">
        <header class="full-shop-header">
            <h2>Online Ordering</h2>
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
                @if($m->recommendation == '1')
                        <li class="products-block">
                            <a href="/cart/add?product_id={{$m->id}}&quantity=1" class="product-link">
                                <img class="img-responsive" src="images/{{$m->photo}}" alt="">
                                <div class="info-wrapper">
                                    <h2 class="product-title">{{$m->name}}</h2>
                                    <span class="price">${{$m->price}}</span>
                                </div>
                            </a>
                            <div class="btn-add-to-cart">
                                <a href="/cart/add?product_id={{$m->id}}&quantity=1" class="btn cart-btn">Add to cart</a>
                            </div>
                        </li>
                @endif
            @endforeach
                </ul>
            </div>


            @foreach($category as $cat)
                <div class="col-sm-12 col-md-12">
                    <div class="menu-list-title">
                        <h2>{{$cat}}</h2>
                    </div>
                </div>

                @foreach($menu as $m)
                    @if($m->recommendation == '0' && $m->category == $cat)
                        <div class="col-sm-12 col-md-6">
                            <ul>
                                <li>
                                    <a href="/cart/add?product_id={{$m->id}}&quantity=1" class="product-link">
                                    <h4 class="list-item-title">{{$m->name}}</h4>
                                    <div class="price-list-dotted-separator"></div>
                                    <div class="list-item-price">${{$m->price}}</div>
                                    <div class="price-item-desc">
                                        <p>{{$m->description}}</p>
                                    </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                   @endif
                @endforeach
              @endforeach
                <div class="col-sm-12 col-md-12">
                    <div class="height-of-menu-list"></div>
                </div>
        </div>
    </div>
</div>

@include('layouts.footer')
<!-- Content Page Start -->

<!-- Content Page End -->
