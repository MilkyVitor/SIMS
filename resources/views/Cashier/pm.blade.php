@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Cashier.menu')

    <main class="container">
        <h1 class="text-center">Payment Management</h1>
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
        
        <div class="row">
            <div class="col-md-6 p-1">
                <div class="card p-4">
                    <div class="card-body text-center">
                        <h1 class="card-title">Full Payment</h1>
                        <form action="/getLists" method="POST">
                            @csrf
                            <input type="hidden" value="Full" name="paymentmethod">
                            <button class="btn btn-primary">View Students</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-1">
                <div class="card p-4">
                    <div class="card-body text-center">
                        <h1 class="card-title">Semi-Annual Payment</h1>
                        <form action="/getLists" method="POST">
                            @csrf
                            <input type="hidden" value="Semi-Annual" name="paymentmethod">
                            <button class="btn btn-primary">View Students</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-1">
                <div class="card p-4">
                    <div class="card-body text-center">
                        <h1 class="card-title">Quarterly Payment</h1>
                        <form action="/getLists" method="POST">
                            @csrf
                            <input type="hidden" value="Quarterly" name="paymentmethod">
                            <button class="btn btn-primary">View Students</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-1">
                <div class="card p-4">
                    <div class="card-body text-center">
                        <h1 class="card-title">Monthly Payment</h1>
                        <form action="/getLists" method="POST">
                            @csrf
                            <input type="hidden" value="Monthly" name="paymentmethod">
                            <button class="btn btn-primary">View Students</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      

        



    </main>

</body>

@include('./partials.footer')