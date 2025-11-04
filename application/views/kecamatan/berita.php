  <!-- ***** Header Area Start ***** -->
  <!-- <header class="header-area">

    <?php include("top-header.php"); ?>
    <?php include("main-header-menu.php"); ?>

  </header> -->
  <!-- ***** Header Area End ***** -->


  <!-- ****** Blog Area Start ******* -->
  <section class="dento--blog-area mt-50">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8 mb-50 wow fadeInLeft">

          <?php
          if ($title != "Semua Berita") {
            echo "<h4 class='title-seacrh mb-25'><i class='fa fa-search'></i> $title </h4>";
          } else {
            echo "<div style='margin-top: -30px';></div>";
          }
          ?>
          <!-- <div class="section-heading text-center">
            <h2>SEMUA BERITA</h2>
            <div class="line"></div>
          </div> -->
          <!-- Single Blog Item -->
          <?php
          // $linksatu = $this->model_utama->view_ordering_limit('berita', 'id_berita', 'DESC', 0, 10);
          foreach ($berita->result_array() as $x1) {
          ?>
            <div class="single-blog-item style-2 d-flex flex-wrap mb-20">


              <!-- <div class="single-blog-item style-2 d-flex flex-wrap align-items-center mb-20"> -->
              <!-- Blog Thumbnail -->
              <div class="blog-thumbnail mt-30">
                <a href="<?php echo base_url('Berita/detail/' . $x1['judul_seo']) ?>"><?php if ($x1['gambar'] == '') {
                                                                                        echo "<img  src='" . base_url() . "upload/img_album/no-image.jpg' alt='no-image.jpg' style='width:100%; height:160px; border-radius: 2px;'/>";
                                                                                      } else { ?>
                    <img class="" src=" <?php echo base_url() . "upload/foto_berita/" . $x1['gambar']; ?>" alt="" style="width:100%; height:160px; border-radius: 2px;"><?php } ?></a>
              </div>
              <!-- Blog Content -->
              <div class="blog-content">
                <a href="<?php echo base_url('berita/detail/' . $x1['judul_seo']) ?>" class="post-title" style="font-size: 18px;">
                  <?php echo $x1['judul'] ?></a>
                <p>
                  <?php
                  $xberita = strip_tags(html_entity_decode($x1['isi_berita']));
                  echo character_limiter($xberita, 100); ?>
                  <!-- <?php echo character_limiter($x1['isi_berita'], 100); ?></p> -->
                <div class="post-meta" style="font-size: 13px;">
                  <a class="disable" href="#"><i class="fa fa-calendar"></i> <?php echo tgl_indo($x1['tanggal']); ?></a>
                  <a class="disable" href="#"><i class="fa fa-eye"></i> <?php echo number_format($x1['dibaca'] + 1); ?>x dibaca</a>
                </div>
              </div>

            </div>
          <?php } ?>

          <?php
          if ($this->input->post('keyword') == '') {
            echo $paging;
          }
          ?>
          <!-- Single News Area -->

        </div>
        <?php include("sidebar.php"); ?>
      </div>

    </div>
  </section>


  <!-- ****** Blog Area End ******* -->

  <!-- ***** Partner ***** -->
  <!-- <?php include("partner.php"); ?>
  <!-- ***** Partner End ***** -->

  <!-- ***** Footer Area Start ***** -->
  <!-- <?php include("footer.php"); ?> -->
  <!-- ***** Footer Area End ***** -->
