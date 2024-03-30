@include('layouts.header')

<!-- Banner Start -->
<div class="banner">
    <img class="OF-cover img-responsive" src="images/specialties-parra-img.jpg" alt="">
    <div class="banner-overlay"></div>
    <div class="banner-title">
        <h5>make an online</h5>
        <h1>Login</h1>
    </div>
</div>
<!-- Banner End -->
<!-- Reservation Form Section Start -->
<div class="content inner-pg reservation-section">
    <div class="container">
        <div class="reservation-form">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-centered">
                    <form action="/login" method="POST" >
                        @csrf
                        <h5>Login</h5>
                        <div class="row">
                            <div class="col-sm-4 col-md-12">
                                <div class="form-group">
                                    <label>email</label>
                                    <input id="account" name="email" type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-12">
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                        </div>
                          <div class="send-message text-center">
                            <input type="submit" class="btn btn-default" value="login"/>
                            <input type="button" class="btn btn-success" onclick="location.href='/register';" value="register" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.send-message {
    /* Center the button container */
    display: flex;
    justify-content: center;
    gap: 10px; /* Add a gap between buttons */
}

.btn-custom-login,
.btn-custom-register {
    padding: 10px 20px; /* Add padding inside the buttons */
    border: none; /* Remove borders */
    border-radius: 5px; /* Add rounded corners */
    font-size: 16px; /* Set font size */
    cursor: pointer; /* Change cursor to pointer on hover */
    transition: background-color 0.3s ease; /* Smooth background color transition */
}

.btn-custom-login {
    background-color: #4CAF50; /* Green background */
    color: white; /* White text */
}

.btn-custom-register {
    background-color: #00BCD4; /* Cyan background */
    color: white; /* White text */
}

.btn-custom-login:hover {
    background-color: #45a049; /* Darker green on hover */
}

.btn-custom-register:hover {
    background-color: #019ba5; /* Darker cyan on hover */
}

</style>

<!-- Specialties Section Start -->

