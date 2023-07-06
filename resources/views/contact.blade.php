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

                    <h3>My Google Maps Demo</h3>
                    <!--The div element for the map -->
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
        key: "AIzaSyCcC8lU7gjRoN454o4lfY95jsbR_sVLb50",
        v: "weekly",
        // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
        // Add other bootstrap parameters as needed, using camel case.
    });
</script>
<!-- Specialties Section Start -->
@include('layouts.footer')
