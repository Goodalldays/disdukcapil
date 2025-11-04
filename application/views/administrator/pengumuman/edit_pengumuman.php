<div class="container-fluid" id="edit-pengumuman">
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
              echo form_open_multipart('administrator/edit_pengumuman');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id_pengumuman" value="<?= $proses['id_pengumuman'] ?>">
        <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Judul</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="judul" name="judul" value="<?= $proses['judul'] ?>">
                        </div>
                    </div>


                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3  mt-2">Gambar</label><br>
                        <div class="col-12 col-lg-9">
                        <img class="mb-4" src="<?= base_url() .'upload/foto_pengumuman/'.$proses['gambar'] ?>"  width="50%" style="border-radius:2px;">

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
                        <input autocomplete="off" type="text"  class="form-control" id="" name="keterangan-gambar" value="<?= $proses['keterangan_gambar'] ?>">
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-3 mt-2">Isi Pengumuman</label>
                        <div class="col-12 col-lg-9">
                        <textarea id="editor1" name="isi-pengumuman"><?= $proses['isi'] ?></textarea></textarea>
                        </div>
                    </div>
                    <hr>
                    <h6 style="margin-bottom:20px;">Tampilkan file dari data <strong><a href="<?= base_url(); ?>administrator/unduhan">unduhan</a></strong>.</h6>
                    <div class="form-group row">
                        <label for="file" class="col-12 col-lg-3 mt-2">Pilih</label>
                        <div class="col-12 col-lg-9">
                        <select name="file" class="form-control" id="file">
                        <option value='' >- Pilih File -</option>";
                            <?php
                                // foreach($unduh as $row){
                                //     echo "<option value='$row[file]'>$row[judul_unduh]</option>";
                                // }
                                foreach ($unduh as $row){
                                                                                if ($proses['file'] == $row['file']){
                                                                                  echo "<option value='$row[file]' selected>$row[judul_unduh]</option>";
                                                                                }else{
                                                                                  echo "<option value='$row[file]'>$row[judul_unduh]</option>";
                                                                                }
                                                                            }
                            ?>
                        </select>
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
