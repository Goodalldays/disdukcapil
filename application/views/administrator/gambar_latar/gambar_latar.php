<div class="container-fluid" id="logo_website">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
</div>

<div class="card shadow mb-4" id="data-logo-website">
  <div class="card-header py-3">
    <h6 class="mt-2 font-weight-bold text-primary float-left">Data Gambar Latar</h6>
  </div>
  <div class="card-body">
    <?php
      echo form_open_multipart('administrator/gambar_latar');
      $no = 1;
      foreach ($record->result_array() as $row){
    ?>
    <div class="col-12 col-lg-11 col-xl-10 col-centered">
      <input type='hidden' name='id' value='<?= $row['id_latar']?>'>
        <div class="form-group row">
          <label for="logo" class="col-12 col-lg-3 mt-2 ">Gambar Latar</label><br>
          <div class="col-12 col-lg-9">
            <img src='<?= base_url()?>upload/img_latar/<?= $row['latar_belakang']?>' style="width: 100%; border-radius: 5px;">
          </div>
          </div>
            <div class="form-group row">
              <label for="gambar" class="col-12 col-lg-3 mt-2 ">Pilih</label><br>
              <div class="col-12 col-lg-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="gambar">
                  <label class="custom-file-label text-truncate" for="customFile">Pilih Gambar Latar</label>
                </div>
              </div>
              <?php
                  $no++;
                  }
              ?>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="m-3">
          <button type="submit" name="submit" class="mb-3 float-right btn btn-primary btn-icon-split btn-sm ml-2">
            <span class="icon text-white-50">
              <i class="fa fa-check"></i>
            </span>
            <span class="text">Simpan</span>
          </button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>


    <div class="card shadow mb-4" id="data-logo-website">
  <div class="card-header py-3">
    <h6 class="mt-2 font-weight-bold text-primary float-left">Data Gambar Kaki</h6>
  </div>
  <div class="card-body">
    <?php
      echo form_open_multipart('administrator/gambar_kaki');
      foreach ($record->result_array() as $row){
    ?>
    <div class="col-12 col-lg-11 col-xl-10 col-centered">
      <input type='hidden' name='id' value='<?= $row['id_latar']?>'>
        <div class="form-group row">
          <label for="logo" class="col-12 col-lg-3 mt-2 ">Gambar Kaki</label><br>
          <div class="col-12 col-lg-9">
            <img src="<?= base_url()?>upload/img_latar/<?= $row['gambar_kaki']?>" alt="" style="width: 100%; border-radius: 5px;">
          </div>
          </div>
            <div class="form-group row">
              <label for="gambar" class="col-12 col-lg-3 mt-2 ">Pilih</label><br>
              <div class="col-12 col-lg-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" accept="image/*" name="gambar1">
                  <label class="custom-file-label text-truncate" for="customFile">Pilih Gambar Kaki</label>
                </div>
              </div>
              <?php
                  }
              ?>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="m-3">
          <button type="submit" name="submit" class="mb-3 float-right btn btn-primary btn-icon-split btn-sm ml-2">
            <span class="icon text-white-50">
              <i class="fa fa-check"></i>
            </span>
            <span class="text">Simpan</span>
          </button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
    </div>
  </div>
