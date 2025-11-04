<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>administrator">

        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">Pelalawan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <!-- <li class="nav-item active"> -->
    <li class="nav-item <?php if($this->uri->segment(2)=="home"){echo "active";}?>">
        <a class="nav-link" href="<?= base_url(); ?>administrator">
            <i class="fas fa-fw fa-tachometer-alt sidebar-icon-spacer"></i>
            <span>Dasbor</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <?php
        $cek = $this->model_app->umenu_akses("identitas_website", $this->session->id_session);
        $cek1 = $this->model_app->umenu_akses("logo_website", $this->session->id_session);
        $cek2 = $this->model_app->umenu_akses("menu_website", $this->session->id_session);
        $cek3 = $this->model_app->umenu_akses("halaman_statis", $this->session->id_session);
        $cek4= $this->model_app->umenu_akses("gambar_latar", $this->session->id_session);
        if ($cek == 1 or $cek1 == 1 or $cek2 == 1 or $cek3 == 1 or $cek4 == 1 or $this->session->level == 'admin') { ?>
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if($this->uri->segment(2)=="identitas_website" or $this->uri->segment(2)=="logo_website" or $this->uri->segment(2)=="menu_website" or $this->uri->segment(2)=="halaman_statis" or $this->uri->segment(2)=="gambar_latar" or $this->uri->segment(2)=="edit_menuwebsite" or $this->uri->segment(2)=="edit_halamanstatis"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMenuUtama"
            aria-expanded="true" aria-controls="collapseMenuUtama">
            <i class="fas fa-home sidebar-icon-spacer"></i>
            <span>Menu Utama</span>
        </a>
        <div id="collapseMenuUtama" class="collapse <?php if($this->uri->segment(2)=="identitas_website" or $this->uri->segment(2)=="logo_website" or $this->uri->segment(2)=="menu_website" or $this->uri->segment(2)=="halaman_statis" or $this->uri->segment(2)=="gambar_latar" or $this->uri->segment(2)=="edit_menuwebsite" or $this->uri->segment(2)=="edit_halamanstatis"){echo "show";}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                if ($cek == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="identitas_website"){echo "active";}?>" href="<?= base_url(); ?>administrator/identitas_website">Identitas Website</a>
                <?php } ?>
                <?php
                if ($cek1 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="logo_website"){echo "active";}?>" href="<?= base_url(); ?>administrator/logo_website">Logo Website</a>
                <?php } ?>
                <?php
                if ($cek2 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="halaman_statis" or $this->uri->segment(2)=="edit_halamanstatis"){echo "active";}?>" href="<?= base_url(); ?>administrator/halaman_statis">Halaman Statis</a>
                <?php } ?>
                <?php
                if ($cek3 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="menu_website" or $this->uri->segment(2)=="edit_menuwebsite"){echo "active";}?>" href="<?= base_url(); ?>administrator/menu_website">Menu Website</a>
                <?php } ?>
                <?php
                if ($cek4 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="gambar_latar"){echo "active";}?>" href="<?= base_url(); ?>administrator/gambar_latar">Gambar Latar</a>
                <?php } ?>
                <!-- <a class="collapse-item" href="<?= base_url(); ?>administrator/template_website">Template Website</a> -->
                <!-- <a class="collapse-item" href="<?= base_url(); ?>administrator/latar_belakang">Latar Belakang</a> -->
            </div>
        </div>
    </li>

    <!-- Divider -->

    <hr class="sidebar-divider">

    <?php } ?>

