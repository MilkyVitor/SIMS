@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')

    <main class="container">
        <a href="/grade-manage">
            <button class="btn btn-success btn-sm m-3"><i class="mdi mdi-arrow-left"></i> Back</button>
        </a>

        <div class="col-md-12 ">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">List of section: {{$section->grade_level.' '.$section->section_name}}</h1>
                    <table class="table table-striped table-responsive data-table">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($students as $row)
                                <tr>
                                    <td width="10px">{{$row->student_id}}</td>
                                    <td>{{$row->first_name.' '.$row->last_name}}</td>
                                    <td>
                                        <form action="/viewGrades" method="POST">
                                            @csrf
                                            <input type="hidden" name="sectionID" value="{{$row->section_id}}">
                                        <button class="btn btn-sm btn-flat btn-primary" value="{{$row->student_id}}" name="studentID"><i class="mdi mdi-list-box-outline"></i> Grades</button>
                                        </form>
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
@include('./partials.footer')