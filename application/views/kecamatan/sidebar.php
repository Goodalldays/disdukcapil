        <!-- Dento Sidebar Area -->
          <div id="sidebar-kanan" class="col-12 col-lg-4 wow fadeInRight">
            <div class="dento-sidebar">

              <!-- Single Widget Area -->
              <!-- <div class="single-widget-area search-widget">
              <form action="<?php echo base_url('berita/index/') ?>" method="post">
                <input type="text" name="keyword" class="form-control" placeholder="Search ...">
                <button type="submit"><i class="icon_search"></i></button>
              </form>
            </div> -->

              <!-- Berita Populer -->
              <!-- <div class="single-widget-area">
                <div class="section-heading" style="margin-bottom: 30px;">
                  <h5>BERITA POPULER</h5>
                  <div class="line" style="width: 40px;"></div>
                </div>
                <?php
                $no = 0;
                $sb1 = $this->model_utama->view_ordering_limit('video', 'dibaca', 'ASC', 1, 5);
                foreach ($sb1->result_array() as $r) {

                ?>
                  <div class="single-news-area d-flex align-items-center" data-wow-delay="0.<?php echo $no; ?>s">
                    <div class="blog-thumbnail">
                      <?php if ($r['gambar'] != '') { ?>
                        <img src="<?php echo base_url() ?>upload/foto_berita/<?php echo $r["gambar"] ?>" alt="" style="height: 70px; width: 70px; border-radius: 2px;">
                      <?php } else { ?>
                        <img src="<?php echo base_url(); ?>upload/img_album/no-image.jpg" alt="" style="height: 70px; width: 70px;">
                      <?php } ?>

                    </div>
                    <div class="blog-content">
                      <a href="<?php echo base_url('berita/detail/' . $r['judul_seo']) ?>" class="post-title"><?php echo character_limiter($r['judul'], 40); ?></a>
                      <span class="post-date"><i class="fa fa-calendar"></i> <?php echo tgl_indo($r['tanggal']); ?> </span>
                    </div>
                  </div>
                <?php $no++;
                } ?>
              </div> -->
              <!-- Akhir Berita Populer -->
              <!-- Agenda -->
              <div class="single-widget-area">
                <div class="section-heading" style="margin-bottom: 30px;">
                  <h5>AGENDA TERBARU</h5>
                  <div class="line" style="width: 40px;"></div>
                </div>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  <div class="panel panel-default wow fadeInRight" data-wow-delay="0.<?php  ?>s">
                    <div class="panel-heading" role="tab" id="heading<?php  ?>">
                      <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php ?>" aria-expanded="false" aria-controls="collapse<?php ?>">
                          <?php ?>
                        </a>
                      </h4>
                    </div>
                    <div id="collapse<?php ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php ?>">
                      <div class="panel-body">
                        <p> Acara : <strong><?php ?></strong></p>
                        <?php ?>
                      </div>
                    </div>
                  </div>
                  <?php ?>
                </div>
              </div>
              <!-- Akhir Agenda -->
              <!-- Download File -->
              <div class="single-widget-area">
                <div class="section-heading" style="margin-bottom: 30px;">
                  <h5>DOWNLOAD FILE</h5>
                  <div class="line" style="width: 40px;"></div>
                </div>
                <?php
                // $no=$this->uri->segment(3)+1;
                $no = 0;
                $download = $this->model_utama->view_ordering_limit('download', 'id_download', 'DESC', 0, 6);
                foreach ($download->result_array() as $dr) {
                ?>
                  <div class="single-news-area d-flex align-items-center wow fadeInRight" data-wow-delay="0.<?php echo $no; ?>s">
                    <div class="blog-content" style="padding-left: 0;">
                      <a href="<?= base_url() ?>download/file_view/<?php echo $dr['nama_file'] ?>" target="_blank" class="post-title" title="Didownload <?php echo $dr['hits'] ?>kali"><?php echo $dr['judul'] ?></a>
                      <span class="post-date"><i class="fa fa-calendar"></i> <?php echo tgl_indo($dr['tgl_posting']); ?> &nbsp;&nbsp;<i class="fa fa-download"></i> <?php echo $dr['hits'] ?> x didownload</span>
                    </div>
                  </div>
                <?php $no++;
                } ?>
              </div>
              <!-- Akhir Download File -->

            </div>
          </div>
