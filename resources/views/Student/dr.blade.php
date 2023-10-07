@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Student.menu')
@include('Student.modals')

    <main class="container">
        <h1 class="text-center">Document Request</h1>
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


        @if ($dr == 'No' || $drstatus == 1)
            @if ($countOfDocs == 3)
                <div class="alert alert-danger" role="alert">
                    You already requested all documents!
                </div>
            @else
            <button class="btn btn-sm btn-flat btn-primary" data-bs-toggle="modal" data-bs-target="#requestDocument"><i class="mdi mdi-plus"></i> Request Document</button>
                
            @endif
            <div class="col-md-12">
                <div class="card m-1 overflow-y-auto">
                    <div class="card-body">
                        <form action="/acknowledgePDF" method="POST">
                            @csrf
                        <input type="hidden" value="{{auth()->user()->unique_id}}" name="userID">
                        <button class="btn btn-sm btn-flat btn-primary mb-3"><i class="mdi mdi-printer"></i> Print Acknowledgement</button>
                        </form>
                        <table class="table table-responsive table-striped data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Requested Document</th>
                                    <th>Status</th>
                                    <th>Date Acknowledged</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($docs as $row)
                                    <tr>
                                        <td>{{$row->ID}}</td>
                                        <td>{{$row->requested_doc}}</td>
                                        @if ($row->date_acknowledged == NULL)
                                        <td>Not Yet Acknowledged</td>
                                        <td>Not Yet Acknowledged</td>
                                      
                                        @else
                                        <td>Acknowledged</td>
                                        <td>{{$row->date_acknowledged}}</td>
                                        
                                        @endif
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-12">
                <div class="card m-1 overflow-y-auto">
                    <div class="card-body">
                        <h3 class="card-title text-center">Completing balance and administrator activation will open this system. </h3>
                        <div class="text-center">
                            <img src="{{asset('assets/img/Logo.png')}}" class="img-responsive img-fluid" style="width: 25em;">
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{--  --}}

    </main>

</body>
@include('./partials.footer')