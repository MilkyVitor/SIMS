@include('partials.header')
<body class="bgimage">

@include('inquiry_navbar')
@include('inquiry_modals')

    <div class="container">
        <div class="col-md-12 grid-margin stretch-card m-3">

            {{-- THE TABS --}}
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="announcement-tab" data-bs-toggle="tab" data-bs-target="#announcement-tab-pane" type="button" role="tab" aria-controls="announcement-tab-pane" aria-selected="false">Announcements</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="programs-tab" data-bs-toggle="tab" data-bs-target="#programs-tab-pane" type="button" role="tab" aria-controls="programs-tab-pane" aria-selected="false">Programs Offered</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-tab-pane" type="button" role="tab" aria-controls="about-tab-pane" aria-selected="false">About</button>
                </li>
                {{-- <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact us</button>
                </li> --}}
            </ul>

            {{-- HOME CONTENT --}}
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="row pt-3">
                        <div class="col-md-6">
                            <div class="card-body m-5 ">
                                <h1 class="display-1">{{$home->title}}</h1>
                                <p class="home-p">{{$home->sub_title}}</p>
                                <button class="btn btn-outline-primary"><i class="mdi mdi-account-circle"></i> Sign in as Student!</button>
                            </div>
                            
                    </div>
                    <div class="col-md-6">
                            <div class="card-body m-5">
                                <img src="{{asset('storage/images/'.$home->image_url)}}" alt="kids-saying-hi" class="img-responsive img-fluid d-flex justify-content-center" >
                            </div>
                    </div>
                    </div>
                </div>

                {{-- ANNOUNCEMENT CONTENT --}}
                 <div class="tab-pane fade" id="announcement-tab-pane" role="tabpanel" aria-labelledby="announcement-tab" tabindex="0">
                    <div class="row mt-5">

                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme ">
                                @foreach ($announcement as $anrow)
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

                {{-- PROGRAMS OFFERED TAB --}}
                <div class="tab-pane fade" id="programs-tab-pane" role="tabpanel" aria-labelledby="programs-tab" tabindex="0">
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

                 {{-- ABOUT TAB --}}
                 <div class="tab-pane fade" id="about-tab-pane" role="tabpanel" aria-labelledby="about-tab" tabindex="0">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mt-5">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/Logo.png')}}" alt="School Logo" class="img-fluid img-responsive m-3 about-logo" height="100vm" width="100vm">
                                        <h3 class="display-3 text-center about-h3 ">About us</h3>    
                                    </div>
                                    <p class="text-center about-p">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur, hic! Ipsam laborum at minus quibusdam ducimus dolores ullam inventore culpa natus impedit accusamus, qui numquam sed quam dignissimos distinctio quos! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus illo eveniet quod architecto illum doloribus recusandae, excepturi tempore expedita veritatis asperiores pariatur odit numquam, assumenda nulla reiciendis. Officiis, sed sequi.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-12 mt-5">
                                <div class="card-body">
                                    <h3 class="card-title mission-h3">Mission</h3>
                                    <p class="mission-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, aut at cumque iste iusto reiciendis sed quibusdam deleniti consequatur corrupti, vel iure enim atque quasi! Dolore provident in molestiae quo?</p>
                                </div>
                            </div>

                            <div class="col-md-12 mt-5">
                                <div class="card-body">
                                    <h3 class="card-title mission-h3">Vision</h3>
                                    <p class="mission-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, aut at cumque iste iusto reiciendis sed quibusdam deleniti consequatur corrupti, vel iure enim atque quasi! Dolore provident in molestiae quo?</p>
                                </div>
                            </div>
                        </div>

                    </div>
                 </div>
                {{-- <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0"><h1>Contact</h1></div>  --}}
              </div>

        </div>
       
    </div>
    
</body>


@include('partials.footer')

