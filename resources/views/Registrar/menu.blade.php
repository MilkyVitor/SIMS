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
            <a href="/Registrar" class="list-group-item list-group-item-action" aria-selected="true"><i class="mdi mdi-account"></i> Home</a>
            <a href="/announcement" class="list-group-item list-group-item-action" aria-selected="true"><i class="mdi mdi-bulletin-board"></i> Announcement Management</a>
            <a href="/student-registration" class="list-group-item list-group-item-action" aria-selected="true"><i class="mdi mdi-account-multiple-plus"></i> Students Management</a>
            <a href="/class-manage" class="list-group-item list-group-item-action" aria-selected="true"><i class="mdi mdi-google-classroom"></i> Class Management</a>
            <a href="/grade-manage" class="list-group-item list-group-item-action" aria-selected="true"><i class="mdi mdi-pencil-box-multiple"></i> Grade Management </a>
            <a href="/document-requests" class="list-group-item list-group-item-action" aria-selected="true"><i class="mdi mdi-file-sign"></i> Document Request Management</a>
          </div>
     
     
    </div>
</div>