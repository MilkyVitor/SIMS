@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Student.menu')
@include('Student.modals')

    <main class="container">
        <h1 class="text-center">Grades View</h1>
        <hr class="white-line">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($gradestatus->status == 1)
                        <table class="table table-responsive table-striped data-table">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>First Grading</th>
                                    <th>Second Grading</th>
                                    <th>Third Grading</th>
                                    <th>Fourth Grading</th>
                                    <th>Teacher</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($grades as $row)
                                    <tr>
                                        <td>{{$row->subject}}</td>
                                        <td>{{$row->first}}</td>
                                        <td>{{$row->second}}</td>
                                        <td>{{$row->third}}</td>
                                        <td>{{$row->final}}</td>
                                        <td>{{$row->teacher}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1 class="card-text text-center" style="color: black">Not Available Yet</h1>
                        <div class="text-center">
                            <img src="{{asset('assets/img/Logo.png')}}" style="height: 25em;" class="img-responsive img-fluid">    
                        </div>    
                    @endif
                </div>
            </div>
        </div>
    </main>

</body>

@include('./partials.footer')