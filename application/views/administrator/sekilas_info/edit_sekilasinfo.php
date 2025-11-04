<div class="container-fluid" id="edit-sekilasinfo">
<div class="row">
        <!-- Earnings (Monthly) Card Example -->

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/pengumuman" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_sekilasinfo');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id_sekilasinfo" value="<?= $rows['id_sekilas'] ?>">
               <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-3 mt-2">Isi Pengumuman</label>
                        <div class="col-12 col-lg-9">
                        <textarea id="editor1" name="info"><?= $rows['info'] ?></textarea></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3  mt-2">Gambar</label><br>
                        <div class="col-12 col-lg-9">
                        <img class="mb-4" src="<?= base_url() .'upload/foto_info/'.$rows['gambar'] ?>"  width="50%" style="border-radius:2px;">

                            <div class="custom-file col-sm-12">
                                <input type="file" class="custom-file-input" id="customFile" name="gambar" accept="image/*">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <!-- <small id="gambar-berita" name="gambar-berita" class="form-text text-muted"><i class="fas fa-info fa-xs"></i> gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-12 col-lg-3 mt-2">Ket. Gambar</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text"  class="form-control" id="" name="keterangan-gambar" value="<?= $rows['keterangan_gambar'] ?>">
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
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/pengumuman">
                    <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Batal</span>
                    </a>
        <?= form_close(); ?>
        </div>
        </div>
        </div>
