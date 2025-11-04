<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <?php $iden = $this->model_utama->view_where('identitas', array('id_identitas' => 1))->row_array(); ?>
    <link rel="icon" href="<?php echo base_url(); ?>/upload/favicon/<?= $iden['favicon'] ?>">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/template/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/template/admin/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="">
<!-- <body class="bg-gradient-primary"> -->

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-6 img-login" style="background-image: url('<?= base_url() ?>upload/bg.jpg');background-position: center; background-size: cover; position: relative; max-width: 100%;">

                            <div class="img-overlay"></div>
<!-- <img src="<?= base_url() ?>upload/logo.png" alt="" style="width: 200px;"> -->
                            </div>
  <style>
      .img-overlay {
          width: 97.5%;
  height: 100vh;
            background: rgb(133,154,214);
background: radial-gradient(circle, rgba(133,154,214,1) 0%, rgba(78,115,223,1) 100%);
            opacity: .8;
            position: absolute;
            overflow: hidden;
      }
  </style>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="">
                                        <h1 class="h3 text-gray-900 mb-4">Selamat datang,</h1>
                                        <h1 class="h6 text-gray-900 mb-4">silahkan isi <strong>username</strong> dan <strong>password</strong> pada form dibawah untuk dapat masuk ke dalam halaman administrator.</>
                                    </div>
                                    <?php
            echo $this->session->flashdata('message');
            echo form_open($this->uri->segment(1).'/index');
        ?>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" aria-describedby="emailHelp"
                                                placeholder="Masukkan username">
                                        </div>
<div class="form-group">
<div class="input-group" id="show_hide_password">
  <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
  <div class="input-group-append">
    <span class="input-group-text show-pw" style="cursor: pointer;">
      <i class="fa fa-eye-slash" aria-hidden="true"></i>
    </span>
  </div>
</div>
</div>


                                                                                <!-- captcha disabled: no security-code required -->
<div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ingat saya</label>
                                            </div>
                                        </div>
                                        <button name='submit' type="submit" class="btn btn-primary btn-user btn-block">
                                            Masuk
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center mt-2">
                                        <a class="small" data-dismiss="modal" aria-hidden="true" data-toggle='modal' href='#lupapass' data-target='#lupapass'>Anda lupa password?</a>
                                    </div>
                                    <!-- <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/template/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/template/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/template/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/template/admin/js/sb-admin-2.min.js"></script>

</body>
<div class="modal fade" id="lupapass" role="dialog" aria-labelledby="lupapass" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-l" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-newspaper fa-sm fa-fw mr-2 text-gray-400">
                </i> Lupa Password
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body mx-4" style="margin:40px 0">
          <h6 class="text-center mx-3">Fitur ini sedang dalam tahap pengembangan</h6>
      </div>

    </div>
  </div>
</div>

</html>

<script>
    $(document).ready(function() {
    $("#show_hide_password .show-pw").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>
