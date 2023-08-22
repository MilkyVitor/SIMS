<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('assets/img/Logo.png')}}" alt="navbar-icon" class="navbar-brand-icon m-2" height="30px" width="30px">
            <span class="navbar-brand-name text-white nav-title mobile-view">{{$title}}</span>
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex justify-content-center">
              <button class="nav-link text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="mdi mdi-menu"></i> Menu 
              </button>
             <form action="/general-announcements" method="POST" class="text-decoration-none">
                @csrf
                <input type="hidden" name="accountType" value="{{auth()->user()->account_type}}">
                <button class="nav-link text-white" type="submit"><i class="mdi mdi-bullhorn-variant"></i> Announcements </button>
            </form> 
              <form action="/general-prog-offered" method="POST" class="text-decoration-none">
                @csrf
                <input type="hidden" name="accountType" value="{{auth()->user()->account_type}}">
                <button class="nav-link text-white"><i class="mdi mdi-offer"></i> Programs Offered</button>
              </form>
            <div class="dropdown d-flex justify-content-center"">
                <button class="btn btn-flat dropdown-toggle nav-link text-white"  data-bs-toggle="dropdown" aria-expanded="false">
                    Settings
                </button>

                  <ul class="dropdown-menu px-5 dropdown-menu-end" >
                    <div class=" text-center d-flex align-items-center ">
                        <img src="{{asset('assets/img/Logo.png')}}" alt="" class="img-responsive img-fluid me-2" height="40px" width="40px">
                        <h5 class="card-title fw-bold">{{auth()->user()->name}}</h5>
                    </div>
                    <hr>
                    <li><a class="dropdown-item" href="#"><i class="mdi mdi-account"></i>See my profile</a></li>
                    <li><a class="dropdown-item" href="/logout-admin"><i class="mdi mdi-logout"></i> Sign Out</a></li>
                  </ul>

            </div>
                   
            </ul>
        </div>
        
    </div>

</nav>