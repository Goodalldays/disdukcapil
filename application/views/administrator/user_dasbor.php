<div class="container-fluid" id="user_dasbor">
<div class="row">

<div class='col-md-12'>

          <div class='box'>
            <div class="col-12 col-lg-8 col-xl-7">
            <div class='box-header'>
              <h3 class='box-title'>Selamat Datang, <?= $users['nama_lengkap'] ?></h3>
            </div>
            <div class='box-body'>
              <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola Tulisan anda pada web ini, berikut informasi akun anda saat ini : </p>
              </div>
            </div>

        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            </div>
        <div class="card-body">
          <div class="col-12 col-lg-11 col-xl-10 col-centered">
          <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-info'></i> Info Penting!</h4>
                Diharapkan informasi akun sesuai dengan identitas pada Kartu Pengenal anda, Untuk Mengubah informasi Profile anda klik <a href='<?= base_url(); ?>administrator/edit_manajemenuser/<?= $this->session->username; ?>'>disini</a>.
              </div>

              <div class="form-group row mt-4">
                        <label for="username" class="col-12 col-lg-3 ">Username</label>
                        <div class="col-12 col-lg-9">
                          <?= $users['username'] ?></div>
              </div>
                          <div class="form-group row">
                        <label for="password" class="col-12 col-lg-3 ">Password</label>
                        <div class="col-12 col-lg-9">
                          ***********</div>
                          </div>

                          <div class="form-group row">
                        <label for="nama-lengkap" class="col-12 col-lg-3 ">Nama Lengkap</label>
                        <div class="col-12 col-lg-9">
                          <?= $users['nama_lengkap'] ?></div>
                          </div>



                          <div class="form-group row">
                        <label for="email" class="col-12 col-lg-3 ">Email</label>
                        <div class="col-12 col-lg-9">
                          <?= $users['email'] ?></div>
                          </div>

                          <div class="form-group row">
                        <label for="no-telp" class="col-12 col-lg-3 ">No. Telp</label>
                        <div class="col-12 col-lg-9">
                          <?= $users['no_telp'] ?></div>
                          </div>

                          <div class="form-group row">
                        <label for="alamat" class="col-12 col-lg-3 ">Alamat</label>
                        <div class="col-12 col-lg-9">
                        <?= $users['alamat'] ?></div>
                          </div>

                          <div class="form-group row">
                        <label for="level" class="col-12 col-lg-3 ">Level</label>
                        <div class="col-12 col-lg-9">
                          <?= $users['level'] ?></div>
                          </div>

                          <div class="form-group row">
                        <label for="hak-akses" class="col-12 col-lg-3 ">Hak Akses</label>
                        <div class="col-12 col-lg-9">
                          <?php
                    $hakakses = $this->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='".$this->session->id_session."'");
                    foreach ($hakakses->result_array() as $mod1) {
                        echo "
                        <a href='$mod1[link]' class='badge badge-primary'>$mod1[nama_modul]</a>";
                    }
                    ?></div>
                          </div>





            </div>
          </div>
        </div>

        <section class='col-lg-6 connectedSortable'>

    </section>
