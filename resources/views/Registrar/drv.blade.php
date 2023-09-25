@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')
@include('Registrar.modals')

    <div class="container">
        <main class="mt-5">
            <a href="/document-requests">
                <button class="btn btn-flat btn-sm btn-success"><i class="mdi mdi-arrow-left"></i> Back </button>
            </a>

            <div class="col-md-12">
                <div class="card mt-1">
                    <div class="card-body">
                        <h1 class="card-title">List of Documents</h1>
                        <table class="table table-striped data-table">
                            <thead>
                                <tr>
                                    <th>Document</th>
                                    <th>Date Requested</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{$row->requested_doc}}</td>
                                        <td>{{$row->created_at->format('F d, Y')}}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    <div class="card-footer text-end">
                        <form action="/acknowledgedocs" method="POST">
                            @csrf
                            <input type="hidden" value="{{$row->student_id}}" name="studentID">
                            <button class="btn btn-lg btn-flat btn-success"><i class="mdi mdi-check"></i> Acknowledge</button>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>
@include('./partials.footer')