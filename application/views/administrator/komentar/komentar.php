<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
</div>



<div class="card shadow mb-4" id="data-komentar">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left">Fitur <?= $title ?></h6>
        </div>
        <div class="card-body">
        <?= form_open_multipart('administrator/komentar');
              ?>

              <div class="col-12 col-lg-11 col-xl-10 col-centered">
               <input type="hidden" name="id_komentar" value="<?= $record['id_komentar'] ?>">
               <div style="margin: 0 0 20px 0"><?= $desc ?></div>
                    <div class="form-group row">
                        <label for="disquss" class="col-12 col-lg-3 mt-2">Kode Disquss</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='disquss' style='height:200px'><?= $record['disquss']?></textarea></div>
                    </div><br>
                    <div class="form-group row">
                        <label for="count" class="col-12 col-lg-3 mt-2">Kode Comment Counter</label>
                        <div class="col-12 col-lg-9">
                        <textarea class='form-control' name='count' style='height:200px'><?= $record['count']?></textarea></div>
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
                    </div></div>
        <?= form_close(); ?>
        </div>
        </div>
</div>

