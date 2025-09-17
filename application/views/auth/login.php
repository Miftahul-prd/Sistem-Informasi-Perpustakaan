    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="#" style="color: #583101"><b><strong>SIP SMANTIG</strong></b></a>
                    <center>
                        <img src="img/sekolah.png" width=160px />
                    </center>
                </div>
                <p class="login-box-msg" style="font-size: 24px; color: #583101;">Login</p>
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('auth/cek_login'); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" style="border: 1px solid #DED6CC; outline: none;" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text" style="border: 1px solid #DED6CC; border-radius: 5px; outline: none;">
                                <span class="fas fa-envelope" style="color: #DED6CC;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" style="border: 1px solid #DED6CC; outline: none;" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text" style="border: 1px solid #DED6CC; border-radius: 5px; outline: none;">
                                <span class="fas fa-lock" style="color: #DED6CC;"></span>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center;">
                        <div class="row">
                            <div class="col-4 mx-auto">
                                <button type="submit" class="btn btn-primary btn-block" style="background-color: #7F5539; border: none;">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