<!-- <?php
        $cek = $this->model_app->umenu_akses("berita", $this->session->id_session);
        $cek1 = $this->model_app->umenu_akses("kategori_berita", $this->session->id_session);
        $cek2 = $this->model_app->umenu_akses("tanda_berita", $this->session->id_session);
        // $cek3 = $this->model_app->umenu_akses("komentar_berita", $this->session->id_session);
        $cek4 = $this->model_app->umenu_akses("video", $this->session->id_session);
        $cek5 = $this->model_app->umenu_akses("daftar_video", $this->session->id_session);
        $cek6 = $this->model_app->umenu_akses("tanda_video", $this->session->id_session);
        // $cek7 = $this->model_app->umenu_akses("komentar_video", $this->session->id_session);
        $cek8 = $this->model_app->umenu_akses("foto", $this->session->id_session);
        $cek9 = $this->model_app->umenu_akses("album_foto", $this->session->id_session);
        $cek10 = $this->model_app->umenu_akses("tanda_foto", $this->session->id_session);
        // $cek11 = $this->model_app->umenu_akses("komentar_foto", $this->session->id_session);
        // $cek12 = $this->model_app->umenu_akses("pegawai", $this->session->id_session);
        $cek13 = $this->model_app->umenu_akses("banner_slider", $this->session->id_session);
        $cek14 = $this->model_app->umenu_akses("banner_home", $this->session->id_session);
        $cek15 = $this->model_app->umenu_akses("petikan", $this->session->id_session);
        $cek16 = $this->model_app->umenu_akses("banner_sidebar", $this->session->id_session);
        $cek17 = $this->model_app->umenu_akses("link_terkait", $this->session->id_session);
        $cek18 = $this->model_app->umenu_akses("sambutan", $this->session->id_session);
        $cek19 = $this->model_app->umenu_akses("agenda", $this->session->id_session);
        $cek20 = $this->model_app->umenu_akses("pengumuman", $this->session->id_session);
        $cek21 = $this->model_app->umenu_akses("sekilas_info", $this->session->id_session);
        $cek22 = $this->model_app->umenu_akses("jejak_pendapat", $this->session->id_session);
        $cek23 = $this->model_app->umenu_akses("unduhan", $this->session->id_session);
        $cek24 = $this->model_app->umenu_akses("pesan", $this->session->id_session);
        $cek25 = $this->model_app->umenu_akses("berita", $this->session->id_session);
        $cek26 = $this->model_app->umenu_akses("sensor_komentar", $this->session->id_session);
        $cek27 = $this->model_app->umenu_akses("komentar", $this->session->id_session);

        if ($cek == 1 or $cek1 == 1 or $cek2 == 1 or $cek3 == 1 or $cek4 == 1 or $cek5 == 1 or $cek6 == 1 or $cek7 == 1 or $cek8 == 1 or $cek9 == 1 or $cek10 == 1 or $cek11 == 1 or $cek12 == 1 or $cek13 == 1 or $cek14 == 1 or $cek15 == 1 or $cek16 == 1 or $cek17 == 1 or $cek18 == 1 or $cek19 == 1 or $cek20 == 1 or $cek21 == 1 or $cek22 == 1 or $cek23 == 1 or $cek24 == 1 or $cek25 == 1 or $cek26 == 1 or $cek27 == 1 or $this->session->level == 'admin') { ?> -->

    <div class="sidebar-heading">
        Menu Modul
    </div>


<?php
        $cek = $this->model_app->umenu_akses("berita", $this->session->id_session);
        $cek1 = $this->model_app->umenu_akses("kategori_berita", $this->session->id_session);
        $cek2 = $this->model_app->umenu_akses("tanda_berita", $this->session->id_session);
        // $cek3 = $this->model_app->umenu_akses("komentar_berita", $this->session->id_session);
        if ($cek == 1 or $cek1 == 1 or $cek2 == 1 or $cek3 == 1 or  $this->session->level == 'admin') { ?>
    <li class="nav-item <?php if($this->uri->segment(2)=="berita" or $this->uri->segment(2)=="edit_berita" or $this->uri->segment(2)=="kategori_berita" or $this->uri->segment(2)=="edit_kategoriberita" or $this->uri->segment(2)=="tanda_berita" or $this->uri->segment(2)=="edit_tandaberita"
    // or $this->uri->segment(2)=="komentar_berita"
    ){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBerita" aria-expanded="true"
            aria-controls="collapseBerita">
            <i class="fas fa-newspaper sidebar-icon-spacer"></i>
            <span>Berita</span>
        </a>
        <div id="collapseBerita" class="collapse <?php if($this->uri->segment(2)=="berita" or $this->uri->segment(2)=="edit_berita" or $this->uri->segment(2)=="kategori_berita" or $this->uri->segment(2)=="edit_kategoriberita" or $this->uri->segment(2)=="tanda_berita" or $this->uri->segment(2)=="edit_tandaberita"
        // or $this->uri->segment(2)=="komentar_berita"
        ){echo "show";}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                if ($cek == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="berita" or $this->uri->segment(2)=="edit_berita"){echo "active";}?>" href="<?= base_url(); ?>administrator/berita">Berita</a>
                <?php } ?>
                <?php
                if ($cek1 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="kategori_berita" or $this->uri->segment(2)=="edit_kategoriberita"){echo "active";}?>" href="<?= base_url(); ?>administrator/kategori_berita">Kategori Berita</a>
                <?php } ?>
                <?php
                if ($cek2 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="tanda_berita" or $this->uri->segment(2)=="edit_tandaberita"){echo "active";}?>" href="<?= base_url(); ?>administrator/tanda_berita">Tanda Berita</a>
                <?php } ?>
                <?php /*
                if ($cek3 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="komentar_berita"){echo "active";}?>" href="<?= base_url(); ?>administrator/komentar_berita">Komentar Berita</a>
                <?php }  */?>
            </div>
        </div>
    </li>
    <?php } ?>

    <!-- Nav Item - Utilities Collapse Menu -->
    <?php
        $cek = $this->model_app->umenu_akses("video", $this->session->id_session);
        $cek1 = $this->model_app->umenu_akses("daftar_putar", $this->session->id_session);
        $cek2 = $this->model_app->umenu_akses("tanda_video", $this->session->id_session);
        // $cek3 = $this->model_app->umenu_akses("komentar_video", $this->session->id_session);
        if ($cek == 1 or $this->session->level == 'admin') { ?>
    <li class="nav-item <?php if($this->uri->segment(2)=="video" or $this->uri->segment(2)=="edit_video" or $this->uri->segment(2)=="daftar_putar" or $this->uri->segment(2)=="edit_daftarputar" or $this->uri->segment(2)=="tanda_video" or $this->uri->segment(2)=="edit_tandavideo"
    // or $this->uri->segment(2)=="komentar_video"
    ){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVideo" aria-expanded="true"
            aria-controls="collapseVideo">
            <i class="fas fa-video sidebar-icon-spacer"></i>
            <span>Video</span>
        </a>
        <div id="collapseVideo" class="collapse <?php if($this->uri->segment(2)=="video" or $this->uri->segment(2)=="edit_video" or $this->uri->segment(2)=="daftar_putar" or $this->uri->segment(2)=="edit_daftarputar" or $this->uri->segment(2)=="tanda_video" or $this->uri->segment(2)=="edit_tandavideo"
        // or $this->uri->segment(2)=="komentar_video"
        ){echo "show";}?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                <?php
                if ($cek == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="video" or $this->uri->segment(2)=="edit_video"){echo "active";}?>" href="<?= base_url(); ?>administrator/video">Video</a> <?php } ?>
                <?php
                if ($cek1 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="daftar_putar" or $this->uri->segment(2)=="edit_daftarputar"){echo "active";}?>" href="<?= base_url(); ?>administrator/daftar_putar">Daftar Putar</a>
                <?php } ?>
                <?php
                if ($cek2 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="tanda_video" or $this->uri->segment(2)=="edit_tandavideo"){echo "active";}?>" href="<?= base_url(); ?>administrator/tanda_video">Tanda Video</a>
                <?php } ?>
                <?php /*
                if ($cek3 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="komentar_video"){echo "active";}?>" href="<?= base_url(); ?>administrator/komentar_video">Komentar Video</a>
                <?php } */ ?>
            </div>
        </div>
    </li>
    <?php } ?>


    <?php
        $cek = $this->model_app->umenu_akses("foto", $this->session->id_session);
        $cek1 = $this->model_app->umenu_akses("album_foto", $this->session->id_session);
        $cek2 = $this->model_app->umenu_akses("tanda_foto", $this->session->id_session);
        // $cek3 = $this->model_app->umenu_akses("komentar_foto", $this->session->id_session);
        if ($cek == 1 or $this->session->level == 'admin') { ?>
    <li class="nav-item <?php if($this->uri->segment(2)=="foto" or $this->uri->segment(2)=="edit_foto" or $this->uri->segment(2)=="album_foto" or $this->uri->segment(2)=="edit_albumfoto" or $this->uri->segment(2)=="tanda_foto" or $this->uri->segment(2)=="edit_tandafoto"
    // or $this->uri->segment(2)=="komentar_foto"
    ){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFoto" aria-expanded="true"
            aria-controls="collapseFoto">
            <i class="fas fa-images sidebar-icon-spacer"></i>
            <span>Foto</span>
        </a>
        <div id="collapseFoto" class="collapse <?php if($this->uri->segment(2)=="foto" or $this->uri->segment(2)=="edit_foto" or $this->uri->segment(2)=="album_foto" or $this->uri->segment(2)=="edit_albumfoto" or $this->uri->segment(2)=="tanda_foto" or $this->uri->segment(2)=="edit_tandafoto"
        // or $this->uri->segment(2)=="komentar_foto"
        ){echo "show";}?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <?php
                if ($cek == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="foto" or $this->uri->segment(2)=="edit_foto"){echo "active";}?>" href="<?= base_url(); ?>administrator/foto">Foto</a>
                <?php } ?>
                <?php
                if ($cek1 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="album_foto"  or $this->uri->segment(2)=="edit_albumfoto"){echo "active";}?>" href="<?= base_url(); ?>administrator/album_foto">Album Foto</a>
                <?php } ?>
                <?php
                if ($cek2 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="tanda_foto" or $this->uri->segment(2)=="edit_tandafoto"){echo "active";}?>" href="<?= base_url(); ?>administrator/tanda_foto">Tanda Foto</a>
                <?php } ?>
                <?php /*
                if ($cek3 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="komentar_foto"){echo "active";}?>" href="<?= base_url(); ?>administrator/komentar_foto">Komentar Foto</a>
                <?php } */ ?>
            </div>
        </div>
    </li>
    <?php } ?>

    <?php /*
        $cek = $this->model_app->umenu_akses("pegawai", $this->session->id_session);
        if ($cek == 1 or $this->session->level == 'admin') { ?>
    <li class="nav-item <?php if($this->uri->segment(2)=="pegawai" or $this->uri->segment(2)=="edit_pegawai"){echo "active";}?>">
    <?php
                if ($cek == 1 or $this->session->level == 'admin') { ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePegawai" aria-expanded="true"
            aria-controls="collapsePegawai">
            <i class="fas fa-id-badge sidebar-icon-spacer"></i>
            <span>Pegawai</span>
        </a>
        <?php } ?>
        <div id="collapsePegawai" class="collapse <?php if($this->uri->segment(2)=="pegawai" or $this->uri->segment(2)=="edit_pegawai"){echo "show";}?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                <!-- <a class="collapse-item" href="utilities-color.html">Playlist Video</a> -->
                <a class="collapse-item <?php if($this->uri->segment(2)=="pegawai"){echo "active";}?>" href="<?= base_url(); ?>administrator/pegawai">Pegawai</a>
            </div>
        </div>
    </li>
    <?php } */ ?>

    <?php
        $cek = $this->model_app->umenu_akses("banner_slider", $this->session->id_session);
        $cek1 = $this->model_app->umenu_akses("banner_home", $this->session->id_session);
        $cek2 = $this->model_app->umenu_akses("petikan", $this->session->id_session);
        $cek3 = $this->model_app->umenu_akses("banner_sidebar", $this->session->id_session);
        $cek4= $this->model_app->umenu_akses("link_terkait", $this->session->id_session);
        if ($cek == 1 or $cek1 == 1 or $cek2 == 1 or $cek3 == 1 or $cek4 == 1 or $this->session->level == 'admin') { ?>
    <li class="nav-item <?php if($this->uri->segment(2)=="banner_slider" or $this->uri->segment(2)=="edit_bannerslider" or $this->uri->segment(2)=="banner_home" or $this->uri->segment(2)=="edit_bannerhome" or $this->uri->segment(2)=="petikan" or $this->uri->segment(2)=="edit_petikan" or $this->uri->segment(2)=="banner_sidebar" or $this->uri->segment(2)=="edit_bannersidebar" or $this->uri->segment(2)=="link_terkait" or $this->uri->segment(2)=="edit_linkterkait"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBanner" aria-expanded="true"
            aria-controls="collapseBanner">
            <i class="fas fa-flag sidebar-icon-spacer"></i>
            <span>Banner</span>
        </a>
        <div id="collapseBanner" class="collapse <?php if($this->uri->segment(2)=="banner_slider" or $this->uri->segment(2)=="edit_bannerslider" or $this->uri->segment(2)=="banner_home" or $this->uri->segment(2)=="edit_bannerhome" or $this->uri->segment(2)=="petikan" or $this->uri->segment(2)=="edit_petikan" or $this->uri->segment(2)=="banner_sidebar" or $this->uri->segment(2)=="edit_bannersidebar" or $this->uri->segment(2)=="link_terkait" or $this->uri->segment(2)=="edit_linkterkait"){echo "show";}?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <?php
                if ($cek == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="banner_slider" or $this->uri->segment(2)=="edit_bannerslider"){echo "active";}?>" href="<?= base_url(); ?>administrator/banner_slider">Banner Slider</a>
                <?php } ?>
                <?php
                if ($cek1 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if( $this->uri->segment(2)=="banner_home" or $this->uri->segment(2)=="edit_bannerhome"){echo "active";}?>" href="<?= base_url(); ?>administrator/banner_home">Banner Home</a>
                <?php } ?>
                <?php
                if ($cek3 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="banner_sidebar" or $this->uri->segment(2)=="edit_bannersidebar"){echo "active";}?>" href="<?= base_url(); ?>administrator/banner_sidebar">Banner Sidebar</a>
                <?php } ?>
                <?php
                if ($cek2 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="petikan" or $this->uri->segment(2)=="edit_petikan"){echo "active";}?>" href="<?= base_url(); ?>administrator/petikan">Petikan</a>
                <?php } ?>
                <?php
                if ($cek4 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="link_terkait" or $this->uri->segment(2)=="edit_linkterkait"){echo "active";}?>" href="<?= base_url(); ?>administrator/link_terkait">Link Terkait</a>
                <?php } ?>
            </div>
        </div>
    </li>
    <?php } ?>

    <?php
        $cek = $this->model_app->umenu_akses("sambutan", $this->session->id_session);
        $cek1 = $this->model_app->umenu_akses("agenda", $this->session->id_session);
        $cek2 = $this->model_app->umenu_akses("pengumuman", $this->session->id_session);
        $cek3 = $this->model_app->umenu_akses("sekilas_info", $this->session->id_session);
        $cek4= $this->model_app->umenu_akses("jejak_pendapat", $this->session->id_session);
        $cek5= $this->model_app->umenu_akses("unduhan", $this->session->id_session);
        $cek6= $this->model_app->umenu_akses("pesan", $this->session->id_session);
        if ($cek == 1 or $cek1 == 1 or $cek2 == 1 or $cek3 == 1 or $cek4 == 1 or $cek5 == 1 or $cek6 == 1 or $this->session->level == 'admin') { ?>
    <li class="nav-item <?php if($this->uri->segment(2)=="sambutan" or $this->uri->segment(2)=="agenda" or $this->uri->segment(2)=="edit_agenda" or $this->uri->segment(2)=="pengumuman" or $this->uri->segment(2)=="edit_pengumuman" or $this->uri->segment(2)=="sekilas_info" or $this->uri->segment(2)=="edit_sekilasinfo"or $this->uri->segment(2)=="jejak_pendapat" or $this->uri->segment(2)=="edit_jejakpendapat"or
    $this->uri->segment(2)=="ikm"or $this->uri->segment(2)=="edit_ikm"or $this->uri->segment(2)=="unduhan" or $this->uri->segment(2)=="edit_unduhan" or $this->uri->segment(2)=="pesan" or $this->uri->segment(2)=="lihat_pesan"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInteraksi"
            aria-expanded="true" aria-controls="collapseInteraksi">
            <i class="fas fa-people-arrows sidebar-icon-spacer"></i>
            <span>Interaksi</span>
        </a>
        <div id="collapseInteraksi" class="collapse <?php if($this->uri->segment(2)=="sambutan" or $this->uri->segment(2)=="agenda" or $this->uri->segment(2)=="edit_agenda" or $this->uri->segment(2)=="pengumuman" or $this->uri->segment(2)=="edit_pengumuman" or $this->uri->segment(2)=="sekilas_info" or $this->uri->segment(2)=="edit_sekilasinfo"or $this->uri->segment(2)=="jejak_pendapat" or $this->uri->segment(2)=="edit_jejakpendapat"or $this->uri->segment(2)=="ikm"or $this->uri->segment(2)=="edit_ikm"or $this->uri->segment(2)=="unduhan" or $this->uri->segment(2)=="edit_unduhan" or $this->uri->segment(2)=="pesan" or $this->uri->segment(2)=="lihat_pesan"){echo "show";}?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                if ($cek == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="sambutan"){echo "active";}?>" href="<?= base_url(); ?>administrator/sambutan">Sambutan</a>
                <?php } ?>
                <?php
                if ($cek1 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="agenda" or $this->uri->segment(2)=="edit_agenda"){echo "active";}?>" href="<?= base_url(); ?>administrator/agenda">Agenda</a>
                <?php } ?>
                <?php
                if ($cek2 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="pengumuman" or $this->uri->segment(2)=="edit_pengumuman"){echo "active";}?>" href="<?= base_url(); ?>administrator/pengumuman">Pengumuman</a>
                <?php } ?>
                <!-- <?php
                if ($cek3 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="sekilas_info" or $this->uri->segment(2)=="edit_sekilasinfo"){echo "active";}?>" href="<?= base_url(); ?>administrator/sekilas_info">Sekilas Info</a>
                <?php } ?> -->
                <!-- <?php
                if ($cek4 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="edit_jejakpendapat" or $this->uri->segment(2)=="jejak_pendapat"){echo "active";}?>" href="<?= base_url(); ?>administrator/jejak_pendapat">Jejak Pendapat</a>
                <?php } ?> -->

                <?php /*
                if ($cek4 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="edit_ikm" or $this->uri->segment(2)=="ikm"){echo "active";}?>" href="<?= base_url(); ?>administrator/ikm">IKM</a>
                <?php }  */?>


                <?php
                if ($cek5 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="unduhan" or $this->uri->segment(2)=="edit_unduhan"){echo "active";}?>" href="<?= base_url(); ?>administrator/unduhan">Unduhan</a>
                <?php } ?>
                <?php
                if ($cek6 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="pesan" or $this->uri->segment(2)=="lihat_pesan"){echo "active";}?>" href="<?= base_url(); ?>administrator/pesan">Pesan Masuk</a>
                <?php } ?>
            </div>
        </div>
    </li>
    <?php } ?>

    <?php
        $cek = $this->model_app->umenu_akses("komentar", $this->session->id_session);
        if ($cek == 1 or $this->session->level == 'admin') { ?>
    <li class="nav-item <?php if($this->uri->segment(2)=="komentar"){echo "active";}?>">
    <?php
                if ($cek == 1 or $this->session->level == 'admin') { ?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan"
            aria-expanded="true" aria-controls="collapsePengaturan">
            <i class="fas fa-cog sidebar-icon-spacer"></i>
            <span>Pengaturan</span>
        </a>
        <?php } ?>
        <div id="collapsePengaturan" class="collapse <?php if($this->uri->segment(2)=="komentar"){echo "show";}?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                <a class="collapse-item <?php if($this->uri->segment(2)=="komentar"){echo "active";}?>" href="<?= base_url(); ?>administrator/komentar">Komentar</a>
            </div>
        </div>
    </li>
    <?php } ?>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php } ?>

    <!-- Heading -->
    <?php
        $cek = $this->model_app->umenu_akses("manajemen_pengguna", $this->session->id_session);
        $cek1 = $this->model_app->umenu_akses("manajemen_modul", $this->session->id_session);
        if ($cek == 1 or $cek1 == 1 or $this->session->level == 'admin') { ?>
    <div class="sidebar-heading">
        Menu Pengguna
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if($this->uri->segment(2)=="manajemen_pengguna" or $this->uri->segment(2)=="manajemen_modul"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
            aria-controls="collapseUser">
            <i class="fas fa-users sidebar-icon-spacer"></i>
            <span>Pengguna</span>
        </a>
        <div id="collapseUser" class="collapse <?php if($this->uri->segment(2)=="manajemen_pengguna" or $this->uri->segment(2)=="manajemen_modul"){echo "show";}?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <?php
                if ($cek == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="manajemen_pengguna"){echo "active";}?>" href="<?= base_url(); ?>administrator/manajemen_pengguna">Manajemen Pengguna</a>
                <?php } ?>
                <!-- <?php
                if ($cek1 == 1 or $this->session->level == 'admin') { ?>
                <a class="collapse-item <?php if($this->uri->segment(2)=="manajemen_modul"){echo "active";}?>" href="<?= base_url(); ?>administrator/manajemen_modul">Manajemen Modul</a>
                <?php } ?> -->
            </div>
        </div>
    </li>
    <?php } ?>

    <li class="nav-item <?php if($this->uri->segment(2)=="faq" or $this->uri->segment(2)=="panduan"){echo "active";}?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBantuan" aria-expanded="true"
            aria-controls="collapseUser">
            <i class="fas fa-life-ring sidebar-icon-spacer"></i>
            <span>Bantuan</span>
        </a>
        <div id="collapseBantuan" class="collapse <?php if($this->uri->segment(2)=="faq" or $this->uri->segment(2)=="panduan"){echo "show";}?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if($this->uri->segment(2)=="panduan"){echo "active";}?>" href="<?= base_url(); ?>administrator/panduan">Panduan</a>
                <a class="collapse-item <?php if($this->uri->segment(2)=="faq"){echo "active";}?>" href="<?= base_url(); ?>administrator/faq">FAQ</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item <?php if($this->uri->segment(2)=="edit_manajemenuser"){echo "active";}?>">
        <a class="nav-link" href="<?= base_url(); ?>administrator/edit_manajemenuser/<?= $this->session->username ?>">
            <i class="fas fa-user sidebar-icon-spacer"></i>
            <span>Profil</span>
        </a>
    </li>



    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>administrator/keluar">
            <i class="fas fa-sign-out-alt sidebar-icon-spacer"></i>
            <span>Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-2">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
