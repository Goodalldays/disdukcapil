<!-- Begin Page Content -->
<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <!-- <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4> -->
</div>


    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->

    <!-- Content Row -->

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">

                <div class="card-body">

                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Berita</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_berita ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
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
                                Berita Terbit</div>
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
                                Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_kategori ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <?php $this->session->flashdata('pesan'); ?> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title ?></h6>

            <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right" data-toggle="modal"
                data-target="#modalTambahBerita">
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
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($berita as $row){
                            $tanggal = tgl_indo($row['tanggal']);
                            if ($row['terbit'] == 'Y'){
                                $terbit = "<a class='' title='Terbit' href='".base_url(). "administrator/terbit_berita/$row[id_berita]/$row[terbit]'><i class='fas fa-thumbs-up fa-xs'
                                style='color: #1cc88a'></i></a>&nbsp;";
                            }else{
                                $terbit = "<a class='' title='Tidak Terbit' href='" .base_url(). "administrator/terbit_berita/$row[id_berita]/$row[terbit]'><i class='fas fa-thumbs-down fa-xs'
                                style='color: #e74a3b'></i></a>&nbsp;";
                            }
                        echo "
                            <tr>
                                <td>$no</td>
                                <td>$row[judul]</td>
                                <td>$row[nama_kategori]</td>
                                <td>$tanggal</td>
                                <td>$terbit</a>
                            </td>
                            <td>
                                <a class='' href='".base_url()."administrator/edit_berita/$row[id_berita]' title='Ubah' id='ubah'
                ><i class='fas fa-edit fa-xs'
                                        style='color: #f6c23e'></i></a>&nbsp;
                                ".
                                // <a class='danger' title='Tampilkan' href='' data-toggle='modal'
                                //     data-target='#modalTampilBerita'><i class='fas fa-eye fa-xs'
                                //         style='color: #5a5c69'></i></a>&nbsp;

                                "

                                <a id='hapus-data' href='".base_url()."administrator/hapus_berita/$row[id_berita]' class='hapus-data' title='Hapus'><i
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

<div class="modal fade" id="modalTambahBerita"   role="dialog" aria-labelledby="modalTambahBerita"
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
              echo form_open_multipart('administrator/tambah_berita'); ?>
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
                        <input autocomplete="off" type="text" class="form-control" id="sub-judul" name="sub-judul" placeholder=""></div>
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
                        <label for="keterangan" class="col-12 col-lg-2 mt-2">Ket. Gambar</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text"  class="form-control" id="keterangan-gambar" name="keterangan-gambar" placeholder="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="ketegori" class="col-12 col-lg-2 mt-2">Kategori</label>
                        <div class="col-12 col-lg-10">
                        <select name="kategori" class="form-control" id="kategori">
                            <?php
                                foreach($kategori as $row){
                                    echo "<option value='$row[id_kategori]'>$row[nama_kategori]</option>";
                                }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-2 mt-2">Isi Berita</label>
                        <div class="col-12 col-lg-10">
                        <textarea id="editor1" name="isi-berita"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanda" class="col-12 col-lg-2 mt-2">Tandai Berita</label>

                    <div class="col-12 col-lg-10 mt-2">
                    <?php
                    foreach ($tanda as $tag)
                    {
                        echo "<div class='form-check form-check-inline'>
  <input class='form-check-input' type='checkbox' id='tag' value='$tag[tag_seo]' name='tag[]'>
  <label class='form-check-label' for=''>$tag[nama_tag]</label>
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
