@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include($folder.'.menu')

    <div class="container">
        <div class="row mt-5">

            <div class="col-md-12">

                <div class="owl-carousel owl-theme ">

                    <div class="item">
                            <img src="{{asset('assets/img/P1.png')}}" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4 class="prog-h4">Homeschool Program</h4>
                                </div>
                            </div>
                    </div>

                    <div class="item">
                            <img src="{{asset('assets/img/P2.png')}}"" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4 class="prog-h4">Online Education</h4>
                                </div>
                            </div>
                    </div>

                    <div class="item">
                            <img src="{{asset('assets/img/P3.png')}}" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4 class="prog-h4">Hybrid Education</h4>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
@include('./partials.footer')
