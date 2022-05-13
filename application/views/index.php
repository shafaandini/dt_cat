<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('temp/head'); ?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Design Thinking Adaptive Test</h1>
                                    </div>
                                    <form class="user" action="<?php echo base_url().'login/process' ?>" method="post">
                                      <span style="text-align: center; font-size:10px">
                          							<p style="color:red"> <?php echo $this->session->flashdata('login_error'); ?> </p>
                          						</span>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp" name="username"
                                                placeholder="Nama Pengguna">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                               placeholder="Kata Sandi">
                                        </div>
                                        <button class="btn btn-user btn-success btn-block"> Masuk </button>

                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>
</html>
