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
            <form class="woocommerce-cart-form" action="/buyer/payment" method="post">
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
                                        <input type="hidden" class="input-text qty text" name="quantity[]"
                                               value="{{$c->quantity}}">
                                        <input type="number" class="input-text qty text" value="{{$c->quantity}}"
                                               min="0">
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
                                                <input class="form-check-input" type="radio" name="spice_level[]"
                                                       id="spice-no-{{$c->product_id}}" value="no-spicy" checked>
                                                <label class="form-check-label" for="spice-no">
                                                    No spicy
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="spice_level[]"
                                                       id="spice-mild-{{$c->product_id}}" value="mild">
                                                <label class="form-check-label" for="spice-mild-{{$c->product_id}}">
                                                    Mild
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="spice_level[]"
                                                       id="spice-medium-{{$c->product_id}}" value="medium-spicy">
                                                <label class="form-check-label" for="spice-medium-{{$c->product_id}}">
                                                    Medium spicy
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="spice_level[]"
                                                       id="spice-spicy-{{$c->product_id}}" value="spicy">
                                                <label class="form-check-label" for="spice-spicy-{{$c->product_id}}">
                                                    Spicy
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="spice_level[]"
                                                       id="spice-hell-{{$c->product_id}}" value="hell-spicy">
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
                                            <input class="form-check-input" type="radio" name="extra[]"
                                                   id="pork-{{$c->product_id}}" value="pork" required>
                                            <label class="form-check-label" for="pork-{{$c->product_id}}">
                                                Pork
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="extra[]"
                                                   id="beef-{{$c->product_id}}" value="beef" data-price="2" required>
                                            <label class="form-check-label" for="beef-{{$c->product_id}}">
                                                Beef (+$2)
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="extra[]"
                                                   id="shrimp-{{$c->product_id}}" value="shrimp" data-price="3" required>
                                            <label class="form-check-label" for="shrimp-{{$c->product_id}}">
                                                Shrimp (+3)
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="extra[]"
                                                   id="seafood-{{$c->product_id}}" value="seafood" data-price="5" required>
                                            <label class="form-check-label" for="seafood-{{$c->product_id}}">
                                                Seafood (+5)
                                            </label>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="extra[]"
                                                   id="tofu-{{$c->product_id}}" value="tofu" data-price="0" required>
                                            <label class="form-check-label" for="tofu-{{$c->product_id}}">
                                                Tofu
                                            </label>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="extra[]"
                                                   id="vaggies-{{$c->product_id}}" value="veggies" data-price="0" required>
                                            <label class="form-check-label" for="vaggies-{{$c->product_id}}">
                                                Veggies
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="extra[]"
                                                   id="chicken-{{$c->product_id}}" value="chicken" data-price="0" required>
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

                                    <td colspan="4">Note:<textarea type="text" name="extra[]"
                                                                   id="note-{{$c->product_id}}" rows="2"
                                                                   cols="25"></textarea></td>
                                    <td><input type="hidden" name="spice_level[]" value=""></td>
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
                                        <th>Total</th>
                                        <td data-title="Subtotal">
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
<script>
    // const productPrice = parseFloat(quantityInput.closest('.cart-item').querySelector('.product-price span').textContent.replace('$',''));
    // 获取所有商品元素
    const cartItems = document.querySelectorAll('.cart-item');

    // 遍历每个商品元素
    cartItems.forEach((item) => {
        const quantityInput = item.querySelector('.product-quantity input[type="number"]');
        const subtotalElement = item.querySelector('.product-subtotal span');

        // 获取商品价格（示例中使用 data 属性存储价格）
        const productPrice = parseFloat(item.dataset.productPrice);

        // 获取附加选项的 input 元素
        const extraInputs = item.querySelectorAll('input[name="extra[]"]');

        // 添加事件监听器以响应数量和附加选项的更改
        quantityInput.addEventListener('input', () => {
            updateSubtotalAndTotal();
        });

        extraInputs.forEach((extraInput) => {
            extraInput.addEventListener('change', () => {
                updateSubtotalAndTotal();
            });
        });

        // 函数用于更新小计和总价
        function updateSubtotalAndTotal() {
            const quantity = parseInt(quantityInput.value, 10);

            // 计算附加选项的额外费用
            let extraCost = 0;
            extraInputs.forEach((extraInput) => {
                if (extraInput.checked) {
                    extraCost += parseFloat(extraInput.dataset.extraPrice);
                }
            });

            // 计算小计和总价
            const subtotal = (productPrice + extraCost) * quantity;
            subtotalElement.textContent = '$' + subtotal.toFixed(2);

            // 更新总价格显示
            updateTotalPrice();
        }
    });

    // 函数用于计算并更新总价格
    function updateTotalPrice() {
        let total = 0;
        cartItems.forEach((item) => {
            const subtotalElement = item.querySelector('.product-subtotal span');
            const subtotal = parseFloat(subtotalElement.textContent.replace('$', ''));
            total += subtotal;
        });

        // 更新总价格显示
        document.getElementById('total-price').textContent = '$' + total.toFixed(2);
    }

    // 初始化时计算和显示初始总价
    updateTotalPrice();

