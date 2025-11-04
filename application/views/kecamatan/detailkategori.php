  <header class="header-area">
<!--
    <?php include "top-header.php";?>
    <?php include "main-header-menu.php";?> -->
  </header>
<section class="dento--blog-area mt-50">
<div class="container">
      <div class="row">
        <div class="col-12 col-lg-8 mb-50">
          <!-- Blog Details Area -->


          <div class="blog-details-area wow fadeInUp">
                    <?php if ($rows['gambar'] ==''){
                      echo "<img src='".base_url()."asset/img_album/no-image.jpg' alt='no-image.jpg'/>";
                      } else { ?>
                    <img src="<?php echo base_url() . "asset/foto_berita/" . $rows['gambar'] ?>" alt="<?php echo $rows['judul']?>">
                     <?php } ?>

            <h2 class="post-title"><?php echo $rows['judul']; ?></h2>
            <div class="post-meta">
              <a href="#"><i class="fa fa-calendar"></i> <?php echo tgl_indo($rows['tanggal']); ?></a>
              <a href="#"><i class="fa fa-eye"></i> <?php echo number_format($rows['dibaca']+1); ?></a>

              <a href="#"><i class="fa fa-user"></i> <?php echo $rows['nama_lengkap']; ?></a>
              <?php  ?>
            </div>
            <p>
              <?php echo $rows['isi_berita']; ?>
            </p>

          </div>

          <!-- Post Share  -->
          <div class="post-share-area mb-30">
            <a href="https://www.facebook.com/sharer.php?u=" target="_blank" class="facebook"><i class="fa fa-facebook"></i> Share</a>
            <a href="https://twitter.com/share?url=" target="_blank" class="tweet"><i class="fa fa-twitter"></i> Tweet</a>
            <a href="https://plus.google.com/share?url=" target="_blank" class="google-plus"><i class="fa fa-google-plus"></i> Share</a>
            <a href="whatsapp://send?text=" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i> Share</a>
          </div>
          <?php  ?>
          <div class="fb-comments" data-href="<?php echo base_url() ?>/berita/<?php echo $rows['id_berita']; ?>/<?php echo $rows['judul_seo']; ?>" data-width="100%" data-numposts="5"></div>
          <!-- Single News Area -->

              <div class="section-heading" style="margin-bottom: 30px;">
                <h5>BERITA TERKAIT</h5>
                <div class="line" style="width: 40px;"></div>
              </div>

              <div class="single-news-area d-flex align-items-center wow fadeInRight" data-wow-delay="">
                <div class="blog-thumbnail">

                </div>
                <div class="blog-content">
                  <a href="#" class="post-title"></a>
                  <span class="post-date"><i class="fa fa-calendar"></i>  </span>
                </div>
              </div>


        </div>

     <?php include("sidebar.php");?>
      </div>
    </div>
  </section>
  <!-- ***** Footer Area Start ***** -->
     <?php include("footer.php");?>
  <!-- ***** Footer Area End ***** -->
