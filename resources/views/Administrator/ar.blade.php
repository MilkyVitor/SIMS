@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

    <main class="container">
        <h1 class="text-center">Academic Records</h1>
        <hr class="white-line">

        <div class="col-md-12">

            <div class="card m-1 overflow-y-auto">
                <div class="card-body">
                    <h3 class="card-title" style="color:black">Search</h3>
                    <form action="/searchRecords" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>From:</label>
                                <input type="date" class="form-control" name="from" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>To:</label>
                                <input type="date" class="form-control" name="to" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Record:</label>
                                <select name="table" class="form-control" required>
                                    <option disabled selected>-Select-</option>
                                    <option value="student_info">Enrolled Student</option>
                                    <option value="document_requests">Document Requests</option>
                                    <option value="feedback">Feedback</option>
                                    <option value="payment_info">Payment Info</option>
                                    <option value="inq_announcement">Announcements</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                               <button class="btn btn-md btn-primary form-control mt-4"><i class="mdi mdi-magnify"></i> Search</button>
                            </div>

                        </div>
                    </form>

                   
                    
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        @if (session('students'))
                                <h3>Enrolled Students</h3>
                                <p class="card-title">Results from {{session('from')}} to {{session('to')}}</p>
                                <table class="table table-responsive table-striped data-table border">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Date Birth</th>
                                            <th>Place of Birth</th>
                                            <th>Contact Number</th>
                                            <th>Email Address</th>
                                            <th>Home Address</th>
                                        </tr>
                                    </thead>
        
                                    <tbody>
                                        @foreach (session('students') as $row)
                                            <tr>
                                                <td>{{$row->ID}}</td>
                                                <td>{{$row->first_name." ".$row->last_name}}</td>
                                                <td>{{$row->gender}}</td>
                                                <td>{{$row->date_birth}}</td>
                                                <td>{{$row->place_birth}}</td>
                                                <td>{{$row->contact_number}}</td>
                                                <td>{{$row->email_address}}</td>
                                                <td>{{$row->student_address}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        @elseif(session('dr'))
                            <h3>Document Requests</h3>
                            <p class="card-title">Results from {{session('from')}} to {{session('to')}}</p>
                                <table class="table table-responsive table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student Name</th>
                                            <th>Requested Document</th>
                                            <th>Date Acknowledged</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (session('dr') as $row)
                                            <tr>
                                                <td>{{$row->ID}}</td>
                                                <td>{{$row->student_id}}</td>
                                                <td>{{$row->requested_doc}}</td>
                                                <td>{{$row->date_acknowledged}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        @elseif(session('fb'))
                            <h3>Feedbacks</h3>     
                            <p class="card-title">Results from {{session('from')}} to {{session('to')}}</p>
                                <table class="table table-responsive table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Feedback</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (session('fb') as $row)
                                            <tr>
                                                <td>{{$row->ID}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->feedback}}</td>
                                                <td>{{emergencyFormatDate($row->updated_at)}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        @elseif(session('pi')) 
                            <h3>Payment Info</h3>     
                            <p class="card-title">Results from {{session('from')}} to {{session('to')}}</p>
                                <table class="table table-responsive table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th>Billing Code</th>
                                            <th>Name</th>
                                            <th>Months Paid</th>
                                            <th>Method</th>
                                            <th>Balance</th>
                                            <th>Total Amount</th>
                                            <th>Particulars</th>
                                            <th>Particulars Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (session('pi') as $row)
                                            <tr>
                                                <td>{{$row->code}}</td>
                                                <td>{{$row->student_id}}</td>
                                                <td>{{$row->months_paid}}</td>
                                                <td>{{$row->payment_method}}</td>
                                                <td>{{$row->balance}}</td>
                                                <td>{{$row->total_amount}}</td>
                                                <td>{{$row->particulars}}</td>
                                                <td>{{$row->isParticularsPaid}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        @elseif(session('ann')) 
                            <h3>Announcements</h3>     
                            <p class="card-title">Results from {{session('from')}} to {{session('to')}}</p>
                                <table class="table table-responsive table-striped data-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Headline</th>
                                            <th>Description</th>
                                            <th>Posted At</th>
                                            <th>Author</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach (session('ann') as $row)
                                            <tr>
                                                <td>{{$row->ID}}</td>
                                                <td>{{$row->Headline}}</td>
                                                <td>{{$row->Description}}</td>
                                                <td>{{$row->PostedAt}}</td>
                                                <td>{{$row->Author}}</td>
                                                <td>
                                                    <img src="{{asset('storage/images/'.$row->Image)}}" class="img-fluid img-responsive" style="width:10em">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        @else
                            <div class="m-1 p-1 ">
                                <table class="table table-striped table-responsive data-table border">
                                    <thead>
                                        <tr>
                                            <th>Info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
@include('./partials.footer')