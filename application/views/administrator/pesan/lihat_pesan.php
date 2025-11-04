<div class="container-fluid" id="edit-berita">
<div class="row">
        <!-- Earnings (Monthly) Card Example -->

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/pesan" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/lihat_pesan');
              ?>
<div class="col-12 col-lg-11 col-xl-10 col-centered">
              <input type="hidden" name="id_hubungi" value="<?= $rows['id_hubungi'] ?>">
              <div class="form-group row">
                        <label for="nama" class="col-12 col-lg-3  mt-2">Pengirim</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="nama" name="nama" value="<?= $rows['nama'] ?>" readonly='on'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-12 col-lg-3  mt-2">Email</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="email" name="email" value="<?= $rows['email'] ?>" readonly='on'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subjek" class="col-12 col-lg-3  mt-2">No. Telp</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="no-telp" name="subjek" value="<?= $rows['no_telp'] ?>" readonly='on'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subjek" class="col-12 col-lg-3  mt-2">Subjek Pesan</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="subjek" name="subjek" value="<?= $rows['subjek'] ?>" readonly='on'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="isi-pesan" class="col-12 col-lg-3 mt-2">Isi Pesan</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='isi-pesan' style='height:150px' readonly='on'><?= $rows['pesan']?></textarea></div>
                    </div>
                    <hr style="margin: 30px 0;">
                    <div class="text-center mb-4">Anda dapat melakukan <span class="font-weight-bold text-grey">Balas Pesan</span> dengan mengisi <span class="font-weight-bold text-grey"><u>Isi Balasan</u></span> di bawah ini.</div>
                    <div class="form-group row">
                        <label for="subjek" class="col-12 col-lg-3  mt-2">Isi Balasan</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='isi-pesan' id="editor1" style='height:150px'></textarea>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="mt-3">

                    <button type="submit" name="submit" class="float-right btn btn-primary btn-icon-split btn-sm ml-2">
            <span class="icon text-white-50">
                <i class="fa fa-paper-plane"></i>
            </span>
            <span class="text">Balas</span>
        </button>
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/pesan">
                    <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Batal</span>
                    </a>
        <?= form_close(); ?>
        </div>
        </div>
        </div>
