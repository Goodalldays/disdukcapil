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

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Foto</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_berita ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Foto Terbit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $berita_terbit ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Tidak Terbit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tidak_terbit ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Album Foto</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_album_foto ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title; ?></h6>
            <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right" data-toggle="modal"
                data-target="#modalTambahFoto">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah <?= $title ?></span>
            </a>
        </div>
        <div class="card-body" id="tableCustom">
            <div class="table-responsive">
                <table class="table table-bordered view-table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Foto</th>
                            <th>Tanggal</th>
                            <th>Album</th>
                            <th>Terbit</th>
                            <th>
                                <center>Aksi</center>
                            </th>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach ($foto as $row){
                            $tanggal = tgl_indo($row['tanggal']);
                            if ($row['terbit']=='Y'){
                                $publish = "<a class='tidak-terbit-data' title='Terbit' href='".base_url(). "administrator/terbit_foto/$row[id_galeri]/$row[terbit]'><i class='fas fa-thumbs-up fa-xs'
                                style='color: #1cc88a'></i></a>&nbsp;";
                            }else{
                               $publish = "<a class='terbit-data' title='Tidak Terbit' href='" .base_url(). "administrator/terbit_foto/$row[id_galeri]/$row[terbit]'><i class='fas fa-thumbs-down fa-xs'
                                style='color: #e74a3b'></i></a>&nbsp;";
                            }
                        echo "
                            <tr>
                                <td class='text-center'>$no</td>
                                <td>$row[judul_galeri]</td>
                                <td class='text-center'>$tanggal</td>
                                <td class='text-center'>$row[jdl_album]</td>
                                <td class='text-center'>$publish</td>

                        <td>
                            <center>
                                <a class='edit-data' title='Ubah' href='".base_url()."administrator/edit_foto/$row[id_galeri]'><i class='fas fa-edit fa-xs'
                                        style='color: #f6c23e'></i></a>&nbsp;

                                <a id='hapus-data' class='hapus-data' href='".base_url()."administrator/hapus_foto/$row[id_galeri]' class='hapus-data' title='Hapus'><i
                                        class='fas fa-trash fa-xs' style='color: #e74a3b'></i></a>
                            </center>

                        </td>
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


<div class="modal fade" id="modalTambahFoto"   role="dialog" aria-labelledby="modalTambahFoto"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-image fa-sm fa-fw mr-2 text-gray-400">
                </i> Tambah
                    <?= $title ?></h5>
                    <?php $this->session->disabled ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
              echo form_open_multipart('administrator/tambah_foto'); ?>
            <div class="modal-body mx-4 mt-4">
                    <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-2 mt-2">Judul</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text" class="form-control" id="" name="judul" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sub-judul" class="col-12 col-lg-2 mt-2">Sub Judul</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text" class="form-control" id="sub-judul" name="sub-judul" placeholder=""></div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-2 mt-2">Gambar</label><br>
                        <div class="col-12 col-lg-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="userfile[]" multiple>
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <small id="text-gambar" name="gambar-berita" class="form-text text-muted">*dapat memilih beberapa gambar.</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan-gambar" class="col-12 col-lg-2 =mt-2">Ket. Gambar</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text"  class="form-control" id="keterangan-gambar" name="keterangan-gambar" placeholder="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="album" class="col-12 col-lg-2 mt-2">Album</label>
                        <div class="col-12 col-lg-10">
                        <select name="album" class="form-control" id="abum">
                            <?php
                                foreach($album as $row){
                                    echo "<option value='$row[id_album]'>$row[jdl_album]</option>";
                                }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-2 mt-2">Deskripsi</label>
                        <div class="col-12 col-lg-10">
                        <textarea id="editor1" name="deskripsi"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanda" class="col-12 col-lg-2 mt-2">Tandai Galeri</label>

                    <div class="col-12 col-lg-10 mt-2">
                    <?php
                    foreach ($tanda as $tag)
                    {
                        echo "<div class='form-check form-check-inline'>
  <input class='form-check-input' type='checkbox' id='inlineCheckbox1' value='$tag[tag_seo]' name='tag[]'>
  <label class='form-check-label' for='inlineCheckbox1'>$tag[nama_tag]</label>
</div>";
                    } ?>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-lg-2 col-form-label">Terbitkan</label><br>
                        <div class="col-12 col-lg-10 mt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="terbit" value="Y" id="terbit" class="custom-control-input" checked>
                                <label class="custom-control-label" for="terbit">Ya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="terbit" value="N" id="terbit2" class="custom-control-input">
                                <label class="custom-control-label" for="terbit2">Tidak</label>
                            </div>
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


<script>
$('.hapus-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Hapus foto",
      text: "Yakin ingin menghapus foto?",
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
            text: "Foto berhasil dihapus!",
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
    //         text: "Hapus foto dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

$('.terbit-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Terbitkan",
      text: "Yakin ingin menerbitkan foto?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#4e73df',
      confirmButtonText: 'Ya, Terbit',
      cancelButtonText: "Tidak",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
            title: "Terbit",
            text: "Foto berhasil diterbitkan!", icon: "success",
            timer: 2000,
            showConfirmButton: false
        }).then(function(){
            window.location.replace(url);
        })
      }
    //   else {
    //     Swal.fire({
    //         title: "Batal",
    //         text: "Terbit foto dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

$('.tidak-terbit-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Tidak terbit",
      text: "Yakin ingin tidak terbitkan foto?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#e74a3b',
      confirmButtonText: 'Ya, Tidak terbit',
      cancelButtonText: "Tidak",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
            title: "Tidak terbit",
            text: "Foto tidak diterbitkan",
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
    //         text: "Batal terbit foto dibatalkan!",
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
      title: "Edit foto",
      text: "Yakin ingin edit foto?",
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
    //         text: "Edit foto dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

</script>
