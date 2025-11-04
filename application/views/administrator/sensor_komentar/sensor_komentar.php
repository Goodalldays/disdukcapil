<?php /*
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
    </div>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a  >.</p> -->

    <!-- DataTales Example -->
    <!-- <a href="/" class="logo"></a> -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title; ?></h6>
            <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right" data-toggle="modal"
                data-target="#modalTambahSensorKomentar">
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
                            <th>Kata Jelek</th>
                            <th>Ganti Menjadi</th>
                            <th>
                                <center>Action</center>
                            </th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($record as $row){
                        echo "
                            <tr>
                                <td class='text-center'>$no</td>
                                <td>$row[kata]</td>
                                <td class='text-center'>$row[ganti]</td>

                        <td>
                            <center>
                                <a class='' title='Ubah' href='".base_url()."administrator/edit_sensorkomentar/$row[id_jelek]' id='ubahSensor'><i class='fas fa-edit fa-xs'
                                        style='color: #f6c23e'></i></a>&nbsp;
                                <a id='hapus-data' href='".base_url()."administrator/hapus_sensorkomentar/$row[id_jelek]' class='hapus-data' title='Hapus'><i
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


<div class="modal fade" id="modalTambahSensorKomentar" tabindex="-1" role="dialog" aria-labelledby="modalTambahVideo"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-ban alt fa-sm fa-fw mr-2 text-gray-400">
                </i> Tambah
                <?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('administrator/tambah_sensorkomentar')?>" method="post" enctype="multipart/form-data" role="form">
            <div class="modal-body mx-4 mt-4">
                    <div class="form-group row">
                        <label for="kata-jelek" class="col-sm-3 col-form-label">Kata Jelek</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kata-jelek" name="kata-jelek" placeholder="Kata Jelek">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ganti-menjadi" class="col-sm-3 col-form-label">Ganti</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ganti-menjadi" name="ganti-menjadi" placeholder="Ganti Menjadi">
                        </div>
                    </div>
                </div>
            <div   div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-check" style="font-size: 14px; text-align: center;"></i> Simpan</button>
      </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="modalEditSensorKomentar" tabindex="-1" role="dialog" aria-labelledby="modalTambahVideo"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="modalSayaLabel">
                    <i class="fas fa-ban alt fa-sm fa-fw mr-2 text-gray-400">
                    </i> Edit <?= $title; ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-4 mt-4">
                <form action="">
                    <div class="form-group row">
                        <label for="kata-jelek" class="col-sm-3 col-form-label">Kata Jelek</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kata-jelek" placeholder="Kata Jelek">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ganti-menjadi" class="col-sm-3 col-form-label">Ganti</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="ganti-menjadi" placeholder="Ganti Menjadi">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="button" class="btn btn-primary"><i class="fa fa-check" style="font-size: 14px; text-align: center;"></i> Simpan</button>
      </div>
        </div>
    </div>
</div>




</div>

*/ ?>


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title ?></h6>
        </div>
        <div class="card-body" id="tableCustom">
        <div class="text-center" style="margin: 80px 0;">
            <h6><strong>SEDANG DALAM TAHAP PENGEMBANGAN</strong></h6>
            </div>
        </div>
    </div>
</div>

</div>

