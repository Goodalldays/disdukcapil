
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
</div>

<!-- <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Unduhan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $jumlah_unduhan ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Unduhan Terbit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $unduhan_terbit ?>
                            </div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $tidak_terbit ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Hits</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $total_hits ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title; ?></h6>
                        <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right" data-toggle="modal"
                data-target="#modalTambahUnduhan">
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
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Hits</th>
                            <th>Terbit</th>
                            <th>
                                <center>Aksi</center>
                            </th>
                    </thead>
                    <?php
                        $no = 1;
                        foreach ($unduhan as $row){
                            $tanggal = tgl_indo($row['tanggal']);
                            if ($row['terbit'] == 'Y'){
                                $terbit = "<a class='tidak-terbit-data' title='Terbit' href='".base_url(). "administrator/terbit_unduhan/$row[id_unduh]/$row[terbit]'><i class='fas fa-thumbs-up fa-xs'
                                style='color: #1cc88a'></i></a>&nbsp;";
                            }else{
                                $terbit = "<a class='terbit-data' title='Tidak Terbit' href='" .base_url(). "administrator/terbit_unduhan/$row[id_unduh]/$row[terbit]'><i class='fas fa-thumbs-down fa-xs'
                                style='color: #e74a3b'></i></a>&nbsp;";
                            }
                        echo "
                            <tr>
                                <td>$no</td>
                                <td>$row[judul_unduh]</td>
                                <td class='text-center'>$tanggal</td>
                                <td>$row[hits]</td>
                                <td>$terbit</a>
                            </td>
                            <td>
                                <a class='edit-data' href='".base_url()."administrator/edit_unduhan/$row[id_unduh]' title='Ubah' id='ubah'
                ><i class='fas fa-edit fa-xs'
                                        style='color: #f6c23e'></i></a>&nbsp;
                                ".
                                // <a class='danger' title='Tampilkan' href='' data-toggle='modal'
                                //     data-target='#modalTampilBerita'><i class='fas fa-eye fa-xs'
                                //         style='color: #5a5c69'></i></a>&nbsp;

                                "

                                <a id='hapus-data' class='hapus-data' href='".base_url()."administrator/hapus_unduhan/$row[id_unduh]' class='hapus-data' title='Hapus'><i
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


</div>
<!-- End of Main Content -->

<!-- <script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#tabelUnduhan').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= base_url(); ?>administrator/list_unduhan",
            "type": "POST"
        },

        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });
});


$('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,
    });


function add_person() {
    save_method = 'add';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();
    $('#modalUnduhan').modal('show');
    $('.modal-title').empty().append('<i class="fas fa-bullhorn fa-sm fa-fw mr-2 text-gray-400"></i> Tambah <?= $title; ?>');
    $('#photo-preview').hide();
    $('#label-photo').text('Upload Photo');
}

function edit_unduhan(id)
{
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
        url : "<?php echo site_url('administrator/edit_unduhan')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_unduh"]').val(data.id_unduh);
            $('[name="judul_unduh"]').val(data.judul_unduh);
            $('[name="terbit"]').val(data.terbit);
            $('##modalUnduhan').modal('show');
            $('.modal-title').text('Edit Person');

            // $('#photo-preview').show();

            // if(data.photo)
            // {
            //     $('#label-photo').text('Change Photo'); // label photo upload
            //     $('#photo-preview div').html('<img src="'+base_url+'upload/'+data.photo+'" class="img-responsive">'); // show photo
            //     $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo

            // }
            // else
            // {
            //     $('#label-photo').text('Upload Photo'); // label photo upload
            //     $('#photo-preview div').text('(No photo)');
            // }

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table() {
    table.ajax.reload(null,false);
}

function save(){
    $('#btnSimpan').text('Menyimpan....');
    $('#btnSimpan').attr('disabled',true);
    var url;
    if(save_method == 'add') {
        url = "<?= base_url() ?>administrator/tambah_unduhan";
    } else {
        url = "<?= base_url() ?>administrator/edit_unduhan')?>";
    }

    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        contentType: false,
        processData: false,
        success: function(data)
        {
            if(data.status)
            {
                $('#modalUnduhan').modal('hide');
                reload_table();
            }

            $('#btnSave').text('Simpan');
            $('#btnSave').attr('disabled',false);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('Simpan');
            $('#btnSave').attr('disabled',false);

        }
    });
}

