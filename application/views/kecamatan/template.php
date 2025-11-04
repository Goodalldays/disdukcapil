<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php $iden = $this->model_utama->view_where('identitas', array('id_identitas' => 1))->row_array(); ?>
    <meta name="description" content="<?php echo $iden['meta_deskripsi']; ?>">
    <meta name="keyword" content="<?php echo $iden['meta_keyword'];  ?>">
    <meta name="author" content="<?php  ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title><?php echo $title; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url(); ?>/assets/img/core-img/favicon.png">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CLato:300,400" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">



    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/carouselku.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/default-assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightbox/css/lightbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">

    <!-- pace theme -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/minimal.css">

</head>

<body>



    <!--==========================
      Portfolio Section Content
    ============================-->

    <?php echo $contents; ?>

    <!--==========================
      Portfolio Section Content
    ============================-->





    <!-- ******* All JS ******* -->
    <!-- Pace js (loading animation) -->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.slim.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="<?= base_url(); ?>assets/js/script.js">
</script>

</body>

</html>
