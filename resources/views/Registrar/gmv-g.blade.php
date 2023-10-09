@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')

    <main class="container">
        <form action="/seeStudents" method="POST">
            @csrf
            <button class="btn btn-success btn-sm m-3" value="{{$section}}" name="section"><i class="mdi mdi-arrow-left"></i> Back</button>
        </form>
        

        <div class="col-md-12 ">
            <div class="card">
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
                                    <button class="btn btn-sm btn-flat btn-primary"><i class="mdi mdi-pencil"></i> Manage Grade</button>
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