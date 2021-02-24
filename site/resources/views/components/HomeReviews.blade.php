<div class="container section-marginTop text-center">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 text-center">
            @foreach ($Reviews_data as $Reviews)
                <div id="two" class="owl-carousel mb-4 owl-theme">
                    <div class="item m-1 text-center ">
                        <img class="review-img text-center" src="{{ $Reviews->img }}" alt="Card image cap">
                        <h5 class="service-card-title mt-3">{{ $Reviews->name }} </h5>
                        <h6 class="service-card-subTitle p-0 m-0">{{ $Reviews->des }}</h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
