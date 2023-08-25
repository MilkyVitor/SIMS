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
                        <legend>Personal Information</legend>
                        <hr>
                        <div class="form-group col-md-3">
                            <label for="">First Name</label>
                             <input type="text" name="firstname" id="FirstName" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Middle Name</label>
                            <input type="text" name="middlename" id="MiddleName" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Last Name</label>
                            <input type="text" name="lastname" id="LastName" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Suffix</label>
                            <input type="text" name="suffix" id="Suffix" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Gender</label>
                            <input type="text" name="gender" id="Gender" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Date of Birth</label>
                            <input type="date" name="datebirth" id="DateBirth" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Place of Birth</label>
                            <input type="text" name="placebirth" id="PlaceBirth" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Contact Number</label>
                            <input type="text" name="contactnumber" id="ContactNumber" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email Address</label>
                            <input type="text" name="emailaddress" id="EmailAddress" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Home Address</label>
                            <input type="text" name="homeaddress" id="HomeAddress" class="form-control" readonly>
                        </div>
                        <legend>Contact Information</legend>
                        <hr>
                        <div class="form-group col-md-6">
                            <label for="">Guardian Name</label>
                            <input type="text" name="guardianName" id="GuardianName" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Guardian Relationship</label>
                            <input type="text" name="guardianrelation" id="GuardianRelation" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Guardian Contact Number</label>
                            <input type="text" name="guardiancontact" id="GuardianContact" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Guardian Address</label>
                            <input type="text" name="guardianaddress" id="GuardianAddress" class="form-control" readonly>
                        </div>
                        <legend>Preferences</legend>
                        <hr>
                        <div class="form-group col-md-3">
                            <label for="">Grade Level</label>
                            <input type="text" name="gradelevel" id="GradeLevel" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Student Type</label>
                            <input type="text" name="studentType" id="StudentType" class="form-control" readonly>
                        </div>
                      
                    </div>
                    
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success btn-lg"><i class="mdi mdi-send"></i> Submit to Payment</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewSRDetails">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">View Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">

                    <div class="row">
                        <legend>Personal Information</legend>
                        <hr>
                        <div class="form-group col-md-3">
                            <label for="">First Name</label>
                             <input type="text" name="firstname" id="DFirstName" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Middle Name</label>
                            <input type="text" name="middlename" id="DMiddleName" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Last Name</label>
                            <input type="text" name="lastname" id="DLastName" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Suffix</label>
                            <input type="text" name="suffix" id="DSuffix" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Gender</label>
                            <input type="text" name="gender" id="DGender" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Date of Birth</label>
                            <input type="date" name="datebirth" id="DDateBirth" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Place of Birth</label>
                            <input type="text" name="placebirth" id="DPlaceBirth" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Contact Number</label>
                            <input type="text" name="contactnumber" id="DContactNumber" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email Address</label>
                            <input type="text" name="emailaddress" id="DEmailAddress" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Home Address</label>
                            <input type="text" name="homeaddress" id="DHomeAddress" class="form-control" readonly>
                        </div>
                        <legend>Contact Information</legend>
                        <hr>
                        <div class="form-group col-md-6">
                            <label for="">Guardian Name</label>
                            <input type="text" name="guardianName" id="DGuardianName" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Guardian Relationship</label>
                            <input type="text" name="guardianrelation" id="DGuardianRelation" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Guardian Contact Number</label>
                            <input type="text" name="guardiancontact" id="DGuardianContact" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Guardian Address</label>
                            <input type="text" name="guardianaddress" id="DGuardianAddress" class="form-control" readonly>
                        </div>
                        <legend>Preferences</legend>
                        <hr>
                        <div class="form-group col-md-3">
                            <label for="">Grade Level</label>
                            <input type="text" name="gradelevel" id="DGradeLevel" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Student Type</label>
                            <input type="text" name="studentType" id="DStudentType" class="form-control" readonly>
                        </div>
                      
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>