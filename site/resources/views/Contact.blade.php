@extends('layout.app')
@section('tittle', 'Contact')
@section('content')
    @include('layout.menu')
    <div class="container-fluid jumbotron mt-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6  text-center ">
               <i style="font-size:50px" class="fas fa-address-card"></i>
                <h1 class="page-top-title mt-3">- CONTACT -</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d471218.38559717475!2d88.04952484283032!3d22.676385756918386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1613994130863!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="col-md-4 offset-1 contact-form mt-0">
                <p class="footer-text"><i class="fas fa-map-marker-alt"></i> শেখেরটেক ৮ মোহাম্মদপুর, ঢাকা </p>
                <p class="footer-text"><i class="fas fa-phone"></i> ০১৭৮৫৩৮৮৯১৯ </p>
                <p class="footer-text"><i class="fas fa-envelope"></i> Rabbil@Yahoo.com</p>

                <h5 class="service-card-title">যোগাযোগ করুন </h5>
                <div class="form-group ">
                    <input type="text" id="contactNameId" class="form-control w-100" placeholder="আপনার নাম">
                </div>
                <div class="form-group">
                    <input type="text" id="contacMobileId" class="form-control  w-100" placeholder="মোবাইল নং ">
                </div>
                <div class="form-group">
                    <input type="text" id="contactEmailId" class="form-control  w-100" placeholder="ইমেইল ">
                </div>
                <div class="form-group">
                    <input type="text" id="contactMsgId" class="form-control  w-100" placeholder="মেসেজ ">
                </div>
                <button id='contactSend' class="btn btn-block normal-btn w-100">পাঠিয়ে দিন </button>
            </div>



        </div>
    </div>

    @include('layout.Footer')
@endsection
