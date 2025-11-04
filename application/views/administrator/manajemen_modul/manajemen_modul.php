            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Manajemen Modul</h3>
                  <a href="#" class="btn btn-primary btn-icon-split btn-sm float-right" data-toggle="modal"
                data-target="#modalTambahManajemenModul">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Modul</span>
            </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Modul</th>
                        <th>Link</th>
                        <th>Publish</th>
                        <th>Aktif</th>
                        <th>Status</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                    $no = 1;
                    foreach ($record as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[nama_modul]</td>
                              <td><a href='".base_url()."administrator/$row[link]'>".base_url()."administrator/$row[link]</a></td>
                              <td>$row[publish]</td>
                              <td>$row[aktif]</td>
                              <td>$row[status]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_manajemenmodul/$row[id_modul]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Hapus Data' href='".base_url()."administrator/hapus_manajemenmodul/$row[id_modul]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>


              <div class="modal fade" id="modalTambahManajemenModul"   role="dialog" aria-labelledby="modalTambahManajemenModul"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="modalSayaLabel">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400">
                </i> Tambah Modul</h5>
                    <?php $this->session->disabled ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
              echo form_open_multipart('administrator/tambah_manajemenmodul'); ?>
            <div class="modal-body mx-4 mt-4">
                    <div class="form-group row">
                        <label for="username" class="col-12 col-lg-3 mt-2">Nama Modul</label>
                        <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="link" class="col-12 col-lg-3 mt-2">Link</label>
                        <div class="col-12 col-lg-9">
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
          <div class="input-group-text"><?php echo base_url(); ?>administrator/</div>
        </div>
                        <input autocomplete="off" type="text" class="form-control" id="link" name="link">
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="level" class="col-12 col-lg-3  mt-2">Terbitkan</label>
                        <div class="col-12 col-lg-9">
                        <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="level" value="kontributor" id="level" class="custom-control-input" checked>
                                <label class="custom-control-label" for="level">Kontributor</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="level" value="user" id="level2" class="custom-control-input">
                                <label class="custom-control-label" for="level2">User Biasa</label>
                            </div>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="level" class="col-12 col-lg-3  mt-2">Aktifkan</label>
                        <div class="col-12 col-lg-9">
                        <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="level" value="kontributor" id="level" class="custom-control-input" checked>
                                <label class="custom-control-label" for="level">Kontributor</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="level" value="user" id="level2" class="custom-control-input">
                                <label class="custom-control-label" for="level2">User Biasa</label>
                            </div>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="level" class="col-12 col-lg-3  mt-2">Status</label>
                        <div class="col-12 col-lg-9">
                        <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="level" value="kontributor" id="level" class="custom-control-input" checked>
                                <label class="custom-control-label" for="level">Kontributor</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="level" value="user" id="level2" class="custom-control-input">
                                <label class="custom-control-label" for="level2">User Biasa</label>
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
