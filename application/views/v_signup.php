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
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Graphic Design Adaptive Test</h1>
                                        <h5> Daftar </h5>
                                    </div>
                                    <form class="user" action="<?php echo base_url().'signup/process' ?>" method="post">
                                      <span style="text-align: center; font-size:10px">
                          							<p style="color:red"> <?php echo $this->session->flashdata('login_error'); ?> </p>
                          						</span>
                                      <div class="form-group">
                                        <label class="font-weight-light"> Nama Lengkap </label>
                                        <input type="text" class="form-control" name="name">
                                      </div>
                                      <div class="form-group">
                                        <label class="font-weight-light"> Kelas </label>
                                        <select class="form-control" name="class">
                                          <option></option>
                                          <option value="XI MM 1">XI MM 1</option>
                                          <option value="XI MM 2">XI MM 2</option>
                                       </select>
                                      </div>
                                      <div class="form-group">
                                        <label class="font-weight-light">  Nama Pengguna </label>
                                        <input type="text" class="form-control" name="username">
                                      </div>
                                      <div class="form-group">
                                        <label class="font-weight-light"> Kata Sandi</label>
                                        <input type="password" class="form-control" name="password">
                                      </div>

                                        <button class="btn btn-success btn-block"> Daftar </button>
                                    </form>

                                    <label> <br> Sudah punya akun? <a href="<?php echo base_url('login')?>">Masuk</a> </label>

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
