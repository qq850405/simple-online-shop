@include('layouts.header');

<!-- Banner Start -->
<div class="banner">
    <img class="OF-cover img-responsive" src="images/specialties-parra-img.jpg" alt="">
    <div class="banner-overlay"></div>
    <div class="banner-title">
        <h1>Cart</h1>

    </div>
</div>
<!-- Banner End -->
<!-- Reservation Form Section Start -->
<div class="content inner-pg cart-pg clearfix">
    <div class="container">
        <article>
            <header class="cart-header">
                <h2>Cart</h2>
            </header>
            <form class="woocommerce-cart-form">
                <div class="table-responsive">
                    <table class="table cart-table table-hover">
                        <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $price = 0;
                        ?>
                        @foreach($cart as $c)
                        <tr class="cart-item">
                            <td class="product-remove">
                                <a href="#" class="remove"></a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="#">
                                    <img class="img-responsive" src="images/cart-img.jpg" alt="">
                                </a>
                            </td>
                            <td class="product-name" data-title="Product">
                                <a href="#">{{$c->name}}</a>
                            </td>
                            <td class="product-price" data-title="Price">
                                <span>${{$c->price}}</span>
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <input type="number" class="input-text qty text" value="{{$c->quantity}}">
                                </div>
                            </td>
                            <td class="product-subtotal" data-title="Total">
                                <span>${{$c->price * $c->quantity}}</span>
                                <?php
                                    $price += $c->price * $c->quantity;
                                ?>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" class="actions">
                                <div class="coupon">
                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code">
                                    <input type="submit" class="button" name="apply_coupon" value="Apply coupon">
                                </div>
                                <div class="update-cart">
                                    <a href="#" class="btn btn-default">Update Cart</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="cart-collaterals">
                <div class="row">
                    <div class="col-sm-push-4 col-sm-8 col-md-push-6 col-md-6 col-lg-4 col-lg-push-8">
                        <div class="cart-totals calculated-shipping">
                            <h2>Cart totals</h2>
                            <table class="shop-table shop-table-responsive">
                                <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal">
                                        <span class="woocommerce-Price-amount amount">${{$price}}</span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$price}}</span></strong> </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="proceed-to-checkout">
                                <a href="#" class="btn btn-default">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>
<!-- Specialties Section Start -->

