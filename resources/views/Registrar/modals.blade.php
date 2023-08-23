<div class="modal fade" id="viewStudentRegistration">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5">Student Information</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">

                    <div class="card-title fs-5 text-center">Review Information</div>
                    <hr>
                    <form action="/send-registration" method="POST">
                        @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="">First Name</label>
                             <input type="text" name="firstname" id="FirstName" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Middle Name</label>
                            <input type="text" name="middlename" id="MiddleName" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Last Name</label>
                            <input type="text" name="lastname" id="LastName" class="form-control">
                        </div>
                      
                    </div>
                    
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success btn-lg"><i class="mdi mdi-arrow-right"></i> Proceed to Payment</button>
            </div>
            </form>
        </div>
    </div>
</div>