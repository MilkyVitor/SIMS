@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

<main class="container">
    <form action="/adminSeeStudents" method="POST">
        @csrf
        <button class="btn btn-success btn-sm m-3" value="{{$section}}" name="section"><i class="mdi mdi-arrow-left"></i> Back</button>
    </form>
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

    <div class="col-md-12 ">
        <div class="card m-1 overflow-y-auto">
            <div class="card-body">
                <h1 class="card-title">Grading for {{$name}}</h1>
                <table class="table table-striped table-responsive data-table">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>First Quarter</th>
                            <th>Second Quarter</th>
                            <th>Third Quarter</th>
                            <th>Final Quarter</th>
                            <th>Teacher</th>
                            <th>Tools</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($gradelist as $row)
                            <tr>
                               <td>{{$row->subject}}</td>
                               <td>{{$row->first}}</td>
                               <td>{{$row->second}}</td>
                               <td>{{$row->third}}</td>
                               <td>{{$row->final}}</td>
                               <td>{{$row->teacher}}</td>
                               <td>
                               
                                <button class="btn btn-sm btn-flat btn-primary grades" data-bs-id="{{$row->grID}}" data-bs-toggle="modal" data-bs-target="#setGrade"><i class="mdi mdi-pencil"></i> Manage Grade</button>
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
    $('.grades').click(function(e) {
        e.preventDefault();
        var g = $(this).data('bs-id');
        getGrade(g);
    });
});

function getGrade(id) {
    $.ajax({
        method: 'GET',
        url:'/adminGetGrade/' + id,
        success: function(response) {
            $('.gradeID').val(response.data.ID);
            $('.studentID').val(response.data.student_id);
            $('.subject').val(response.data.subject);
            $('.first').val(response.data.first);
            $('.second').val(response.data.second);
            $('.third').val(response.data.third);
            $('.final').val(response.data.final);
        }
    });
}
</script>

@include('./partials.footer')