<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Design Thinking Adaptive Test</title>
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
              <div class="sidebar-brand-text"><?php echo $bio[0]->name; ?></div>
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
                                <div class="card-body">
                                  <p> Silakan ikuti Pre-Test terlebih dahulu</p>
                                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPush">Ikuti</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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
        <h6 class="heading text">Design Thinking Adaptive Test <br> Pre-Test </h6>
      </div>
      <div class="modal-body">
        <p>Tes ini akan berisikan soal dari materi Unsur dan Prinsip Tata Letak pada Mata Pelajaran
        Dasar Desain Grafis. Tes ini untuk mengukur kemampuan Pemikiran Desain atau Design Thinking
        di Mata Pelajaran Dasar Desain Grafis. <hr>
        ! Ketika sedang mengerjakan tes, jangan menekan tombol kembali agar tidak terjadi kegagalan !
       </p>
      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a href="<?php echo base_url().'run_pretest'; ?>" class="btn btn-success">Mulai Tes</a>
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
