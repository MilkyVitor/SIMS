@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

    <main class="container">
        <h1 class="text-center">Control Panel</h1>
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

        <div class="col-md-12">
            <div class="card overflow-y-auto">
                <div class="card-body">
                    <table class="table table-striped data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Function</th>
                                <th>Status</th>
                                <th>Tools</th>
                            </tr>

                            <tbody>
                                @foreach ($control as $row)
                                    <tr>
                                        <td>{{$row->ID}}</td>
                                        <td>{{$row->function}}</td>
                                        @if ($row->status == '1')
                                            <td>On</td>
                                        @else
                                            <td>Off</td>
                                        @endif
                                        <td>
                                            <form action="/toggle" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{$row->ID}}" name="ID">
                                                <input type="hidden" value="{{$row->status}}" name="status">
                                                <input type="hidden" value="{{$row->function}}" name="function">
                                                <button class="btn btn-sm btn-flat btn-success"> Toggle </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </main>

</body>
@include('./partials.footer')

