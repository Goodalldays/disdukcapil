  <header class="header-area">

    <!-- <?php include "top-header.php"; ?>
    <?php include "main-header-menu.php"; ?> -->
  </header>
  <section class="dento--blog-area mt-50">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8 mb-50">
          <!-- Blog Details Area -->


          <div class="blog-details-area wow fadeInUp">
            <?php if ($rows['gambar'] == '') {
              echo "<img style='width: 100%; border-radius: 2px;' src='" . base_url() . "upload/img_album/no-image.jpg' alt='no-image.jpg'/>";
            } else { ?>
              <img style="width: 100%; border-radius: 2px;" src="<?php echo base_url() . "upload/foto_berita/" . $rows['gambar'] ?>" alt="<?php echo $rows['judul'] ?>">
            <?php } ?>

            <h2 class="post-title"><?php echo $rows['judul']; ?></h2>

            <div class="post-meta">
              <a class="disable" href="#"><i class="fa fa-calendar"></i> <?php echo tgl_indo($rows['tanggal']); ?></a>
              <a class="disable" href="#"><i class="fa fa-eye"></i> <?php echo number_format($rows['dibaca'] + 1); ?></a>

              <a class="disable" href="#"><i class="fa fa-user"></i> <?php echo $rows['nama_lengkap']; ?></a>
              <?php  ?>
            </div>
            <p>
              <?php echo $rows['isi_berita']; ?>
            </p>

          </div>

          <!-- Post Share  -->
          <div class="post-share-area mb-30">
            <a href="https://www.facebook.com/sharer.php?u=<?php echo base_url() ?>berita/detail/<?php echo $rows['judul_seo']; ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i> Share</a>
            <a href="https://twitter.com/share?url=<?php echo base_url() ?>berita/detail/<?php echo $rows['judul_seo']; ?>" target="_blank" class="tweet"><i class="fa fa-twitter"></i> Tweet</a>
            <!-- <a href="https://plus.google.com/share?url=<?php echo base_url() ?>/berita/<?php echo $rows['id_berita']; ?>/<?php echo $rows['judul_seo']; ?>" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i> Share</a> -->
            <!--<a href="whatsapp://send?text=<?php echo base_url() ?>berita/detail/<?php echo $rows['judul_seo']; ?>" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i> Share</a>-->
            <a href="https://wa.me//send?text=<?php echo base_url() ?>berita/detail/<?php echo $rows['judul_seo']; ?>" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i> Share</a>
            <a href="https://t.me/share/url?url=<?php echo base_url() ?>berita/detail/<?php echo $rows['judul_seo']; ?>" target="_blank" class="telegram"><i class="fa fa-telegram"></i> Share</a>
          </div>
          <?php  ?>
          <div class="fb-comments" data-href="<?php echo base_url() ?>/berita/<?php echo $rows['id_berita']; ?>/<?php echo $rows['judul_seo']; ?>" data-width="100%" data-numposts="5"></div>
          <!-- Single News Area -->

          <div class="section-heading" style="margin-bottom: 30px;">
            <h5>BERITA TERKAIT</h5>
            <div class="line" style="width: 40px;"></div>
          </div>

          <?php
          $no = 1;
          $sb1 = $this->model_utama->view_ordering_limit('berita', 'id_berita', 'DESC', 1, 5);
          foreach ($sb1->result_array() as $r) {

          ?>
            <div class="single-news-area d-flex align-items-center wow fadeInRight" data-wow-delay="0.<?php echo $no; ?>s">
              <div class="blog-thumbnail">
                <?php if ($r['gambar'] != '') { ?>
                  <img src="<?php echo base_url() ?>upload/foto_berita/<?php echo $r["gambar"] ?>" alt="" style="height: 70px; width: 70px;">
                <?php } else { ?>
                  <img src="<?php echo base_url(); ?>upload/img_album/no-image.jpg" alt="" style="height: 70px; width: 70px;">
                <?php } ?>

              </div>
              <div class="blog-content">
                <a href="<?php echo base_url('berita/detail/' . $r['judul_seo']) ?>" class="post-title"><?php echo character_limiter($r['judul'], 40); ?></a>
                <span class="post-date"><i class="fa fa-calendar"></i> <?php echo tgl_indo($r['tanggal']); ?> </span>
              </div>
            </div>
          <?php $no++;
          } ?>


        </div>

        <!-- <?php include( "sidebar.php"); ?> -->
      </div>
    </div>
  </section>
  <!-- ***** Footer Area Start ***** -->
  <!-- <?php include("footer.php"); ?> -->
  <!-- ***** Footer Area End ***** -->
