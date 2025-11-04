<section>
<div style="margin-top: 130px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8" style="padding-right: 25px;">
                <div class="section-heading" style="margin-bottom: 30px;">
                        <h6 data-scroll-reveal="enter left move 10px over 0.4s after 0.2s">Agenda</h6>
                        <h2 data-scroll-reveal="enter left move 20px over 0.6s after 0.4s">Jadwal agenda</h2>
                    </div>


                    <?php
                    // $linksatu = $this->model_utama->view_ordering_limit('berita', 'id_berita', 'DESC', 0, 10);
                    foreach ($agenda->result_array() as $x1) {
                    ?>
                        <div class="single-blog-item style-2 d-flex flex-wrap mb-20">

                            <div class="agenda-box">
                                <div class="agenda-box-tanggal"><?= date('j', strtotime($x1['tgl_mulai'])); ?></div>
                                <div class="agenda-box-hari"><?php
                                $hari = date('D', strtotime($x1['tgl_mulai']));
                                echo getHari($hari); ?></div>
                                <div class="agenda-box-bulan"><?php
                                $bulan = date('m', strtotime($x1['tgl_mulai']));
                                echo getBulan($bulan).', '.date('Y', strtotime($x1['tgl_mulai'])); ?></div>
                            </div>
                            <!-- <div class="blog-thumbnail mt-30">
                                <a href="<?php echo base_url('pengumuman/detail/' . $x1['tema_seo']) ?>"><?php if ($x1['gambar'] == '') {

                                                                                                                echo "<img  src='" . base_url() . "upload/img_album/no-image.jpg' alt='no-image.jpg' style='width:100%; height:160px; border-radius: 2px;'/>";
                                                                                                            } else { ?>
                                        <img class="" src=" <?php echo base_url() . "upload/foto_pengumuman/" . $x1['gambar']; ?>" alt="" style="width:100%; height:160px; border-radius: 2px;"><?php } ?></a>
                            </div> -->

                            <div class="blog-content">
                                <a href="<?php echo base_url('agenda/detail/' . $x1['tema_seo']) ?>" class="post-title" style="font-size: 18px;">
                                    <?php echo $x1['tema'] ?></a>
                                <p>
                                    <?php
                                    $xberita = strip_tags(html_entity_decode($x1['isi_agenda']));
                                    echo character_limiter($xberita, 100); ?>
                                    <!-- <?php echo character_limiter($x1['isi'], 100); ?></p> -->
                                <div class="post-meta" style="font-size: 13px; margin-top:8px;">
                                    <a class="disable" href="#"><i class="fa fa-calendar"></i> <?php echo tgl_indo($x1['tgl_posting']); ?></a>
                                    <a class="disable" href="#"><i class="fa fa-eye"></i> <?php echo number_format($x1['dibaca'] + 1); ?>x dibaca</a>
                                </div>
                            </div>

                        </div>
                    <?php } ?>

                    <?php
                        echo $paging;

                    ?>

                </div>
                <?php include("sidebar.php"); ?>
            </div>

        </div>
    </section>

