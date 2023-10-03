@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Student.menu')

    <main class="container">
        <h1 class="text-center">My Schedule</h1>
        <hr class="white-line">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card overflow-y-auto">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-responsive data-table">
                            <thead>
                                <tr>
                                    <th>Section Name</th>
                                    <th>Subject</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Teacher</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($schedule as $row)
                                    <tr>
                                        <td>{{$row->section_name}}</td>
                                        <td>{{$row->subject}}</td>
                                        <td>{{$row->time_from."-".$row->time_to}}</td>
                                        <td>{{$row->room}}</td>
                                        <td>{{$row->teacher}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </main>

</body>
@include('./partials.footer')