@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Registrar.menu')

    <main class="container">
        <h1 class="text-center">Grade Management</h1>
        <hr class="white-line">
        
        @if ($gm == 'No')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 style="color: black">Only available during grading week</h1>
                        <img src="{{asset('assets/img/Logo.png')}}" class="img-responsive img-fluid" style="width: 25em;">
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center text-black" >List of Classes</h1>
                        @foreach ($sections as $row)
                            <div class="row">
                                <div class="card m-3 p-2 col-md-3">
                                    <div class="card-body text-center">
                                        <form action="/seeStudents" method="POST">
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
        @endif

    </main>

</body>
@include('./partials.footer')