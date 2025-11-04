
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
            <h6 class="mt-1 font-weight-bold text-primary float-left">Data <?= $title; ?></h6>

            <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right" data-toggle="modal"
                data-target="#modalTambahJejakPendapat">
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
                            <th>Pertanyaan</th>
                            <th>Pilihan</th>
                            <th>Status</th>
                            <th><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                            foreach ($record as $row){
                                $tanggal = tgl_indo($row['tanggal']);
                            if ($row['aktif'] == 'Ya'){
                                $terbit = "<a class='tidak-aktif-data' title='Aktif' href='".base_url(). "administrator/aktif_jejakpendapat/$row[id_pendapat]/$row[aktif]'><i class='fas fa-thumbs-up fa-xs'
                                style='color: #1cc88a'></i></a>&nbsp;";
                            }else{
                                $terbit = "<a class='aktif-data' title='Tidak Aktif' href='" .base_url(). "administrator/aktif_jejakpendapat/$row[id_pendapat]/$row[aktif]'><i class='fas fa-thumbs-down fa-xs'
                                style='color: #e74a3b'></i></a>&nbsp;";
                            }
                        echo "
                            <tr>
                                <td>$no</td>
                                <td>$row[pertanyaan]</td>
                                <td class='text-center'></td>
                                <td class='text-center'>$terbit</td>

                        <td>
                            <center>
                                <a class='edit-data' title='Ubah' href='".base_url()."administrator/edit_jejakpendapat/$row[id_pendapat]'><i class='fas fa-edit fa-xs'
                                        style='color: #f6c23e'></i></a>&nbsp;
                                <a id='hapus-data' class='hapus-data' href='".base_url()."administrator/hapus_jejakpendapat/$row[id_pendapat]' class='hapus-data' title='Hapus'><i
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

<!-- Contoh Modal -->
<div class="modal fade" id="modalTambahJejakPendapat" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-poll fa-sm fa-fw mr-2 text-gray-400">
                </i> Tambah
                    Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3 mt-2 mb-3">
                <form action="">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Judul :</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Sub Judul :</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Gambar Berita :</label><br>
                        <input type="file" name="file" />
                        <small id="gambarHelp" class="form-text text-muted">Gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Keterangan Gambar :</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Kategori :</label>
                        <select class="form-control" id="exampleFormControlSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Isi Berita :</label>
                        <textarea id="editor" name=""></textarea>
                        <textarea class="ckeditor" name="editor"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tandai Berita :</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter email">
                    </div>


                    <button type="button" class="btn btn-primary ">Simpan</button>
                    <button type="button" class="btn btn-danger " data-dismiss="modal">Keluar</button>

                </form>
            </div>
        </div>
    </div>
</div>



</div>
<!-- End of Main Content -->
