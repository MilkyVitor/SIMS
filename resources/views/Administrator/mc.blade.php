@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')

    <main class="container">
        <h1 class="text-center">Master Control</h1>
        <hr class="white-line">
        <div class="row">

            <div class="col-md-6 " >
                <a href="/sr-control">
                    <div class="card m-2 mx-5" style="height: 10em">
                        <div class="card-body">
                            <h3 class=" text-center card-title">Student Registration</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 " >
                <a href="cs-control">
                    <div class="card m-2 mx-5" style="height: 10em">
                        <div class="card-body">
                            <h3 class=" text-center card-title">Class Schedules</h3>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </main>

</body>

@include('./partials.footer')