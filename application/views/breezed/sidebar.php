  <div id="sidebar-kanan" class="col-12 col-lg-4" ">
    <div class="sticky-top">


<?php
$banner = $this->model_utama->view_where('iklansidebar', array('aktif'=>'Y'))->result_array();;
if($banner != null) { ?>
<div style="margin-bottom: 30px;" data-scroll-reveal="enter right and move 50px over 1.33s">
<?php $banner_sidebar = $this->model_utama->view_where_ordering_limit('iklansidebar',array('aktif'=>'Y'),'id_iklan','DESC',0,1 )->row_array(); ?>
      <div>

        <!-- <div class="caption">
    <p><?= $banner_sidebar['judul']; ?></p>
  </div> -->
        <a href="http://<?= $banner_sidebar['url']; ?>" target="_blank">

        <img src="<?= base_url(); ?>upload/img_sidebar/<?= $banner_sidebar['gambar']; ?>" alt="" style="max-width: 100%; border-radius: 3px;"></a>
      </div>
</div>
<?php } ?>


      <?php
        $query = $this->model_utama->view_where('berita', array('terbit' => 'Y'))->result_array();
        if($query != null){
      ?>
      <div id="berita-popular" class="single-widget-area" data-scroll-reveal="enter right and move 50px over 1.33s">
        <div class="section-heading mb-3">
          <h5><i class="fa fa-newspaper-o"></i> BERITA POPULER</h5>
        </div>
        <?php
          $no = 0;
          $sb1 = $this->model_utama->view_where_ordering_limit('berita', array('terbit' => 'Y'), 'dibaca', 'DESC', 0, 5);
          foreach ($sb1->result_array() as $r) {
        ?>
        <div class="single-news-area d-flex align-items-center" data-wow-delay="0.<?php echo $no; ?>s">
          <div class="blog-thumbnail-sidebar">
            <?php if ($r['gambar'] != '') { ?>
            <img src="<?php echo base_url() ?>upload/img_berita/<?php echo $r["gambar"] ?>" alt="">
            <?php } else { ?>
            <img src="<?php echo base_url(); ?>upload/img_album/no-image.jpg" alt="">
            <?php } ?>
          </div>
          <div class="blog-content-sidebar">
            <a href="<?php echo base_url('berita/detail/' . $r['judul_seo']) ?>" class="post-title"><?php echo character_limiter($r['judul'], 65); ?></a>
            <span class="post-date color-icon"><i class="fa fa-calendar"></i> <?php echo tgl_indo($r['tanggal']); ?> </span>
          </div>
        </div>
        <?php
          $no++;
          }
        ?>
      </div>
      <?php } ?>

      <!-- <div id="jejak-pendapat" class="single-widget-area" data-scroll-reveal="enter right and move 50px over 1.33s">
        <div class="section-heading mb-3">
          <h5>
            <i class="fa fa-pie-chart"></i> JEJAK PENDAPAT
          </h5>
          <div class="line"></div>
        </div>
        <div class="mdc-layout-grid__cell--span-4-phone mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-12-desktop flex-column">
          <div id="q_1" class="question single-select" style="display: block; margin-bottom: 15px;">
            <legend class="question-text">Bagaimana tingkat kepuasan anda terhadap website ini?</legend>
            <div class="answer">
              <label class="radio"><input type="radio" value="0" name="puas"> Tidak Puas</label>
              <label class="radio"><input type="radio" value="1" name="puas"> Cukup Puas</label>
              <label class="radio"><input type="radio" value="2" name="puas"> Puas</label>
              <label class="radio"><input type="radio" value="3" name="puas" checked> Sangat Puas</label>
            </div>
          </div>
          <a href="<?= base_url(); ?>" class="main-button-icon button-small">Kirim <i class="fa fa-arrow-right"></i>
          </a>
        </div>
      </div> -->


      <div id="agenda" class="single-widget-area" data-scroll-reveal="enter right and move 50px over 1.55s">
        <div class="section-heading mb-3">

          <h5><i class="fa fa-calendar-o"></i> AGENDA</h5>
          <div class="line" style="width: 40px;"></div>
        </div>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default wow fadeInRight" data-wow-delay="0.<?php  ?>s">
            <div class="panel-heading" role="tab" id="heading<?php  ?>">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php ?>" aria-expanded="false" aria-controls="collapse<?php ?>">

                </a>
              </h4>
            </div>
            <div class="agenda">
              <div class="table-responsive">
                <table class="table table-condensed table-bordered">
                  <thead class="table-header">
                    <tr>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
          $no = 0;
          $agnd = $this->model_utama->view_where_ordering_limit('agenda', array('terbit' => 'Y'), 'tgl_mulai', 'DESC', 0, 5);
          foreach ($agnd->result_array() as $agenda) {
        ?>
                    <tr>
                      <td class="agenda-date" class="active" rowspan="1">
                        <div class="dayofmonth"><?= date('j', strtotime($agenda['tgl_mulai'])); ?></div>
                        <div class="dayofweek"><?php
                                $hari = date('D', strtotime($agenda['tgl_mulai']));
                                echo getHari($hari); ?></div>
                        <div class="shortdate text-muted"><?php
                                $bulan = date('m', strtotime($agenda['tgl_mulai']));
                                echo getBulann($bulan).', '.date('Y', strtotime($agenda['tgl_mulai'])); ?></div>
                      </td>
                      <td class="agenda-time">
                        <?= $agenda['jam'] ?>
                      </td>
                      <td class="agenda-events">
                        <div class="agenda-event">
                          <i class="glyphicon glyphicon-repeat text-muted" title="Repeating event"></i>
                          <a href="<?= base_url() ?>agenda/detail/<?= $agenda['tema_seo'] ?>"><?= character_limiter($agenda['tema'], 50); ?></a>

                        </div>
                      </td>
                    </tr>

                    <?php } ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>

        </div>

      </div>
      <?php
        $query = $this->model_utama->view_where('unduh', array('terbit' => 'Y'))->result_array();
        if($query != null){
      ?>
      <div id="download" class="single-widget-area" data-scroll-reveal="enter right and move 50px over 1.33s">
        <div class="section-heading mb-3">
          <h5><i class="fa fa-download"></i> UNDUHAN</h5>
        </div>
        <?php
          // $no=$this->uri->segment(3)+1;
          $no = 1;
          $download = $this->model_utama->view_where_ordering_limit('unduh', array('terbit' => 'Y'), 'id_unduh', 'DESC', 0, 5);
          foreach ($download->result_array() as $dr) {
        ?>
        <div class="single-news-area d-flex align-items-center download-sidebar" data-wow-delay="0.<?php echo $no; ?>s">
          <div class="blog-content-sidebar" style="padding-left: 0;">
            <a href="<?= base_url() ?>unduhan/file/<?php echo $dr['file'] ?>" target="_blank" class="post-title" title=""><?php echo character_limiter($dr['judul_unduh'], 80); ?></a>
              <span class="post-date color-icon"><i class="fa fa-calendar"></i> <?php echo tgl_indo($dr['tanggal']); ?> &nbsp;&nbsp;<i class="fa fa-download"></i> <?php echo $dr['hits'] ?>x di unduh</span>
          </div>
        </div>
          <?php $no++;
            }
          ?>
      </div>
<?php
        }
        ?>
    </div>
  </div>
