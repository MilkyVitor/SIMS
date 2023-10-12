@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

    <main class="container">
       <div class="m-4">
        <a href="/master-control">
            <button class="btn btn-sm btn-flat btn-success"><i class="mdi mdi-arrow-left"></i> Back</button>
        </a>
       </div>

       <h1 class="text-white d-flex justify-content-center">Student Registration (Admin)</h1>
        <hr class="white-line">

        @if(session('success'))
            <script>
                Swal.fire({
                    title:'Success!',
                    icon:'success',
                    html: `{{session('success')}}`,
                    showConfirmButton: true
                });
            </script>
        @elseif(session('error'))
        <script>
                Swal.fire({
                    title:'Success!',
                    icon:'success',
                    html: `{{session('error')}}`,
                    showConfirmButton: true
                });
            </script>
        @endif

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-sr-tab" data-bs-toggle="tab" data-bs-target="#nav-sr" type="button" role="tab" aria-controls="nav-sr" aria-selected="true">Student Registration </button>
                <button class="nav-link" id="nav-pr-tab" data-bs-toggle="tab" data-bs-target="#nav-pr" type="button" role="tab" aria-controls="nav-pr" aria-selected="true">Initial Payment </button>
                <button class="nav-link" id="nav-fe-tab" data-bs-toggle="tab" data-bs-target="#nav-fe" type="button" role="tab" aria-controls="nav-fe" aria-selected="true">For Enrollment </button>
                <button class="nav-link" id="nav-s-tab" data-bs-toggle="tab" data-bs-target="#nav-s" type="button" role="tab" aria-controls="nav-s" aria-selected="true">Students </button>

            </div>
        </nav>
        
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-sr" role="tabpanel" aria-labelledby="nav-sr-tab" tabindex="0">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card m-1 overflow-y-auto">

                        <div class="card-body">
                                <div class="row">
                                    <legend>Personal Information</legend>
                                    <hr>
                                    <div class="form-group col-md-3">
                                        <label for="">First Name</label>
                                        <input type="text" class="form-control" name="" id="firstname" placeholder="Enter First Name" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Middle Name</label>
                                        <input type="text" class="form-control" name="" id="middlename" placeholder="Enter Middle Name " required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control" name="" id="lastname" placeholder="Enter Last Name" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Suffix</label>
                                        <input type="text" class="form-control" name="" id="suffix" placeholder="Jr/ III " required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Gender</label>
                                        <select name="" id="gender" class="form-control">
                                            <option disabled selected>Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Undecided">Undecided</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Date of Birth</label>
                                        <input type="date" class="form-control" name="" id="datebirth" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Place of Birth</label>
                                        <input type="text" class="form-control" name="" id="placebirth" placeholder="Enter Place of Birth" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Contact Number</label>
                                        <input type="text" class="form-control" name="" id="contactnumber" placeholder="Enter " required>
                                        
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Email Address</label>
                                        <input type="email" class="form-control" name=""  placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Confirm Email Address</label>
                                        <input type="email" class="form-control" name="" id="emailaddress" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Home Address</label>
                                        <input type="text" class="form-control" name="" id="homeaddress" placeholder="Enter Home/Current Address" required>
                                    </div>


                                    <legend>Contact Information</legend>
                                    <hr>
                                    <div class="form-group col-md-3">
                                        <label for="">Guardian Name</label>
                                        <input type="text" class="form-control" name="" id="guardianName" placeholder="Enter" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Guardian Relationship</label>
                                        <input type="text" class="form-control" name="" id="guardianrelation" placeholder="Ex. Mother/Father/Aunt" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Guardian Contact Number</label>
                                        <input type="text" class="form-control" name="" id="guardiancontact" placeholder="Enter" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Guardian Home Address</label>
                                        <input type="text" class="form-control" id="guardianaddress" placeholder="Enter Guardian Address" required>
                                        <input type="checkbox" name="" id="">Same as Current Address
                                    </div>

                                    <legend>Preferences</legend>
                                    <hr>
                                    <div class="form-group col-md-3">
                                        <label for="">Grade Level to Enroll</label>
                                        <select name="" id="gradelevel" class="form-control" required>
                                            <option selected disabled>Select</option>
                                            <option value="Grade-1">Grade 1</option>
                                            <option value="Grade-2">Grade 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Student Type</label>
                                        <select name="" id="studentType" class="form-control" required>
                                            <option selected disabled>Select</option>
                                            <option value="Old-Student">Old Student</option>
                                            <option value="Transferee">Transferee</option>
                                            <option value="Returnee">Returnee</option>
                                            <option value="Starter">Starter</option>
                                        </select>
                                    </div>



                                </div>
                            
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary btn-lg view" data-bs-toggle="modal" data-bs-target="#viewStudentRegistration"><i class="mdi mdi-account-plus"></i> Register</button>
                        </div>

                    </div>
                </div>


            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show" id="nav-pr" role="tabpanel" aria-labelledby="nav-pr-tab" tabindex="0">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card m-1 overflow-y-auto">

                        <div class="card-body">
                            <table class="table table-striped data-table" >
    
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Date of Registration</th>
                                        <th>Tools</th>
                                    </tr>
                                    
                                </thead>
    
                                <tbody>
                                    @foreach ($prdata as $prrow)
                                        <tr>
                                            <td>{{$prrow->ID}}</td>
                                            <td>{{$prrow->first_name." ".$prrow->last_name}}</td>
                                            <td>{{$prrow->created_at->format('F d, Y')}}</td>
                                            <td>
                                                <button class="btn btn-outline-success btn-sm btn-flat view-pr" data-bs-id="{{$prrow->ID}}" data-bs-toggle="modal" data-bs-target="#viewPRDetails">View Details</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
    
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show" id="nav-fe" role="tabpanel" aria-labelledby="nav-fe-tab" tabindex="0">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card m-1 overflow-y-auto">

                        <div class="card-body">
                            <table class="table table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Date Registered</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach ($enrollee as $enrow)
                                        <tr>
                                            <td>{{$enrow->ID}}</td>
                                            <td>{{$enrow->first_name." ".$enrow->last_name}}</td>
                                            <td>{{$enrow->created_at->format('F d, Y')}}</td>
                                            <td>
                                                <button class="btn btn-flat btn-sm btn-outline-success accept" data-bs-id="{{$enrow->ID}}" data-bs-toggle="modal" data-bs-target="#evaluateEnrollee"><i class="mdi mdi-check"></i> Evaluate</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
    
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show" id="nav-s" role="tabpanel" aria-labelledby="nav-s-tab" tabindex="0">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card m-1 overflow-y-auto">

                        <div class="card-body">
                            <table class="table table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Date Enrolled</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>

                                <tbody>
                                   @foreach ($students as $row)
                                       <tr>
                                            <td>{{$row->ID}}</td>
                                            <td>{{$row->first_name." ".$row->last_name }}</td>
                                            <td>{{$row->updated_at->format('F d, Y')}}</td>
                                            <td>
                                                <button class="btn btn-flat btn-sm btn-success view-student" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#studentInfo" >View</button>
                                            </td>
                                       </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div> 

    </main>

