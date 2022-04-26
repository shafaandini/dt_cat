<?php $status = 0;

if($status != 0){
  
}?>
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
	            <h5 class="card-title text-center mb-10 fw-light fs-5">Design Thinking Adaptive Test</h5>
	            <form action="<?php echo base_url('c_login/process') ?>" method="post">

                <span style="text-align: center; font-size:10px">
    							<p style="color:red"> <?php echo $this->session->flashdata('login_error'); ?> </p>
    							<p style="color:green"> <?php echo $this->session->flashdata('input_success'); ?> </p>
    						</span>

	              <div class="form-floating mb-3">
                  <?php //echo $status; ?>
	                <label for="floatingInput">Nama Pengguna</label>
									<input type="text" class="form-control" name="username">
	              </div>
	              <div class="form-floating mb-3">
									<label for="floatingPassword">Kata Sandi</label>
	                <input type="password" class="form-control" name="password">
	              </div>
	              <div class="form-floating mb-3">
	                <button class="btn btn-success" type="submit" name="login">Masuk</button>
	              </div>
	            </form>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
		<!--<a href="<?php //echo base_url('c_login/process') ?>"> dashboard</a>-->
	</body>

</html>
