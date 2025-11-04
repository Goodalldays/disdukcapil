<!-- <div class="slideDown" role="alert">
    <div class="container">
    <p><marquee>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. <a href="" class="button-round">Partner</marquee></a></p>
    </div>
</div> -->

<?php
$banner = $this->model_utama->view_where('banner_home', array('aktif'=>'Y'))->result_array();;
if($banner != null) { ?>
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered">
     <div class="modal-content">
       <?php
            $banner = $this->model_utama->view_where_ordering_limit('banner_home',array('aktif'=>'Y'),'id_banner','DESC',0,1 );
            foreach ($banner->result_array() as $ban) {
?>
      <a
       <?php
        if ($ban['link'] != null){
          echo "href='http://$ban[link]'";
        }
      ?>
      ><img src="<?= base_url() ?>upload/img_bannerhome/<?= $ban['gambar']?>" alt="" loading="lazy" style="max-width: 100%;" class="img-responsive"></a>
       <?php } ?>
     </div>
   </div>
 </div>
 <?php } ?>

<section class="banner-slider" style="width: 100%; visibility: visible; margin-top:80px;">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php
            // $utama1 = $this->model_utama->view('banner');
            $utama1 = $this->model_utama->view_where_ordering_limit('banner',array('aktif'=>'Y'),'urutan','ASC',0,1 );
            foreach ($utama1->result_array() as $row) {
?>
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?= base_url(); ?>upload/img_banner/<?= $row['gambar'] ?>" loading="lazy" alt="First slide">
          </div>
<?php } ?>
<?php
            // $utama1 = $this->model_utama->view('banner');
            $utama1 = $this->model_utama->view_where_ordering_limit('banner',array('aktif'=>'Y'),'urutan','ASC',1,5 );
            foreach ($utama1->result_array() as $row2) {   ?>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?= base_url(); ?>upload/img_banner/<?= $row2['gambar'] ?>" loading="lazy" alt="<?= $row2['keterangan_gambar'] ?>">
          </div>
<?php } ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
  </section>


<!-- SEKAPUR SIRIH -->
<?php $sambutan = $this->model_utama->view_where('sambutan',array('id_sambutan' => 1))->row_array(); ?>
<section id="sekapur" style="background: #f5f8fd;">
  <div class="container">
    <div class="row" style="padding: 60px 0;">
      <div class="col-12 col-md-7 mb-40">
          <div class="">
            <h4 style="color: #777;">SEKAPUR SIRIH</h4>
          </div>
          <div class="kata-sambutan">
          <p><?= $sambutan['isi_sambutan']; ?></p>
          </div>
          <strong style="color: #777;"><?= $sambutan['oleh']; ?> </strong>
        </div>
      <div class="col-12 col-md-5">
        <div class="">
          <img src="<?= base_url(); ?>/upload/img_sambutan/<?= $sambutan['gambar'] ?>" alt="<?= $sambutan['oleh'] ?>" loading="lazy" style="max-width: 100%; border-radius: 5px;">
        </div>
      </div>
    </div>
  </div>
</section>


<!-- PENGUMUMAN -->
<section class="section" id="features">
  <div class="container">
    <div class="section-heading pangumuman">
      <h6 data-scroll-reveal="enter left move 10px over 0.4s after 0.2s" style="color: #5fb759">Pengumuman</h6>
      <h2 data-scroll-reveal="enter left move 20px over 0.6s after 0.4s" style="margin-bottom: 70px;">Pengumuman terbaru</h2>
    </div>
    <div class="row">
      <?php
        $query = $this->model_utama->select_where_limit('pengumuman', 'id_pengumuman', 'DESC', 0, 3, 'aktif', 'Y');
        foreach ($query->result_array() as $r) :
      ?>
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 25px over 0.9s after 0.4s" style="margin-top: -30px;">
        <div class="features-item pengumuman-hover">
          <div class="features-icon bullhorn-cirlce">
            <img src="<?= base_url(); ?>assets/template/breezed/images/bullhorn-solid.svg" alt="Pengumuman" class="bullhorn">
          </div>
          <div class="features-content" id="isi-pengumuman">
            <a href="<?php echo base_url('pengumuman/detail/' . $r['judul_seo']) ?>">
            <h4><?php echo character_limiter($r['judul'], 60); ?></h4>
            <p><i class="fa fa-calendar"> </i> <?php echo tgl_indo($r['tgl_posting']); ?><span class="mr-4"></span><i class="fa fa-eye"></i> <?php echo number_format($r['dibaca'] + 1); ?>x dibaca</p></a>
            <!-- <a href="<?php echo base_url('pengumuman/detail/' . $r['judul_seo']) ?>" class="text-button-icon lihat-pengumuman">Lihat<i class="fa fa-arrow-right"></i></a> -->
          </div>
        </div>
      </div>
      <?php endforeach ?>
    </div>
    <div class="mt-3 col-md-12 text-center" data-scroll-reveal="enter bottom move 10px over 1s after 0.6s">
      <a href="<?= base_url(); ?>pengumuman" class="main-button-icon">Pengumuman Lainnya <i class="fa fa-arrow-right"></i></a>
    </div>
    <div class="line-bottom"></div>
  </div>
