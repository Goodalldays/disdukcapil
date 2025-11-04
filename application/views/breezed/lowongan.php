<section>
<div style="margin-top: 130px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8" style="padding-right: 25px;">
                <div class="section-heading" style="margin-bottom: 30px;">
                        <h6 data-scroll-reveal="enter left move 10px over 0.4s after 0.2s">Kerja</h6>
                        <h2 data-scroll-reveal="enter left move 20px over 0.6s after 0.4s">Lowongan Kerja</h2>
                    </div>


                    <?php
                    // $linksatu = $this->model_utama->view_ordering_limit('berita', 'id_berita', 'DESC', 0, 10);
                    foreach ($lowongan->result_array() as $x1) {
                    ?>
                        <div class="single-blog-item style-2 d-flex flex-wrap mb-20">

                            <div class="blog-thumbnail mt-30">
                                <a href="<?php echo base_url('lowongan/detail/' . $x1['seo_lowongan']) ?>"><?php if ($x1['gambar'] == '') {

                                                                                                                echo "<img  src='" . base_url() . "upload/img_lowongan/no-image.jpg' alt='no-image.jpg' style='width:100%; height:160px; border-radius: 2px;'/>";
                                                                                                            } else { ?>
                                        <img class="" src=" <?php echo base_url() . "upload/img_lowongan/" . $x1['gambar']; ?>" alt="" style="width:100%; height:160px; border-radius: 2px;"><?php } ?></a>
                            </div>

                            <div class="blog-content">
                                <a href="<?php echo base_url('lowongan/detail/' . $x1['seo_lowongan']) ?>" class="post-title" style="font-size: 18px;">
                                    <?php echo $x1['jdl_lowongan'] ?></a>
                                <p>
                                    <?php
                                    $xberita = strip_tags(html_entity_decode($x1['isi_lowongan']));
                                    echo character_limiter($xberita, 100); ?>
                                    <!-- <?php echo character_limiter($x1['isi_lowongan'], 100); ?></p> -->
                                <div class="post-meta" style="font-size: 13px;">
                                    <a class="disable" href="#"><i class="fa fa-calendar"></i> <?php echo tgl_indo($x1['tanggal']); ?></a>
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

    </div>
