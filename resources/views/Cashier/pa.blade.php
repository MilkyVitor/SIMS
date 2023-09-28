@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Cashier.menu')
@include('Cashier.modals')

    <main class="container">
        <h1 class="text-center">Payment Additionals</h1>
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
                    

        <div class="col-md-12 stretch-card grid-margin">
            <div class="card overflow-y-auto">
                <div class="card-body">
                    <table class="table table-striped table-responsive data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bill ID</th>
                                <th>Title</th>
                                <th>Tools</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($additionals as $row)
                                <tr>
                                    <td>{{$row->ID}}</td>
                                    <td>{{$row->bill_id}}</td>
                                    <td>{{$row->title}}</td>
                                    <td>
                                        <button class="btn btn-sm btn-flat btn-success view-details" data-bs-id="{{$row->bill_id}}" data-bs-toggle="modal" data-bs-target="#viewDetails"><i class="mdi mdi-eye"></i> View Details</button>
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

<script>
    $(function() {
        $('.view-details').click(function(e) {
            e.preventDefault();
            var vd = $(this).data('bs-id');
            getAdditionalsData(vd);
        });
    });

    function getAdditionalsData(id) {
        $.ajax({
            method: 'GET',
            url: '/getAdditionalsData/' + id,
            success: function(response) {
                $('.billID').val(response.data.bill_id);
                $('.title').val(response.data.title);
                $('.description').val(response.data.description);
                $('.amount').val(response.data.amount);
                $('.issuedBy').val(response.data.issued_by);
            }
        });
    }
</script>
@include('./partials.footer')