</section>

<!-- BERITA -->
<?php
$berita = $this->model_utama->select_where_limit('berita', 'id_berita', 'DESC', 0, 6, 'terbit', 'Y')->result_array();
if ($berita != null) {
?>
<section class="" id="projects">
  <div class="container">
    <div class="col-lg-3">
      <div class="section-heading">
        <h6 data-scroll-reveal="enter left move 10px over 0.4s after 0.2s">Berita</h6>
        <h2 data-scroll-reveal="enter left move 20px over 0.6s after 0.4s">Berita terbaru</h2>
      </div>
    </div>
    <div class="row" id="berita">
      <?php
        $linksatu = $this->model_utama->select_where_limit('berita', 'id_berita', 'DESC', 0, 6, 'terbit', 'Y');
        foreach ($linksatu->result_array() as $x1) {
      ?>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card mb-4"  id="berita-card" data-scroll-reveal="enter bottom move 15px over 0.8s after 0.5s">
          <a href="<?php echo base_url('berita/detail/' . $x1['judul_seo']) ?>">
            <?php if ($x1['gambar'] == '') {
              echo "<img src='" . base_url() . "upload/img_album/no-image.jpg' alt='no-image.jpg' loading='lazy' style='width:100%; height:240px;'>";
            } else { ?>
              <img src="<?php echo base_url() . "upload/img_berita/" . $x1['gambar']; ?>" loading="lazy" alt="" style="width:100%; height:240px">
            <?php } ?>
            <div class="card-body card-body-berita" style="height: 130px;">
              <h4 class="card-title"><?php echo character_limiter($x1['judul'], 100); ?></h4>
              <small class="text-muted cat berita-info">
                <!-- <div class="isi-berita">
                <p class="card-text"><?php echo character_limiter($x1['isi_berita'], 80); ?></p></div> -->
                <div class="color-icon">
                  <i class="fa fa-calendar"></i> <?php echo tgl_indo($x1['tanggal']); ?>
                  <i class="fa fa-eye ml-2 mt-2"></i> <?php echo  number_format($x1['dibaca'] + 1); ?>x dibaca
                </div>
              </small>
              <!-- <div class="lihat-berita">
              <a href="<?php echo base_url('pengumuman/detail/' . $r['judul_seo']) ?>" class="text-button-icon">
              Lihat<i class="fa fa-arrow-right"></i>
              </a></div> -->
            </div>
          </a>
        </div>
      </div>
      <?php } ?>
      <div class="col-md-12 text-center mt-4 mb-6" data-scroll-reveal="enter bottom move 30px over 0.5s after 0.3s">
        <a href="<?= base_url(); ?>berita" class="main-button-icon">Berita Lainnya <i class="fa fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<!-- QUOTE -->
<?php $bg_img = $this->model_utama->view_where('gambar_latar', array('id_latar' => 1))->row_array(); ?>

<section class="testimonials-area bg-img bg-gradient-overlay jarallax  text-center" style="background-image: url('upload/img_latar/<?= $bg_img['latar_belakang'] ?>'); padding: 100px 0; margin: 60px 0;">
<div class="bg-img bg-gradient-overlay clearfix">
  <div class="container ">
    <div class="row">
      <div class="col-12">
        <div class="testimonials-slides owl-carousel">
        <?php
            $quote = $this->model_utama->view_where_ordering_limit('petikan',array('aktif'=>'Y'),'urutan','DESC',0,5 );
              foreach ($quote->result_array() as $q) :
            ?>
          <div class="single-testimonial-slide ">
            <div class="testimonial-content">
              <h5>“<?= $q['petikan'] ?>”</h5>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div></div>
  </div>
</section>

<!-- GALERI FOTO -->
<?php
$galeri = $this->model_utama->select_where_limit('galeri', 'id_galeri', 'DESC', 0, 6, 'terbit', 'Y')->result_array();
if ($galeri != null) {
?>
<section class="section" id="projects">
  <div class="container">
    <div class="col-lg-3">
      <div class="section-heading">
        <h6 data-scroll-reveal="enter left move 10px over 0.4s after 0.2s">Galeri Foto</h6>
        <h2 data-scroll-reveal="enter left move 20px over 0.6s after 0.4s">Foto terbaru</h2>
      </div>
    </div>
  <div class="row">
      <div class="col-12">
        <div class="filters-content">
          <div class="row grid">
            <?php
            $query = $this->model_utama->select_where_limit('galeri', 'id_galeri', 'DESC', 0, 6, 'terbit', 'Y');
              foreach ($query->result_array() as $r) :
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 all des" data-scroll-reveal="enter bottom move 18px over 0.8s after 0.5s">
              <?php
                $string = $r['gambar_galeri'];
                $gambar = explode(",", $string);
              ?>
              <div class="item hover01">
                <!-- <a href="<?= base_url() ?>upload/img_galeri/<?= $gambar[0] ?>" data-lightbox="image-1" data-title="<?= $r['judul_galeri'] ?>"><figure><img src="<?= base_url() ?>upload/img_galeri/<?= $gambar[0] ?>" alt=""></figure></a> -->
                <a href="<?= base_url() ?>foto/detail/<?= $r['seo_galeri'] ?>"><figure><img src="<?= base_url() ?>upload/img_galeri/<?= $gambar[0] ?>" alt=""></figure></a>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-center mt-4 mb-6" data-scroll-reveal="enter bottom move 15px over 0.7s after 0.6s">
      <a href="<?= base_url(); ?>foto" class="main-button-icon">Foto Lainnya <i class="fa fa-arrow-right"></i></a>
    </div>
  </div>
</section>
<?php } ?>


 <section id="clients" style="background: #f5f8fd; margin-top:60px; margin-bottom:-60px;">
    <div class="text-center">
      <h2>Link terkait</h2>
      <div class="line"></div>
    </div>
    <div id="owl-cd">
    <div class="container" style="padding: 30px 0;">
      <div class="owl-carousel clients-carousel">
        <?php
        $linkterkait = $this->model_utama->select_where_limit('link', 'urutan', 'ASC', 0, 10, 'Aktif', 'Ya');
        foreach ($linkterkait->result_array() as $xlink) {
        ?>
        <?php
          if($xlink['link'] != null){
            $link = 'http://'. $xlink['link'];
          }
          else{
            $link = base_url();
          }
        ?>
          <a href="<?= $link ?>" target="_blank"><img src="<?= base_url() ?>/upload/img_link/<?= $xlink['gambar']; ?>" title="<?= $xlink['nama_menu']; ?>" alt="<?= $xlink['nama_menu']; ?>"></a>

        <?php } ?>
      </div>
    </div>
        </div>
  </section>
<!-- MEDIA SOSIAL -->
<!-- <section class="section" id="features">
  <div class="container">
    <div class="section-heading">
      <h6 data-scroll-reveal="enter left move 10px over 0.4s after 0.2s" style="color: #5fb759">Media Sosial</h6>
      <h2 data-scroll-reveal="enter left move 20px over 0.6s after 0.4s" style="margin-bottom: 70px;">Umpan Media Sosial</h2>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 25px over 0.9s after 0.4s" style="margin-top: -30px;">
        <div class="mb-2"><h6>Facebook</h6></div>
        <div class="features-item" id="social" style="margin: 0;"></div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 25px over 0.9s after 0.4s" style="margin-top: -30px;">
        <div class="mb-2"><h6>Instagram</h6></div>
        <div class="features-item" id="social"></div>
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 25px over 0.9s after 0.4s" style="margin-top: -30px;">
        <div class="mb-2"><h6>Youtube</h6></div>
        <div class="features-item" id="social">
        </div>
      </div>
    </div>
  </div>
</section> -->


<script>
    $(window).ready (function () {
	    setTimeout (function () {
		    $("#myModal").modal('show')
	    }, 2000)
    })
  </script>
