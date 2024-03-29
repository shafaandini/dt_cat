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
                      <?php echo $user[0]->name ?> |
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
                                          <h4 class="alert-heading font-weight-bold">Kamu sudah mengikuti Pre-Test!</h4>
                                          <p class="font-weight-light"> Design Thinking kamu berada di: </p>
                                          <p class="font-weight-bold"> Tingkat <?php echo $level[0]->level ?> <br> <?php echo $level[0]->category ?>  </p>
                                          <p class="font-weight-light"> <?php echo $level[0]->description ?>  </p>
                                          <hr>
                                          <b> Silakan mengikuti Post-Test di halaman Post-Test. </b>
                                          </div>
                                      </div>

                                      <div class="col-6">
                                        <div class="alert alert-success" role="alert">
                                          <h5 class="font-weight-bold text-center">Nilai Kamu</h5> <hr> <br>
                                          <h1 class="display-2 font-weight-bold text-center"> <?php echo $getPreScore[0]->count; ?></h1> <br> <br>
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
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center">
        <h5 class="heading text font-weight-bold text-center">Design Thinking Adaptive Test <br> Pre-Test </h5>
      </div>
      <div class="modal-body">
        <p class="font-weight-bold"> Tentang tes: </p>
        <table class="table">
          <tbody>
            <tr class="font-weight-light">
              <td>1.</th>
              <td>Tes ini berisikan soal dari materi Prinsip, Elemen, dan Tipografi Desain Grafis pada Mata Pelajaran Desain Grafis Percetakan</td>
            </tr>
            <tr class="font-weight-light">
              <td>2.</th>
              <td>Soal berjumlah 20</td>
            </tr>
            <tr class="font-weight-light">
              <td>3.</th>
              <td>Jika jawaban benar, maka nomor akan berganti. Namun jika jawaban salah, maka akan tetap pada nomor tersebut dengan pertanyaan yang lebih mudah </td>
            </tr>
            <tr class="font-weight-light">
              <td>4.</th>
              <td>Pertanyaan di nomor yang sama memiliki perbedaan pada tulisan yang dicetak tebal</td>
            </tr>
            <tr class="font-weight-light">
              <td>5.</th>
              <td>Setiap soal yang dijawab benar akan bernilai 1.</td>
            </tr>
            <tr class="font-weight-light">
              <td>6.</th>
              <td> Pastikan yakin dengan pilihanmu karena jika sudah dijawab, tidak bisa kembali ke nomor sebelumnya.</td>
            </tr>
            <tr class="font-weight-light">
              <td>7.</th>
              <td>Jika menjawab 3x salah berturut-turut pada nomor yang sama, maka tes selesai (keluar dari sistem).</td>
            </tr>
          </tbody>
        </table>
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
