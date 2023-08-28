<div class="offcanvas offcanvas-start menu" data-bs-backdrop="static" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <div class="container-fluid d-flex align-items-center">
            <img src="{{ asset('assets/img/Logo.png')}}" alt="navbar-icon" class="navbar-brand-icon m-2" height="30px" width="30px">
            <span class="fw-semi-bold mobile-view">{{$school}}</span>
        </div>
      <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr>
    <div class="offcanvas-body ">
        <div class="list-group list-group-flush">
            <a href="/Student" class="list-group-item list-group-item-action active" aria-current="true"><i class="mdi mdi-account"></i> Home</a>
            
            {{-- <a href="#" class="list-group-item list-group-item-action"><i class="mdi mdi-account"></i> Button 3</a> --}}
          </div>
     
     
    </div>
</div>