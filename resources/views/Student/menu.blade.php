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
            <a href="/Student" class="list-group-item list-group-item-action" aria-current="true"><i class="mdi mdi-account"></i> Home</a>
            <a href="/schedule" class="list-group-item list-group-item-action" aria-current="false"><i class="mdi mdi-clock-outline"></i> Schedule</a>
            <a href="/payment-records" class="list-group-item list-group-item-action" aria-current="false"><i class="mdi mdi-clipboard-text-multiple-outline"></i> Payment Records</a>
            <a href="/feedback" class="list-group-item list-group-item-action" aria-current="false"><i class="mdi mdi-comment"></i> Feedback</a>
            <a href="/grades-view" class="list-group-item list-group-item-action" aria-current="false"><i class="mdi mdi-table-eye"></i> Grades View</a>
            <a href="/document-request" class="list-group-item list-group-item-action" aria-current="false"><i class="mdi mdi-file"></i> Document Request</a>
            <a href="/promote-gradelevel" class="list-group-item list-group-item-action" aria-current="false"><i class="mdi mdi-transfer-up"></i> Promote Grade</a>
            
          </div>
     
     
    </div>
</div>