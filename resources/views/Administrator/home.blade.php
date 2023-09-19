@include('./partials.header')
<body class="bgimage">
@include('./user_navbar')
@include('Administrator.menu')
@include('Administrator.modals')


<div class="container">
    <div class="col-md-6 m-3">
        <div class="mb-4">
            <button class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#addAccounts"><i class="mdi mdi-plus"></i> Add Account</button>
        </div>
       <div class="row">

            <div class="col-md-6 p-1">
                <a href="/accounts/Administrator">
                <div class="card">
                    <div class="card-body">
                        View Administrator Accounts
                        <i class="mdi"></i>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-6 p-1">
                <a href="/accounts/Registrar">
                <div class="card">
                    <div class="card-body">
                        View Registrar Accounts
                        <i class="mdi"></i>
                    </div>
                </div>
                </a>
            </div>
                

            <div class="col-md-6 p-1">
                <a href="/accounts/Cashier">
                <div class="card">
                    <div class="card-body">
                        View Cashier Accounts
                    </div>
                </div>
                </a>
            </div>

       </div>  
    </div>
</div>

</body>

@include('./partials.footer')