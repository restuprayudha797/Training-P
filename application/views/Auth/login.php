<section>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card shadow-lg rounded px-4">
                    <div class="card-body">
                        <h3 class="card-title py-4">Login</h3>
                        <form action="">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="text-center d-grid gap-2 mt-4">
                                <button class="btn btn-primary py-2 ">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-5">
                            <p>Don't have an account? <a href="<?= base_url('auth/register') ?>" style="text-decoration: none;">Create One</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>