<section>
  <div class="detail-berita" style="margin-top: 130px;">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8" style="padding-right: 25px;">
          <div class="blog-details-area">
            <div data-scroll-reveal="enter bottom move 30px over 0.4s after 0.2s" style="margin-bottom:20px;">
              <h2 class="post-title"><?= $title ?></h2>

              <div class="post-meta" style="font-size: 14px;">
                <a class="link-disable" href="#"><i class="fa fa-calendar"></i> <?= tgl_indo($rows['tanggal']); ?></a>
                <a class="link-disable" href="#"><i class="fa fa-eye"></i> <?= number_format($rows['dilihat'] + 1); ?>x dilihat</a>
                <a class="link-disable" href="#"><i class="fa fa-user"></i> <?= $rows['nama_lengkap']; ?></a>
              </div>
            </div>
            <div class="row">
            <?php
              $string = $rows['gambar_galeri'];
              $gambar = explode(",", $string);
              foreach ($gambar as $gbr) {
                if ($gbr == '') { echo '';
              ?>
              <!-- <img class="image-berita" src="<?= base_url() ?>upload/img_album/no-image.jpg" alt='no-image.jpg'/>"; -->
              <?php } else { ?>
                <!-- <img class="image-berita" src="<?= base_url() ?>upload/img_galeri/<?=  $gbr ?>" alt="<?= $rows['judul_galeri'] ?>"> -->

                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-scroll-reveal="enter bottom move 18px over 0.8s after 0.5s" style="margin-bottom: 20px;">
                    <div class="item hover01">
                      <a href="<?= base_url() ?>upload/img_galeri/<?= $gbr ?>" data-lightbox="image-1" data-title="<?= $rows['judul_galeri'] ?>"><figure><img src="<?= base_url() ?>upload/img_galeri/<?= $gbr ?>" alt="" style="width: 100%;max-width: 100%; height: auto;"></figure></a>
                    </div>
                  </div>
              <?php } ?>
            <?php } ?>
            </div>
<div data-scroll-reveal="enter left move 50px over 0.4s after 0.2s">

            <div class="isi-berita-long" style="margin-top: -10px;">
            <p>
              <?= $rows['deskripsi']; ?>
            </p>
            </div>
            </div>
          </div>


          <div style="margin-bottom:40px;">
          <table>
          <tbody>
            <tr>
              <td><div class="mr-4">Album</div></td>
              <td><div class="mr-2">:</div></td>
              <td><span class='badge badge-success mr-1'><?= $rows['jdl_album']; ?></span></td>
            </tr>
            <tr>
            <td>Tanda</td>
            <td>:</td>
            <td>
            <div>
            <?php
          $_arrNilai = explode(',', $rows['tag']);

            foreach ($_arrNilai as $tanda){
          $tags = $this->model_app->view_where('tag_foto', array('tag_seo' => $tanda))->row_array();
echo "<span class='badge badge-success mr-1'>$tags[nama_tag]</span></h1>";




           }?>
          </div>
          </td>
            </tr>
          </tbody>
          </table>
          </div>

          <div data-scroll-reveal="enter bottom move 5px over 0.4s after 0.5s">
          <?php $iden = $this->model_utama->view_where('komentar', array('id_komentar' => 1))->row_array();
          if($iden['disquss'] != null){
            echo $iden['disquss'];
          }
          ?>

        </div>
          <!-- Post Share  -->
          <div class="post-share-area" data-scroll-reveal="enter bottom move 10px over 0.8s after 0.5s">
            <h5 class="mb-3"><i class="fa fa-share-alt"></i> BAGIKAN :</h5>
            <a href="https://www.facebook.com/sharer.php?u=<?php echo base_url() ?>berita/detail/<?php echo $rows['seo_galeri']; ?>" target="_blank" class="facebook" data-toggle="tooltip" data-placement="top" title="Bagikan di facebook"><i class="fa fa-facebook"></i> Share</a>
            <a href="https://twitter.com/share?url=<?php echo base_url() ?>berita/detail/<?php echo $rows['seo_galeri']; ?>" target="_blank" class="tweet" data-toggle="tooltip" data-placement="top" title="Bagikan di twitter"><i class="fa fa-twitter"></i> Tweet</a>
            <!-- <a href="https://plus.google.com/share?url=<?php echo base_url() ?>/berita/<?php echo $rows['id_galeri']; ?>/<?php echo $rows['seo_galeri']; ?>" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i> Share</a> -->
            <!--<a href="whatsapp://send?text=<?php echo base_url() ?>berita/detail/<?php echo $rows['seo_galeri']; ?>" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i> Share</a>-->
            <a href="https://wa.me//send?text=<?php echo base_url() ?>berita/detail/<?php echo $rows['seo_galeri']; ?>" target="_blank" class="whatsapp" data-toggle="tooltip" data-placement="top" title="Bagikan di whatsapp"><i class="fa fa-whatsapp"></i> Share</a>
            <a href="https://t.me/share/url?url=<?php echo base_url() ?>berita/detail/<?php echo $rows['seo_galeri']; ?>" target="_blank" class="telegram" data-toggle="tooltip" data-placement="top" title="Bagikan di telegram"><i class="fa fa-telegram"></i> Share</a>
          </div>
          <div class="fb-comments" data-href="<?php echo base_url() ?>/berita/<?php echo $rows['id_galeri']; ?>/<?php echo $rows['seo_galeri']; ?>" data-width="100%" data-numposts="5"></div>
          <!-- Single News Area -->

          <div class="line-bottom" data-scroll-reveal="enter bottom move 10px over 0.8s after 0.5s" style="margin: 0"></div>


          <div class="single-widget-area" data-scroll-reveal="enter left and move 30px over 0.9s" style="margin-bottom: 0; margin-top:50px">
                <div class="section-heading mb-3">
                  <h5><i class="fa fa-newspaper-o"></i> GALERI TERKAIT :</h5>
                </div>
                <?php
          $no = 1;
          $sb1 = $this->model_utama->view_where_ordering_limit('galeri', array('terbit'=>'Y'),'id_galeri', 'DESC', 0, 5);
          foreach ($sb1->result_array() as $r) {

          ?>
                  <div class="single-news-area d-flex align-items-center">
                    <div class="blog-thumbnail-sidebar">
                    <?php
                          $string = $r['gambar_galeri'];
                          $gambar = explode(",", $string);
                          ?>
                      <?php if ($gambar != '') { ?>
                      <a href="<?php echo base_url('foto/detail/' . $r['seo_galeri']) ?>">
                        <img src="<?php echo base_url() ?>upload/img_galeri/<?php echo $gambar[0] ?>" alt="">
                      <?php } else { ?>
                        <img src="<?php echo base_url(); ?>upload/img_album/no-image.jpg" alt="<?= $r['keterangan'] ?>"></a>
                      <?php } ?>

                    </div>
                    <div class="blog-content-sidebar">
                      <a href="<?php echo base_url('foto/detail/' . $r['seo_galeri']) ?>" class="post-title"><?php echo character_limiter($r['judul_galeri'], 70); ?></a>
                      <span class="post-date color-icon"><i class="fa fa-calendar"></i> <?php echo tgl_indo($r['tanggal']); ?>
                      <i class="fa fa-eye ml-2"></i> <?php echo number_format($rows['dilihat']); ?>x dilihat</a></span>

                    </div>
                  </div>
                <?php $no++;
                } ?>
              </div>

        </div>

        <?php include( "sidebar.php"); ?>
      </div>
    </div>
  </section>