// fungsi terbit
function terbit(id, terbit){
    Swal.fire({
        icon: 'question',
        title: 'Konfirmasi',
        text: "Anda ingin ubah status data?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: '<i class="fa fa-thumbs-up fa-xs"></i> Ubah',
        confirmButtonColor: '#4e73df',
        cancelButtonColor: '#e74a3b',
        cancelButtonText: 'Tidak',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url(); ?>administrator/terbit_unduhan/"+id+"/"+terbit,
                type: "POST",
                beforeSend :function () {
                    Swal.fire({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                },
                success:function(data){
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Status data berhasil diubah',
                        timer: 1500,
                        timerProgressBar: true,
                        showCancelButton: false,
                        showConfirmButton: false
                    }).then(
                        function () {},
                        function (dismiss) {
                            if (dismiss === 'timer') {}
                        }
                    )
                    reload_table();
                }
            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Batal!',
                text: 'Anda membatalkan perubahan status data',
                timer: 1500,
                timerProgressBar: true,
                showCancelButton: false,
                showConfirmButton: false
            }).then(
                function () {},
                function (dismiss) {
                if (dismiss === 'timer') {}
                }
            )
        }
    })
}

// fungsi hapus
function hapus_unduhan(id) {
    Swal.fire({
        icon: 'question',
        title: 'Konfirmasi',
        text: "Anda ingin menghapus data?",
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        confirmButtonColor: '#4e73df',
        cancelButtonColor: '#e74a3b',
        cancelButtonText: 'Tidak',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: "<?= base_url(); ?>administrator/hapus_unduhan/"+id,
                type: "POST",
                beforeSend :function () {
                    Swal.fire({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                },
                success:function(data){
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Data berhasil dihapus',
                        timer: 1500,
                        timerProgressBar: true,
                        showCancelButton: false,
                        showConfirmButton: false
                    }).then(
                        function () {},
                        function (dismiss) {
                            if (dismiss === 'timer') {}
                        }
                    )
                    reload_table();
                }
            })
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Batal!',
                text: 'Anda membatalkan penghapusan data',
                timer: 1500,
                timerProgressBar: true,
                showCancelButton: false,
                showConfirmButton: false
            }).then(
                function () {},
                function (dismiss) {
                if (dismiss === 'timer') {}
                }
            )
        }
    })
}
</script> -->

<div class="modal fade" id="modalTambahUnduhan" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400">
                </i> Tambah
                    <?= $title ?></h5>
                    <?php $this->session->disabled ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
              echo form_open_multipart('administrator/tambah_unduhan'); ?>
            <div class="modal-body mx-4 mt-4">

                    <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 col-form-label">Judul</label>
                        <div class="col-12 col-lg-9">
                            <input type="text" class="form-control" id="judul-unduh" name="judul-unduh" required oninvalid="this.setCustomValidity('Masukkan judul')"
    oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_file" class="col-12 col-lg-3 col-form-label">Unggah file</label>
                        <div class="col-12 col-lg-9">
                            <div class="custom-file col-sm-12">
                                <input type="file" class="custom-file-input" id="customFile" name="files" required oninvalid="this.setCustomValidity('Pilih file')"
    oninput="this.setCustomValidity('')">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-lg-3 col-form-label">Terbitkan</label><br>
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


<script>
$('.hapus-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Hapus unduhan",
      text: "Yakin ingin menghapus unduhan?",
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
            text: "Unduhan berhasil dihapus!",
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
    //         text: "Hapus unduhan dibatalkan!",
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
      text: "Yakin ingin menerbitkan unduhan?",
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
            text: "Unduhan berhasil diterbitkan!", icon: "success",
            timer: 2000,
            showConfirmButton: false
        }).then(function(){
            window.location.replace(url);
        })
      }
    //   else {
    //     Swal.fire({
    //         title: "Batal",
    //         text: "Terbit unduhan dibatalkan!",
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
      text: "Yakin ingin tidak terbitkan unduhan?",
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
            text: "Unduhan tidak diterbitkan",
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
    //         text: "Tidak terbit unduhan dibatalkan!",
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
      title: "Edit unduhan",
      text: "Yakin ingin melakukan edit unduhan?",
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
    //         text: "Edit unduhan dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

</script>
