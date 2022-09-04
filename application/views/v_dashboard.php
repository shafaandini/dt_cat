<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('temp/head'); ?>

<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url().'dashboard' ?>">

              <div class="sidebar-brand-text"></div>
          </a>

            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url().'dashboard' ?>">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>Beranda</span></a>
            </li>

            <li class="nav-item">
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

                  <h5 class="text-dark"> Graphic Design Adaptive Test  </h5>

                    <ul class="navbar-nav ml-auto">
                       <?php echo $bio[0]->name ?> |
                      <a href="<?php echo base_url().'logout'; ?>" class="text-dark"> Keluar</a>
                    </ul>

                </nav>
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
                    </div>

                    <div class="row">

                      <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-dark">
                              Halo, <?php echo $bio[0]->name ?>, <?php echo $bio[0]->class ?> !</h6>
                          </div>
                        </div>
                      </div>


                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-dark">Pre-Test</h6>
                                </div>
                                <!-- Card Body -->
                              <?php if($bio[0]->result_pretest == NULL){ ?>
                                <div class="card-body">
                                  <p> Silakan ikuti Pre-Test terlebih dahulu di halaman <b>Pre-test</b></p>
                                </div>
                              <?php }
                              else { ?>
                                <div class="card-body">
                                  <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading font-weight-bold">Kamu sudah mengikuti Pretest!</h4>
                                    <p class="font-weight-light"> Design Thinking kamu berada di: </p>
                                    <p class="font-weight-bold">Tingkat <?php echo $pretest[0]->level ?> <br> <?php echo $pretest[0]->category ?>  </p>
                                    <p class="font-weight-light"> <?php echo $pretest[0]->description ?>  </p>

                                  </div>

                                  <div class="alert alert-success" role="alert">
                                    <h5 class="font-weight-bold text-center">Nilai Kamu</h5> <hr>
                                    <h1 class="display-2 font-weight-bold text-center"> <?php echo $getPreScore[0]->count; ?></h1>
                                  </div>

                                </div>
                              <?php } ?>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-dark">Post-Test</h6>
                                </div>
                                <!-- Card Body -->
                                <?php if($bio[0]->result_posttest == NULL) {?>
                                  <div class="card-body">
                                    <p> Kamu belum mengikuti Post-Test</p>
                                  </div>
                                <?php }
                                  else { ?>
                                    <div class="card-body">
                                      <div class="alert alert-success" role="alert">
                                        <h4 class="alert-heading font-weight-bold">Kamu sudah mengikuti Post-Test!</h4>
                                        <p class="font-weight-light"> Design Thinking kamu berada di: </p>
                                        <p class="font-weight-bold">Tingkat <?php echo $posttest[0]->level ?> <br> <?php// echo $lastPosttest[0]->category ?>  </p>
                                        <p class="font-weight-light"> <?php// echo $lastPosttest[0]->description ?>  </p>

                                      </div>

                                      <div class="alert alert-success" role="alert">
                                        <h5 class="font-weight-bold text-center">Poin Kamu</h5> <hr>
                                        <h1 class="display-2 font-weight-bold text-center"> <?php echo $getPostPoints[0]->count; ?></h1>
                                      </div>

                                    </div>
                                  <?php } ?>
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

</body>
</html>
