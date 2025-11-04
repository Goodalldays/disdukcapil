<div class="container-fluid" id="edit-berita">
<div class="row">

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/banner_home" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_bannerhome');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id-banner" value="<?= $proses['id_banner'] ?>">

               <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Judul</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="judul" name="judul" value="<?= $proses['judul'] ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3 mt-2">Gambar</label><br>
                        <div class="col-12 col-lg-9">
                        <img class="mb-4" src="<?= base_url() .'upload/img_bannerhome/'.$proses['gambar'] ?>" alt="<?= $proses['keterangan_gambar'] ?>"  width="100%" style="border-radius:8px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="gambar">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <!-- <small id="text-gambar" name="gambar-berita" class="form-text text-muted"><i class="fas fa-info fa-xs"></i> gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-12 col-lg-3 mt-2">Ket. Gambar</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text"  class="form-control" id="keterangan-gambar" name="keterangan-gambar" value="<?= $proses['keterangan_gambar'] ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-3 mt-2">Deskripsi</label>
                        <div class="col-12 col-lg-9">
                        <textarea  class='form-control' name="deskripsi" style="height: 120px;"><?= $proses['deskripsi']?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="link" class="col-12 col-lg-3 mt-2">Link</label>
                        <div class="col-12 col-lg-9">
                            <div class="input-group mb-2">
                            <div class="input-group-prepend">
          <div class="input-group-text">http://</div>
        </div>
                        <input autocomplete="off" type="text" class="form-control" id="link" name="link" value="<?= $proses['link'] ?>">
                            </div>
                        </div>
                    </div>

                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="my-3">

                    <button type="submit" name="submit" class="float-right btn btn-primary btn-icon-split btn-sm ml-2">
            <span class="icon text-white-50">
                <i class="fa fa-check"></i>
            </span>
            <span class="text">Simpan</span>
        </button>
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/banner_home">
                    <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Batal</span>
                    </a>
        <?= form_close(); ?>
        </div>
        </div>
        </div>
        </div>
        </div>
