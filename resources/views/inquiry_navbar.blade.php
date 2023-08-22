<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('assets/img/Logo.png')}}" alt="navbar-icon" class="navbar-brand-icon m-2" height="30px" width="30px">
            <span class="navbar-brand-name text-white nav-title mobile-view">{{$title}}</span>
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon" style="color:white"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
              
                <li class="nav-item d-flex justify-content-center">
                    <button class="btn btn-flat nav-link text-white" data-bs-toggle="modal" data-bs-target="#loginModal"> <span class="nav-span"><i class="mdi mdi-account-group"></i> Faculty Sign In</span></button></a>
                </li> 
                   
            </ul>
        </div>
    </div>

</nav>
