@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Student.menu')

    <main class="container">
        <h1 class="text-center">Payment Records</h1>
        <hr class="white-line">

        <div class="row">

            <div class="col-md-6">
                <div class="card m-2">
                   <div class="card-body">
                    <h1 class="card-title">Information</h1>
                    <p>Code: {{$payment_info->code}}</p>
                    <p>Months Paid: {{$payment_info->months_paid}}</p>
                    <p>Payment Method: {{$payment_info->payment_method}}</p>
                    <p>Balance: {{$payment_info->balance}}</p>
                    <p>Total Amount: {{$payment_info->total_amount}}</p>
                    <p>Particulars: {{$payment_info->particulars}}</p>
                    <p>Particulars Status: {{$payment_info->isParticularsPaid}}</p>
                   </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card m-2">
                   <div class="card-body">
                        <h1 class="card-title">Transactions</h1>
                        <table class="table table-striped table-responsive data-table">
                            <thead>
                                <tr>
                                    <th>Date Due</th>
                                    <th>Date Paid</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($payment_transactions as $row)
                                    <tr>
                                        <td>{{$row->date_due}}</td>
                                        <td>{{$row->date_paid}}</td>
                                        <td>
                                            @if ($row->isPaid == '0')
                                                <button class="btn btn-sm btn-flat btn-success"><i class="mdi mdi-send"></i> Send Pay Receipt</button>
                                            @else
                                                <button class="btn btn-sm btn-flat btn-primary"><i class="mdi mdi-eye"></i> View</button>
                                            @endif
                                        </td>
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