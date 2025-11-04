<!-- Begin Page Content -->
<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">

</div>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title ?></h6>

            <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right" data-toggle="modal"
                data-target="#modalTambahLowongan">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah <?= $title ?></span>
            </a>
        </div>
        <div class="card-body" id="tableCustom">

        <div class="col-sm-4">

                        </div>

            <div class="table-responsive table-conf">
                <table class="table table-bordered view-table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Lowongan</th>
                            <th>Oleh</th>
                            <th>Tanggal</th>
                            <th>Terbit</th>
                            <th>Aksi</th>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($lowongan as $row){
                            $tanggal = tgl_indo($row['tanggal']);
                            if ($row['terbit'] == 'Y'){
                                $terbit = "<a class='tidak-terbit-data' title='Terbit' href='".base_url(). "administrator/terbit_lowongan/$row[id_lowongan]/$row[terbit]'><i class='fas fa-thumbs-up fa-xs'
                                style='color: #1cc88a'></i></a>&nbsp;";
                            }else{
                                $terbit = "<a class='terbit-data' title='Tidak Terbit' href='" .base_url(). "administrator/terbit_lowongan/$row[id_lowongan]/$row[terbit]'><i class=' fas fa-thumbs-down fa-xs'
                                style='color: #e74a3b'></i></a>&nbsp;";
                            }
                        echo "
                            <tr>
                                <td>$no</td>
                                <td>$row[jdl_lowongan]</td>
                                <td>$row[oleh]</td>
                                <td>$tanggal</td>
                                <td>$terbit</a>
                            </td>
                            <td>
                                <a class='edit-data' href='".base_url()."administrator/edit_lowongan/$row[id_lowongan]' title='Ubah' id='ubah'
                ><i class='fas fa-edit fa-xs'
                                        style='color: #f6c23e'></i></a>&nbsp;
                                ".
                                // <a class='danger' title='Tampilkan' href='' data-toggle='modal'
                                //     data-target='#modalTampilBerita'><i class='fas fa-eye fa-xs'
                                //         style='color: #5a5c69'></i></a>&nbsp;

                                "

                                <a id='deleteData' href='".base_url()."administrator/hapus_lowongan/$row[id_lowongan]' class='hapus-data' title='Hapus'><i
                                        class='fas fa-trash fa-xs' style='color: #e74a3b'></i></a>

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

<div class="modal fade" id="modalTambahLowongan"   role="dialog" aria-labelledby="modalTambahLowongan"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-newspaper fa-sm fa-fw mr-2 text-gray-400">
                </i> Tambah
                    <?= $title ?></h5>
                    <?php $this->session->disabled ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
              echo form_open_multipart('administrator/tambah_lowongan'); ?>
            <div class="modal-body mx-4 mt-4">
                    <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-2 mt-2">Judul</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text" class="form-control" id="judul" name="judul" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subjudul" class="col-12 col-lg-2 mt-2">Sub Judul</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text" class="form-control" id="subjudul" name="subjudul" placeholder=""></div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-2 mt-2">Gambar</label><br>
                        <div class="col-12 col-lg-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="gambar">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <!-- <small id="text-gambar" name="gambar-berita" class="form-text text-muted"><i class="fas fa-info fa-xs"></i> gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan-gambar" class="col-12 col-lg-2 mt-2">Ket. Gambar</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text"  class="form-control" id="keterangan-gambar" name="keterangan-gambar" placeholder="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="oleh" class="col-12 col-lg-2 mt-2">Oleh</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text"  class="form-control" id="oleh" name="oleh" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-2 mt-2">Isi Lowongan</label>
                        <div class="col-12 col-lg-10">
                        <textarea id="editor1" name="isi-lowongan"></textarea>
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
      title: "Hapus berita",
      text: "Yakin ingin menghapus lowongan?",
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
            text: "Lowongan berhasil dihapus!",
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
      text: "Yakin ingin menerbitkan lowongan?",
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
            text: "Lowongan berhasil diterbitkan!", icon: "success",
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
      text: "Yakin ingin tidak terbitkan lowongan?",
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
            text: "Lowongan tidak diterbitkan",
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
      title: "Edit lowongan",
      text: "Yakin ingin edit lowongan?",
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
