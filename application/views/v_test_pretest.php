<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Design Thinking Adaptive Test
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  </head>

	<body>
	  <div class="container">
	    <div class="row">
	      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
	        <div class="card border-0 shadow rounded-3 my-5">
	          <div class="card-body p-4 p-sm-5">
              <p class="text-center"><?= $bio[0]->name ?></p>
              <h5 class="card-title text-center mb-10 fw-light fs-5"> Pre-Test </h5>
              <h6 class=" text-center"> Design Thinking Adaptive Test </h6>
              <label class=" text-justify p-3">
                Tes ini akan berisikan soal dari materi Unsur dan Prinsip Tata Letak pada Mata Pelajaran
                Dasar Desain Grafis. Tes ini untuk mengukur kemampuan Pemikiran Desain atau Design Thinking
                di Mata Pelajaran Dasar Desain Grafis.
              </label>
              <a class="btn btn-warning col-7" href="<?php echo base_url().'pretest'; ?>">Kembali ke Menu</a>
              <a class="btn btn-success col-4" href="<?php echo base_url().''; ?>">Mulai Tes</a>
	         </div>
          </div>
	       </div>
	      </div>
	    </div>
	</body>

</html>
