
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
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title; ?></h6>

            <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right" data-toggle="modal"
                data-target="#modalTambahPengumuman">
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
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Terbit</th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach ($record as $row){
                            $tgl_posting = tgl_indo($row['tgl_posting']);
                            if ($row['aktif'] == 'Y'){
                                $terbit = "<a class='tidak-terbit-data' title='Terbit' href='".base_url(). "administrator/terbit_pengumuman/$row[id_pengumuman]/$row[aktif]'><i class='fas fa-thumbs-up fa-xs'
                                style='color: #1cc88a'></i></a>&nbsp;";
                            }else{
                                $terbit = "<a class='terbit-data' title='Tidak Terbit' href='" .base_url(). "administrator/terbit_pengumuman/$row[id_pengumuman]/$row[aktif]'><i class='fas fa-thumbs-down fa-xs'
                                style='color: #e74a3b'></i></a>&nbsp;";
                            }
                        echo "
                            <tr>
                                <td class='text-center'>$no</td>
                                <td>$row[judul]</td>
                                <td class='text-center'>$tgl_posting</td>
                                <td class='text-center'>$terbit</td>

                        <td>
                            <center>
                                <a class='edit-data' title='Ubah' href='".base_url()."administrator/edit_pengumuman/$row[id_pengumuman]'><i class='fas fa-edit fa-xs'
                                        style='color: #f6c23e'></i></a>&nbsp;
                                <a id='hapus-data' class='hapus-data' href='".base_url()."administrator/hapus_pengumuman/$row[id_pengumuman]' class='hapus-data' title='Hapus'><i
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
<!-- /.container-fluid -->


<div class="modal fade" id="modalTambahPengumuman"   role="dialog" aria-labelledby="modalTambahPengumuman"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-bullhorn fa-sm fa-fw mr-2 text-gray-400">
                </i> Tambah
                    <?= $title ?></h5>
                    <?php $this->session->disabled ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
              echo form_open_multipart('administrator/tambah_pengumuman'); ?>
            <div class="modal-body mx-4 mt-4">
                    <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-2 mt-2">Judul</label>
                        <div class="col-12 col-lg-10">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-2 mt-2">Gambar</label><br>
                        <div class="col-12 col-lg-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="gambar">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <!-- <small id="" name="gambar-berita" class="form-text text-muted"><i class="fas fa-info fa-xs"></i> gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan-gambar" class="col-12 col-lg-2 mt-2">Ket. Gambar</label>
                        <div class="col-12 col-lg-10">
                        <input type="text"  class="form-control" id="" name="keterangan-gambar" placeholder="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-2 mt-2">Isi Pengumuman</label>
                        <div class="col-12 col-lg-10">
                        <textarea id="editor1" name="isi-pengumuman"></textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="file" class="col-12 col-lg-2 mt-2">File</label><br>
                        <div class="col-12 col-lg-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="file">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih file</label>
                                <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Masukkan data pada unduh</label>
  </div>
                            </div>
                        </div>
                    </div> -->
                    <hr>
                    <h6 style="margin-bottom:20px;">Tampilkan file dari data <strong><a href="<?= base_url(); ?>administrator/unduhan">unduhan</a></strong>.</h6>
                    <div class="form-group row">
                        <label for="file" class="col-12 col-lg-2 mt-2">Pilih</label>
                        <div class="col-12 col-lg-10">
                        <select name="file" class="form-control" id="file">
                        <option value='' selected>- Pilih File -</option>";
                            <?php
                                foreach($unduh as $row){
                                    echo "<option value='$row[file]'>$row[judul_unduh]</option>";
                                }
                            ?>
                        </select>
                        </div>
                    </div>
                    <hr>
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
<!-- End of Main Content -->

<script>
$('.hapus-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Hapus pengumuman",
      text: "Yakin ingin menghapus pengumuman?",
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
            text: "Pengumuman berhasil dihapus!",
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

$('.terbit-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Terbitkan",
      text: "Yakin ingin menerbitkan pengumuman?",
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
            text: "Pengumuman berhasil diterbitkan!", icon: "success",
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

$('.tidak-terbit-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Tidak terbit",
      text: "Yakin ingin tidak terbitkan pengumuman?",
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
            text: "Pengumuman tidak diterbitkan",
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
      title: "Edit pengumuman",
      text: "Yakin ingin edit pengumuman?",
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

</script>
