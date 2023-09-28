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
            <a href="{{route('Cashier')}}" class="list-group-item list-group-item-action active" aria-current="true"><i class="mdi mdi-account"></i> Home</a>
            <a href="{{route('payment-registration')}}" class="list-group-item list-group-item-action"><i class="mdi mdi-monitor-edit"></i> Payment Registration</a>
            <a href="{{route('payment-management')}}" class="list-group-item list-group-item-action"><i class="mdi mdi-cash-register"></i> Payment Management</a>
            <a href="{{route('payment-additionals')}}" class="list-group-item list-group-item-action"><i class="mdi mdi-cash-plus"></i> Payment Additionals</a>
          </div>
     
     
    </div>
</div>