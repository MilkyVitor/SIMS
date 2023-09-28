@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Cashier.menu')
@include('Cashier.modals')

    <main class="container">
        <a href="/payment-additionals">
            <button class="btn btn-sm btn-flat btn-success mb-1"><i class="mdi mdi-arrow-left"></i> Back</button>
        </a>

        <div class="col-md-12 stretch-card grid-margin">
            <div class="card overflow-y-auto">
                <div class="card-body">
                    <h1 class="card-title">List of Students for {{$additionalstitle}}</h1>
                    <table class="table table-striped table-responsive data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Status</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($lists as $row)
                                <tr>
                                    <td>{{$row->ID}}</td>
                                    <td>{{$row->first_name." ".$row->last_name}}</td>
                                    @if ($row->StatusPaid == '0')
                                        <td>Not Paid</td>
                                        <td>
                                            <button class="btn btn-sm btn-flat btn-success setpaid" data-bs-id="{{$row->pID}}" data-bs-toggle="modal" data-bs-target="#setPaidAdditionals"><i class="mdi mdi-check"></i> Set Paid</button>
                                        </td>
                                    @else
                                        <td> Paid</td>
                                        <td>
                                            <button class="btn btn-sm btn-flat btn-success setpaid" disabled><i class="mdi mdi-check"></i> Set Paid</button>
                                        </td>
                                    @endif
                                   
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </div>

    </main>


</body>

<script>
    $(function() {
        $('.setpaid').click(function(e) {
            e.preventDefault();
            var vd = $(this).data('bs-id');
            getname(vd);
        });
    });

    function getname(id) {
        $.ajax({
            method: 'GET',
            url: '/getname/' + id,
            success: function(response) {
                console.log(response);
                $('.ID').val(response.data.pID);
                $('.title').html(response.data.title);
                $('.student').html(response.data.first_name+" "+response.data.last_name);
               
            }
        });
    }
</script>

@include('./partials.footer')