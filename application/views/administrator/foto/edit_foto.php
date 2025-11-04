<div class="container-fluid" id="edit-foto">
<div class="row">
        <!-- Earnings (Monthly) Card Example -->

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/foto" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_foto');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id_galeri" value="<?= $proses['id_galeri'] ?>">
        <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3  mt-2">Judul</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="judul" name="judul" value="<?= $proses['judul_galeri'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subjudul" class="col-12 col-lg-3 mt-2">Sub Judul</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="sub-judul" name="sub-judul" value="<?= $proses['sub_judul'] ?>"></div>
                    </div>
                    <div class="form-group row">
                      <label for="tanggal" class="col-12 col-lg-3 mt-2">Tanggal</label>
                      <div class="col-12 col-lg-9">
			                  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
  </div>
  <input type="text" class="form-control" aria-label="" name="tanggal" id="tanggal" autocomplete="off" value="<?= $proses['tanggal'] ?>">
</div>

                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3 mt-2">Gambar</label><br>
                        <div class="col-12 col-lg-9">
                        <div class="row">
                        <?php
                          $string = $proses['gambar_galeri'];
                          $gambar = explode(",", $string);
                          foreach ($gambar as $gbr) {
                          ?>
<div class="col-12 col-lg-4 col-md-6">

                        <a href="<?= base_url() ?>upload/img_galeri/<?= $gbr ?>" data-lightbox='image-1' data-title="<?= $proses['keterangan'] ?>"><figure><img src="<?= base_url() ?>upload/img_galeri/<?= $gbr ?>" alt="<?= $proses['keterangan'] ?>" style="max-width:100%; border-radius:5px; padding:10px 0;"></figure></a>
                        </div>
<?php } ?></div>
                            <div class="custom-file col-sm-12">
                                <input type="file" class="custom-file-input" id="customFile" name="userfile[]" accept="image/*" multiple>
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <small id="gambar" name="gambar" class="form-text text-muted">*dapat memilih beberapa gambar</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-12 col-lg-3 mt-2">Ket. Gambar</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text"  class="form-control" id="" name="keterangan-gambar" value="<?= $proses['keterangan'] ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="ketegori" class="col-12 col-lg-3 mt-2">Album</label>
                        <div class="col-12 col-lg-9">
                        <select name="album" class="form-control" id="">
                            <?php
                                foreach ($album as $row){
                                  if ($proses['id_album'] == $row['id_album']){
                                    echo "<option value='$row[id_album]' selected>$row[jdl_album]</option>";
                                  }else{
                                    echo "<option value='$row[id_album]'>$row[jdl_album]</option>";
                                  }
                              }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-3 mt-2">Deskripsi</label>
                        <div class="col-12 col-lg-9">
                        <textarea id="editor1" name="deskripsi"><?= $proses['deskripsi'] ?></textarea></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanda" class="col-12 col-lg-3 mt-2">Tandai</label>

                    <div class="col-12 col-lg-9 mt-2">
                    <?php
                    $_arrNilai = explode(',', $proses['tag']);
                    foreach ($tanda as $tag)
                    {
                      $_ck = (array_search($tag['tag_seo'], $_arrNilai) === false)? '' : 'checked';
                        echo "<div class='form-check form-check-inline'>
  <input class='form-check-input' type='checkbox' id='inlineCheckbox1' value='$tag[tag_seo]' name='tag[]' $_ck>
  <label class='form-check-label' for='inlineCheckbox1'>$tag[nama_tag]</label>
</div>";
                    } ?>

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
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/foto">
                    <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Batal</span>
                    </a>
        <?= form_close(); ?>
        </div>
        </div>
        </div>
