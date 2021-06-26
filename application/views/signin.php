<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard

* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com
=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Rocco</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/icon.ico" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <!-- Sweet Alert 2 CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/sweetalert2/sweetalert2.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- App CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css" type="text/css">
  
</head>

<body class="" style="background:#eabfa4">

  <div class="container" >
    <!-- Outer Row -->
    <div class="row justify-content-center"  >

      <div class="col-xl-9 col-lg-11 col-md-8" >

        <div class="card o-hidden border-0 shadow-lg my-6 " >
          <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row" style="background:white">


              <div class="col-lg-6 d-none d-lg-block bg-login-image " style="background:white">
                <img src="<?php echo base_url(); ?>assets/img/rocco1.jpg" class="img-thumbnail">
              </div>



              <div class="col-lg-6" >
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h2">Iniciar Sesión</h1>
                  </div>

                          <br>
                      <form role="form" action="<?php echo base_url();?>Signin/signIn" method="post" >


                        <div class="form-group ">
                          <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input class="form-control" name="email" placeholder="Email" type="email">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control" name="password" placeholder="Password" type="password">
                          </div>
                        </div>

                        <div class="text-center">
                          <button type="sub" class="btn btn-dark btn-lg btn-block" style="background:#f0af85">Iniciar sesion</button>
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
    
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-scroll-lock/jquery-scrollLock.min.js"></script>
  <!-- Sweet Alert 2 -->
  <script src="<?php echo base_url(); ?>assets/vendor/sweetalert2/sweetalert2.min.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url(); ?>assets/js/argon.js?v=1.2.0"></script>

  
</body>

</html>