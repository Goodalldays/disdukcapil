<!-- ***** Header Area Start ***** -->


    <?php $this->model_utama->kunjungan(); ?>

    <header class="header-area header-sticky background-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <!-- <a href="index.html" class="logo">
                            .BREEZED
                        </a> -->
                        <?php
        $logo = $this->model_utama->view_ordering_limit('logo', 'id_logo', 'DESC', 0, 1);
        foreach ($logo->result_array() as $row) {
          echo "<a class='logo' href='" . base_url() . "'><img src='" . base_url() . "upload/img_logo/$row[gambar]' alt=''></a>";
        }
        ?>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="<?php echo base_url(); ?>">Beranda</a></li>
                            <?php
              $pilihan = $this->model_utama->view_orderby('menu', array('id_parent' => '0', 'aktif' => 'Ya'), 'urutan', 'ASC');
              foreach ($pilihan->result_array() as $row) {
              ?>
                            <li class="
                            <?php
                                if($row['link'] != "#"){
                                    echo "scroll-to-section";
                                } else {
                                    echo "submenu";
                                }
                            ?>"><a href="
                            <?php
                if (preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $row['link'])) {
                  echo $row['link'];
                } else if ($row['link'] == "#") {
                  echo "javascript:void(0)";
                } else {
                  echo base_url() . $row['link'];
                } ?>" target="<?php
                              if (preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $row['link'])) {
                                echo "_blank";
                              }
                              ?>">

                    <?php echo $row['nama_menu']; ?></a>
                  <?php
                  $pilihan2 = $this->model_utama->view_orderby('menu', array('id_parent' => $row['id_menu'], 'aktif' => 'Ya'), 'urutan', 'ASC');
                  if ($pilihan2->num_rows() !== 0) {
                    echo "<ul class='dropdown'>";
                    foreach ($pilihan2->result_array() as $row2) { ?>
                <li><a href="<?php
                if (preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $row2['link'])) {
                  echo $row2['link'];
                }else {
                echo base_url() . $row2['link'];} ?>" target="<?php
                              if (preg_match('%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i', $row2['link'])) {
                                echo "_blank";
                              }
                              ?>"><?php echo $row2['nama_menu']; ?></a></li>
            <?php }
                    echo "</ul>";
                  }
            ?></li>
            <?php } ?>
                        <div class="search-icon">
                            <a href="#search"><i class="fa fa-search"></i></a>
                        </div>
                        </ul>
                        <a class="menu-trigger">
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Search Area ***** -->
    <div id="search">
        <button type="button" class="close">×</button>
        <form id="" action="<?php echo base_url('berita/index/') ?>" method="post">
            <input type="text" name="keyword" placeholder="Masukkan kata pencarian..." autocomplete="off">
            <button type="submit" class="main-button"><i class="fa fa-search"></i> Cari</button>
        </form>
    </div>

    <!-- Return to Top -->
    <div id="scrolltop"><a id="button"></a></div>

