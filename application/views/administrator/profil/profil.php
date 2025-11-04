<!-- <div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
</div>

<div class="card shadow mb-4" id="data-identitas-website">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title ?></h6>
        </div>
        <div class="card-body">
        <?= form_open_multipart('administrator/identitas_website');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id_identitas" value="<?= $record['id_identitas'] ?>">
        <div class="form-group row">
                        <label for="username" class="col-12 col-lg-3 mt-2">Username</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="username" name="username" value="<?= $record['nama_website'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Password</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="nama-website" name="nama-website" value="<?= $record['nama_website'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Nama Lengkap</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="nama-website" name="nama-website" value="<?= $record['nama_website'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-12 col-lg-3  mt-2">Email</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="email" class="form-control" id="email" name="email" value="<?= $record['email'] ?>"></div>
                    </div>
                    <div class="form-group row">
                        <label for="no-telp" class="col-12 col-lg-3 mt-2">No. Telepon</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="no-telp" name="no-telp" value="<?= $record['no_telp'] ?>"></div>
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3 mt-2 ">Foto</label><br>
                        <div class="col-12 col-lg-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="gambar">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih Foto</label>
                                <div class="mt-2">Foto Aktif Saat ini : <img style='width:32px; height:32px' src='<?= base_url() ?>upload/favicon/<?= $record['favicon']?>'></div>
                              </div>
                        </div>
                    </div>
              </div>
            </div>
            <div class="card-footer">
                    <div class="m-3">
                    <button type="submit" name="submit" class="mb-3 float-right btn btn-primary btn-icon-split btn-sm ml-2">
            <span class="icon text-white-50">
                <i class="fa fa-check"></i>
            </span>
            <span class="text">Simpan</span>
        </button>
                    </div>
        <?= form_close(); ?>
        </div>
        </div>
        </div> -->
<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data $rows[level]</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_manajemenuser',$attributes);
              if ($rows['foto']==''){ $foto = 'users.gif'; }else{ $foto = $rows['foto']; }
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[username]'>
                    <input type='hidden' name='ids' value='$rows[id_session]'>
                    <tr><th width='120px' scope='row'>Username</th>   <td><input type='text' class='form-control' name='a' value='$rows[username]' readonly='on'></td></tr>
                    <tr><th scope='row'>Password</th>                 <td><input type='password' class='form-control' name='b' onkeyup=\"nospaces(this)\"></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>             <td><input type='text' class='form-control' name='c' value='$rows[nama_lengkap]'></td></tr>
                    <tr><th scope='row'>Alamat Email</th>                    <td><input type='email' class='form-control' name='d' value='$rows[email]'></td></tr>
                    <tr><th scope='row'>No Telepon</th>                  <td><input type='number' class='form-control' name='e' value='$rows[no_telp]'></td></tr>
                    <tr><th scope='row'>Ganti Foto</th>                     <td><input type='file' class='form-control' name='f'><hr style='margin:5px'>";
                                                                                 if ($rows['foto'] != ''){ echo "<i style='color:red'>Foto Saat ini : </i><a target='_BLANK' href='".base_url()."asset/foto_user/$rows[foto]'>$rows[foto]</a>"; } echo "</td></tr></td></tr>";
                    if ($this->session->level == 'admin'){
                      echo "<tr><th scope='row'>Blokir</th>                   <td>"; if ($rows['blokir']=='Y'){ echo "<input type='radio' name='h' value='Y' checked> Ya &nbsp; <input type='radio' name='h' value='N'> Tidak"; }else{ echo "<input type='radio' name='h' value='Y'> Ya &nbsp; <input type='radio' name='h' value='N' checked> Tidak"; } echo "</td></tr>
                            <tr><th scope='row'>Tambah Akses</th>                    <td><div class='checkbox-scroll'>";
                                                                               foreach ($record as $row){
                                                                                 echo "<span style='display:block'><input name='modul[]' type='checkbox' value='$row[id_modul]' /> $row[nama_modul]</span> ";
                                                                               }
                      echo "</div></td></tr>
                      <tr><th scope='row'>Hak Akses</th>                    <td><div class='checkbox-scroll'>";
                                                                               foreach ($akses as $ro){
                                                                                 echo "<span style='display:block'><a class='text-danger' href='".base_url()."administrator/delete_akses/$ro[id_umod]/".$this->uri->segment(3)."'><span class='glyphicon glyphicon-remove'></span></a> $ro[nama_modul]</span> ";
                                                                               }
                      echo "</div></td></tr>";
                    }
                  echo "</tbody>
                  </table></div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
