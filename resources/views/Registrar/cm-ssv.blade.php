@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')
@include('Registrar.modals')

    
    <main class="container mt-5">
        <a href="/class-manage">
            <button class="btn btn-sm btn-flat btn-success"><i class="mdi mdi-arrow-left"></i> Back</button>
        </a>

        <div class="col-md-12">
            <div class="card mt-1">
                <div class="card-body">
                    <h1 class="card-title">List of Students in {{$section->grade_level." ".$section->section_name}}</h1>
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th>Students Name</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{$row->first_name." ".$row->last_name}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-flat btn-success view-info" data-bs-id="{{$row->user_id}}" data-bs-toggle="modal" data-bs-target="#viewStudentsInfo"><i class="mdi mdi-eye"></i> View Information</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </main>

</body>

<script>
    $(function() {
        $('.view-info').click(function(e) {
            e.preventDefault();
            var vs = $(this).data('bs-id');
            getstudentData(vs);
        });
    });

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
</script>
@include('./partials.footer')