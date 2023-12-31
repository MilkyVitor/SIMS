{{-- <div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Template</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

            </div>

            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>  --}}

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

<div class="modal fade" id="viewTransactInfo">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">View Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label> Evaluated By: </label>
                    <input type="text" class="form-control evaluatedBy" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label> Amount: </label>
                    <input type="text" class="form-control amount" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label> Attachment: </label>
                    <img class="form-control imagepreview img-fluid img-responsive" >
                </div>
            </div>

        </div>
    </div>
</div> 

<div class="modal fade" id="setTransactInfo">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Set Transaction</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label> Amount: </label>
                    <input type="text" class="form-control amount" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label> Attachment: </label>
                    <img class="form-control imagepreview img-fluid img-responsive" >
                </div>
            </div>

            <div class="modal-footer">
                <form action="/setPaid" method="POST">
                    @csrf
                    <input type="hidden" class="transactID" name="transactID">
                    <input type="hidden" class="paymentinfoID" name="paymentinfoID">
                    <input type="hidden" value="{{auth()->user()->name}}" name="evaluator">
                    <button class="btn btn-lg btn-success"><i class="mdi mdi-check"></i> Set Paid</button>
                </form>
            </div>

        </div>
    </div>
</div> 

<div class="modal fade" id="viewDetails">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">View Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label>Title</label>
                    <input type="text" class="form-control title" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Description</label>
                    <textarea name="description" class="form-control description" rows="5" readonly></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Amount</label>
                    <input type="text" class="form-control amount" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Issued By</label>
                    <input type="text" class="form-control issuedBy" readonly>
                </div>
            </div>

            <div class="modal-footer">
                <form action="/viewListStudents" method="POST">
                    @csrf
                    <input type="hidden" class="billID" name="billID">
                    <button class="btn btn-lg btn-flat btn-primary"> <i class="mdi mdi-list-status"></i> List of Students </button>
                </form>
            </div>

        </div>
    </div>
</div> 

<div class="modal fade" id="editDetails">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <form action="/editDetails" method="POST">
                    @csrf
                    <input type="hidden" class="billID" name="billID">
                <div class="form-group col-md-12">
                    <label>Title</label>
                    <input type="text" class="form-control title" name="title">
                </div>
                <div class="form-group col-md-12">
                    <label>Description</label>
                    <textarea name="description" class="form-control description" rows="5" name="description"></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Amount</label>
                    <input type="text" class="form-control amount" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Issued By</label>
                    <input type="text" class="form-control issuedBy" readonly>
                </div>
            </div>

            <div class="modal-footer">
              
                    <button class="btn btn-lg btn-flat btn-primary"> <i class="mdi mdi-pencil"></i> Edit </button>
                </form>
            </div>

        </div>
    </div>
</div> 

<div class="modal fade" id="setPaidAdditionals">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Set as Paid</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <p class="text-center">Are you sure to set this student as paid for <span class="title"></span></p>
                <h1 class="student text-center" style="color:black"></h1>
            </div>

            <div class="modal-footer">
                <form action="/setPaidAdd" method="POST">
                    @csrf
                    <input type="hidden" class="ID" name="ID">
                    <button class="btn btn-lg btn-flat btn-success"><i class="mdi mdi-pencil"></i> Set as Paid</button>
                </form>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="issueAdditionals">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Issue Additionals</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/issueAdd" method="POST">
                    @csrf
                    <input type="hidden" value="{{auth()->user()->name}}" name="issuer">
                <div class="form-group col-md-12">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Enter Title..." required>
                </div>
                <div class="form-group col-md-12">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="10" placeholder="Enter Description..." required></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="Enter Amount..." required>
                </div>
                <div class="form-group col-md-12">
                    <label>Grade</label>
                    <select name="grade" class="form-control" required>
                        <option disabled selected>-Select-</option>
                        <option value="Grade-1">Grade 1</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                    <button class="btn btn-lg btn-flat btn-success"><i class="mdi mdi-send"></i> Issue</button>
                </form>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="editNumber">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Number</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <form action="/editNumber" method="POST">
                    @csrf
                    <input type="hidden" class="ID" name="ID">
                <div class="form-group col-md-12">
                    <label>Account Name:</label>
                    <input type="text" class="form-control name" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Account Number:</label>
                    <input type="text" class="form-control number" name="number" placeholder="Enter Number..." required>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-sm btn-flat btn-success"><i class="mdi mdi-pencil"></i> Update</button>
            </form>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="deleteNumber">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Delete Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="text-center">Are you sure to delete this info?</p>
                <h1 class="dname text-center" style="color:black"></h1>
            </div>

            <div class="modal-footer">
                <form action="/deleteNumber" method="POST">
                    @csrf
                    <input type="hidden" class="ID" name="ID">
                    <button class="btn btn-lg btn-flat btn-danger"><i class="mdi mdi-delete"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div> 