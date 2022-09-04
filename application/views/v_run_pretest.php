<!DOCTYPE html>
<html lang="en">

<head>

<?php $this->load->view('temp/head'); ?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card shadow-lg my-5">
                  <div class="card-header">
                    <h5> <b> Pre-Test </b> </h5>
                  </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-4">
                                  <?php
                                      $sans_array = array($question[0]->choice1, $question[0]->choice2, $question[0]->choice3,
                                                          $question[0]->choice4, $question[0]->answer);
                                      shuffle($sans_array);
                                   ?>
                                      <form action="<?php echo base_url('pretest/saveAnswer/'.$question[0]->id_pr_question) ?>" method="post">
                                      <input type="hidden" name="id_pr_question" value="<?php echo $question[0]->id_pr_question; ?>">

                                      <div class="row">
                                        <div class="col">
                                          <p class="font-weight-light">
                                            Level <?php echo $question[0]->level; ?> <br>
                                          
                                          </p>
                                        </div>
                                      </div>

                                      <?php if(strcmp($question[0]->image, NULL) == 0){ ?>
                                        <p class="text-justify">
                                          <?php echo $question[0]->number_of_question; ?>.
                                          <?php echo $question[0]->question; ?> <br>
                                     <?php } else{?>
                                       <img src="<?php echo base_url('assets/image/pretest/'.$question[0]->image) ?>" class="rounded mx-auto d-block" width="50%" alt="Responsive image">

                                       <p class="text-justify">
                                          <?php echo $question[0]->number_of_question; ?>
                                          <?php echo $question[0]->question; ?> <br>
                                       <?php } ?>

                                    <!-- jika option berupa gambar -->
                                    <br>
                                    <?php
                                      foreach ($sans_array as $optionDetails) {
                                        if(strpos($optionDetails, 'png') !== false) {
                                    ?>
                                    <input type="radio" name="pretest" value="<?php echo $optionDetails ?>">
                                    <img src="<?php echo base_url('assets/image/pretest/'.$optionDetails)?>" class="rounded" width="20%" alt="Responsive image"> <br>
                                    <br>
                                  <!-- jika option berupa string -->
                                  <?php }else{ ?>
                                    <input type="radio" name="pretest" value="<?php echo $optionDetails ?>"> <?php echo $optionDetails?> <br>
                                  <?php }
                                      } ?>

                                    <div class="row">
                                      <div class="col-xl-11"> </div>
                                        <button class="btn btn-success" type="submit"> Lanjut </button>
                                    </div>

                                    <hr>
                                      <p class="font-weight-light alert alert-danger">
                                      *Soal yang sudah kamu jawab akan disimpan dan tidak bisa kembali ke soal sebelumnya.</p>
                                  </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
</script>

</body>
</html>
