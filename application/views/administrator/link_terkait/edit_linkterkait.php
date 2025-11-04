<div class="container-fluid" id="edit-linkterkait">
<div class="row">
        <!-- Earnings (Monthly) Card Example -->

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/link_terkait" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_linkterkait');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id_link" value="<?= $rows['id_link'] ?>">
        <div class="form-group row">
                        <label for="nama-link" class="col-12 col-lg-3 mt-2">Nama Link</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="nama-link" name="nama-link" value="<?= $rows['nama_menu'] ?>">
                        </div>
                    </div>
        <div class="form-group row">
                        <label for="link" class="col-12 col-lg-3 mt-2">Link</label>
                        <div class="col-12 col-lg-9">
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
          <div class="input-group-text">http://</div>
        </div>
                        <input autocomplete="off" type="text" class="form-control" id="link" name="link" value="<?= $rows['link'] ?>">
                            </div>
                        </div>
                    </div>


                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3  mt-2">Gambar</label><br>
                        <div class="col-12 col-lg-9">
                        <img class="mb-4" src="<?= base_url() .'upload/img_link/'.$rows['gambar'] ?>" style="border-radius:2px;">

                            <div class="custom-file col-sm-12">
                                <input type="file" class="custom-file-input" id="customFile" name="gambar" accept="image/*">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <!-- <small id="gambar-berita" name="gambar-berita" class="form-text text-muted"><i class="fas fa-info fa-xs"></i> gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small> -->
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-12 col-lg-3 mt-2">Deskripsi</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='deskripsi' style='height:100px'><?= $rows['deskripsi'] ?></textarea></div>
                    </div>
                    <div class="form-group row">
                        <label for="urutan" class="col-12 col-lg-3 mt-2">Urutan</label>
                        <div class="col-12 col-lg-9">
                        <input type="number" class="form-control" id="urutan" name="urutan" value="<?= $rows['urutan'] ?>">
                        </div>
                    </div>

                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="mt-3">

                    <button type="submit" name="submit" class="float-right btn btn-primary btn-icon-split btn-sm ml-2">
            <span class="icon text-white-50">
                <i class="fa fa-check"></i>
            </span>
            <span class="text">Simpan</span>
        </button>
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/link_terkait">
                    <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Batal</span>
                    </a>
        <?= form_close(); ?>
        </div>
        </div>
        </div>

</div></div>
