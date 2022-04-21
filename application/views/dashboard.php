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
          <span> nama siswa </span>
        </span>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.html">
              <p>Beranda</p>
            </a>
          </li>
          <li>
            <a href="./pretest.html">
              <p>Pre-Test</p>
            </a>
          </li>
          <li>
            <a href="./posttest.html">
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
                <a class="nav-link btn-rotate" href="#"> Keluar</a>
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
                <h5 class="card-title">Hasil Tes </h5>
								<hr>
              </div>
              <div class="card-body">

								<!-- hasil pre-test -->
								<div class="row">
								<div class="col-md-6">
									<div class="card">
										<div class="card-header">
											<div class="card-title">
												<span>Pre-test</span>
												<hr>
											</div>
											<div class="card-body">
												<p>Hasil pre-test</p>
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="card">
										<div class="card-header">
											<div class="card-title">
												<span>Post-Test</span>
												<hr>
											</div>
											<div class="card-body">
												<p>Hasil Post-Test</p>
											</div>
										</div>
									</div>
								</div>
								</div>
								<!-- hasil pre-test END-->

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
                </script> </i> by Creative Tim, Modified by Shafa Putri Andini
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</body>

</html>
