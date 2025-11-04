<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..."
                aria-label="Search" aria-describedby="basic-addon2" disabled>
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" disabled>
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Cari..."
                            aria-label="Search" aria-describedby="basic-addon2" disabled>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" disabled>
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li> -->


        <li class="nav-item">
            <a class="nav-link" title="Layar Penuh" id="layar-penuh" role="button"
                aria-haspopup="true" aria-expanded="false" onclick="toggleFullScreen ();">
                <i class="fas fa-expand"></i></a>
        </li>

        <li class="nav-item mx-1">
            <a class="nav-link" title="Lihat Web" href="<?= base_url(); ?>" target="_blank" id="lihatWeb" role="button"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-eye fa-fw"></i></a>
        </li>

        <!-- Nav Item - Messages -->
        <?php
        $cek = $this->model_app->umenu_akses("pesan", $this->session->id_session);
        if ($cek == 1  or $this->session->level == 'admin') { ?>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" title="Pesan Masuk" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                    <?php $jmlh = $this->model_app->view_where('hubungi', array('dibaca'=>'N'))->num_rows();
                        if($jmlh != '0'){
                            echo '<span class="badge badge-danger badge-counter">'. $jmlh. '</span>';
                        } else {
                            echo '<span class="badge badge-danger badge-counter"></span>';
                        }
                    ?>
                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                Pesan Masuk
                </h6>
                    <?php
                        $pesan = $this->model_app->view_ordering_where_limit('hubungi','id_hubungi','DESC',array('dibaca'=>'N'),0,4);
                        if($pesan->result_array() == null){ echo '
                        <a class="dropdown-item d-flex align-items-center small text-gray-500" id="pesan">Tidak ada pesan baru.</a>';
                        } else {
                        foreach ($pesan->result_array() as $row) {
                            $subjek = substr($row['subjek'],0,20);
                            $waktukirim = cek_terakhir($row['tanggal'].' '.$row['jam']);
                            if ($row['dibaca']=='N'){
                                $bold = 'font-weight-bold';
                            }else{
                                $bold = '';
                            }
                            $nama = substr($row['nama'], 0, 15);
                            echo '

                <a class="dropdown-item d-flex align-items-center" id="pesan" href="'.base_url().'administrator/lihat_pesan/'.$row['id_hubungi'].'">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="'.base_url().'upload/img_user/undraw_profile.svg" alt="">

                    </div>
                    <div class="'. $bold .'">
                        <div class="text-truncate">'.$subjek.'</div>
                        <div class="small text-gray-500">'.$nama.' · '.$waktukirim.'</div>
                    </div>
                </a>';
        }
                        }
        ?>

                <a href="<?= base_url(); ?>administrator/pesan" class="dropdown-item text-center small text-gray-500" href="#">Lihat semua pesan</a>
            </div>
        </li>
        <?php } ?>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <?php
            $rows = $this->db->query("SELECT * FROM users where username='".$this->session->username."'")->row_array();
        ?>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $rows['nama_lengkap'] ?></span>
                <?php
                    if($rows['foto'] == ""){
                        $img = base_url()."upload/img_user/blank.png";
                    } else {
                        $img = base_url()."upload/img_user/$rows[foto]";
                    }
                ?>
                <img class="img-profile rounded-circle" src="<?= $img ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url() ?>administrator/edit_manajemenuser/<?= $this->session->username ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                </a>
                <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalPengaturan">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Pengaturan
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modaLogAktivitas">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Log Aktivitas
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url() ?>administrator/panduan">
                    <i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                    Panduan
                </a>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalTentangAplikasi">
                    <i class="fas fa-info-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                    Tentang Aplikasi
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url(); ?>administrator/keluar">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Keluar
                </a>
            </div>
        </li>

    </ul>

</nav>


<div class="modal fade" id="modalTentangAplikasi" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSayaLabel"><i class="fas fa-info-circle fa-sm fa-fw mr-2 text-gray-400"></i>Tentang Aplikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div style="font-size: 18px; font-weight: 600">Aplikasi Pengolah Website OPD dan Kecamatan Kabupaten Pelalawan.</div>
                <p style="margin-top:20px;">Versi 1.0<br>Tim E-Gov Diskominfo Kabupaten Pelalawan</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke</button>
            </div>
        </div>
    </div>
</div>

