@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Cashier.menu')

    <main class="container">
        <a href="/payment-management">
            <button class="btn btn-sm btn-flat btn-success mb-2"><i class="mdi mdi-arrow-left"></i> Back</button>
        </a>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Students with {{$paymentmethod}} Payment method</h1>
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Date Enrolled</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($studentlists as $row)
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
                </div>
            </div>
        </div>
    </main>

</body>

@include('./partials.footer')