</script>


<script>
    // 获取所有菜单项
    var allInputs = document.querySelectorAll("input[name='spice_level[]'], input[name='extra[]']");
    var noteTextarea = document.querySelectorAll("textarea[name='extra[]']");

    // 从本地存储中获取保存的选项
    var savedOptions = JSON.parse(localStorage.getItem("selectedOptions"));
    var savedNotes = JSON.parse(localStorage.getItem("savedNotes"));

    // 设置已保存的选项为选中状态
    if (savedOptions) {
        savedOptions.forEach(function (option) {
            var input = document.querySelector("input[id='" + option + "']");
            if (input) {
                input.checked = true;
            }
        });
    }
    if (savedNotes) {
        savedNotes.forEach(function (note, index) {
            noteTextarea[index].value = note;
        });
    }
    // 为每个菜单项添加更改事件处理程序
    allInputs.forEach(function (input) {
        input.addEventListener("change", function () {
            // 获取所有选中的辣度选项和额外选项
            var selectedSpiceLevels = document.querySelectorAll("input[name='spice_level[]']:checked");
            var selectedExtras = document.querySelectorAll("input[name='extra[]']:checked");

            // 创建一个数组来保存选项的值
            var selectedOptions = [];

            // 将选中的辣度选项添加到数组中
            selectedSpiceLevels.forEach(function (spiceLevel) {
                selectedOptions.push(spiceLevel.id);
            });

            // 将选中的额外选项添加到数组中
            selectedExtras.forEach(function (extra) {
                selectedOptions.push(extra.id);
            });

            // 将选项数组转换为JSON字符串并保存在本地存储中
            localStorage.setItem("selectedOptions", JSON.stringify(selectedOptions));

        });
    });

    // 为每个文本区域添加更改事件处理程序
    noteTextarea.forEach(function (textarea) {
        textarea.addEventListener("input", function () {
            // 获取所有文本区域的内容
            var notes = [];
            noteTextarea.forEach(function (note) {
                notes.push(note.value);
            });

            // 将文本区域内容数组转换为JSON字符串并保存在本地存储中
            localStorage.setItem("savedNotes", JSON.stringify(notes));
        });
    });
    window.addEventListener('load', function() {
        updateTotalPrice();

        // 為表單輸入添加事件監聽器
        const spiceLevelInputs = document.getElementsByName("spice_level[]");
        const extraInputs = document.getElementsByName("extra[]");

        spiceLevelInputs.forEach((input) => {
            input.addEventListener("change", updateTotalPrice.bind(input));
        });

        extraInputs.forEach((input) => {
            input.addEventListener("change", updateTotalPrice.bind(input));
        });
    });



</script>

