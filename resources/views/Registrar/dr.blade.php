@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')
@include('Registrar.modals')

    <div class="container">
        <h1 class="text-white d-flex justify-content-center">Document Request Management</h1>
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

        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Students List</h1>
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($students as $row)
                                <tr>
                                    <td>{{$row->first_name." ".$row->last_name}}</td>
                                    <td>
                                        <form action="/getDocumentsList" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$row->student_id}}" name="studentID">
                                        <button class="btn btn-flat btn-sm btn-primary view"> <i class="mdi mdi-eye"></i> View requested documents </button>
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

</body>



@include('./partials.footer')