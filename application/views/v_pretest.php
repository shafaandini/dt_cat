<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('temp/head'); ?>

<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url().'dashboard' ?>">
              <div class="sidebar-brand-text"><?php echo $user[0]->name; ?></div>
          </a>

            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'dashboard' ?>">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>Beranda</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url().'pretest' ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Pre-Test</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'posttest' ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Post-Test</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->

                    <h5 class="text-dark"> Design Thinking Adaptive Test </h5>

                    <ul class="navbar-nav ml-auto">
                          <a href="<?php echo base_url().'logout'; ?>" class="text-dark"> Keluar</a>
                    </ul>

                </nav>
                <div class="container-fluid">

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-dark">Pre-Test</h6>
                                </div>
                                <!-- Card Body -->
                                <?php
                                if($getResult->num_rows() > 0) {
                                  if($lastResult[0]->id_pr_question == 3 AND $lastResult[0]->correct_status == 0){
                                ?>
                                <div class="card-body">
                                  <p> Ups kamu masih belum berhasil. Silakan ikuti tes kembali</p>
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPush">Ikuti</button>
                                </div>

                                <?php
                                  }else {?>

                                  <div class="card-body">
                                    <div class="row">
                                      <div class="col-6">
                                        <div class="alert alert-success" role="alert">
                                          <h4 class="alert-heading">Kamu sudah mengikuti Pre-Test!</h4>
                                          <p class="font-weight-light"> Design Thinking kamu berada di: </p>
                                          <p class="font-weight-bold"> Tingkat <?php echo $level[0]->level ?>  </p>
                                          <p class="mb-0"> </p>
                                          <hr>
                                          <p class="font-weight-bold"> Silakan mengikuti Post-Test di halaman Post-Test.
                                          </div>
                                      </div>

                                      <div class="col-6">
                                        <div class="alert alert-success" role="alert">
                                          <h5 class="font-weight-bold text-center">Poin Kamu</h5> <hr>
                                          <h1 class="display-2 font-weight-bold text-center"> <?php echo $getPrePoints[0]->count; ?></h1>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <?php } }
                                  else{
                                    ?>
                                    <div class="card-body">
                                      <p> Silakan ikuti Pre-Test.</p>
                                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPush">Ikuti</button>
                                    </div>

                                    <?php
                                  } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Shafa Putri Andini 2022</span>
                    </div>
                </div>
            </footer>

            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

<div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <div class="modal-content text-center">
      <div class="modal-header d-flex justify-content-center">
        <h5 class="heading text font-weight-bold">Design Thinking Adaptive Test <br> Pre-Test </h5>
      </div>
      <div class="modal-body">
        <p class="font-weight-light">Tes ini akan berisikan soal dari materi Prinsip dan Elemen Desain Grafis pada Mata Pelajaran
         Desain Grafis Percetakan. Tes ini diberikan untuk mengukur kemampuan Pemikiran Desain atau Design Thinking.
       </p>
      </div>
      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="<?php echo base_url('pretest/questiondisplay/'.$pretestQuestion[0]->id_pr_question); ?>" class="btn btn-success">Mulai Tes</a>
        <a type="button" class="btn btn-danger" data-dismiss="modal">Nanti</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>
</html>
