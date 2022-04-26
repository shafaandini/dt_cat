<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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

<body class="">
  <div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="assets/img/logo-small.png">
          </div>
        </a>

        <span class="simple-text">
          <span> <?= $bio[0]->name ?> </span>
        </span>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="<?php echo base_url('c_dashboard') ?>">
              <p>Beranda</p>
            </a>
          </li>
          <li class="active ">
            <a href="<?php echo base_url('c_dashboard/pretest') ?>">
              <p>Pre-Test</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('c_dashboard/posttest') ?>">
              <p>Post-Test</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand">Design Thinking Adaptive Test</a>
          </div>

          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="<?php echo base_url('c_login/logout') ?>"> Keluar</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Pre-Test</h5>
								<hr>
              </div>
              <div class="card-body">
                <p>Silakan ikuti Pre-Test terlebih dahulu</p>
                <button class="btn btn-success" type="button" href="#">Ikuti</button>
              </div>
            </div>
          </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script> </i>Made by Creative Tim, Modified by Shafa Putri Andini
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</body>

</html>
