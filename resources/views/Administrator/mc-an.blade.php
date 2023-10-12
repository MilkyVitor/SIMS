@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

    <main class="container">
        <div class="m-4">
            <a href="/master-control">
                <button class="btn btn-sm btn-flat btn-success"><i class="mdi mdi-arrow-left"></i> Back</button>
            </a>
           </div>
    
           <h1 class="text-white d-flex justify-content-center">Account Numbers (Admin)</h1>
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

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card overflow-y-auto m-1">
                    <div class="card-body">
                        <table class="table table-striped data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Number</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
    
                            <tbody>
                                @foreach ($numbers as $row)
                                    <tr>
                                        <td>{{$row->ID}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->number}}</td>
                                        <td>
                                            <button class="btn btn-sm btn-flat btn-success view-number" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#editNumber"><i class="mdi mdi-pencil"></i> Update Number</button>
                                            {{-- <button class="btn btn-sm btn-flat btn-danger view-number" data-bs-id="{{$row->ID}}" data-bs-toggle="modal" data-bs-target="#deleteNumber"><i class="mdi mdi-delete"></i> Delete Info</button> --}}
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
        $('.view-number').click(function(e) {
            e.preventDefault();
            var vn = $(this).data('bs-id');
            getnumberData(vn);
        });
    });

    function getnumberData(id){
        $.ajax({
            method: 'GET',
            url: '/adminGetNumber/' + id,
            success: function(response) {
                $('.ID').val(response.data.ID);
                $('.name').val(response.data.name);
                $('.dname').html(response.data.name);
                $('.number').val(response.data.number);
            }
        });
    }
</script>

@include('./partials.footer')