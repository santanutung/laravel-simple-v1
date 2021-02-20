@extends('layout.app')
@section('tittle', 'home')
@section('content')
    @include('layout.menu')
    @include('components.homeBanner')
    @include('components.service')
    @include('components.course')
    @include('components.project')










    <div class="container-fluid section-marginTop parallax text-center">
        <div class="row ">
            <div class="col-md-6 contact-form ">
                <h5 class="help-line-title"> <i class="fas icon-custom-color fa-headphones-alt"></i> হেলপ লাইন </h5>
                <h5 class="help-line-title m-0"> ০১৭৭৪৬৮৮১৫৯ </h5>
            </div>
            <div class="col-md-4 contact-form">
                <h5 class="service-card-title">যোগাযোগ করুন </h5>
                <div class="form-group ">
                    <input type="text" class="form-control w-100" placeholder="আপনার নাম">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control  w-100" placeholder="মোবাইল নং ">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control  w-100" placeholder="ইমেইল ">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control  w-100" placeholder="মেসেজ ">
                </div>
                <button type="submit" class="btn btn-block normal-btn w-100">পাঠিয়ে দিন </button>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>




    <div class="container section-marginTop text-center">
        <h1 class="section-title">সাম্প্রতিক ব্লগ </h1>
        <h1 class="section-subtitle">আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি </h1>
        <div class="row">
            <div class="col-md-4  p-2 ">
                <div class="card">
                    <img class="w-100" src="images/blog.jpg" alt="Card image cap">
                    <div class="w-100 p-4">
                        <h5 class="blog-card-title text-justify  mt-2">ফ্লাটার কেনো শিখবেন, কেনো শিখবেন না </h5>
                        <h6 class="blog-card-subtitle text-justify p-0 ">মোবাইল স্ক্রিনের বিবর্তন হলো যেভাবে. আইবিএম সায়মন:
                            প্রথম মোবাইল ফোন যারা টাচস্ক্রীন প্রযুক্তি এনেছিল। তবে ফোনটির ব্যাটারি মাত্র এক ঘণ্টা স্থায়ী
                            হতো।</h6>
                        <h6 class="blog-card-date text-justify "> <i class="far fa-clock"></i> ২৪/০৫/২০২০</h6>
                        <button class="normal-btn-outline float-left mt-2 mb-4 btn">আরো পড়ুন </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4  p-2 ">
                <div class="card">
                    <img class="w-100" src="images/blog.jpg" alt="Card image cap">
                    <div class="w-100 p-4">
                        <h5 class="blog-card-title text-justify  mt-2">ফ্লাটার কেনো শিখবেন, কেনো শিখবেন না </h5>
                        <h6 class="blog-card-subtitle text-justify p-0 ">মোবাইল স্ক্রিনের বিবর্তন হলো যেভাবে. আইবিএম সায়মন:
                            প্রথম মোবাইল ফোন যারা টাচস্ক্রীন প্রযুক্তি এনেছিল। তবে ফোনটির ব্যাটারি মাত্র এক ঘণ্টা স্থায়ী
                            হতো।</h6>
                        <h6 class="blog-card-date text-justify "> <i class="far fa-clock"></i> ২৪/০৫/২০২০</h6>
                        <button class="normal-btn-outline float-left mt-2 mb-4 btn">আরো পড়ুন </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4  p-2 ">
                <div class="card">
                    <img class="w-100" src="images/blog.jpg" alt="Card image cap">
                    <div class="w-100 p-4">
                        <h5 class="blog-card-title text-justify  mt-2">ফ্লাটার কেনো শিখবেন, কেনো শিখবেন না </h5>
                        <h6 class="blog-card-subtitle text-justify p-0 ">মোবাইল স্ক্রিনের বিবর্তন হলো যেভাবে. আইবিএম সায়মন:
                            প্রথম মোবাইল ফোন যারা টাচস্ক্রীন প্রযুক্তি এনেছিল। তবে ফোনটির ব্যাটারি মাত্র এক ঘণ্টা স্থায়ী
                            হতো।</h6>
                        <h6 class="blog-card-date text-justify "> <i class="far fa-clock"></i> ২৪/০৫/২০২০</h6>
                        <button class="normal-btn-outline float-left mt-2 mb-4 btn">আরো পড়ুন </button>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="container section-marginTop text-center">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 text-center">
                <div id="two" class="owl-carousel mb-4 owl-theme">
                    <div class="item m-1 text-center ">
                        <img class="review-img text-center" src="images/bill.jpg" alt="Card image cap">
                        <h5 class="service-card-title mt-3">বিল গেটস </h5>
                        <h6 class="service-card-subTitle p-0 m-0">মাইক্রোসফটের প্রতিষ্ঠাতা বিল গেটসের জীবন কেটেছে নানা ঘটনার
                            মধ্য দিয়ে। হার্ভার্ড বিশ্ববিদ্যালয়ে লেখাপড়া শেষ না করেই মাইক্রোসফট প্রতিষ্ঠা করা</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="jumbotron  jumbotron-fluid section-marginTop mb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-6">
                    <h3 class="service-card-title">অনুসরণ </h3>
                    <hr>
                    <p><a target="_blank" href="" class="footer-link"><i class="fab fa-facebook-f"></i> ফেছবুক </a></p>
                    <p><a target="_blank" href="" class="footer-link"><i class="fab fa-youtube"></i> ইউটিউব </a></p>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6">
                    <h3 class="service-card-title">ঠিকানা</h3>
                    <hr>
                    <p class="footer-text"><i class="fas fa-map-marker-alt"></i> শেখেরটেক ৮ মোহাম্মদপুর, ঢাকা </p>
                    <p class="footer-text"><i class="fas fa-phone"></i> ০১৭৮৫৩৮৮৯১৯ </p>
                    <p class="footer-text"><i class="fas fa-envelope"></i> Rabbil@Yahoo.com</p>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6">
                    <h3 class="service-card-title">তথ্য </h3>
                    <hr>
                    <a class="footer-link" target="_blank" href="http://rabbil.com/">যোগাযোগ</a><br>
                    <a class="footer-link" target="_blank" href="http://rabbil.com/">প্রজেক্ট সমূহ</a><br>
                    <a class="footer-link" target="_blank" href="http://rabbil.com/">কোর্স সমূহ </a><br>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6">
                    <h3 class="service-card-title">আইনি</h3>
                    <hr>
                    <a class="footer-link" target="_blank" href="">ফেরত নীতি</a><br>
                    <a class="footer-link" target="_blank" href="">শর্ত সমূহ </a><br>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white m-0 text-center p-3">
        <p class="rights-text  my-2 ">সর্বস্বত্ব রাব্বিল হাসান দ্বারা সংরক্ষিত; ২০১৯-২০২০ </p>
    </div>
@endsection