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
                                    foreach ($question as $key) {
                                      $sans_array = array($key->option1, $key->option2, $key->option3, $key->option4, $key->answer);
                                      shuffle($sans_array);
                                    ?>
                                  <form class="" action="<?php echo base_url('pretest/saveAnswer/'.$key->id_pr_question) ?>" method="post">
                                    <p class="text-left"> Tipe Soal: <?php echo $key->cat; ?></p>
                                    <p class="text-justify"> <?php echo $key->question; ?> </p>
                                    <input type="hidden" name="id_pr_question" value="<?php echo $key->id_pr_question; ?>">
                                    <input type="radio" name="pretest" value="<?php echo $sans_array[0] ?>"> <?php echo $sans_array[0]?> <br>
                                    <input type="radio" name="pretest" value="<?php echo $sans_array[1] ?>"> <?php echo $sans_array[1] ?> <br>
                                    <input type="radio" name="pretest" value="<?php echo $sans_array[2] ?>"> <?php echo $sans_array[2] ?> <br>
                                    <input type="radio" name="pretest" value="<?php echo $sans_array[3] ?>"> <?php echo $sans_array[3] ?> <br>
                                    <input type="radio" name="pretest" value="<?php echo $sans_array[4] ?>"> <?php echo $sans_array[4] ?>
                                    <?php } ?>
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
