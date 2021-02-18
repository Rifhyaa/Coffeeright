<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                        <!-- Social login form-->
                        <div class="card my-5">
                            <div class="card-body p-5 text-center">
                                <div class="h1 font-weight-light">Sign In</div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body p-5">
                                <?= $this->session->flashdata('message') ?>
                                <!-- Login form-->
                                <form method="post" action="<?= base_url('auth'); ?>">
                                    <!-- Form Group (email address)-->
                                    <div class="form-group">
                                        <label class="text-gray-600 small" for="email">Email address</label>
                                        <input class="form-control" type="text" name="email" id="email" placeholder="Enter Email Address" value="<?= set_value('email') ?>" />
                                        <?= form_error('email', '<small class="text-red">', '</small>'); ?>
                                    </div>
                                    <!-- Form Group (password)-->
                                    <div class="form-group">
                                        <label class="text-gray-600 small" for="password">Password</label>
                                        <input class="form-control" type="password" placeholder="Password" name="password" id="password" />
                                        <?= form_error('password', '<small class="text-red">', '</small>'); ?>
                                    </div>
                                    <!-- Form Group (forgot password link)-->
                                    <div class="form-group"><a class="small" href="#">Forgot your password?</a></div>
                                    <!-- Form Group (login box)-->
                                    <div class="form-group d-flex align-items-center justify-content-between mb-0">
                                        <div class="custom-control custom-control-solid custom-checkbox">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body px-5 py-4">
                                <div class="small text-center">
                                    New user?
                                    <a href="<?= base_url('auth/registration'); ?>">Create an account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="footer mt-auto footer-dark">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 small">Copyright &#xA9; Your Website 2021</div>
                    <div class="col-md-6 text-md-right small">
                        <a href="#!">Privacy Policy</a>
                        &#xB7;
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>