<section>
    <div class="container" style="margin-top: 130px; margin-bottom:60px;">


      <div class="row">
        <div class="col-12 col-lg-8" style="padding-right: 25px;">

            <div class="section-heading" style="margin-bottom: 30px;">
            <h6 data-scroll-reveal="enter left move 10px over 0.4s after 0.2s">Video</h6>
          <h2 data-scroll-reveal='enter left move 20px over 0.6s after 0.4s'><span class='icon-search'>Galeri <?= $title ?></span></h2>

          </div>
          <?php
              if (empty($video->result_array()))
              {
                echo "<div><img data-scroll-reveal='enter left move 30px over 0.6s after 0.8s' class='kosong' src='".base_url()."assets/template/breezed/img/undraw_Video_streaming_re_v3qg.svg'></div><h5 class='text-center' data-scroll-reveal='enter left move 30px over 0.6s after 0.8s'>Tidak ada video!</h5>";
              }
              ?>
          <!-- <div class="section-heading text-center">
            <h2>SEMUA BERITA</h2>
            <div class="line"></div>
          </div> -->
          <!-- Single Blog Item -->
          <?php
          // $linksatu = $this->model_utama->view_ordering_limit('berita', 'id_berita', 'DESC', 0, 10);
          foreach ($video->result_array() as $x1) {
          ?>

            <div class="single-blog-item style-2 d-flex flex-wrap mb-20" data-scroll-reveal="enter bottom move 30px over 0.4s after 0.4s">

              <!-- <div class="single-blog-item style-2 d-flex flex-wrap align-items-center mb-20"> -->
              <!-- Blog Thumbnail -->
              <div class="blog-thumbnail">
              <?php
                          $string = $x1['gambar_galeri'];
                          $gambar = explode(",", $string);
                          ?>
                <a href="<?php echo base_url('video/detail/' . $x1['seo_video']) ?>"><?php if ($gambar == '') {
                                                                                        echo "<img  src='" . base_url() . "upload/img_album/no-image.jpg' alt='no-image.jpg' style='width:100%; height:160px; border-radius: 2px;'/>";
                                                                                      } else { ?>
                    <img class="hover2" src=" <?php echo base_url() . "upload/img_video/" . $x1['gambar_video'] ?>" alt="" style="width:100%; height:160px; border-radius: 2px;"><?php } ?></a>
              </div>
              <!-- Blog Content -->
              <div class="blog-content">

                <div class="post-meta" style="font-size: 13px;">
                  <a class="link-disable" href="#"><i class="fa fa-calendar"></i> <?php echo tgl_indo($x1['tanggal']); ?></a>
                  <a class="link-disable" href="#"><i class="fa fa-eye"></i> <?php echo number_format($x1['dilihat'] + 1); ?>x ditonton</a>
                </div>
                <a href="<?php echo base_url('video/detail/' . $x1['seo_video']) ?>" class="post-title" style="font-size: 18px;">
                  <?php echo $x1['judul_video'] ?></a>
                <p>
                  <?php
                  $xberita = strip_tags(html_entity_decode($x1['deskripsi']));
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
          <!-- Single News Area -->

        </div>
        <?php include("sidebar.php"); ?>
      </div>
        </div>
    </div>
  </section>
