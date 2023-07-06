@include('layouts.header')

<!-- Banner Start -->
<div class="banner">
    <img class="OF-cover img-responsive" src="images/specialties-parra-img.jpg" alt="">
    <div class="banner-overlay"></div>
    <div class="banner-title">
        <h1>Order History</h1>

    </div>
</div>
<!-- Banner End -->
<!-- Reservation Form Section Start -->

    <div class="container">
        <div class="reservation-form">

                <div class="col-sm-10 col-md-8 col-centered">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Paid</th>
                                    <th>Order Time</th>
                                    <th>Status</th>
                                    <th>Finish Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $o)
                                    <tr>
                                        <td>{{$o->id}}</td>
                                        <td>${{$o->billing_total}}</td>
                                        <td>{{$o->created_at}}</td>
                                        <td>{{$o->status}}</td>
                                        @if($o->status == 'done')
                                            <td>{{$o->updated_at}}</td>
                                        @else
                                            <td>Not Yet</td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
        </div>
    </div>


<!-- Specialties Section Start -->
@include('layouts.footer')
