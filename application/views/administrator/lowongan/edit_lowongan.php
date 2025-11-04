<div class="container-fluid" id="edit-lowongan">
<div class="row">
        <!-- Earnings (Monthly) Card Example -->

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/lowongan" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_lowongan');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id_lowongan" value="<?= $rows['id_lowongan'] ?>">
        <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Judul</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="judul" name="judul" value="<?= $rows['jdl_lowongan'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="subjudul" class="col-12 col-lg-3 mt-2">Sub Judul</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="subjudul" name="subjudul" value="<?= $rows['subjudul'] ?>">
                        </div>
                    </div>


                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3  mt-2">Gambar</label><br>

                        <div class="col-12 col-lg-9">
                            <?php
                        if($rows['gambar'] != ''){
                        ?>
                        <img class="mb-4" src="<?= base_url() .'upload/img_lowongan/'.$rows['gambar'] ?>"  width="50%" style="border-radius:2px;">
<?php } ?>
                            <div class="custom-file col-sm-12">
                                <input type="file" class="custom-file-input" id="customFile" name="gambar" accept="image/*">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <!-- <small id="gambar-berita" name="gambar-berita" class="form-text text-muted"><i class="fas fa-info fa-xs"></i> gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan-gambar" class="col-12 col-lg-3 mt-2">Ket. Gambar</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="keterangan-gambar" name="keterangan-gambar" value="<?= $rows['keterangan_gambar'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="tanggal" class="col-12 col-lg-3 mt-2">Tanggal</label>
                      <div class="col-12 col-lg-9">

                      <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
  </div>
  <input type="text" class="form-control" aria-label="" name="tanggal" id="tanggal" autocomplete="off" value="<?= $rows['tanggal'] ?>">
</div>

                      </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label for="oleh" class="col-12 col-lg-3 mt-2">Oleh</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="oleh" name="oleh" value="<?= $rows['oleh'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-3 mt-2">Isi Lowongan</label>
                        <div class="col-12 col-lg-9">
                        <textarea id="editor1" name="isi-lowongan"><?= $rows['isi_lowongan'] ?></textarea></textarea>
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
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/lowongan">
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
