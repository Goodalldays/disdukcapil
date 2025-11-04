<div class="container-fluid" id="edit-berita">
<div class="row">

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Edit Kategori Berita</h6>
            <a href="<?= base_url() ?>administrator/kategori_berita" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_kategoriberita');
              ?>
              <div class="col-12 col-lg-10 col-xl-8 col-centered">
               <input type="hidden" name="id-kategori" value="<?= $proses['id_kategori'] ?>">

               <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-2 font-weight-bold mt-2">Kategori</label>
                        <div class="col-12 col-lg-10">
                        <input type="text" class="form-control" id="nama-kategori" name="nama-kategori" value="<?= $proses['nama_kategori'] ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-2 font-weight-bold mt-2">Gambar</label><br>
                        <div class="col-12 col-lg-10">
                        <?php
                        if($proses['gambar_kategori'] != ''){
                        ?>
                        <img class="mb-4" src="<?= base_url() .'upload/img_kategori/'.$proses['gambar_kategori'] ?>" alt="<?= $proses['keterangan_gambar'] ?>" width="50%" style="border-radius:2px;">
                        <?php } ?>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="gambar">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <!-- <small id="" name="gambar-berita" class="form-text text-muted"><i class="fas fa-info fa-xs"></i> gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-12 col-lg-2 font-weight-bold mt-2">Ket. Gambar</label>
                        <div class="col-12 col-lg-10">
                        <input type="text"  class="form-control" id="" name="keterangan-gambar" value="<?= $proses['keterangan_gambar'] ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-2 font-weight-bold mt-2">Deskripsi</label>
                        <div class="col-12 col-lg-10">
                        <textarea class='form-control' name="deskripsi" style='height:100px'><?= $proses['deskripsi'] ?></textarea>
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
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/kategori_berita">
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
