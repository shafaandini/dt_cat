<!DOCTYPE html>
<html lang="en">

<head>

<?php $this->load->view('temp/head'); ?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card shadow-lg my-5">
                  <div class="card-header alert alert-warning">
                    <h5 class="text-center"> <b> uupss </b> </h5>
                  </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-4">
                                  Kamu sudah menjawab soal ini. Silakan kembali ke soal yang sedang kamu kerjakan.
                                  <br> <br>
                                  <div class="row">
                                    <div class="col-xl-4"> </div>
                                      <a href="<?php echo base_url('posttest/questiondisplay/'.$last[0]->id_ps_question); ?>" class="btn btn-warning">Kembali ke Soal</a>

                                  </div>
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
