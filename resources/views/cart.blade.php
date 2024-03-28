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
                <a href="/shop">
                    <h3>continue to buy</h3>
                </a>
            </header>
            <form class="woocommerce-cart-form" id = "cart-form" action="/buyer/payment" method="post">
                {{ csrf_field() }}
                <div class="table-responsive">
                    <table class="table cart-table table-hover">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Extra</th>
                                <th class="product-subtotal">Favor</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $price = 0;
                            ?>
                            @foreach ($cart as $c)
                                <tr class="cart-item">
                                    <td class="product-remove">
                                        <a href="/remove/cart?product_id={{ $c->product_id }}" class="remove"></a>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="#">
                                            <input type="hidden" name="product_id[]" value="{{ $c->product_id }}">
                                            <img class="img-responsive" src="images/cart-img.jpg" alt="">
                                        </a>
                                    </td>
                                    <td class="product-name" data-title="Product">
                                        <a href="#">{{ $c->name }}</a>
                                    </td>
                                    <td class="product-price" data-title="Price">
                                        <span>${{ $c->price }}</span>
                                    </td>
                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity">
                                            <div class="quantity">
                                                <!-- 可見的輸入框，供用戶更改數量 -->
                                                <input type="number" class="input-text qty text"
                                                    name="display_quantity[]" value="{{ $c->quantity }}"
                                                    min="0">
                                                <!-- 隱藏的輸入框，用於提交表單數據 -->
                                                <input type="hidden" class="input-text qty text hidden"
                                                    name="quantity[]" value="{{ $c->quantity }}">


                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        @if ($c->add_to == '1')
                                            <select name="extra[]" id="add_to-select" required>
                                                <option value="default-0" selected disabled>--Extra-- </option>
                                                <option value="pork-0">Pork</option>
                                                <option value="beef-2">Beef(+2)</option>
                                                <option value="shrimp-3">Shrimp(+3)</option>
                                                <option value="seafood-5">seafood(+5)</option>
                                                <option value="tofu-0">Tofu</option>
                                                <option value="veggie-0">Veggies</option>
                                                <option value="chicken-0">Chicken</option>
                                            </select>
                                        @else
                                            <input type="hidden" name="extra[]" value="">
                                        @endif


                                    </td>
                                    <td>
                                        <select name="add_to[]" id="extra_to" required>
                                            <option value="default-0" selected disabled>--Favor--
                                            </option>
                                            <option value="no_spicy">No Spicy</option>
                                            <option value="mild">Mild</option>
                                            <option value="medium_spicy">Medium Spicy</option>
                                            <option value="spicy">Spicy</option>
                                            <option value="hell_spicy">Hell Spicy</option>
                                        </select>

                                    </td>
                                    <td class="product-subtotal" data-title="Total">
                                        <span>${{ $c->price * $c->quantity }}</span>
                                        <?php
                                        $price += $c->price * $c->quantity;
                                        ?>
                                    </td>

                                </tr>
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
                                            <th>Total</th>
                                            <td data-title="Subtotal">
                                                <input type="hidden" name="total_price" id="total-price-input"
                                                    value="">

                                                <span id="total-price" class="woocommerce-Price-amount amount"></span>
                                            </td>
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
<!-- 在包含其他腳本之後添加此腳本 -->
<!-- 在包含其他腳本之後添加此腳本 -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 在此處添加用於動態計算的JavaScript邏輯
        updateCartTotal();

        // 添加數量和選項更改的事件監聽器
        document.querySelectorAll('.input-text.qty, select[name^="extra_to"]').forEach(function(element) {
            element.addEventListener('change', function() {
                updateCartTotal();
            });
        });
        document.querySelectorAll('.input-text.qty, select[id^="add_to-select"]').forEach(function(element) {
            element.addEventListener('change', function() {
                updateCartTotal();
            });
        });

        function updateCartTotal() {
            // 計算小計和總價的邏輯
            var subtotal = 0;
            document.querySelectorAll('.cart-item').forEach(function(item) {
                var price = parseFloat(item.querySelector('.product-price span').innerText.replace('$',
                    ''));
                var quantity = parseInt(item.querySelector('.input-text.qty').value);

                // 檢查是否有選擇選項
                var selectedOption = item.querySelector('select[id^="add_to-select"]');
                var optionPrice = selectedOption ? parseFloat(selectedOption.value.split('-')[1]) : 0;

                // 更新小計
                var subTotalPrice = (price + optionPrice) * quantity;
                item.querySelector('.product-subtotal span').innerText = '$' + subTotalPrice.toFixed(2);
                subtotal += subTotalPrice;
            });

            // 更新總價
            document.getElementById('total-price').innerText = '$' + subtotal.toFixed(2);
            // 新增的部分：將總價自動填入表單中，以便在後端處理
            document.getElementById('total-price-input').value = subtotal.toFixed(2);
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('cart-form');
        if (form) { // 确保元素存在
            form.onsubmit = function(e) {
                var select = document.getElementById('add_to-select');
                if (select.value === "default-0" || select.value == null ) {
                    e.preventDefault(); // 阻止表单提交
                    alert('Please select an option from "Extra".'); // 提示用户
                }
            };
        } else {
            console.error('Form not found');
        }
    });
</script>
