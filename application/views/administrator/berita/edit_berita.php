<div class="container-fluid" id="edit-berita">
<div class="row">
        <!-- Earnings (Monthly) Card Example -->

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/berita" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_berita');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id_berita" value="<?= $proses['id_berita'] ?>">
        <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3  mt-2">Judul</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="judul" name="judul" value="<?= $proses['judul'] ?>">
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
                        <div class="col-lg-4">
                            <img class="mb-4" src="<?= base_url() .'upload/img_berita/'.$proses['gambar'] ?>" alt="<?= $proses['keterangan_gambar'] ?>" style="max-width: 100%; border-radius:2px;">
                        </div>

                            <div class="custom-file col-sm-12">
                                <input type="file" class="custom-file-input" id="customFile" name="gambar" accept="image/*">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <small id="gambar-berita" name="gambar-berita" class="form-text text-muted"><i class="fas fa-info fa-xs"></i> gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small>
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
                        <label for="ketegori" class="col-12 col-lg-3 mt-2">Kategori</label>
                        <div class="col-12 col-lg-9">
                        <select name="kategori" class="form-control" id="">
                            <?php
                                foreach ($kategori as $row){
                                  if ($proses['id_kategori'] == $row['id_kategori']){
                                    echo "<option value='$row[id_kategori]' selected>$row[nama_kategori]</option>";
                                  }else{
                                    echo "<option value='$row[id_kategori]'>$row[nama_kategori]</option>";
                                  }
                              }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-3 mt-2">Isi Berita</label>
                        <div class="col-12 col-lg-9">
                        <textarea id="editor1" name="isi-berita"><?= $proses['isi_berita'] ?></textarea></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanda" class="col-12 col-lg-3 mt-2">Tandai</label>

                    <div class="col-12 col-lg-9 mt-2">
                    <?php
                    $_arrNilai = explode(',', $proses['tag']);
                    foreach ($tag as $tag)
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
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/berita">
                    <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Batal</span>
                    </a>
        <?= form_close(); ?>
        </div>
        </div>
        </div>
