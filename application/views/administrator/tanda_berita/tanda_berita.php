
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
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title ?></h6>
            </a>
            <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right" data-toggle="modal"
                data-target="#modalTambahTanda">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah <?= $title ?></span>
            </a>
        </div>
        <div class="card-body" id="tableCustom">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Tanda</th>
                            <th>Link</th>
                            <th>Aktif</th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($tanda_berita as $row){
                        if ($row['terbit']=='Y'){
                            $publish = "<a class='tidak-aktif-data' title='Aktif' href='".base_url(). "administrator/aktif_tandaberita/$row[id_tag]/$row[terbit]'><i class='fas fa-thumbs-up fa-xs'
                            style='color: #1cc88a'></i></a>&nbsp;";
                        }else{
                            $publish = "<a class='aktif-data' title='Tidak Aktif' href='" .base_url(). "administrator/aktif_tandaberita/$row[id_tag]/$row[terbit]'><i class='fas fa-thumbs-down fa-xs'
                            style='color: #e74a3b'></i></a>&nbsp;";
                        }
                    echo "<tr>
                              <td>$no</td>
                              <td>$row[nama_tag]</td>
                              <td><a target='_BLANK' href='".base_url()."tag/$row[tag_seo]'>".base_url()."tag/$row[tag_seo]</a></td></td>
                              <td>$publish</td>
                              <td>
                                <a class='edit-data' title='Ubah' href='".base_url()."administrator/edit_tandaberita/$row[id_tag]'><i class='fas fa-edit fa-xs'
                                        style='color: #f6c23e'></i></a>&nbsp;
                                <a id='hapus-data' class='hapus-data' href='".base_url()."administrator/hapus_tandaberita/$row[id_tag]' class='hapus-data' title='Hapus'><i
                                        class='fas fa-trash fa-xs' style='color: #e74a3b'></i></a>

                        </td>
                              </td>
                          </tr>";
                      $no++;
                    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="modalTambahTanda" tabindex="-1" role="dialog" aria-labelledby="modalTambahTanda"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-tags alt fa-sm fa-fw mr-2 text-gray-400">
                </i> Tambah
                <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
              echo form_open_multipart('administrator/tambah_tandaberita'); ?>
            <div class="modal-body mx-4 mt-4">
                    <div class="form-group row">
                        <label for="kata-jelek" class="col-sm-3 col-form-label">Tanda</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama-tag" name="nama-tag" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-lg-3 col-form-label">Aktifkan</label><br>
                        <div class="col-12 col-lg-9 mt-2">
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
            <div   div class="modal-footer">
            <div class="mt-3">

                    <button type="submit" name="submit" class="float-right btn btn-primary btn-icon-split btn-sm ml-2">
            <span class="icon text-white-50">
                <i class="fa fa-check"></i>
            </span>
            <span class="text">Simpan</span>
        </button>
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/tanda_berita ">
                    <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Batal</span>
                    </a>
        <!-- <?= form_close(); ?> -->
        </div>
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
      title: "Hapus tanda",
      text: "Yakin ingin menghapus tanda?",
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
            text: "Tanda berhasil dihapus!",
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
    //         text: "Hapus tanda dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

$('.aktif-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Aktifkan",
      text: "Yakin ingin mengaktifkan tanda?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#4e73df',
      confirmButtonText: 'Ya, Aktif',
      cancelButtonText: "Tidak",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
            title: "Terbit",
            text: "Tanda berhasil diaktifkan!", icon: "success",
            timer: 2000,
            showConfirmButton: false
        }).then(function(){
            window.location.replace(url);
        })
      }
    //   else {
    //     Swal.fire({
    //         title: "Batal",
    //         text: "Terbit tanda dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

$('.tidak-aktif-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Tidak aktif",
      text: "Yakin ingin tidak aktifkan tanda?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#e74a3b',
      confirmButtonText: 'Ya, Tidak aktif',
      cancelButtonText: "Tidak",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
            title: "Tidak aktif",
            text: "Tanda tidak diaktifkan",
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
    //         text: "Terbit tanda dibatalkan!",
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
      title: "Edit tanda",
      text: "Yakin ingin edit tanda?",
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
    //         text: "Edit data dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

</script>
