@include('layouts.header')

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
                <a href="/shop"><h3>continue to buy</h3></a>
            </header>
            <form class="woocommerce-cart-form" action="/buyer/payment" method="post" >
                {{csrf_field()}}
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
                                <a href="/remove/cart?product_id={{$c->product_id}}" class="remove"></a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="#">
                                    <input type="hidden" name="product_id[]" value="{{$c->product_id}}">
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
                                    <input type="hidden"  class="input-text qty text" name="quantity[]" value="{{$c->quantity}}">
                                    <input type="number" class="input-text qty text" value="{{$c->quantity}}" min="0">
                                </div>
                            </td>
                            <td class="product-subtotal" data-title="Total">
                                <span>${{$c->price * $c->quantity}}</span>
                                <?php
                                    $price += $c->price * $c->quantity;
                                ?>
                            </td>
                        </tr>
                        @if($c->add_to == '1')
                            <tr>
                                <div class="form-group">

                                    <td><label for="spice_level">Spice Level:</label></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="spice_level[]" id="spice-no-{{$c->product_id}}" value="no-spicy" checked>
                                            <label class="form-check-label" for="spice-no">
                                                No spicy
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="spice_level[]" id="spice-mild-{{$c->product_id}}" value="mild">
                                        <label class="form-check-label" for="spice-mild-{{$c->product_id}}">
                                            Mild
                                        </label>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="spice_level[]" id="spice-medium-{{$c->product_id}}" value="medium-spicy">
                                        <label class="form-check-label" for="spice-medium-{{$c->product_id}}">
                                            Medium spicy
                                        </label>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="spice_level[]" id="spice-spicy-{{$c->product_id}}" value="spicy">
                                        <label class="form-check-label" for="spice-spicy-{{$c->product_id}}">
                                            Spicy
                                        </label>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="spice_level[]" id="spice-hell-{{$c->product_id}}" value="hell-spicy">
                                        <label class="form-check-label" for="spice-hell-{{$c->product_id}}">
                                            Hell spicy
                                        </label>
                                    </div>
                                    </td>
                                </div>
                            </tr>

                            <tr>
                                <td>
                                    <label for="extra">choose: </label>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="extra[]" id="beef-{{$c->product_id}}" value="beef" required>
                                        <label class="form-check-label" for="beef-{{$c->product_id}}">
                                            Beef (+$2)
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="extra[]" id="shrimp-{{$c->product_id}}" value="shrimp" required>
                                        <label class="form-check-label" for="shrimp-{{$c->product_id}}">
                                            Shrimp (+3)
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="extra[]" id="seafood-{{$c->product_id}}" value="seafood" required>
                                        <label class="form-check-label" for="seafood-{{$c->product_id}}">
                                            Seafood (+5)
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="extra[]" id="vaggies-{{$c->product_id}}" value="veggies" required>
                                        <label class="form-check-label" for="vaggies-{{$c->product_id}}">
                                            Veggies
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="extra[]" id="tofu-{{$c->product_id}}" value="tofu" required>
                                        <label class="form-check-label" for="tofu-{{$c->product_id}}">
                                            Tofu
                                        </label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="extra[]" id="pork-{{$c->product_id}}" value="pork" required>
                                        <label class="form-check-label" for="pork-{{$c->product_id}}">
                                            Pork
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="extra[]" id="chicken-{{$c->product_id}}" value="chicken" required>
                                        <label class="form-check-label" for="chicken-{{$c->product_id}}">
                                            Chicken
                                        </label>
                                    </div>
                                </td>

                                <td>
                                </td>

                                <td></td>
                                <td></td>
                            </tr>
                        @else
                            <tr>

                                <td colspan="4">Note:<textarea type="text" name="extra[]" rows="2" cols="25"></textarea></td>
                                <td> <input type="hidden" name="spice_level[]" value=""></td>
                                <td>
                            </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
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
                                <button type="submit" class="btn btn-default">Go to checkout</button>
                            </div>
                        </div>
                    </div>
                </div>


            </form>

        </article>
    </div>
</div>
<!-- Specialties Section Start -->
@include('layouts.footer')
<script>
    $(document).ready(function() {
        // 监听数量输入框的变化
        $('.quantity input').on('input', function() {
            // 获取所在行的价格和数量
            var $row = $(this).closest('.cart-item');
            var price = parseFloat($row.find('.product-price span').text().replace('$', ''));
            var quantity = parseInt($(this).val());

            // 计算新的总价
            var subtotal = price * quantity;

            // 更新显示的总价
            $row.find('.product-subtotal span').text('$' + subtotal.toFixed(2));

            // 更新所有商品的总价
            updateTotalPrice();
        });

        // 更新所有商品的总价
        function updateTotalPrice() {
            var totalPrice = 0;

            $('.product-subtotal span').each(function() {
                var subtotal = parseFloat($(this).text().replace('$', ''));
                totalPrice += subtotal;
            });

            // 更新显示的总价
            $('#total-price').text('$' + totalPrice.toFixed(2));
        }
    });
</script>
<script>
    $(document).ready(function() {
        // 更新总计金额
        updateTotal();

        // 监听数量输入框的变化
        $('.quantity input').on('input', function() {
            // 更新总计金额
            updateTotal();
        });

        // 更新总计金额
        function updateTotal() {
            var total = 0;

            // 遍历每个商品的小计金额
            $('.product-subtotal span').each(function() {
                var subtotal = parseFloat($(this).text().replace('$', ''));
                total += subtotal;
            });

            // 更新显示的小计金额
            $('.cart-subtotal .woocommerce-Price-amount').text('$' + total.toFixed(2));

            // 更新显示的总计金额
            $('.order-total .woocommerce-Price-amount').html('<span class="woocommerce-Price-currencySymbol">$</span>' + total.toFixed(2));
        }
    });
</script>
