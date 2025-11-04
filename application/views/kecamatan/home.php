<div class="top_nav_soc home2">
    <div class="container">

    </div>
</div>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Fluid jumbotron</h1>
        <p>This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
</div>

<div class="container">
<h3>Berita Terbaru</h3>
    <div class="row">
        <div class="col-12 col-xs-12 col-md-6 col-lg-4">
<?php
          $linksatu = $this->model_utama->select_where_limit('berita', 'id_berita', 'DESC', 0, 6, 'terbit', 'Y');
          foreach ($linksatu->result_array() as $x1) {
          ?>

            <div class="card">
            <a href="http://google.com">
                <?php if ($x1['gambar'] == '') {
                    echo "<img src='" . base_url() . "upload/img_album/no-image.jpg' alt='no-image.jpg'/>";
                  } else { ?>
                   <img src="<?php echo base_url() . "upload/foto_berita/" . $x1['gambar']; ?>" alt="" style="height:200px">
                 <?php } ?>
                <div class="card-img-overlay">
                    <a href="#" class="btn btn-light btn-sm">Cooking</a>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo character_limiter($x1['judul'], 40); ?></h4>
                    <small class="text-muted cat">
                        <i class="far fa-clock text-info"></i> 30 minutes
                        <i class="fas fa-users text-info"></i> 4 portions
                    </small>
                    <p class="card-text">I love quick, simple pasta dishes, and this is one of my favorite.</p>
                    <a href="#" class="btn btn-info">Read Recipe</a>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                    <div class="views">Oct 20, 12:45PM
                    </div>
                    <div class="stats">
                        <i class="far fa-eye"></i> 1347
                        <i class="far fa-comment"></i> 12
                    </div>

                </div>
            </a>
            </div>
            <?php } ?>
        </div>
    </div>


    <h3>Foto Terbaru</h3>
    <div class="row justify-content-center">
    <?php
          $query = $this->model_utama->view_ordering_limit('gallery', 'id_gallery', 'DESC', 0, 6);
          foreach ($query->result_array() as $r) :
          ?>
<div class="row col-12 col-md-6 col-xs-12">
            <a href="<?= base_url() ?>upload/img_galeri/<?php echo $r['gbr_gallery'] ?>" data-toggle="lightbox" data-gallery="example-gallery"
                class="">
                <img src="<?= base_url() ?>upload/img_galeri/<?php echo $r['gbr_gallery'] ?>" class="img-fluid">
            </a>
        </div>
        <?php
          endforeach;
          ?>
    </div>
</div>
<footer class="footer-section">
    <div class="container">
        <div class="footer-cta pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="cta-text">
                            <h4>Find us</h4>
                            <span>1010 Avenue, sw 54321, chandigarh</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="fas fa-phone"></i>
                        <div class="cta-text">
                            <h4>Call us</h4>
                            <span>9876543210 0</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-30">
                    <div class="single-cta">
                        <i class="far fa-envelope-open"></i>
                        <div class="cta-text">
                            <h4>Mail us</h4>
                            <span>mail@info.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-content pt-5 pb-5">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-50">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html"><img src="https://i.ibb.co/QDy827D/ak-logo.png" class="img-fluid"
                                    alt="logo"></a>
                        </div>
                        <div class="footer-text">
                            <p>Lorem ipsum dolor sit amet, consec tetur adipisicing elit, sed do eiusmod tempor
                                incididuntut consec tetur adipisicing
                                elit,Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="footer-social-icon">
                            <span>Follow us</span>
                            <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                            <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">about</a></li>
                            <li><a href="#">services</a></li>
                            <li><a href="#">portfolio</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Expert Team</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Latest News</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                    <div class="footer-widget">
                        <div class="footer-widget-heading">
                            <h3>Subscribe</h3>
                        </div>
                        <div class="footer-text mb-25">
                            <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                        </div>
                        <div class="subscribe-form">
                            <form action="#">
                                <input type="text" placeholder="Email Address">
                                <button><i class="fab fa-telegram-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2018, All Right Reserved <a href="https://codepen.io/anupkumar92/">Anup</a>
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Policy</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
