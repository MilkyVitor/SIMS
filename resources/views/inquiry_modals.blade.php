<div class="modal fade" id="loginModal" tabindex="-1" aria-expanded="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Faculty Sign In</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <form action="/processlogin" method="POST">
                            @csrf
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email..." required>
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-flat btn-outline-primary">Sign in</button>
            </div>
        </form>

        </div>
    </div>
</div>