@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include($folder.'.menu')

    <div class="container">
        <div class="row mt-5">

            <div class="col-md-12">
                <div class="owl-carousel owl-theme ">
                    @foreach ($data as $anrow)
                        <div class="item">
                            {{-- <div class="card border-0 shadow"> --}}
                                <img src="{{asset('assets/img/'. $anrow->Image)}}" alt="" class="card-img-top img-fluid img-responsive">
                                <div class="card-body">
                                    <div class="card-title text-center">
                                        <h2 class="ann-h2">{{$anrow->Headline}}</h2>
                                        <p class="ann-p">{{$anrow->Description}}</p>
                                    </div>
                                </div>
                            {{-- </div> --}}
                        </div>  
                    @endforeach
                </div>
            </div>

         </div>
    </div>

</body>

@include('./partials.footer')