<div class="container-fluid" id="edit-menuwebsite">
<div class="row">

        </div>
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="mt-2 font-weight-bold text-primary float-left"><?= $title ?></h6>
            <a href="<?= base_url() ?>administrator/menu_website" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
        <?php
              echo form_open_multipart('administrator/edit_menuwebsite');
              ?>
              <div class="col-12 col-lg-10 col-xl-8 col-centered">
               <input type="hidden" name="id_menu" value="<?= $rows['id_menu'] ?>">
                                   <div class="form-group row">
                        <label for="level-menu" class="col-12 col-lg-2 mt-2">Level Menu</label>
                        <div class="col-12 col-lg-10">
                        <select name="level-menu" class="form-control" id="level-menu">
                        <option value="0">MENU UTAMA</option>
                            <?php
                                  foreach ($record as $row){
                                                                              if ($row['id_menu']==$rows['id_parent']){
                                                                                echo "<option value='$row[id_menu]' selected>$row[nama_menu] </option>";
                                                                              }else{
                                                                                echo "<option value='$row[id_menu]'>$row[nama_menu]</option>";
                                                                              }
                                                                            }
                    ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama-menu" class="col-12 col-lg-2 mt-2">Nama Menu</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text" class="form-control" id="nama-menu" name="nama-menu" value="<?= $rows['nama_menu']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="link" class="col-12 col-lg-2 mt-2">Link Menu</label>
                        <div class="col-12 col-lg-10">
                        <input autocomplete="off" type="text" class="form-control" id="link-menu" name="link-menu" value="<?= $rows['link']?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="deskripsi" class="col-12 col-lg-2 mt-2">Deskripsi</label>
                        <div class="col-12 col-lg-10">
                        <textarea class='form-control' name='deskripsi' style='height:200px'><?= $rows['deskripsi'] ?></textarea>
                        <!-- <small>*deksripsi diisi hanya untuk level menu utama</small> -->
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-12 col-lg-2 col-form-label">Posisi</label><br>
                        <div class="col-12 col-lg-10 mt-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="posisi" value="Bottom" id="posisi" class="custom-control-input"
                                <?php
                                    if ($rows['position'] == 'Bottom'){
                                        echo "checked";
                                    }
                                ?>
                                >
                                <label class="custom-control-label" for="posisi">Bottom</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="posisi" value="Top" id="posisi2" class="custom-control-input"
                                <?php
                                    if ($rows['position'] == 'Top'){
                                        echo "checked";
                                    }
                                ?>
                                >
                                <label class="custom-control-label" for="posisi2">Top</label>
                            </div>

                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="urutan" class="col-12 col-lg-2 mt-2">Urutan</label>
                        <div class="col-12 col-lg-10">
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
        <a type="button" class="mb-3 float-right btn btn-secondary btn-icon-split btn-sm" href="<?= base_url() ?>administrator/menu_website">
                    <span class="icon text-white-50">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Batal</span>
                    </a>
        <?= form_close(); ?>
        </div>
        </div>
        </div>
