@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

<div class="container">
    <a href="/Administrator">
        <button class="btn btn-flat btn-sm btn-success"><i class="mdi mdi-arrow-left"></i> Back</button>
    </a>

    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            {{-- <th>Created at</th> --}}
                            <th>Tools</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($accounts as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                {{-- <td>{{$row->created_at->format('F d, Y')}}</td> --}}
                                <td>
                                    <button class="btn btn-flat btn-sm btn-danger"><i class="mdi mdi-trash"></i> Inactivate</button>
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
