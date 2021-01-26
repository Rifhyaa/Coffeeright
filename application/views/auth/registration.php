<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                        <!-- Social registration form-->
                        <div class="card my-5">
                            <div class="card-body p-5 text-center">
                                <div class="h1 font-weight-light">Create an Account</div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body p-5">
                                <!-- Login form-->
                                <form method="post" action="<?= base_url('auth/registration'); ?>">
                                    <!-- Form Row-->
                                    <div class="form-group">
                                        <label class="text-gray-600 small" for="name">Full Name</label>
                                        <input class="form-control" type="text" name="name" id="name" placeholder="Full Name" value="<?= set_value('name') ?>" />
                                        <?= form_error('name', '<small class="text-red">', '</small>'); ?>
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="form-group">
                                        <label class="text-gray-600 small" for="emailExample">Email address</label>
                                        <input class="form-control" type="text" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>" />
                                        <?= form_error('email', '<small class="text-red">', '</small>'); ?>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <!-- Form Group (choose password)-->
                                            <div class="form-group">
                                                <label class="text-gray-600 small" for="passwordExample">Password</label>
                                                <input class="form-control" type="password" placeholder="Password" name="password1" id="password1" />
                                                <?= form_error('password1', '<small class="text-red">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Form Group (confirm password)-->
                                            <div class="form-group">
                                                <label class="text-gray-600 small" for="confirmPasswordExample">Confirm Password</label>
                                                <input class="form-control" type="password" placeholder="Repeat Password" name="password2" id="password2" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Group (form submission)-->
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                    </div>
                                </form>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body px-5 py-4">
                                <div class="small text-center">
                                    Have an account?
                                    <a href="<?= base_url('auth'); ?>">Sign in!</a>
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