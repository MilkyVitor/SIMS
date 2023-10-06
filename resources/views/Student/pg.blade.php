@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Student.menu')

    <main class="container">
        <h1 class="text-center">Student Promotion</h1>
        <hr class="white-line">

        @if ($pg == 'No')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="/sendRegistration" method="POST">
                            @csrf
                        <div class="row">
                                <input type="hidden" value="{{auth()->user()->unique_id}}" name="userID">
                            <div class="form-group col-md-6">
                                <label>Student Name:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->first_name.' '.$studentinfo->middle_name.' '.$studentinfo->last_name.' '.$studentinfo->suffix}}" readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Gender:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->gender}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Date of Birth:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->date_birth}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Place of Birth:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->place_birth}}" readonly>
                            </div>
                            <legend>Update Information</legend>
                            <hr>
                            <i>Update to change or leave as it is.</i>
                            <div class="form-group col-md-3">
                                <label>Contact:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->contact_number}}" name="contactnumber" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Email Address:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->email_address}}" name="emailaddress" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Home Address:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->student_address}}" name="homeaddress" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Guardian Name:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->guardian_name}}" name="guardianname" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Guardian Relationship:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->guardian_relation}}" name="guardianrelation" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Guardian Contact:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->guardian_contact}}" name="guardiancontact" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Guardian Address:</label>
                                <input type="text" class="form-control" value="{{$studentinfo->guardian_address}}" name="guardianaddress" required>
                            </div>
                            <legend>Academic Info</legend>
                            <hr>
                            <div class="form-group col-md-3">
                                <label>Promote to:</label>
                                <input type="text" class="form-control" value="{{$gradename}}" name="grade" readonly>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-lg btn-primary"><i class="mdi mdi-send"></i> Send Registration</button>
                    </form>

                    </div>

                </div>
            </div>
        @elseif($pg == 'Pending')
            <div class="col-md-12">
                <div class="card m-1 overflow-y-auto">
                    <div class="card-body">
                        <h3 class="card-title text-center">Wait for your registration to be evaluated!</h3>
                        <div class="text-center">
                            <img src="{{asset('assets/img/Logo.png')}}" class="img-responsive img-fluid" style="width: 25em;">
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-12">
                <div class="card m-1 overflow-y-auto">
                    <div class="card-body">
                        <h3 class="card-title text-center">Available after school year. Complete balance and do your best for good grades!</h3>
                        <div class="text-center">
                            <img src="{{asset('assets/img/Logo.png')}}" class="img-responsive img-fluid" style="width: 25em;">
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>

</body>
@include('./partials.footer')