</body>

<script>
    $(function () {
        $('.view').click(function(e) {
            e.preventDefault();
            var firstName = $('#firstname').val();
            var middleName = $('#middlename').val();
            var lastName = $('#lastname').val();
            var suffix = $('#suffix').val();
            var gender = $('#gender').val();
            var datebirth = $('#datebirth').val();
            var placebirth = $('#placebirth').val();
            var contactnumber = $('#contactnumber').val();
            var emailaddress = $('#emailaddress').val();
            var homeaddress = $('#homeaddress').val();
            var guardianName = $('#guardianName').val();
            var guardianrelation = $('#guardianrelation').val();
            var guardiancontact = $('#guardiancontact').val();
            var guardianaddress = $('#guardianaddress').val();
            var gradelevel = $('#gradelevel').val();
            var studentType = $('#studentType').val();
                $('#FirstName').val(firstName);
                $('#MiddleName').val(middleName);
                $('#LastName').val(lastName);
                $('#Suffix').val(suffix);
                $('#Gender').val(gender);
                $('#DateBirth').val(datebirth);
                $('#PlaceBirth').val(placebirth);
                $('#ContactNumber').val(contactnumber);
                $('#EmailAddress').val(emailaddress);
                $('#HomeAddress').val(homeaddress);
                $('#GuardianName').val(guardianName);
                $('#GuardianRelation').val(guardianrelation);
                $('#GuardianContact').val(guardiancontact);
                $('#GuardianAddress').val(guardianaddress);
                $('#GradeLevel').val(gradelevel);
                $('#StudentType').val(studentType);
                console.log(guardiancontact);
        });

        $('.view-pr').click(function(e) {
            e.preventDefault();
            var pr = $(this).data('bs-id');
            getprData(pr);
        });

        $('.view-student').click(function(e) {
            e.preventDefault();
            var pr = $(this).data('bs-id');
            getprData(pr);
        });

        $('.accept').click(function(e) {
            e.preventDefault();
            var pr = $(this).data('bs-id');
            getprData(pr);
        });
     
    });

    function getprData(id) {
        $.ajax({
            method: 'GET',
            url: '/prData/' + id,
            success: function(response) {
                console.log(response);
                $('.studInfoID').val(response.data.ID);
                    $('.userID').val(response.data.user_id);
                    $('#studInfoID').val(response.data.ID);
                    $('#DFirstName').val(response.data.first_name);
                    $('#DMiddleName').val(response.data.middle_name);
                    $('#DLastName').val(response.data.last_name);
                    $('#DSuffix').val(response.data.suffix);
                    $('#DGender').val(response.data.gender);
                    $('#DDateBirth').val(response.data.date_birth);
                    $('#DPlaceBirth').val(response.data.place_birth);
                    $('#DContactNumber').val(response.data.contact_number);
                    $('#DEmailAddress').val(response.data.email_address);
                    $('#DHomeAddress').val(response.data.student_address);
                    $('#DGuardianName').val(response.data.guardian_name);
                    $('#DGuardianRelation').val(response.data.guardian_relation);
                    $('#DGuardianContact').val(response.data.guardian_contact);
                    $('#DGuardianAddress').val(response.data.guardian_address);
                    $('#DGradeLevel').val(response.data.grade_level);
                    $('#DStudentType').val(response.data.student_type);
                    $('.sendName').val(response.data.first_name+' '+response.data.last_name);
                    $('.sendEmailAddress').val(response.data.email_address);
                    $('.firstname').val(response.data.first_name);
                    $('.middlename').val(response.data.middle_name);
                    $('.lastname').val(response.data.last_name);
                    $('.suffix').val(response.data.suffix);
                    $('.gender').val(response.data.gender);
                    $('.datebirth').val(response.data.date_birth);
                    $('.placebirth').val(response.data.place_birth);
                    $('.contactnumber').val(response.data.contact_number);
                    $('.emailaddress').val(response.data.email_address);
                    $('.homeaddress').val(response.data.student_address);
                    $('.guardianname').val(response.data.guardian_name);
                    $('.guardianrelation').val(response.data.guardian_relation);
                    $('.guardiancontact').val(response.data.guardian_contact);
                    $('.guardianaddress').val(response.data.guardian_address);
                    $('.gradelevel').val(response.data.grade_level);
                    $('.studenttype').val(response.data.student_type);
            }
        });
    }

    
         

</script>

@include('./partials.footer')