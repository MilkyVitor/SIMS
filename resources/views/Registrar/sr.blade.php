@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')
@include('Registrar.modals')

    <div class="container">
        <h1 class="text-white d-flex justify-content-center">Student Registration</h1>
        <hr class="white-line">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-sr-tab" data-bs-toggle="tab" data-bs-target="#nav-sr" type="button" role="tab" aria-controls="nav-sr" aria-selected="true">Registration </button>
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
                                        <input type="text" class="form-control" name="" id="firstname" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Middle Name</label>
                                        <input type="text" class="form-control" name="" id="middlename" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Last Name</label>
                                        <input type="text" class="form-control" name="" id="lastname" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Suffix</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Date of Birth</label>
                                        <input type="date" class="form-control" name="" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Place of Birth</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Contact Number</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Email Address</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Confirm Email Address</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter " required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Home Address</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter " required>
                                    </div>


                                    <legend>Contact Information</legend>
                                    <hr>
                                    <div class="form-group col-md-3">
                                        <label for="">Guardian Name</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Guardian Relationship</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Guardian Contact Number</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Guardian Home Address</label>
                                        <input type="text" class="form-control" name="" placeholder="Enter" required>
                                    </div>

                                    <legend>Preferences</legend>
                                    <hr>
                                    <div class="form-group col-md-3">
                                        <label for="">Grade Level to Enroll</label>
                                        <select name="" id="" class="form-control" required>
                                            <option selected disabled>Select</option>
                                            <option value="">Grade 1</option>
                                            <option value="">Grade 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Student Type</label>
                                        <select name="" id="" class="form-control" required>
                                            <option selected disabled>Select</option>
                                            <option value="">Old Student</option>
                                            <option value="">Transferee</option>
                                            <option value="">Returnee</option>
                                            <option value="">Starter</option>
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



    </div>

</body>

<script>
    $(function () {
        $('.view').click(function(e) {
            e.preventDefault();
            var firstName = $('#firstname').val();
            var middleName = $('#middlename').val();
            var lastName = $('#lastname').val();
                $('#FirstName').val(firstName);
                $('#MiddleName').val(middleName)
                $('#LastName').val(lastName)
         
        });
    });
</script>

@include('./partials.footer')