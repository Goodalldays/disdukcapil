<div class="container-fluid" id="edit-berita">
<div class="row">
        <!-- Earnings (Monthly) Card Example -->

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/agenda" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_agenda');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id-agenda" value="<?= $proses['id_agenda'] ?>">
              <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Tema</label>
                        <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="tema" name="tema" value="<?= $proses['tema'] ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="gambar" class="col-12 col-lg-3 mt-2">Gambar</label><br>
                        <div class="col-12 col-lg-9">
                            <img class="mb-4" src="<?= base_url() .'upload/img_agenda/'.$proses['gambar'] ?>" alt="<?= $proses['keterangan_gambar'] ?>"  width="50%" style="border-radius:2px;">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="gambar">
                                <label class="custom-file-label text-truncate" for="customFile">Pilih gambar</label>
                                <!-- <small id="" name="gambar-berita" class="form-text text-muted"><i class="fas fa-info fa-xs"></i> gambar yang dipilih akan tampil menjadi gambar berita, bukan isi berita.</small> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-12 col-lg-3 mt-2">Ket. Gambar</label>
                        <div class="col-12 col-lg-9">
                        <input type="text"  class="form-control" id="keterangan-gambar" name="keterangan-gambar" value="<?= $proses['keterangan_gambar'] ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="formGroupExampleInput2" class="col-12 col-lg-3 mt-2">Isi Agenda</label>
                        <div class="col-12 col-lg-9">
                        <textarea id="editor1" name="isi-agenda"><?= $proses['isi_agenda'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat" class="col-12 col-lg-3 mt-2">Tempat</label>
                        <div class="col-12 col-lg-9">
                        <textarea id="textsarea" name="tempat"><?= $proses['tempat'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Google Map</label>
                        <div class="col-12 col-lg-9">
                        <textarea id="textsarea" name="google-map"><?= $proses['map'] ?></textarea>
                        </div>
                    </div>


<div class="form-group row">
                    <label for="tanggal" class="col-12 col-lg-3 mt-2">Tanggal</label>
                        <div class="col-12 col-lg-9">
			                <div class="input-group mb-3">
                                <input type="text" class="form-control" name="tanggal-mulai" id="tanggal-mulai" value="<?= $proses['tgl_mulai'] ?>" autocomplete="off">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Sampai</span>
                                </div>
                            <input type="text" class="form-control" name="tanggal-selesai" id="tanggal-selesai" value="<?= $proses['tgl_selesai'] ?>" autocomplete="off">
                        </div>
                    </div>
                </div>

<div class="form-group row">
                    <label for="tanggal" class="col-12 col-lg-3 mt-2">Waktu</label>
                        <div class="col-12 col-lg-9">
			                <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="" id="waktu-mulai" name="waktu-mulai" autocomplete="off" value="<?= $proses['jam'] ?>">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Sampai</span>
                                </div>
                            <input type="text" class="form-control" aria-label="" name="waktu-selesai" autocomplete="off" value="<?= $proses['jam_selesai'] ?>">
                        </div>
                    </div>
                </div>

                    <div class="form-group row">
                        <label for="judul" class="col-12 col-lg-3 mt-2">Pengirim</label>
                        <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $proses['pengirim'] ?>">
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
