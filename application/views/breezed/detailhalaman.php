<section>
    <div class="detail-halaman" style="margin-top: 130px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8" style="padding-right: 25px;">
                    <div class="section-heading" style="margin-bottom: 30px;">
                        <h6 data-scroll-reveal="enter left move 30px over 0.4s after 0.2s">Halaman</h6>
                        <h2 data-scroll-reveal='enter left move 20px over 0.6s after 0.4s'><?php echo $rows['judul']; ?></span></h2>
                    </div>

                    <div class="blog-details-area" data-scroll-reveal="enter bottom move 30px over 0.4s after 0.2s">
                        <div class="img-head-halaman">
                            <?php
                                if ($rows['gambar'] == '') {
                                    echo "<img src='" . base_url() . "upload/img_album/no-image.jpg' alt='no-image.jpg'>";
                                } else {
                                    echo "<img src='" . base_url() . "upload/foto_statis/$rows[gambar]' alt='$rows[judul]'></a>";
                                }
                            ?>
                        </div>
                        <div data-scroll-reveal="enter left move 30px over 0.9s after 0.5s">
                        <p>
                            <?php echo $rows['isi_halaman']; ?>
                        </p>
                        </div>
                    </div>
                </div>
                <?php include("sidebar.php"); ?>
            </div>
        </div>
    </div>
</section>
