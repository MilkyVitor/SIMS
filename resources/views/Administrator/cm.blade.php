@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

    <main class="container">
        <h1 class="text-center">Class Management</h1>
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
                    title:'Oops!',
                    icon:'error',
                    html: `{{session('error')}}`,
                    showConfirmButton: true
                });
            </script>
        @endif

        

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-gl-tab" data-bs-toggle="tab" data-bs-target="#nav-gl" type="button" role="tab" aria-controls="nav-gl" aria-selected="true">Grade </button>
                <button class="nav-link" id="nav-s-tab" data-bs-toggle="tab" data-bs-target="#nav-s" type="button" role="tab" aria-controls="nav-s" aria-selected="false"> Subjects </button>
                <button class="nav-link" id="nav-r-tab" data-bs-toggle="tab" data-bs-target="#nav-r" type="button" role="tab" aria-controls="nav-r" aria-selected="false"> Room</button>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            
            <div class="tab-pane fade show active" id="nav-gl" role="tabpanel" aria-labelledby="nav-gl-tab" tabindex="0">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card m-1 overflow-y-auto">
                        <div class="card-body">
                            <h1 class="card-title">Grade Levels</h1>

                            <table class="table table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Grade</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($grade as $row)
                                        <tr>
                                            <td>{{$row->ID}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>
                                                @if ($row->isActive == 0)
                                                <button class="btn btn-sm btn-flat btn-success activate" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#activateGrade" ><i class="mdi mdi-pencil"></i> Activate</button>
                                                @else
                                                    Activated
                                                @endif
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
                            <h1 class="card-title">Subjects</h1>

                            <table class="table table-striped data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>

                                <tbody>
                                  @foreach ($subjects as $row)
                                      <tr>
                                        <td>{{$row->ID}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->level}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-flat btn-success ed" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#editSubject"><i class="mdi mdi-pencil"></i> Edit</button>
                                            <button class="btn btn-sm btn-flat btn-danger ed" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#removeSubject"><i class="mdi mdi-delete"></i> Delete</button>
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

            <div class="tab-pane fade show" id="nav-r" role="tabpanel" aria-labelledby="nav-r-tab" tabindex="0">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card m-1 overflow-y-auto">
                        <div class="card-body">
                            <h1 class="card-title">Rooms</h1>
                            <table class="table table-striped data-table">
                               <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Tools</th>
                                    </tr>
                               </thead>

                               <tbody>
                                    @foreach ($rooms as $row)
                                        <tr>
                                            <td>{{$row->ID}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>
                                                <button class="btn btn-sm btn-flat btn-success rooms" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#editRooms" ><i class="mdi mdi-pencil"></i> Edit</button>
                                                <button class="btn btn-sm btn-flat btn-danger rooms" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#deleteRoom"><i class="mdi mdi-delete"></i> Delete</button>
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
    $(function() {
        $('.activate').click( function(e) {
            e.preventDefault();
            var a = $(this).data('bs-id');
            getgradeData(a);
        });
        $('.ed').click( function(e) {
            e.preventDefault();
            var sed = $(this).data('bs-id');
            getsubjectData(sed);
        });
        $('.rooms').click( function(e) {
            e.preventDefault();
            var r = $(this).data('bs-id');
            getroomsData(r);
        });
    });

    function getgradeData(id){
        $.ajax({
            method: 'GET',
            url: '/getgradeData/' + id,
            success: function(response) {
                $('.gradeID').val(response.data.ID);
                $('.gradename').html(response.data.name);
            }
        });

    }

    function getsubjectData(id){
        $.ajax({
            method: 'GET',
            url: '/getsubjectData/' + id,
            success: function(response) {
                $('.subID').val(response.data.ID);
                $('.subjectname').val(response.data.name);
                $('.dsubjectname').html(response.data.name);
                $('.level').val(response.data.level);
            }
        });
    }

    function getroomsData(id){
        $.ajax({
            method: 'GET',
            url: '/getroomsData/' + id,
            success: function(response) {
                $('.roomID').val(response.data.ID);
                $('.roomname').val(response.data.name);
                $('.droomname').html(response.data.name);
            }
        });
    }


</script>

@include('./partials.footer')