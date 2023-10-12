@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

    <main class="container">
        <a href="/cs-control">
            <button class="btn btn-sm btn-flat btn-success"><i class="mdi mdi-arrow-left"></i> Back</button>
        </a>

        <div class="col-md-12 d-flex justify-content-center">
            <div class="card mt-1  " style="width: 50em">
                <div class="card-body">
                    <h1 class="card-title">List of Students in {{$section->grade_level." ".$section->section_name}}</h1>
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th>Students Name</th>
                                {{-- <th>Tools</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{$row->first_name." ".$row->last_name}}</td>
                                 {{--    <td>
                                        <button class="btn btn-sm btn-flat btn-success view-info" data-bs-id="{{$row->user_id}}" data-bs-toggle="modal" data-bs-target="#viewStudentsInfo"><i class="mdi mdi-eye"></i> View Information</button>
                                    </td> --}}
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