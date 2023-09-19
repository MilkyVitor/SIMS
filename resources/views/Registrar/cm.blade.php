@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')
    
    <div class="container">
        <h1 class="text-white d-flex justify-content-center">Class Management</h1>
        <hr class="white-line">

        <div class="col-md-12 grid-margin">
            <div class="card">
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
                                        <button class="btn btn-primary btn-sm btn-flat"><i class="mdi mdi-eye"></i> View Students</button>
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