<div class="container-fluid" id="edit-linkterkait">
<div class="row">
  </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/manajemen_pengguna" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
<?php
    echo "<div class='col-md-12'>
              <div class='box box-info'>

              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_manajemenpengguna',$attributes);
              if ($rows['foto']==''){ $foto = 'users.gif'; }else{ $foto = $rows['foto']; }
          echo "<div class='col-md-12'>
                  <table class='table table borderless'>
                  <tbody>
                    <input type='hidden' name='id' value='$rows[username]'>
                    <input type='hidden' name='ids' value='$rows[id_session]'>
                    <tr><th width='240px' scope='row'>Username</th>   <td><input type='text' class='form-control' name='a' value='$rows[username]' readonly='on'></td></tr>
                    <tr><th scope='row'>Password</th>                 <td><input type='password' class='form-control' name='b' onkeyup=\"nospaces(this)\"></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>             <td><input type='text' class='form-control' name='c' value='$rows[nama_lengkap]'></td></tr>
                    <tr><th scope='row'>Email</th>                    <td><input type='email' class='form-control' name='d' value='$rows[email]'></td></tr>
                    <tr><th scope='row'>No Telepon</th>                  <td><input type='number' class='form-control' name='e' value='$rows[no_telp]'></td></tr>
                    <tr>
                    <th scope='row'>Alamat</th>
                    <td><textarea class='form-control' name='alamat' style='height:100px'>$rows[alamat]</textarea></td>
                        </tr>
                    <tr><th scope='row'>Ganti Foto</th>                     <td><input type='file' class='form-control' name='f'><hr style='margin:5px'>";
                                                                                 if ($rows['foto'] != ''){ echo "Foto Saat ini : <img src='".base_url()."upload/img_user/$rows[foto]' width='60px;' style='border-radius:50%';>"; } echo "</td></tr></td></tr>";
                    if ($this->session->level == 'admin'){
                      echo "<tr><th scope='row'>Blokir</th>                   <td>"; if ($rows['blokir']=='Y'){ echo "<input type='radio' name='h' value='Y' checked> Ya &nbsp; <input type='radio' name='h' value='N'> Tidak"; }else{ echo "<input type='radio' name='h' value='Y'> Ya &nbsp; <input type='radio' name='h' value='N' checked> Tidak</td></tr> ";}
                      if($rows['level'] !== 'admin'){
                            echo "<tr><th scope='row'>Tambah Akses</th>                    <td><div class='checkbox-scroll'>";
                                                                               foreach ($record as $row){
                                                                                 echo "<span style='display:block'><input name='modul[]' type='checkbox' value='$row[id_modul]' /> $row[nama_modul]</span> ";
                                                                               }
                      echo "</div></td></tr>
                      <tr><th scope='row'>Hak Akses</th>                    <td><div class='checkbox-scroll'>";
                                                                               foreach ($akses as $ro){
                                                                                 echo "<span style='display:block'><a class='text-danger' href='".base_url()."administrator/delete_akses/$ro[id_umod]/".$this->uri->segment(3)."'><span class='glyphicon glyphicon-remove'></span></a> $ro[nama_modul]</span> ";
                             }                                                  }
                      echo "</div></td></tr>";
                    }
                  echo "</tbody>
                  </table></div>

              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                    <a href='". base_url(); "manajemen_pengguna'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>

                  </div>
            </div></div></div>";
            echo form_close();
