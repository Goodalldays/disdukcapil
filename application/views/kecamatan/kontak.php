<body>
  <!-- <header class="header-area">

    <?php include("top-header.php"); ?>
    <?php include("main-header-menu.php"); ?>

  </header> -->

  <?php $iden = $this->model_utama->view_where('identitas', array('id_identitas' => 1))->row_array(); ?>
  <section id="tentang" class="dento--blog-area mt-50">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8 wow fadeInUp">
          <h4><?php echo $iden['meta_keyword'] ?></h4>
          <div id="alamat">
            <?php $alamat =  $this->model_utama->view_where('mod_alamat', array('id_alamat' => 1))->row_array(); ?>
            <p><i class="icon_pin"></i><a href="#map"> <?php echo $alamat['alamat']; ?></a></p>
            <p><i class="icon_phone mr-120"></i><a href="tel:<?php echo $iden['no_telp']; ?>"> <?php echo $iden['no_telp']; ?></a></p>
            <p><i class="icon_mail"></i><a href="mailto:<?php echo $iden['email']; ?>"> <?php echo $iden['email']; ?></a></p>

            <?php $social = explode(",", $iden['facebook']); ?>
            <div id="about">
              <a href="<?php echo $social[0] ?>" target="_blank" class="fa fa-facebook"></a>
              <a href="<?php echo $social[1] ?>" target="_blank" class="fa fa-twitter"></a>
              <a href="<?php echo $social[3] ?>" target="_blank" class="fa fa-instagram"></a>
              <a href="<?php echo $social[4] ?>" target="_blank" class="fa fa-youtube"></a>
            </div>
          </div>


          <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success alert-dismissible fade show col-md-11" role="alert"> <?= $this->session->flashdata('success') ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>

          <?php } ?>
          <?php
          if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissible fade show col-md-11" role="alert"> <?= $this->session->flashdata('error') ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>
          <?php } ?>


          <?php if (validation_errors()) { ?>
            <div class="alert alert-danger">
              <?php echo validation_errors(); ?>
            </div>
          <?php
          } ?>

          <form action="<?php echo base_url() . 'Kontak_kami/kirim_pesan'; ?>" method="post" class="wow fadeInDown">
            <h3 class="mb-30"><?php echo $title ?></h3>
            <p>Silahkan mengisi fasilitas komunikasi <b>Kontak Kami</b>. Mohon masukan dan pertanyaan disampaikan secara bijak dengan kata-kata yang baik.</p>




            <div class="messages"></div>

            <div class="controls">
              <?php $attributes = array("nama" => "Kontak_kami");
              echo form_open("kontak-kami/index", $attributes); ?>
              <div class="row">
                <div class="col-md-11">
                  <label for="form_name">Nama Lengkap *</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                    </div>
                    <input id="form_name" type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap anda." required="required" data-error="Firstname is required." value="<?php set_value('nama'); ?>"><span><?php echo form_error('nama'); ?></span>
                    <div class="help-block with-errors"></div>
                  </div>

                  <label for="form_name">Email *</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-at"></i></span>
                    </div>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Masukkan alamat email anda." required="required" data-error="Valid email is required." value="<?php echo set_value('email'); ?>"><span><?php echo form_error('email'); ?></span>
                    <div class="help-block with-errors"></div>
                  </div>

                  <label for="form_name">Subjek *</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-compass"></i></span>
                    </div>
                    <input id="form_phone" type="tel" name="subjek" class="form-control" required="required" placeholder="Masukkan subjek atau perihal pesan anda." value="<?php echo set_value('subjek'); ?>"><span class="text-danger"><?php echo form_error('subjek'); ?></span>
                    <div class="help-block with-errors"></div>
                  </div>

                  <label for="form_name">Pesan/ Masukan/ Pertanyaan *</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-comments"></i></span>
                    </div>
                    <textarea id="form_pesan" name="pesan" class="form-control" placeholder="Masukkan pesan/ masukan/ pertanyaan anda." rows="6" required="required" data-error="Please,leave us a message."><?php echo set_value('pesan'); ?></textarea>
                    <span class="text-danger"><?php form_error('pesan'); ?></span>
                    <div class="help-block with-errors"></div>
                  </div>

                </div>
                <div class="col-md-12">
                  <p class="text-muted" style="margin-top: -10px"><strong>*</strong> Kolom wajib diisi.</p>
                </div>
                <div class="col-md-12 mb-50">
                  <input name="submit" type="submit" class="btn btn-primary btn-send mt-20 py-2 px-3" value="Kirim Pesan">
                </div>
                <?php echo form_close(); ?>
                <?php echo $this->session->flashdata('msg'); ?>
              </div>

            </div>

          </form>
        </div>


        <!-- <?php include("sidebar.php"); ?> -->
      </div>
    </div>
  </section>

  <div id="map" class="wow fadeInDown">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.728762218236!2d101.83967061431501!3d0.38389669971991663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5c58bc8ce98ef%3A0x765212d438af9402!2sDiskominfo%20Pelalawan!5e0!3m2!1sen!2sid!4v1615166691704!5m2!1sen!2sid" width="100%" height="450" style="border:0; margin-bottom:-20px;" allowfullscreen="" loading="lazy"></iframe>
  </div>

  <!-- ***** Footer Area Start ***** -->
  <!-- <?php include("footer.php"); ?> -->
  <!-- ***** Footer Area End ***** -->
