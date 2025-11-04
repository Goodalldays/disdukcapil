<section>
    <div class="detail-pengumuman" style="margin-top: 130px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8" style="padding-right: 25px;">
                    <div class="blog-details-area">
                    <div data-scroll-reveal="enter bottom move 30px over 0.4s after 0.2s">
                        <?php if ($rows['gambar'] == '') {  echo '';?>
                            <!-- <img class="image-pengumuman" src="<?= base_url() ?>upload/img_album/no-image.jpg" alt='no-image.jpg'/>"; -->
                        <?php } else { ?>
                            <img class="image-pengumuman" src="<?php echo base_url() . "upload/img_lowongan/" . $rows['gambar'] ?>" alt="<?php echo $rows['judul'] ?>">
                        <?php } ?>
</div>
<div data-scroll-reveal="enter left move 50px over 0.4s after 0.2s">
                        <h2 class="post-title"><?php echo $rows['jdl_lowongan']; ?></h2>

                        <div class="post-meta">
                            <a href="disable"><i class="fa fa-calendar"></i> <?php echo tgl_indo($rows['tanggal']); ?></a>
                            <a href="#"><i class="fa fa-eye"></i> <?php echo number_format($rows['dibaca'] + 1); ?></a>
                            <a href="#"><i class="fa fa-user"></i> <?php echo $rows['oleh']; ?></a>
                        </div>
                        <div class="isi-berita-long">
                        <p>
                            <?php echo $rows['isi_lowongan']; ?>
                        </p>

                        </div>

<?php
    if($rows['file'] != '') {
?>


<div class="tampil-unduh">
<object width="100%" height="750px" type="application/pdf" data="<?= base_url()?>upload/files/<?= $rows['file']; ?>">
    <p>Download file <a href="<?= base_url()?>upload/files/<?= $rows['file']; ?>"><strong>disini</strong></a></p>
</object>
</div>


<?php
    }
?>

            </div>
                    </div>


<div style="margin: 30px 0 10px 0" data-scroll-reveal="enter bottom move 5px over 0.4s after 0.5s">
          <?php $iden = $this->model_utama->view_where('komentar', array('id_komentar' => 1))->row_array();
          if($iden['disquss'] != null){
            echo $iden['disquss'];
          }
          ?>

        </div>

                  <div class="post-share-area" data-scroll-reveal="enter bottom move 10px over 0.8s after 0.5s">
                  <h5 class="mb-3"><i class="fa fa-link"></i> BAGIKAN :</h5>
                      <a href="https://www.facebook.com/sharer.php?u=<?php echo base_url() ?>pengumuman/detail/<?php echo $rows['judul_seo']; ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i> Share</a>
                      <a href="https://twitter.com/share?url=<?php echo base_url() ?>pengumuman/detail/<?php echo $rows['judul_seo']; ?>" target="_blank" class="tweet"><i class="fa fa-twitter"></i> Tweet</a>
                      <!-- <a href="https://plus.google.com/share?url=<?php echo base_url() ?>/berita/<?php echo $rows['id_pengumuman']; ?>/<?php echo $rows['judul_seo']; ?>" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i> Share</a> -->
                      <a href="https://wa.me/send?text=<?php echo base_url() ?>pengumuman/detail/<?php echo $rows['judul_seo']; ?>" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i> Share</a>
                      <a href="https://t.me/share/url?url=<?php echo base_url() ?>pengumuman/detail/<?php echo $rows['judul_seo']; ?>" target="_blank" class="telegram"><i class="fa fa-telegram"></i> Share</a>
                  </div>
                  <div class="fb-comments" data-href="<?php echo base_url() ?>/pengumuman/<?php echo $rows['id_pengumuman']; ?>/<?php echo $rows['judul_seo']; ?>" data-width="100%" data-numposts="5"></div>
                  <!-- Single News Area -->

<div class="line-bottom" data-scroll-reveal="enter bottom move 10px over 0.8s after 0.5s" style="margin: 0"></div>

                  <div class="single-widget-area" data-scroll-reveal="enter left and move 30px over 0.9s" style="margin-bottom: 0; margin-top:50px">
                <div class="section-heading mb-3">
                  <h5><i class="fa fa-newspaper-o"></i> LOWONGAN TERKAIT :</h5>
                </div>
                <?php
                    $no = 1;
                    $sb1 = $this->model_utama->view_where_ordering_limit('lowongan', array('terbit'=> 'Y'), 'id_lowongan', 'DESC', 0, 5);
                    foreach ($sb1->result_array() as $r) {
                    ?>

                      <div class="single-news-area d-flex align-items-center">
                          <div class="blog-thumbnail-sidebar">
                              <?php if ($r['gambar'] != '') { ?>
                                  <img src="<?php echo base_url() ?>upload/img_lowongan/<?php echo $r["gambar"] ?>" alt="">
                              <?php } else { ?>
                                  <img src="<?php echo base_url(); ?>upload/img_lowongan/no-image.jpg" alt="">
                              <?php } ?>

                          </div>
                          <div class="blog-content-sidebar">
                              <a href="<?php echo base_url('lowongan/detail/' . $r['jdl_lowongan']) ?>" class="post-title"><?php echo character_limiter($r['jdl_lowongan'], 70); ?></a>
                              <span class="post-date color-icon"><i class="fa fa-calendar"></i> <?php echo tgl_indo($r['tanggal']); ?> </span>
                          </div>
                      </div>
                  <?php $no++;
                    } ?>
                  </div>
              </div>
              <?php include("sidebar.php"); ?>
          </div>
      </div>
  </section>
