<section class="section" id="contact-us">
        <div class="container">
          <div class="section-heading" style="margin-bottom: 30px;">
                        <h6 data-scroll-reveal="enter left move 10px over 0.4s after 0.2s">Kontak</h6>
                        <h2 data-scroll-reveal="enter left move 20px over 0.6s after 0.4s">Tetap terhubung dengan kami</h2>
                    </div>
            <div class="row">



                    <?php $iden = $this->model_utama->view_where('identitas', array('id_identitas' => 1))->row_array(); ?>
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="left-text-content">
                      <div class="about-info">
                      <div class="head-about spac">
                        <p><?= $iden['long_website'] ?></p>
                        <p class="tagline"><?= $iden['tagline'] ?></p>
                      </div>
                      <div class="isolate-class-info">
<div class="spac">
  <i class="fa fa-map-marker"></i><span><a href=""><?php echo $iden['alamat']; ?></span></a>
</div>
<div class="spac">
  <i class="fa fa-phone"></i><span><a href="tel:<?= $iden['no_telp'] ?>"> <?php echo $iden['no_telp']; ?></span></a>
</div>
<div class="">
  <i class="fa fa-at"></i><span><a href="mailto:<?= $iden['email'] ?>"> <?php echo $iden['email']; ?></span></a>
</div>
</div>
</div>
            <div id="about">
              <a href="<?= $iden['facebook'] ?>" target="_blank" class="fa fa-facebook"></a>
              <a href="<?= $iden['twitter'] ?>" target="_blank" class="fa fa-twitter"></a>
              <a href="<?= $iden['instagram'] ?>" target="_blank" class="fa fa-instagram"></a>
              <a href="<?= $iden['youtube'] ?>" target="_blank" class="fa fa-youtube"></a>
            </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form">
                        <form action="<?php echo base_url() . 'kontak/kirim_pesan'; ?>" method="post">
<?php $attributes = array("nama" => "Kontak_kami");
              echo form_open("kontak/index", $attributes); ?>
                          <div class="row">

          <?php if (validation_errors()) { ?>
            <div class="col-lg-12">
            <div class="alert alert-danger">
              <?php echo validation_errors(); ?>
            </div>
            </div>
          <?php
          } ?>



                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="nama" type="text" id="nama" placeholder="Nama Lengkap" required="" autocomplete="off">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="no_telp" type="tel" id="no_telp" placeholder="No. Telp" required="" autocomplete="off">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="email" id="email" placeholder="Email" required="" autocomplete="off">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="subjek" type="text" id="subjek" placeholder="Subjek Pesan" autocomplete="off">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="pesan" rows="6" id="pesan" placeholder="Isi Pesan" required="" autocomplete="off"></textarea>
                              </fieldset>
                              <div style="margin-bottom:15px; margin-top:-26px; color:#777777"><small> * semua form harus diisi</small></div>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="submit" class="main-button-icon">Kirim Pesan <i class="fa fa-arrow-right"></i></button>
                              </fieldset>
                            </div>
                          </div>
                        <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <div id="map" class="" style="margin-bottom: -68px;">
    <iframe src="<?= $iden['maps'] ?>" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>


<?php if ($this->session->flashdata('success')) { ?>
<script>

    Swal.fire({
                        icon: 'success',
                        showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  },
                        title: 'Berhasil!',
                        text: 'Pesan berhasil dikirim',
                        timer: 5000,
                        timerProgressBar: true,
                        showCancelButton: false,
                        showConfirmButton: false
                    }).then(
                        function () {},
                        function (dismiss) {
                            if (dismiss === 'timer') {}
                        }
                    )
  </script>

          <?php } ?>
          <?php
          if ($this->session->flashdata('error')) { ?>
            <script>
            Swal.fire({
                icon: 'error',
                showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  },
                title: 'Gagal!',
                text: 'Pesan gagal dikirim!',
                timer: 1500,
                timerProgressBar: true,
                showCancelButton: false,
                showConfirmButton: false
            }).then(
                function () {},
                function (dismiss) {
                if (dismiss === 'timer') {}
                }
            )
            </script>
          <?php } ?>
