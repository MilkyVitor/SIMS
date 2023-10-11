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
</div> --}}

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

<div class="modal fade" id="evaluateEnrollee">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Evaluate Student</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">
                    <form action="/accept-enrollee" method="POST">
                    @csrf
                    <div class="form-group col-md-12 p-2">
                        <input type="hidden" class="studID" name="studID">
                        <input type="hidden" id="senduserID" name="userID">
                        <input type="hidden" id="sendName" name="name">
                        <input type="hidden" id="sendEmailAddress" name="emailaddress">
                        
                        <h1 class="card-title fs-2 text-center">Pending Documents</h1>
                        <input type="checkbox"  name="documents[]" value="Birth_Certificate"> Birth Certificate <br>
                        <input type="checkbox"  name="documents[]" value="Report_Card"> Previous Report Card <br>
                        <input type="checkbox"  name="documents[]" value="Picture"> 1x1 Picture <br>
                    </div>

                    {{-- <div class="form-group col-md-12">
                        <input type="checkbox" required><em>CONFIRM THE ENROLLEE</em>
                    </div> --}}
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-flat btn-success">Enroll the Student</button>
            </div>
        </form>


        </div>
    </div>
</div>

<div class="modal fade" id="addAnnouncement" tabindex="-1" aria-expanded="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5">Add Announcement</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/addAnnouncement" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label for="">Headline</label>
                        <input type="text" class="form-control" name="headline" placeholder="Enter Headline..." required>
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" cols="5" rows="5" placeholder="Enter Description..."></textarea>
                        <label for="">Post for:</label>
                        <select name="postedAt" class="form-control" >
                            <option disabled selected>-Select-</option>
                            <option value="General">General</option>
                            <option value="Faculty">Faculty</option>
                            <option value="Students">Students</option>
                        </select>
                        <input type="hidden" name="author" value="{{auth()->user()->account_type." ".auth()->user()->name}}">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                     {{--    <label for="">Attachment</label>
                        <input type="file" name="attachment" class="form-control"> --}}
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary btn-flat"><i class="mdi mdi-send"></i> Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewAnnouncement">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">View Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">
                    <h3 class="card-title fs-4 text-center" id="Headline"></h3>
                    <img id="Image" class="img-fluid img-responsive">
                    <p id="Description" class="text-center"></p>
                    <h6 class=" fw-3">By: <span id="Author"></span></h6>
                    <h6 class=" fw-3">Date Posted: <span id="CreatedAt"></span></h6>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-flat btn-primary annID view" data-bs-toggle="modal" data-bs-target="#editAnnouncement"><i class="mdi mdi-pencil"></i> Edit</button>
                <button class="btn btn-lg btn-flat btn-danger annID view" data-bs-toggle="modal" data-bs-target="#removeAnnouncement"><i class="mdi mdi-delete"></i> Remove</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="editAnnouncement">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Announcement</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">
                        <form action="/update-announcement" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="annID" name="annID">
                    <div class="row">

                        <div class="form-group col-md-12">
                            <label for="">Headline</label>
                            <input type="text" class="form-control" name="headline" id="EHeadline" placeholder="Enter Headline..." required >
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Description</label>
                            <textarea name="description" id="EDescription" class="form-control" placeholder="Enter Description..." cols="5" rows="5"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Posted At</label>
                            <select name="postedAt" id="EPostedAt" class="form-control">
                                <option value="General">General</option>
                                <option value="Faculty">Faculty</option>
                                <option value="Students">Students</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Author</label>
                            <input type="text" name="author" id="EAuthor" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Change Image</label>
                            <input type="file" name="image" accept=".png, .jpg, .gif" class="form-control" >
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-flat btn-success  annID"><i class="mdi mdi-pencil"></i> Submit</button>
            </div>
        </form>


        </div>
    </div>
</div>

<div class="modal fade" id="removeAnnouncement">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Remove Announcement</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/remove-announcement" method="POST">
                    @csrf
                <div class="card-body text-center">
                    <input type="hidden" class="annID" name="annID">
                    <p>Are you sure to remove announcement?</p>
                    <h3 id="Delete"></h3>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-lg btn-danger btn-flat"><i class="mdi mdi-delete"></i> Remove</button>
            </div>
        </form>

        </div>
    </div>
</div>

