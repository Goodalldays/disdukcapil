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

    <title><?php echo $title; ?></title>

<?php $iden = $this->model_utama->view_where('identitas', array('id_identitas' => 1))->row_array(); ?>
    <link rel="icon" href="<?php echo base_url(); ?>/upload/favicon/<?= $iden['favicon'] ?>">

     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">


<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/template/breezed/css/minimal.css"> -->

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/template/breezed/css/bootstrap.min.css">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/template/breezed/css/font-awesome.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/breezed/css/templatemo-breezed.css">


    <link href="<?= base_url(); ?>assets/template/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/breezed/css/owl-carousel.css">

<link rel="stylesheet" href="<?= base_url(); ?>assets/template/breezed/css/jarallax.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/template/breezed/css/lightbox.css">

<link rel="stylesheet" href="<?= base_url(); ?>assets/template/breezed/css/custom.css">
<script src="<?= base_url(); ?>assets/template/breezed/js/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- <div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div> -->
<?php include "topheader.php"; ?>

<?php include "topnav.php"; ?>

</head>

<body>
    <?php echo $contents; ?>

    <?php include "footer.php"; ?>

    <!-- <script src="<?= base_url(); ?>assets/template/breezed/js/pace.min.js"></script> -->

    <script src="<?= base_url(); ?>assets/template/breezed/js/popper.js"></script>
    <script src="<?= base_url(); ?>assets/template/breezed/js/bootstrap.min.js"></script>

    <script src="<?= base_url(); ?>assets/template/breezed/js/jarallax.min.js"></script>


    <script src="<?= base_url(); ?>assets/template/breezed/js/owl-carousel.js"></script>
    <script src="<?= base_url(); ?>assets/template/breezed/js/scrollreveal.min.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/template/breezed/js/waypoints.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/template/breezed/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url(); ?>assets/template/breezed/js/imgfix.min.js"></script>

    <script src="<?= base_url(); ?>assets/template/admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>assets/template/admin/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- <script src="<?= base_url(); ?>assets/template/breezed/js/slick.js"></script> -->
    <script src="<?= base_url(); ?>assets/template/breezed/js/lightbox.js"></script>
    <script src="<?= base_url(); ?>assets/template/breezed/js/isotope.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/jarallax@1.10.7/dist/jarallax.min.js"></script>


    <script src="<?= base_url(); ?>assets/template/breezed/js/custom.js"></script>

    <!-- <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });
    </script> -->

</body>

</html>
