<div class="container-fluid" id="edit-petikan">
<div class="row">
        <!-- Earnings (Monthly) Card Example -->

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/link_terkait" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_petikan');
              ?>
              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id_petikan" value="<?= $rows['id_petikan'] ?>">
        <div class="form-group row">
                        <label for="petikan" class="col-12 col-lg-3 mt-2">Petikan</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="text" class="form-control" id="petikan" name="petikan" value="<?= $rows['petikan'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="urutan" class="col-12 col-lg-3 mt-2">Urutan</label>
                        <div class="col-12 col-lg-9">
                        <input autocomplete="off" type="number" class="form-control" id="urutan" name="urutan" value="<?= $rows['urutan'] ?>">
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
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/link_terkait">
                    <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Batal</span>
                    </a>
        <?= form_close(); ?>
        </div>
        </div>
        </div>

</div></div>
