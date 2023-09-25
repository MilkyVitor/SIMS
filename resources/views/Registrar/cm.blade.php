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
                                                    <form action="/getSectionStudents" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{$row->ID}}" name="sectionID">
                                                        <button class="btn btn-primary btn-sm btn-flat" ><i class="mdi mdi-eye"></i> View Students</button>

                                                    </form>
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
   

    $('.schedule').click( function(e) {
        e.preventDefault();
        var sched = $(this).data('bs-id');
        getScheduleData(sched);
    });    

   });
   
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