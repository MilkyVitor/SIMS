@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Cashier.menu')
@include('Cashier.modals')

    <div class="container">

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


        <h1 class="text-center">Payment Registration</h1>
        <hr class="white-line">

        <div class="card">
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
                                            <button class="btn btn-outline-success btn-sm btn-flat view" data-bs-id="{{$prrow->ID}}" data-bs-toggle="modal" data-bs-target="#viewPRDetails">View Details</button>
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

</body>

<script>
    $(function(){
        $('.view').click(function(e) {
            e.preventDefault();
            var id = $(this).data('bs-id');
            getData(id);
        });

        $('.pass-confirm').click(function(e) {
            e.preventDefault();
            var pc = $(this).val();
            getData(pc);
        })

    });

    function getData(id) {
            $.ajax({
                method: 'GET',
                url: '/getPRDetails/' + id,
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
                }
            });
        }
</script>

@include('./partials.footer')