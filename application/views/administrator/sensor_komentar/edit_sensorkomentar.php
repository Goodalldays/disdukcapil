<div class="container-fluid" id="edit-sensorkomentar">
<div class="row">
        <!-- Earnings (Monthly) Card Example -->

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/sensor_komentar" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_sensorkomentar');
              ?>
              <div class="col-12 col-lg-10 col-xl-8 col-centered">
               <input type="hidden" name="id_jelek" value="<?= $rows['id_jelek'] ?>">
        <div class="form-group row">
                        <label for="kata-jelek" class="col-12 col-lg-2 mt-2">Kata Jelek</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text" class="form-control" id="kata-jelek" name="kata-jelek" value="<?= $rows['kata'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ganti-menjadi" class="col-12 col-lg-2 mt-2">Ganti</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text" class="form-control" id="ganti-menjadi" name="ganti-menjadi" value="<?= $rows['ganti'] ?>"></div>
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
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/sensor_komentar">
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
