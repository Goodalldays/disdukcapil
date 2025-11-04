<section>
    <div class="container" style="margin-top: 130px;">


      <div class="row">
        <div class="col-12 col-lg-8" style="padding-right: 25px; margin-bottom:60px">

            <div class="section-heading" style="margin-bottom: 30px;">
            <h6 data-scroll-reveal="enter left move 10px over 0.4s after 0.2s">Berita</h6>
          <?php
          if ($title != "Semua Berita") {
            echo "<h2 data-scroll-reveal='enter left move 20px over 0.6s after 0.4s'><span class='icon-search'><i class='fa fa-search'></i> $title</span></h2>";
          } else {
            echo "<h2 data-scroll-reveal='enter left move 20px over 0.6s after 0.4s'>Berita</h2>";
          }
          ?>
          </div>
          <?php
              if (empty($berita->result_array()))
              {
                echo "<div><img data-scroll-reveal='enter left move 30px over 0.6s after 0.8s' class='kosong' src='".base_url()."assets/template/breezed/img/undraw_newspaper_k72w.svg'></div><h5 class='text-center' data-scroll-reveal='enter left move 30px over 0.6s after 0.8s'>Tidak ada berita!</h5>";
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

            <div class="single-blog-item style-2 d-flex flex-wrap mb-20" data-scroll-reveal="enter bottom move 30px over 0.4s after 0.4s">

              <!-- <div class="single-blog-item style-2 d-flex flex-wrap align-items-center mb-20"> -->
              <!-- Blog Thumbnail -->
              <div class="blog-thumbnail">
                <a href="<?php echo base_url('berita/detail/' . $x1['judul_seo']) ?>"><?php if ($x1['gambar'] == '') {
                                                                                        echo "<img  src='" . base_url() . "upload/img_album/no-image.jpg' alt='no-image.jpg' style='width:100%; height:160px; border-radius: 2px;'/>";
                                                                                      } else { ?>
                    <img class="hover2" src=" <?php echo base_url() . "upload/img_berita/" . $x1['gambar']; ?>" alt="" style="width:100%; height:160px; border-radius: 2px;"><?php } ?></a>
              </div>
              <!-- Blog Content -->
              <div class="blog-content">

                <div class="post-meta" style="font-size: 13px;">
                  <a class="link-disable" href="#"><i class="fa fa-calendar"></i> <?php echo tgl_indo($x1['tanggal']); ?></a>
                  <a class="link-disable" href="#"><i class="fa fa-eye"></i> <?php echo number_format($x1['dibaca'] + 1); ?>x dibaca</a>
                </div>
                <a href="<?php echo base_url('berita/detail/' . $x1['judul_seo']) ?>" class="post-title" style="font-size: 18px;">
                  <?php echo $x1['judul'] ?></a>
                <p>
                  <?php
                  $xberita = strip_tags(html_entity_decode($x1['isi_berita']));
                  echo character_limiter($xberita, 130); ?>
                  <!-- <?php echo character_limiter($x1['isi_berita'], 100); ?></p> -->
              </div>

            </div>

          <?php } ?>
<div data-scroll-reveal="enter bottom move 30px over 0.4s after 0.3s" style="margin-top:-20px">
          <?php
          if ($this->input->post('keyword') == '') {
            echo $paging;
          }
          ?>
          </div>

        </div>
        <?php include("sidebar.php"); ?>
      </div>
        </div>
    </div>
  </section>
