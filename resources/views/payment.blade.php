@include('layouts.header')

<!-- Banner Start -->
<div class="banner">
    <img class="OF-cover img-responsive" src="{{ asset('images/specialties-parra-img.jpg') }}" alt="">
    <div class="banner-overlay"></div>
    <div class="banner-title">
        <h5>make an online</h5>
        <h1>Payment</h1>
    </div>
</div>
<!-- Banner End -->
<!-- Reservation Form Section Start -->
<div class="container">

    <div class="row">

        <div class="col-md-7 col-md-offset-3">
            <br>
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                    <h3 class="panel-title text-center"><strong>Payment Details</strong></h3>
                </div>
                <div class='form-row row'>
                    <div class='col-xs-12 form-group card required'>
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail as $key => $d)
                                    @if ($key != 'total' && $key != 'tax' && $key != 'subtotal')
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $detail[$key]['name'] }}</td>
                                            <td>{{ number_format($detail[$key]['price'], 2) }}</td>
                                            <td>{{ $detail[$key]['quantity'] }}</td>
                                        </tr>
                                        @if (isset($detail[$key]['extra']))
                                            <tr>
                                                <?php $extra = explode('-', $detail[$key]['extra']); ?>
                                                <td colspan="2">Extra:
                                                    {{ $extra[0] }}
                                                    {{ isset($extra[1]) ? ' (+' . $extra[1] . ')' : '' }}
                                                </td>
                                                <td colspan="2">Spice level: {{ $detail[$key]['add_to'] }}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default credit-card-box">
                <div class="tax-section">
                    <table class="order-table">
                        <tfoot>
                            <tr>
                                <td colspan="2">Tax (10%)</td>
                                <td colspan="2">${{ number_format($detail['tax'], 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">SubTotal</td>
                                <td colspan="2" id="subtotal-value">${{ number_format($detail['subtotal'], 2) }}</td>
                            </tr>

                            <tr>
                                <td colspan="2">Choose Tips</td>
                                <td colspan="2">
                                    <input type="number" id="input-tips" name="tips" min="0" step="0.01"
                                        value="0">
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">Total</td>
                                <td colspan="2" id="total-value">${{ number_format($detail['total'], 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">To us:</td>
                                <td colspan="4">
                                    <label for="comment"></label>
                                    <textarea name="fcomment" id="comment" rows="4" cols="50" oninput="updateHiddenComment(this.value)">
                                </textarea>
                                </td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-md-offset-3">
        <br>
        <div class="panel panel-default credit-card-box">
            <div class="panel-heading display-table">
                <h3 class="panel-title text-center"><strong>Payment Details</strong></h3>
            </div>
            <div class="panel-body">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <form role="form" action="/buyer/pay" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    @foreach ($detail as $key => $d)
                        @if ($key != 'total' && $key != 'tax' && $key != 'subtotal')
                            <input type="hidden" name="extra[]" value="{{ $d['extra'] ?? '' }}">
                            <input type="hidden" name="add_to[]" value="{{ $d['add_to'] ?? '' }}">
                        @endif
                    @endforeach
                    <input type="hidden" id="comment-value" name="comment" value="">
                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Name</label>
                            <input class='form-control' name= "name" type='text' value="{{ $user->name }}"
                                required>
                        </div>
                    </div>


                    <input name= "total" id="total" type='hidden' value = "{{ $detail['total'] }}">

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Email</label>
                            <input class='form-control' name= "email" type='email' value="{{ $user->email }}"
                                required>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Address</label>
                            <input class='form-control' name="line1" type='text' required>
                        </div>
                    </div>



                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>City</label>
                            <input class='form-control' name="city" type='text' required>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>State</label>
                            <input class='form-control' name="state" type='text' required>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Postal Code</label>
                            <input class='form-control' name="postal_code" type='text' required>
                        </div>
                    </div>
                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Country</label>
                            <input class='form-control' name="country" type='text' value="US" required>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Phone</label>
                            <input class='form-control' name="phone" type='text' value="{{ $user->phone }}"
                                onkeyup="formatPhoneNumber(this)" required>
                        </div>
                    </div>
                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Name on Card</label>
                            <input class='form-control' size='4' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group card required'>
                            <label class='control-label'>Card Number</label>
                            <input autocomplete='off' class='form-control card-number' size='20'
                                type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                            <label class='control-label'>CVC</label>
                            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                size='4' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label> <input
                                class='form-control card-expiry-month' placeholder='MM' size='2'
                                type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label>
                            <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors and try again.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" id="total_submit">Pay Now
                                (${{ $detail['total'] }})</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@include('layouts.footer')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>


    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            var Stripe = Stripe('{{ env('STRIPE_KEY') }}');
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
<style>
    .order-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .order-table th,
    .order-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .order-table th {
        background-color: #f5f5f5;
    }

    .order-table tfoot td {
        font-weight: bold;
    }

    .order-table tfoot tr:first-child td {
        border-top: none;
    }

    .order-table tfoot tr:last-child td {
        border-top: 2px solid #000;
    }
</style>
<script>
    function formatPhoneNumber(input) {
        // 清除非數字字符
        var phoneNumber = input.value.replace(/\D/g, '');

        // 確保號碼不超過 10 位
        phoneNumber = phoneNumber.substring(0, 10);

        // 將號碼格式化為 (012) 345-6789
        var formattedPhoneNumber = '(' + phoneNumber.substr(0, 3) + ') ' + phoneNumber.substr(3, 3) + '-' + phoneNumber
            .substr(6);

        // 將格式化後的號碼設置回輸入框
        input.value = formattedPhoneNumber;
    }

    $(document).ready(function() {
        // 监听Tips输入字段的变化
        $('#input-tips').on('input', function() {
            var tips = parseFloat($(this).val());
            var total = parseFloat('{{ $detail['total'] }}');

            // 计算新的Total
            total = total + tips;

            // 更新Total的显示，保留两位小数
            $('#total-value').text('$' + total.toFixed(2));
            $('#total').val(total.toFixed(2));
            $('#total_submit').text('Pay Now ($' + total.toFixed(2) + ')');
        });
    });



    // 更新Total值並顯示
    function updateTotalValue(value) {
        $('#total-value').text('$' + value.toFixed(2));
        $('#total').val(value.toFixed(2));
        $('#total_submit').text('Pay Now ($' + value.toFixed(2) + ')');
    }
    // 更新Total值並顯示

    function updateHiddenComment(value) {
        document.querySelector("#comment-value").value = value.trim();
    }
</script>