<div class="modal fade" id="studentInfo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Student Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <legend>Personal Information</legend>
                    <hr>
                    <div class="form-group col-md-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" id="ViewFN" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" id="ViewMN" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="ViewLN" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Suffix</label>
                        <input type="text" class="form-control" id="ViewS" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Gender</label>
                        <input type="text" class="form-control" id="ViewG" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Date of Birth</label>
                        <input type="text" class="form-control" id="ViewDoB" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Place of Birth</label>
                        <input type="text" class="form-control" id="ViewPB" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" id="ViewCN" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input type="text" class="form-control" id="ViewEA" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Home Address</label>
                        <input type="text" class="form-control" id="ViewA" readonly>
                    </div>
                    <legend>Guardian Details</legend>
                    <hr>
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" id="ViewGN" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Relationship</label>
                        <input type="text" class="form-control" id="ViewGR" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" id="ViewGC" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Address</label>
                        <input type="text" class="form-control" id="ViewGA" readonly>
                    </div>
                    <legend>Academic Information</legend>
                    <hr>
                    <div class="form-group col-md-6">
                        <label>Grade Level</label>
                        <input type="text" class="form-control" id="ViewGL" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Student Type</label>
                        <input type="text" class="form-control" id="ViewST" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewSectionStudents">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <div class="modal-title fs-5">List of Students</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewStudentsInfo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Student Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <legend>Personal Information</legend>
                    <hr>
                    <div class="form-group col-md-3">
                        <label>First Name</label>
                        <input type="text" class="form-control firstname" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Middle Name</label>
                        <input type="text" class="form-control middlename" placeholder="N/A" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Last Name</label>
                        <input type="text" class="form-control lastname" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Suffix</label>
                        <input type="text" class="form-control suffix" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Gender</label>
                        <input type="text" class="form-control gender" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Date of Birth</label>
                        <input type="text" class="form-control datebirth" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Place of Birth</label>
                        <input type="text" class="form-control placebirth" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Contact Number</label>
                        <input type="text" class="form-control contactnumber" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input type="text" class="form-control emailaddress" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Home Address</label>
                        <input type="text" class="form-control homeaddress" readonly>
                    </div>
                    <legend>Guardian Information</legend>
                    <hr>
                    <div class="form-group col-md-12">
                        <label>Name</label>
                        <input type="text" class="form-control gname" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Relationship</label>
                        <input type="text" class="form-control grelationship" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Contact Number</label>
                        <input type="text" class="form-control gcontact" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Home Address</label>
                        <input type="text" class="form-control ghome" readonly>
                    </div>
                    <legend>Academic Information</legend>
                    <hr>
                    <div class="form-group col-md-6">
                        <label>Grade Level</label>
                        <input type="text" class="form-control gradelevel" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Type</label>
                        <input type="text" class="form-control studentType" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editSchedule">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Edit Schedule</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/editSchedule" method="POST">
                    @csrf
                    <input type="hidden" name="scheduleID" class="scheduleID">
                <div class="form-group col-md-12">
                    <label>Grade & Section</label>
                    <input type="text" class="form-control grade-section" name="gradesection"  readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Subject</label>
                    <input type="text" class="form-control subject" name="subject" required>
                </div>
                <div class="form-group col-md-12">
                    <label>From</label>
                    <select name="timefrom" class="form-control timefrom">
                        <option disabled selected>-Select-</option>
                        <option value="10:00am">10:00am</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label>To</label>
                    <select name="timeto" class="form-control timeto">
                        <option disabled selected>-Select-</option>
                        <option value="11:00am">11:00am</option>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label>Room</label>
                    <input type="text" class="form-control room" name="room" >
                </div>
                <div class="form-group col-md-12">
                    <label>Teacher</label>
                    <select name="teacher" class="form-control teacher">
                        <option disabled selected>-Select-</option>
                        <option value="AFASDA">AFASDA</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-md btn-flat btn-success"><i class="mdi mdi-check"></i> Update</button>
            </div>
        </form>

        </div>
    </div>
</div>

<div class="modal fade" id="removeSchedule">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Remove Schedule</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="text-center">Are you sure to remove this schedule?</p>
                <br>
                <form action="/removeSchedule" method="POST">
                    @csrf
                    <input type="hidden" class="scheduleID" name="scheduleID">
                <div class="form-group col-md-12">
                    <label>Grade & Section</label>
                    <input type="text" class="form-control grade-section"  readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Subject</label>
                    <input type="text" class="form-control subject" name="subject" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>From</label>
                    <input type="text" class="form-control timefrom" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>To</label>
                    <input type="text" class="form-control timeto" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Room</label>
                    <input type="text" class="form-control room" name="room" readonly>
                </div>
                <div class="form-group col-md-12">
                    <label>Teacher</label>
                    <input type="text" class="form-control teacher" readonly>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-md btn-flat btn-danger"><i class="mdi mdi-delete"></i> Delete</button>
            </div>
        </form>

        </div>
    </div>
</div>

<div class="modal fade" id="setGrade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Set Grade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/setGrade" method="POST">
                    @csrf
                <div class="row">
                   <input type="hidden" name="gradeID" class="gradeID">
                <div class="form-group col-md-12 text-center">
                    <label>Subject</label>
                    <input type="text" class="form-control subject text-center"  readonly>
                </div>
                <div class="form-group col-md-3">
                    <label>First</label>
                    <input type="text" class="form-control first"  name="first">
                </div>
                <div class="form-group col-md-3">
                    <label>Second</label>
                    <input type="text" class="form-control second" name="second"  >
                </div>
                <div class="form-group col-md-3">
                    <label>Third</label>
                    <input type="text" class="form-control third" name="third" >
                </div>
                <div class="form-group col-md-3">
                    <label>Final</label>
                    <input type="text" class="form-control final" name="final" >
                </div>
                </div>
            </div>

            <div class="modal-footer">
                <input type="hidden" name="studentID" class="studentID">
                <button class="btn btn-sm btn-flat btn-success"><i class="mdi mdi-check"></i> Set</button>
                </form>
            </div>
        </div>
    </div>
</div> 