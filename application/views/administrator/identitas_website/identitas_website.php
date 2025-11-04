<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
</div>

<div class="card shadow mb-4" id="data-identitas-website">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title ?></h6>
        </div>
        <div class="card-body">
        <?= form_open_multipart('administrator/identitas_website');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id_identitas" value="<?= $record['id_identitas'] ?>">
        <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Nama Website (short)</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="nama-website" name="nama-website" value="<?= $record['nama_website'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Nama Website</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="long-website" name="long-website" value="<?= $record['long_website'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-12 col-lg-3  mt-2">Email</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="email" class="form-control" id="email" name="email" value="<?= $record['email'] ?>"></div>
                    </div>
                    <div class="form-group row">
                        <label for="domain" class="col-12 col-lg-3  mt-2">Domain</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="domain" name="domain" value="<?= $record['url'] ?>"></div>
                    </div>
                    <div class="form-group row">
                        <label for="rekening" class="col-12 col-lg-3 mt-2">No. Rekening</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="rekening" name="rekening" value="<?= $record['rekening'] ?>"></div>
                    </div>
                    <div class="form-group row">
                        <label for="no-telp" class="col-12 col-lg-3 mt-2">No. Telepon</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="no-telp" name="no-telp" value="<?= $record['no_telp'] ?>"></div>
                    </div>
                    <div class="form-group row">
                        <label for="tagline" class="col-12 col-lg-3 mt-2">Tagline</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='tagline' style='height:100px'><?= $record['tagline']?></textarea></div>
                    </div>
                    <div class="form-group row">
                        <label for="meta-deskripsi" class="col-12 col-lg-3 mt-2">Meta Deskripsi</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='meta-deskripsi' style='height:100px'><?= $record['meta_deskripsi']?></textarea></div>
                    </div>
                    <div class="form-group row">
                        <label for="meta-keyword" class="col-12 col-lg-3 mt-2">Meta Keyword</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='meta-keyword' style='height:100px'><?= $record['meta_keyword']?></textarea></div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-12 col-lg-3 mt-2">Alamat</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='alamat' style='height:100px'><?= $record['alamat']?></textarea></div>
                    </div>
                    <div class="form-group row">
                        <label for="google-maps" class="col-12 col-lg-3 mt-2">Google Maps</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='google-maps' style='height:200px'><?= $record['maps']?></textarea></div>
                    </div>

                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3 mt-2 ">Favicon</label><br>
                        <div class="col-12 col-lg-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="gambar">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih Favicon</label>
                                <div class="mt-2">Favicon saat ini : <img style='width:32px; height:32px' src='<?= base_url() ?>upload/favicon/<?= $record['favicon']?>'></div>
                              </div>
                        </div>
                    </div>
                    <hr>
                    <h6 style="margin-bottom:20px;">Masukkan link akun <strong>Sosial Media</strong>.</h6>
                    <div class="form-group row">
                        <label for="facebook" class="col-12 col-lg-3  mt-2">Facebook</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="facebook" name="facebook" value="<?= $record['facebook'] ?>"></div>
                    </div>
                    <div class="form-group row">
                        <label for="instagram" class="col-12 col-lg-3 mt-2">Instagram</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="instagram" name="instagram" value="<?= $record['instagram'] ?>"></div>
                    </div>
                    <div class="form-group row">
                        <label for="youtube" class="col-12 col-lg-3 mt-2">Youtube</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="youtube" name="youtube" value="<?= $record['youtube'] ?>"></div>
                    </div>
                    <div class="form-group row">
                        <label for="twitter" class="col-12 col-lg-3 mt-2">Twitter</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="twitter" name="twitter" value="<?= $record['twitter'] ?>"></div>
                    </div>
              </div>
            </div>
            <div class="card-footer">
                    <div class="m-3">
                    <button type="submit" name="submit" class="mb-3 float-right btn btn-primary btn-icon-split btn-sm ml-2">
            <span class="icon text-white-50">
                <i class="fa fa-check"></i>
            </span>
            <span class="text">Simpan</span>
        </button>
                    </div>
        <?= form_close(); ?>
        </div>
        </div>
</div>

