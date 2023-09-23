@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')
@include('Registrar.modals')

    
    <div class="container">
        <h1 class="text-white d-flex justify-content-center">Class Management</h1>
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
                <button class="nav-link active" id="nav-cl-tab" data-bs-toggle="tab" data-bs-target="#nav-cl" type="button" role="tab" aria-controls="nav-cl" aria-selected="true">Class List</button>
                <button class="nav-link" id="nav-ms-tab" data-bs-toggle="tab" data-bs-target="#nav-ms" type="button" role="tab" aria-controls="nav-ms" aria-selected="true">Manage Schedules</button>
            </div>
        </nav>

        {{-- Class List --}}
        <div class="tab-content" id="nav-tabContent"> 
            <div class="tab-pane fade show active" id="nav-cl" role="tabpanel" aria-labelledby="nav-cl-tab" tabindex="0">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card m-1 overflow-y-auto">

                        
                            <div class="card-body">
                                <table class="table table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th>Grade Level</th>
                                            <th>Section Name</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
            
                                    <tbody>
                                        @foreach ($section as $row)
                                            <tr>
                                                <td>{{$row->grade_level}}</td>
                                                <td>{{$row->section_name}}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm btn-flat viewss" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#viewSectionStudents" ><i class="mdi mdi-eye"></i> View Students</button>
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

        {{-- Manage Sections --}}
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show" id="nav-ms" role="tabpanel" aria-labelledby="nav-ms-tab" tabindex="0">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card m-1 overflow-y-auto">
                        
                        <div class="card-body">
                            <h1 class="card-title">Manage Schedules</h1>
                            <table class="table table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>Grade & Section</th>
                                        <th>Subject</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Room</th>
                                        <th>Teacher</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($schedules as $row)
                                        <tr>
                                            <td>{{$row->grade_level."-".$row->section_name}}</td>
                                            <td>{{$row->subject}}</td>
                                            <td>{{$row->time_from}}</td>
                                            <td>{{$row->time_to}}</td>
                                            <td>{{$row->room}}</td>
                                            <td>{{$row->teacher}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-flat btn-success schedule" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#editSchedule"> <i class="mdi mdi-pencil"></i> Edit </button>
                                                <button class="btn btn-sm btn-flat btn-danger schedule" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#removeSchedule"> <i class="mdi mdi-delete"></i> Delete </button>
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

        



    </div>


</body>

<script>
    $(function() {
    $('.viewss').click( function(e) {
        e.preventDefault();
        var ss = $(this).data('bs-id');
        getListStudent(ss);
    });   

    $('.schedule').click( function(e) {
        e.preventDefault();
        var sched = $(this).data('bs-id');
        getScheduleData(sched);
    });    

    $(document).on('click', '.view-student', function(e) {
        e.preventDefault();
        var vs = $(this).data('bs-id');
        getstudentData(vs);
     
    }); //Somehow worked in this code// Be a reminder
   });
   
    function getListStudent(id){
    $.ajax({
        method: 'GET',
        url: '/getSectionStudents/'+ id,
        success: function(response) {
            var table = $('#viewSectionStudents tbody');
            table.empty();
            var newRow = $('<tr>');
                $.each(response.data, function(index, item) {
            // Create a new row for each item in the response
            var newRow = $('<tr>');
            
            // Add data to the table cells 
            newRow.append($('<td>').text(item.first_name + ' ' + item.last_name));
            newRow.append($('<td>').html('<button class="btn btn-flat btn-sm btn-success view-student" data-bs-id="'+ item.user_id +'" data-bs-toggle="modal" data-bs-target="#viewStudentsInfo"><i class="mdi mdi-eye"></i> View Info</button>'));
            
            // Append the new row to the table
            table.append(newRow); // Replace 'yourTableId' with your table's actual ID
        });
          
        }
    });
   }
   
   function getstudentData(id) {
    $.ajax({
        method: 'GET',
        url: '/getStudentInfo/' + id,
        success: function(response) {
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
            $('.gname').val(response.data.guardian_name);
            $('.grelationship').val(response.data.guardian_relation);
            $('.gcontact').val(response.data.guardian_contact);
            $('.ghome').val(response.data.guardian_address);
            $('.gradelevel').val(response.data.grade_level);
            $('.studentType').val(response.data.student_type);
        }
    })
        
   }

   function getScheduleData(id){
    $.ajax({
        method: "GET",
        url: "/getScheduleData/" + id,
        success: function(response){
            console.log(response);
            $('.scheduleID').val(response.data.ID);            
            $('.grade-section').val(response.data.grade_level+ " "+ response.data.section_name);            
            $('.subject').val(response.data.subject);            
            $('.timefrom').val(response.data.time_from);            
            $('.timeto').val(response.data.time_to);            
            $('.room').val(response.data.room);            
            $('.teacher').val(response.data.teacher);            
        }
    });
   }

 
</script>
@include('./partials.footer')

{{--  --}}