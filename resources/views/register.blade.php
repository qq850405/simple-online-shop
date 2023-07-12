@include('layouts.header');

<!-- Banner Start -->
<div class="banner">
    <img class="OF-cover img-responsive" src="images/specialties-parra-img.jpg" alt="">
    <div class="banner-overlay"></div>
    <div class="banner-title">
        <h1>Register</h1>
    </div>
</div>
<!-- Banner End -->
<!-- Reservation Form Section Start -->
<div class="content inner-pg reservation-section">
    <div class="container">
        <div class="reservation-form">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-centered">
                    <form action="/register" method="POST" >
                    @csrf
                        <h5>Register</h5>
                        <div class="row">
                            <div class="col-sm-4 col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="account" name="email" type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-12">
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-12">
                                <div class="form-group">
                                    <label>confirm password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" onkeyup="formatPhoneNumber(this)" required>
                                </div>
                            </div>

                        </div>
                        <div class="send-message text-center">
                            <button type="submit" class="btn btn-default">register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Specialties Section Start -->

<script>

    function formatPhoneNumber(input) {
        // 清除非數字字符
        var phoneNumber = input.value.replace(/\D/g, '');

        // 確保號碼不超過 10 位
        phoneNumber = phoneNumber.substring(0, 10);

        // 將號碼格式化為 (012) 345-6789
        var formattedPhoneNumber = '(' + phoneNumber.substr(0, 3) + ') ' + phoneNumber.substr(3, 3) + '-' + phoneNumber.substr(6);

        // 將格式化後的號碼設置回輸入框
        input.value = formattedPhoneNumber;
    }
</script>

