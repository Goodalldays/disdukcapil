<?php
if ($this->session->level == '') {
  redirect(base_url('administrator'));
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

<?php $iden = $this->model_utama->view_where('identitas', array('id_identitas' => 1))->row_array(); ?>
    <link rel="icon" href="<?php echo base_url(); ?>/upload/favicon/<?= $iden['favicon'] ?>">

    <link href="<?= base_url(); ?>assets/template/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

        <script src="<?= base_url(); ?>assets/template/admin/vendor/jquery/jquery.min.js"></script>

    <link href="<?= base_url(); ?>assets/template/admin/vendor/pace/minimal.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/template/admin/css/sb-admin-2.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets/template/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets/template/admin/vendor/sweetalert2/theme/bootstrap4/bootstrap-4.min.css" rel="stylesheet">


    <link href="<?= base_url(); ?>assets/template/admin/vendor/lightbox/lightbox.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets/template/admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets/template/admin/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet">

    <script src="<?= base_url(); ?>assets/template/admin/vendor/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?= base_url(); ?>assets/template/admin/vendor/dropzone/min/dropzone.min.js"></script>


    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>



    <script src="<?= base_url(); ?>assets/template/admin/vendor/chart.js/Chart.min.js"></script>

    <link href="<?= base_url(); ?>assets/template/admin/css/style.admin.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/template/admin/vendor/ckeditor/ckeditor.js"></script>

</head>

<body id="page-top">
    <div id="wrapper">
        <?php include "sidebar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php include "topnav.php" ?>

                <section class="content">
                    <?php echo $contents; ?>
                </section>

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Developed by Tim IT E-Gov &copy; <span id="tahunIni"></span> <a href="https://diskominfo.pelalawankab.go.id"
                                    target="_blank">Diskominfo Kab. Pelalawan</a></span>

                        </div>
                    </div>
                </footer>
            </div>

        </div>

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/template/admin/vendor/filepond/filepond.min.js"></script>

    <script src="<?= base_url(); ?>assets/template/admin/vendor/pace/pace.min.js"></script>

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js">
    </script>

    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

    <script src="<?= base_url(); ?>assets/template/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url(); ?>assets/template/admin/vendor/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script src="<?= base_url(); ?>assets/template/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="<?= base_url(); ?>assets/template/admin/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url(); ?>assets/template/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script src="<?= base_url(); ?>assets/template/admin/vendor/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>


<script src="<?= base_url(); ?>assets/template/admin/vendor/lightbox/lightbox.js"></script>

    <!-- <script src="<?= base_url(); ?>assets/vendor/datatables/datatables.min.js"></script> -->
    <script src="<?= base_url(); ?>assets/template/admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>assets/template/admin/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="<?= base_url(); ?>assets/js/demo/datatabxles-demo.js"></script> -->

    <script src="<?= base_url(); ?>assets/template/admin/js/script.admin.js"></script>

</body>

</html>

<?php } ?>
