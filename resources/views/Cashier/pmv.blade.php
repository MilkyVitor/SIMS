@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Cashier.menu')
@include('Cashier.modals')

    <main class="container">
        <form action="/getLists" method="POST">
            @csrf
            <input type="hidden" value="{{$information->payment_method}}" name="paymentmethod">
            <button class="btn btn-sm btn-flat btn-success mb-1 mt-1"><i class="mdi mdi-arrow-left"></i> Back</button>
        </form>

        

        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="fs-3" style="color: black">Information of {{$information->first_name." ".$information->last_name}}</h1>
                        <p>Ref Number: {{$information->code}}</p>
                        <p>Months Paid: {{$information->months_paid}}</p>
                        <p>Payment Method: {{$information->payment_method}}</p>
                        <p>Balance: {{$information->balance}}</p>
                        <p>Total Amount: {{$information->total_amount}}</p>
                        <p>Particulars: {{$information->particulars}}</p>
                        <p>Is Particulars Paid: {{$information->isParticularsPaid}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title ">List of Transactions</h1>
                        <table class="table table-striped data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Due Date</th>
                                    <th>Due Paid</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($transactions as $row)
                                    <tr>
                                        <td>{{$row->ID}}</td>
                                        <td>{{emergencyFormatDate($row->date_due)}}</td>
                                        <td>{{emergencyFormatDate($row->date_paid)}}</td>
                                        <td>
                                            @if ($row->isPaid == '1')
                                            <button class="btn btn-sm btn-flat btn-success view-transact" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#viewTransactInfo"><i class="mdi mdi-eye"></i> View Info</button>     
                                            @else
                                            <button class="btn btn-sm btn-flat btn-primary view-transact" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#setTransactInfo"><i class="mdi mdi-pencil"></i> Transact</button>
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

<script>
    $(function(e) {
        $('.view-transact').click( function(e) {
            e.preventDefault();
            var vt = $(this).data('bs-id');
            getTransactData(vt);
            
        });
    });

    function getTransactData(id){
        $.ajax({
                method: 'GET',
                url: '/getTransactData/' + id,
                success: function(response) {
                    $('.transactID').val(response.data.ID);
                    $('.paymentinfoID').val(response.data.payment_info_id);
                    $('.evaluatedBy').val(response.data.evaluated_by);
                    $('.amount').val(response.data.amount)
                    setImage('assets/img/', response.data.attachment);
                }
            });
    }

    
</script>

@include('./partials.footer')