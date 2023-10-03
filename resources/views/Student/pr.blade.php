@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Student.menu')
@include('Student.modals')


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
                                        <td>{{emergencyFormatDate($row->date_due)}}</td>
                                        @if ($row->isPaid == '0' && $row->isUploaded == '0' )
                                            <td>Not Yet Paid</td>
                                            <td>
                                                <button class="btn btn-sm btn-flat btn-success details" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#sendPayment"><i class="mdi mdi-send"></i> Send Pay Receipt</button>
                                            </td>
                                        @elseif($row->isPaid == '0' && $row->isUploaded == '1')
                                            <td>In Evaluation</td>
                                            <td>
                                                <button class="btn btn-sm btn-flat btn-primary details" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#viewPendingPayment"><i class="mdi mdi-eye"></i> View Uploaded Receipt</button>    
                                            </td>
                                        @else
                                            <td>{{emergencyFormatDate($row->date_paid)}}</td> 
                                            <td>
                                                <button class="btn btn-sm btn-flat btn-primary details" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#viewPayment"><i class="mdi mdi-eye"></i> View</button>    
                                            </td>   
                                        @endif
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

<script>
    $(function() {
        $('.details').click(function (e) {
            e.preventDefault();
            var td = $(this).data('bs-id');
            getTransactionDetails(td);
        });
    });

    function getTransactionDetails(id) {
        $.ajax({
            method: 'GET',
            url: '/getTransactionDetails/' + id,
            success: function(response) {
                $('.transactID').val(response.data.ID);
                $('.datedue').val(formatDate(response.data.date_due));
                $('.datepaid').val(formatDate(response.data.date_paid));
                $('.amount').val(response.data.amount);
                 $('.vImage').attr('src',"{{asset('/storage/images/')}}"+ '/' + response.data.attachment);

                
            }
        });
    }
</script>
@include('./partials.footer')