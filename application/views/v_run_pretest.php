<!DOCTYPE html>
<html lang="en">

<head>

<?php $this->load->view('temp/head'); ?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
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
                                      <p class="text-left"> Tipe Soal: <?php echo $question[0]->category; ?></p>
                                      <img src="<?php echo base_url('assets/image/'.$question[0]->image) ?>" class="img-fluid">
                                      <p class="text-justify"> <?php echo $question[0]->question; ?> <br>

                                    <!-- jika option berupa gambar -->
                                    <?php
                                      foreach ($sans_array as $optionDetails) {
                                        if(strpos($optionDetails, 'png') !== false) {
                                    ?>
                                    <input type="radio" name="pretest" value="<?php echo $optionDetails ?>">
                                    <img src="<?php echo base_url('assets/image/'.$optionDetails)?>" class="img-fluid"> <br>

                                  <!-- jika option berupa string -->
                                  <?php }else{ ?>
                                    <input type="radio" name="pretest" value="<?php echo $optionDetails ?>"> <?php echo $optionDetails?> <br>
                                  <?php }
                                      } ?>

                                    <div class="row">
                                      <div class="col-xl-10"> </div>
                                        <button class="btn btn-success" type="submit"> Lanjut </button>
                                    </div>
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
