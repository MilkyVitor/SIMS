<div class="modal fade" id="viewPRDetails">
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

                <div class="modal-footer">
                    <button class="btn btn-lg btn-success pass-confirm" id="studInfoID" data-bs-toggle="modal" data-bs-target="#confirmRegistration"><i class="mdi mdi-check"></i> Confirm Payment</button>
                </div>


            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="confirmRegistration">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Confirming registration</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">

                    <form action="/mark-paid" method="POST">
                        @csrf
                        <input type="hidden" class="studInfoID" name="studInfoID">
                        <input type="hidden" class="userID" name="userID">
                    <div class="form-group col-md-12">
                        <label for="">Payment Interval</label>
                        <select name="paymentinterval" class="form-control">
                            <option disabled selected>Select</option>
                            <option value="Full_Cash">Full Cash</option>
                            <option value="Semi_Annual">Semi-Annual</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Monthly">Monthly</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">Paid for School Essentials?</label>
                        <select name="isEssentialsPaid" class="form-control">
                            <option disabled selected>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="Not_Yet">Not Yet</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-flat btn-sm btn-success"><i class="mdi mdi-check"></i> Mark as Paid</button>
            </div>

        </form>

        </div>
    </div>
</div>