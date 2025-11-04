<!-- <footer class="footer-area" style="background: #3b3b3b; border-top: 10px solid #1580ed;"> -->
<?php $footer_img = $this->model_utama->view_where('gambar_latar', array('id_latar' => 1))->row_array(); ?>
<footer class="footer-area bg-img bg-gradient-overlay" style="background-image: url(<?= base_url() ?>upload/img_latar/<?= $footer_img['gambar_kaki']; ?>); border-top: 10px solid #5fb759; margin-top:60px;">

<?php $iden = $this->model_utama->view_where('identitas', array('id_identitas' => 1))->row_array(); ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="single-footer-widget">
          <!-- Widget Title -->
          <h5 class="widget-title">Tentang Kami</h5>
          <h6 class="widget-title"><?= $iden['long_website'] ?></h6>
          <p style="margin-top:-12px;"><?= $iden['tagline'] ?></p>
          <?php $logo = $this->model_utama->view_where('logo', array('id_logo' => 1))->row_array(); ?>
          <div style="margin-top: 10px;">
          <a href="<?= base_url() ?>" class="d-block mb-4"><img src="<?php echo base_url() ?>/upload/img_logo/<?= $logo['gambar'] ?>" width="250px" alt=""></a></div>
        </div>
      </div>

      <!-- Single Footer Widget -->
      <div class="col-lg-4">
          <div class="single-footer-widget">
            <!-- Widget Title -->
            <h5 class="widget-title">Tautan Cepat</h5>

            <!-- Quick Links Nav -->
            <nav>
              <ul class="quick-links">
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <li><a href="<?= base_url(); ?>berita">Berita</a></li>
                <li><a href="<?= base_url(); ?>foto">Foto</a></li>
                <li><a href="<?= base_url(); ?>video">Video</a></li>
                <li><a href="<?= base_url(); ?>pengumuman">Pengumuman</a></li>
                <li><a href="#">Sitemap</a></li>
                <li><a href="<?= base_url() ?>unduhan">Unduhan</a></li>
                <li><a href="<?= base_url(); ?>rss.xml">RSS</a></li>
                <li><a href="<?= base_url(); ?>agendad">Agenda</a></li>
                <li><a href="<?= base_url(); ?>kontak" target="_blank">Kontak</a></li>
              </ul>
            </nav>
          </div>
        </div>


      <!-- Single Footer Widget -->

      <div class="col-lg-4">
        <div class="single-footer-widget">
          <!-- Widget Title -->
          <h5 class="widget-title">Kontak Kami</h5>
          <div class="footer-contact">
            <table>
              <tbody>
                <tr>
                  <td class="align-top">
                    <i class="fa fa-map-marker"></i>
                  </td>
                  <td>
                    <p class="ml-2"><?php echo  $iden['alamat']; ?></p>
                  </td>
                </tr>
                <tr>
                <td class="align-top">
                    <i class="fa fa-phone align-center"></i>
                  </td>
                  <td>
                    <a class="ml-2" href="tel:<?php echo $iden['no_telp']; ?>"><?php echo $iden['no_telp']; ?></a>
                  </td>
                </tr>
                <tr>
                <td class="align-top">
                    <i class="fa fa-envelope"></i>
                  </td>
                  <td>
                  <a class="ml-2" href="mailto:<?php echo $iden['email']; ?>"><?php echo $iden['email']; ?></a>
                  </td>
                  </tr>
              </tbody>

            </table>
            <!-- <div class="footer-newsletter-form">
              <form action="#" method="post">
                <input type="email" name="nl-email" value="" placeholder="Email Address">
                <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
              </form>
            </div> -->

            <!-- Social Info -->
            <div class="footer-social-info">
              <a href="<?= $iden['facebook'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
              <a href="<?= $iden['twitter'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
             <a href="<?= $iden['instagram'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"><i class="fa fa-instagram"></i></a>
             <a href="<?= $iden['youtube'] ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Youtube"><i class="fa fa-youtube"></i></a>
            </div>

            <center>
              <!-- <p><strong>.: STATISTIK PENGUNJUNG :.</strong></p> -->
              <?php
              $pengunjung       = $this->model_utama->pengunjung()->num_rows();
              $totalpengunjung  = $this->model_utama->totalpengunjung()->row_array();
              $hits             = $this->model_utama->hits()->row_array();
              $totalhits        = $this->model_utama->totalhits()->row_array();
              $pengunjungonline = $this->model_utama->pengunjungonline()->num_rows();
              ?>
              <!-- <p><i class="fa fa-user"></span></i>Hari ini : <?php echo $pengunjung; ?>
                <i class="fa fa-signal"></i> Total : <?php echo $hits; ?>

                <i class="fa fa-user-circle"></i>Online : <?php echo $pengunjungonline; ?></p>
              <p>Sejak Tanggal 26/07/2019</p> -->
            </center>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Copywrite Area -->
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="copywrite-content">
          <p style="color: #ffffff;">Copyright &copy; <?php echo date('Y'); ?></script> All rights reserved | <?php echo $iden['nama_website']; ?> <br> Developed by <i class="fa fa-bolt" aria-hidden="true"></i> <a href="http://diskominfo.pelalawankab.go.id" target="_blank">Tim IT E-Gov Diskominfo.</a></p>
        </div>
      </div>
    </div>
  </div>
</footer>
