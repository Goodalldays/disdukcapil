<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
</div>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-1 font-weight-bold text-primary float-left"><?= $title; ?></h6>
            <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right" data-toggle="modal"
                data-target="#modalTambahManajemenPengguna">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Pengguna</span>
            </a>
        </div>
        <div class="card-body" id="tableCustom">
            <div class="table-responsive">
                <table class="table table-bordered" id="tabelManajemenPengguna" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Foto</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Blokir</th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($manajemen_pengguna as $row){
                            if($row['level'] == 'admin'){
                                $blokir = "<a class='user-admin' title='Tidak dapat memblokir admin'><i class='fas fa-thumbs-up fa-xs'
                                style='color: #4e73df'></i></a>&nbsp;";
                            }
                            else if ($row['blokir']=='Y'){
                                $blokir = "<a class='blokir-user' title='Blokir' href='".base_url(). "administrator/blokir_pengguna/$row[username]/$row[blokir]'><i class='fas fa-thumbs-down fa-xs'
                                style='color: #e74a3b'></i></a>&nbsp;";
                            }else{
                                $blokir = "<a class='tidak-blokir-user' title='Tidak Blokir' href='" .base_url(). "administrator/blokir_pengguna/$row[username]/$row[blokir]'><i class='fas fa-thumbs-up fa-xs'
                                style='color: #1cc88a'></i></a>&nbsp;";
                            }
                            $img = "<a href='".base_url()."upload/img_user/$row[foto]' data-lightbox='image-1' data-title='$row[nama_lengkap]' >
                            <figure><img src='".base_url()."upload/img_user/$row[foto]' alt='' style='width:40px; border-radius:20px; padding:10px 0; max-width: 100%;'></figure></a>";
                        echo "
                            <tr>
                                <td class='text-center'>$no</td>
                                <td class='text-center'>$img</td>
                                <td>$row[username]</td>
                                <td>$row[nama_lengkap]</td>
                                <td>$row[email]</td>
                                <td class='text-center'>$row[level]</td>
                                <td class='text-center'>$blokir</td>


                        <td>
                            <center>
                                <a class='edit-data' title='Ubah' href='".base_url()."administrator/edit_manajemenpengguna/$row[username]'><i class='fas fa-edit fa-xs'
                                        style='color: #f6c23e'></i></a>&nbsp;

                                <a id='hapus-data' class='hapus-data' href='".base_url()."administrator/hapus_pengguna/$row[username]' class='hapus-data' title='Hapus'><i
                                        class='fas fa-trash fa-xs' style='color: #e74a3b'></i></a>
                            </center>

                        </>
                        </tr>
                        ";
                        $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="modalTambahManajemenPengguna"   role="dialog" aria-labelledby="modalTambahManajemenPengguna"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400">
                </i> Tambah Pengguna</h5>
                    <?php $this->session->disabled ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
              echo form_open_multipart('administrator/tambah_manajemenpengguna'); ?>
            <div class="modal-body mx-4 mt-4">
                    <div class="form-group row">
                        <label for="username" class="col-12 col-lg-3 mt-2">Username</label>
                        <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-12 col-lg-3 mt-2">Password</label>
                        <div class="col-12 col-lg-9">
                        <input type="password" class="form-control" id="" name="password"></div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-12 col-lg-3 mt-2">Nama Lengkap</label>
                        <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="" name="nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-12 col-lg-3 mt-2">Email</label>
                        <div class="col-12 col-lg-9">
                        <input type="email" class="form-control" id="" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-12 col-lg-3  mt-2">No. Telp</label>
                        <div class="col-12 col-lg-9">
                        <input type="tel" class="form-control" id="" name="telp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-12 col-lg-3 mt-2">Alamat</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='alamat' style='height:100px'></textarea></div>
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3  mt-2">Foto</label><br>
                        <div class="col-12 col-lg-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="gambar">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <!-- <small id="" name="gambar-berita" class="form-text text-muted"><i class="fas fa-info fa-xs"></i> gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="level" class="col-12 col-lg-3  mt-2">Level</label>
                        <div class="col-12 col-lg-9">
                        <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="level" value="kontributor" id="level" class="custom-control-input" checked>
                                <label class="custom-control-label" for="level">Kontributor</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="level" value="user" id="level2" class="custom-control-input">
                                <label class="custom-control-label" for="level2">User Biasa</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="level" value="admin" id="level3"   class="custom-control-input">
                                <label class="custom-control-label" for="level3">Administrator</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="akses" class="col-12 col-lg-3 mt-2">Hak Akses</label>

                    <div class="col-12 col-lg-9 mt-2">
                    <?php
                    foreach ($proses as $row)
                    {
                        echo "<div class='form-check form-check-inline'>
  <input class='form-check-input' type='checkbox' id='tag' value='$row[id_modul]' name='modul[]'>
  <label class='form-check-label' for=''>$row[nama_modul]</label>
</div>";
                    } ?>
                    </div>
                    </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-icon-split btn-sm" data-dismiss="modal">
            <span class="icon text-white-50">
                <i class="fa fa-times"></i>
            </span>
            <span class="text">Keluar</span>
        </button>
        <button type="submit" name="submit" class="btn btn-primary btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fa fa-check"></i>
            </span>
            <span class="text">Tambah</span>
        </button>
        <?= form_close(); ?>
      </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->

<script>
$('.hapus-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Hapus pengguna",
      text: "Yakin ingin menghapus pengguna?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#e74a3b',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: "Tidak",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
            title: "Hapus",
            text: "Pengguna berhasil dihapus!",
            icon: "success",
            timer: 2000,
            showConfirmButton: false
        }).then(function(){
            window.location.replace(url);
        })
      }
    //   else {
    //     Swal.fire({
    //         title: "Batal",
    //         text: "Hapus berita dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

$('.blokir-user').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Tidak Blokir",
      text: "Yakin ingin tidak memblokir pengguna?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#4e73df',
      confirmButtonText: 'Ya, Tidak Blokir',
      cancelButtonText: "Tidak",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
            title: "Tidak Blokir",
            text: "Pengguna tidak diblokir", icon: "success",
            timer: 2000,
            showConfirmButton: false
        }).then(function(){
            window.location.replace(url);
        })
      }
    //   else {
    //     Swal.fire({
    //         title: "Batal",
    //         text: "Terbit berita dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

$('.tidak-blokir-user').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Blokir Pengguna",
      text: "Yakin ingin memblokir pengguna?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#e74a3b',
      confirmButtonText: 'Ya, Blokir',
      cancelButtonText: "Tidak",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
            title: "Blokir",
            text: "Pengguna telah di blokir",
            icon: "success",
            timer: 2000,
            showConfirmButton: false
        }).then(function(){
            window.location.replace(url);
        })
      }
    //   else {
    //     Swal.fire({
    //         title: "Batal",
    //         text: "Tidak terbit berita dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

$('.edit-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Edit pengguna",
      text: "Yakin ingin edit pengguna?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#f6c23e',
      confirmButtonText: 'Ya, Edit',
      cancelButtonText: "Tidak",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace(url);
      }
    //   else {
    //     Swal.fire({
    //         title: "Batal",
    //         text: "Edit berita dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

$('.user-admin').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
            title: "Gagal",
            text: "Tidak dapat blokir pengguna dengan level admin",
            icon: "error",
            timer: 2000,
            showConfirmButton: true

    })
});

</script>
