<section>
  <div class="detail-berita" style="margin-top: 130px;">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8" style="padding-right: 25px;">
          <div class="blog-details-area">

<div data-scroll-reveal="enter left move 50px over 0.4s after 0.2s">
            <h2 class="post-title"><?php echo $rows['tema']; ?></h2>

            <div class="post-meta" style="font-size: 14px;">
              <a class="link-disable" href="#"><i class="fa fa-calendar"></i> <?php echo tgl_indo($rows['tgl_mulai']); ?></a>
              <a class="link-disable" href="#"><i class="fa fa-eye"></i> <?php echo number_format($rows['dibaca'] + 1); ?>x dibaca</a>

              <a class="link-disable" href="#"><i class="fa fa-user"></i> <?php echo $rows['nama_lengkap']; ?></a>
            </div>

<div data-scroll-reveal="enter bottom move 30px over 0.4s after 0.2s" style="margin-top:20px">
            <?php if ($rows['gambar'] == '') { echo ''; ?>
              <!-- <img class="image-berita" src="<?= base_url() ?>upload/img_album/no-image.jpg" alt='no-image.jpg'/>"; -->
            <?php } else { ?>
              <img class="image-berita" src="<?= base_url() ?>upload/img_agenda/<?=  $rows['gambar'] ?>" alt="<?= $rows['keterangan_gambar'] ?>">
            <?php } ?>
</div>
<div>
<table class="table table-borderless tabel-detail-agenda" cellpadding="0">
  <tbody>
    <tr>
      <th style="width:20%;">Tanggal</th>
      <td style="width:5%;">:</td>
      <td style="width:75%;"><?= tgl_indo($rows['tgl_mulai']) ?>
      <?php
        if($rows['tgl_selesai'] != '' and $rows['tgl_selesai'] != $rows['tgl_mulai']){
          $selesai = tgl_indo($rows['tgl_selesai']);
          echo " s/d ".$selesai;
        }
       ?></td>
    </tr>
    <tr>
      <th scope="row">Waktu</th>
      <td>:</td>
      <td><?= $rows['jam'] ?>
<?php
        if($rows['jam_selesai'] != '' ){
          echo " s/d ".$rows['jam_selesai'];
        }
       ?>
      </td>
    </tr>
    <tr>
      <th scope="row">Pengirim</th>
      <td>:</td>
      <td><?= $rows['pengirim'] ?></td>
    </tr>
    <tr>
      <th scope="row">Tempat</th>
      <td>:</td>
      <td><?= $rows['tempat'] ?></td>
    </tr>
  </tbody>
</table>

</div>



            <div class="isi-berita-long">
            <p>
              <?php echo $rows['isi_agenda']; ?>
            </p>
            </div>

<div id="map" class="">
<iframe src="<?= $rows['map'] ?>" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>



            </div>
          </div>
          <!-- <div>
            Kategori :
          </div>
          <div>
            Tanda :
          </div> -->

          <!-- Post Share  -->
          <div class="post-share-area" data-scroll-reveal="enter bottom move 10px over 0.8s after 0.5s">
            <h5 class="mb-3"><i class="fa fa-link"></i> BAGIKAN :</h5>
            <a href="https://www.facebook.com/sharer.php?u=<?php echo base_url() ?>berita/detail/<?php echo $rows['tema_seo']; ?>" target="_blank" class="facebook" data-toggle="tooltip" data-placement="top" title="Bagikan di facebook"><i class="fa fa-facebook"></i> Share</a>
            <a href="https://twitter.com/share?url=<?php echo base_url() ?>berita/detail/<?php echo $rows['tema_seo']; ?>" target="_blank" class="tweet" data-toggle="tooltip" data-placement="top" title="Bagikan di twitter"><i class="fa fa-twitter"></i> Tweet</a>
            <!-- <a href="https://plus.google.com/share?url=<?php echo base_url() ?>/berita/<?php echo $rows['id_berita']; ?>/<?php echo $rows['tema_seo']; ?>" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i> Share</a> -->
            <!--<a href="whatsapp://send?text=<?php echo base_url() ?>berita/detail/<?php echo $rows['tema_seo']; ?>" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i> Share</a>-->
            <a href="https://wa.me//send?text=<?php echo base_url() ?>berita/detail/<?php echo $rows['tema_seo']; ?>" target="_blank" class="whatsapp" data-toggle="tooltip" data-placement="top" title="Bagikan di whatsapp"><i class="fa fa-whatsapp"></i> Share</a>
            <a href="https://t.me/share/url?url=<?php echo base_url() ?>berita/detail/<?php echo $rows['tema_seo']; ?>" target="_blank" class="telegram" data-toggle="tooltip" data-placement="top" title="Bagikan di telegram"><i class="fa fa-telegram"></i> Share</a>
          </div>
          <div class="fb-comments" data-href="<?php echo base_url() ?>/berita/<?php echo $rows['id_agenda']; ?>/<?php echo $rows['tema_seo']; ?>" data-width="100%" data-numposts="5"></div>
          <!-- Single News Area -->

          <div class="line-bottom" data-scroll-reveal="enter bottom move 10px over 0.8s after 0.5s" style="margin: 0"></div>


          <div class="single-widget-area" data-scroll-reveal="enter left and move 30px over 0.9s" style="margin-bottom: 0; margin-top:50px">
                <div class="section-heading mb-3">
                  <h5><i class="fa fa-newspaper-o"></i> AGENDA TERKAIT :</h5>
                </div>
                <?php
          $no = 1;
          $sb1 = $this->model_utama->view_where_ordering_limit('agenda',array('terbit'=>'Y'), 'id_agenda', 'DESC', 1, 5);
          foreach ($sb1->result_array() as $r) {

          ?>
                  <div class="single-news-area d-flex align-items-center">
                    <div class="blog-thumbnail-sidebar">
                      <?php if ($r['gambar'] != '') { ?>
                        <img src="<?php echo base_url() ?>upload/img_agenda/<?php echo $r["gambar"] ?>" alt="">
                      <?php } else { ?>
                        <img src="<?php echo base_url(); ?>upload/img_agenda/no-image.jpg" alt="">
                      <?php } ?>

                    </div>
                    <div class="blog-content-sidebar">
                      <a href="<?php echo base_url('agenda/detail/' . $r['tema_seo']) ?>" class="post-title"><?php echo character_limiter($r['tema'], 70); ?></a>
                      <span class="post-date color-icon"><i class="fa fa-calendar"></i> <?php echo tgl_indo($r['tgl_posting']); ?>
                      <i class="fa fa-eye ml-2"></i> <?php echo number_format($rows['dibaca']); ?>x dibaca</a></span>

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
