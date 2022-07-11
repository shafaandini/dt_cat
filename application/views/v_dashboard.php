<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('temp/head'); ?>

<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url().'dashboard' ?>">

              <div class="sidebar-brand-text"><?php echo $bio[0]->name; ?></div>
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

                    <h5 class="text-dark"> Design Thinking Adaptive Test </h5>

                    <ul class="navbar-nav ml-auto">
                          <a href="<?php echo base_url().'logout'; ?>" class="text-dark"> Keluar</a>
                    </ul>

                </nav>
                <div class="container-fluid">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
                    </div>

                    <div class="row">

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
                                  <p> Kamu belum mengikuti Pre-Test</p>
                                </div>
                              <?php }
                              else { ?>
                                <div class="card-body">
                                  <p><b> Kamu sudah mengikuti Pre-Test! </b></p>
                                  <p class="text-justify"> <?php echo $pretest[0]->id_level ?> | <?php echo $pretest[0]->level ?> <br>
                                     <?php echo $pretest[0]->description ?></p>
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
                                      <p><b> Kamu sudah mengikuti Post-Test! </b></p>
                                      <p class="text-justify"> <?php echo $posttest[0]->id_level ?> | <?php echo $posttest[0]->level ?> <br>
                                         <?php echo $posttest[0]->description ?></p>
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
                        <span>Copyright &copy; Your Website 2021</span>
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
