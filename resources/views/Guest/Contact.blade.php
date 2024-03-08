@extends('Guest.Layouts.Index')
@section('Pages')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/img/machine.jpg') }}) center center no-repeat; background-size: cover;" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">{{ $title }}</h1>
    </div>
</div>
<div class="containers">

    <div class="col-md-5" id="formulirgambar">
        <div class="image-container2" style="margin-top: 20px;">
            <img src="/assets/img/SKI.jpg" alt="Machine 2">
        </div>

        <!-- <div class="image-container" style="width: 50%;">
                <img src="img/machine2.jpg" alt="Machine 2" style="max-width: 100%; height: auto;">
            </div> -->
        <p> </p>

            <div class="col-md-12" style="text-align: center;">
                Looking for more info   rmation or want to buy or have partnership with us?
                <br>
                You can directly contact us directly through  :
                <p>
                <div style="text-align: left; " class="col-ml-12" >
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i> : admin-usersohou@sohou.co.id</p>
                    <p class="mb-2"><i class="fa fa-fax me-3"></i> : +62-21-8980471 </p>
                    <p class="mb-2"><i class="fa fa-phone me-3"></i> : (021) 8980268 - Jababeka </p>
                    <p class="mb-2"><i class="fa fa-phone me-3"></i> : (0231) 8826977 - Cirebon </p>
                    <p class="mb-2"><i class="fab fa-whatsapp me-3"></i>: +62 812-3456-7890</a></p>
                </div>
            </div>

    </div>
    <!-- <div class="row" style="margin-left: 70%;"> -->
    <form class="kotaknya" id="kotaknya" style="width: 50%;">
        <h2 id="judulform">Tell Us!</h2><br>

        <div class="name-container">
            <label for="firstName">First Name *</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>

        <div class="name-container">
            <label for="lastName">Last Name *</label>
            <input type="text" id="lastName" name="lastName" required>
        </div>

        <div class="name-container">
            <label for="companyEmail">Email *</label>
            <input type="email" id="companyEmail" name="companyEmail" required>
        </div>

        <div>
            <label for="phoneNumber">Phone Number</label>
            <input type="tel" id="phoneNumber" name="phoneNumber">
        </div>

        <div class="discuss-container">
            <label for="discuss">What would you like to discuss?</label>
            <textarea id="discuss" name="discuss" rows="5" placeholder="Tell what you want to ask."></textarea>
            <button type="submit" class="btn btn-lg btn-success">Send</button>
        </div>

        <div>
           
        </div>
       
     
    </form>


    <!-- </div> -->
</div>
@endsection