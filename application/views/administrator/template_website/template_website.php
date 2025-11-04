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
                data-target="#modalTambahBerita">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah <?= $title ?></span>
            </a>
        </div>
        <div class="card-body" id="tableCustom">
            <div class="table-responsive">
                <table class="table table-bordered view-table" id="tabelTemplate" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Foro</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>
                                <center>Action</center>
                            </th>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($template_website as $row){
                    if ($row['aktif']=='Y'){ $icon = 'star'; $color = 'orange'; }else{ $icon = 'star-empty'; $color = '#8a8a8a'; }
                    echo "<tr><td>$no</td>
                              <td>$row[judul]</td>
                              <td>$row[pembuat]</td>
                              <td>$row[folder]</td>
                              <td>$row[aktif]</td>
                    <td><center>
                                <a class='btn btn-default btn-xs' title='Aktifkan' href='".base_url()."administrator/aktif_templatewebsite/$row[id_templates]/$row[aktif]'><span style='color:$color' class='glyphicon glyphicon-$icon'></span></a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_templatewebsite/$row[id_templates]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_templatewebsite/$row[id_templates]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
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


<div class="modal fade" id="modalTambahFoto" tabindex="-1" role="dialog" aria-labelledby="modalTambahFoto"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-images fa-sm fa-fw mr-2 text-gray-400">
                </i> Tambah <?= $title; ?></h5>
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

<div class="modal fade" id="modalTampilVideo" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title mx-4" id="modalSayaLabel"> <i class="fas fa-newspaper fa-lg mt-3"></i> Tampil
                    Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>




</div>
