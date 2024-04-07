@include('layouts.header')

<!-- Banner Start -->
<div class="banner">
    <img class="OF-cover img-responsive" src="images/specialties-parra-img.jpg" alt="">
    <div class="banner-overlay"></div>
    <div class="banner-title">
        <h1>Contact</h1>

    </div>
</div>

<title>Add Map</title>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<link rel="stylesheet" type="text/css" href="{{asset('css/googlemap.css')}}" />
<script type="module" src="{{asset('js/googlemap.js')}}"></script>
<!-- Banner End -->
<!-- Reservation Form Section Start -->
<div class="content inner-pg reservation-section">
    <div class="container">
        <div class="reservation-form">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-centered">
                    <center>
                        <h3> (202) 809-5004</h3>
                        <h3>2122 P street Northwest, Washington DC 20037</h3>
                        <h3>sale@uniteinnovatech.com</h3>
                        <h4>10 am ~ 10 pm (last call 9:30 pm)</h4>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Specialties Section Start -->
@include('layouts.footer')
