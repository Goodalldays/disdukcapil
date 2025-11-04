<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
</div>

<div class="card shadow mb-4" id="data-identitas-website">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Data <?= $title ?></h6>
        </div>
        <div class="card-body">
        <?= form_open_multipart('administrator/sambutan');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id-sambutan" value="<?= $record['id_sambutan'] ?>">
                    <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Oleh</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" name="oleh" value="<?= $record['oleh'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="oleh" class="col-12 col-lg-3 mt-2">Isi Sambutan</label>
                        <div class="col-12 col-lg-9">
                        <textarea id="editor1" name='sambutan'><?= $record['isi_sambutan'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3 mt-2 ">Foto</label><br>
                        <div class="col-12 col-lg-9">
                        <div class="mt-2">Foto saat ini:</div>
                                <div><img style='width:200px; border-radius:2px; margin-bottom:16px;' src='<?= base_url() ?>upload/img_sambutan/<?= $record['gambar']?>'></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="" accept="image/*" name="gambar">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih Foto</label>
                              </div>
                        </div>
                    </div>
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