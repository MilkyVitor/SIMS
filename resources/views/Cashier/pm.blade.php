@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Cashier.menu')

    <main class="container">
        <h1 class="text-center">Payment Management</h1>
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
                    title:'Success!',
                    icon:'success',
                    html: `{{session('error')}}`,
                    showConfirmButton: true
                });
            </script>
        @endif
        
        <div class="row">
            <div class="col-md-3 text-center">
                <form action="/getLists" method="POST">
                    @csrf
                    <input type="hidden" value="Full" name="paymentmethod">
                    <button class="btn btn-md btn-primary col-12">Full Payment</button>
                </form>
            </div>
            <div class="col-md-3 text-center">
                <form action="/getLists" method="POST">
                        @csrf
                        <input type="hidden" value="Semi-Annual" name="paymentmethod">
                    <button class="btn btn-md btn-primary col-12">Semi-Annual Payment</button>
                </form>
            </div>
            <div class="col-md-3 text-center">
                <form action="/getLists" method="POST">
                        @csrf
                        <input type="hidden" value="Quarterly" name="paymentmethod">
                    <button class="btn btn-md btn-primary col-12">Quarterly Payment</button>
                </form>
            </div>

            <div class="col-md-3 text-center">
                <form action="/getLists" method="POST">
                        @csrf
                        <input type="hidden" value="Monthly" name="paymentmethod">
                    <button class="btn btn-md btn-primary col-12">Monthly Payment</button>
                </form>
            </div>
        </div>

        <div class="mt-1 col-md-12">
            <div class="card overflow-y-auto">
                <div class="card-body">
                        @if (session('studentlists'))
                        <h1 class="card-title">{{session('paymentmethod')}} Students</h1>
                            <table class="table table-striped table-responsive data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Date Enrolled</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach (session('studentlists') as $row)
                                        <tr>
                                            <td>{{$row->ID}}</td>
                                            <td>{{$row->first_name." ".$row->last_name}}</td>
                                            <td>{{emergencyFormatDate($row->created_at)}}</td>
                                            <td> 
                                                <form action="/getInformation" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$row->student_id}}" name="studentID">
                                                <button class="btn btn-sm btn-flat btn-success">View Information</button>
                                            </form>
                                        </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <table class="table table-striped table-responsive data-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Date Enrolled</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        @endif
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-6 p-1">
                <div class="card p-4">
                    <div class="card-body text-center">
                        <h1 class="card-title">Full Payment</h1>
                        <form action="/getLists" method="POST">
                            @csrf
                            <input type="hidden" value="Full" name="paymentmethod">
                            <button class="btn btn-primary">View Students</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-1">
                <div class="card p-4">
                    <div class="card-body text-center">
                        <h1 class="card-title">Semi-Annual Payment</h1>
                        <form action="/getLists" method="POST">
                            @csrf
                            <input type="hidden" value="Semi-Annual" name="paymentmethod">
                            <button class="btn btn-primary">View Students</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-1">
                <div class="card p-4">
                    <div class="card-body text-center">
                        <h1 class="card-title">Quarterly Payment</h1>
                        <form action="/getLists" method="POST">
                            @csrf
                            <input type="hidden" value="Quarterly" name="paymentmethod">
                            <button class="btn btn-primary">View Students</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-1">
                <div class="card p-4">
                    <div class="card-body text-center">
                        <h1 class="card-title">Monthly Payment</h1>
                        <form action="/getLists" method="POST">
                            @csrf
                            <input type="hidden" value="Monthly" name="paymentmethod">
                            <button class="btn btn-primary">View Students</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

      

        



    </main>

</body>

@include('./partials.footer')