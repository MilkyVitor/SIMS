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
    
           <h1 class="text-white d-flex justify-content-center">Grades Input (Admin)</h1>
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
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center text-black" >List of Classes</h1>
                        @foreach ($sections as $row)
                            <div class="row">
                                <div class="card m-3 p-2 col-md-3">
                                    <div class="card-body text-center">
                                        <form action="/adminSeeStudents" method="POST">
                                        @csrf
                                        <h2 class="card-title fw-bold ">
                                            {{$row->section_name}}
                                        </h2>
                                        <button class="btn btn-md btn-primary mt-3" value="{{$row->section_id}}" name="section"><i class="mdi mdi-eye"></i> See Students</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </main>

</body>

@include('./partials.footer')