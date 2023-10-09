@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Student.menu')
@include('Student.modals')

    <main class="container">
        <h1 class="text-center">Feedback</h1>
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
                    title:'Oops!',
                    icon:'error',
                    html: `{{session('error')}}`,
                    showConfirmButton: true
                });
            </script>
        @endif


            @if ($f == 'No')
            <div class="col-md-12">
                <div class="card m-1 overflow-y-auto">
                    <div class="card-body text-center">
                        <h1 class="card-title">Feedback is not available until end of school-year!</h1>
                        <img src="{{asset('assets/img/Logo.png')}}" class="img-responsive img-fluid" style="width: 25em;">
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-12">
                @if ($allowed == 'Yes')
                <div class="mb-2">
                    <button class="btn btn-sm btn-flat btn-primary" data-bs-toggle="modal" data-bs-target="#sendFeedback"><i class="mdi mdi-send"></i> Send Feedback</button>
                </div>
                @else
                    <div class="alert alert-danger">You have sent sufficient feedbacks</div>
                @endif
                <div class="card m-1 overflow-y-auto">
                    <div class="card-body">
                        <table class="table table-striped table-responsive data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Feedback</th>
                                    <th>Status</th>
                                    <th>Acknowledge By</th>
                                    <th>Date Acknowledged</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>  
                            
                            <tbody>
                                @foreach ($feedback as $row)
                                    <tr>
                                        <td>{{$row->ID}}</td>
                                        <td>{{$row->feedback}}</td>
                                        @if($row->isAcknowledged == 1)
                                        <td>Acknowledged</td>
                                        <td>{{$row->acknowledged_by}}</td>
                                        <td>{{emergencyFormatDate($row->date_acknowledged)}}</td>
                                            @if ($row->comment == NULL)
                                                <td><i>No comment</i></td>
                                            @else
                                                <td>{{$row->comment}}</td>
                                            @endif
                                        @else
                                        <td>Not yet acknowledged</td>
                                        <td>Not yet acknowledged</td>
                                        <td>Not yet acknowledged</td>
                                        <td>Not yet acknowledged</td>
                                        
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                </div>
            </div>
            @endif

    </main>

</body>
@include('./partials.footer')