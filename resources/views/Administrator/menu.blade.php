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
            <a href="{{route('Administrator')}}" class="list-group-item list-group-item-action active" aria-current="true"><i class="mdi mdi-account"></i> Home</a>
            <a href="{{route('update-master-page')}}" class="list-group-item list-group-item-action"><i class="mdi mdi-monitor-edit"></i> Update Master Page</a>
            <a href="{{route('control-panel')}}" class="list-group-item list-group-item-action"><i class="mdi mdi-toggle-switch"></i> Control Panel</a>
            <a href="{{route('academic-records')}}" class="list-group-item list-group-item-action"><i class="mdi mdi-archive-arrow-up-outline"></i> Academic Records</a>
            <a href="{{route('class-management')}}" class="list-group-item list-group-item-action"><i class="mdi mdi-cog-outline"></i> Class Management</a>
            <a href="/adminfeedback" class="list-group-item list-group-item-action"><i class="mdi mdi-comment-account-outline"></i> Feedback</a>
            <a href="{{route('master-control')}}" class="list-group-item list-group-item-action"><i class="mdi mdi-wrench-cog-outline"></i> Master Control</a>
          </div>
     
     
    </div>
</div>