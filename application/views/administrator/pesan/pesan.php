<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
</div>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data <?= $title; ?></h6>

        </div>
        <div class="card-body" id="tableCustom">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Subjek</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach ($record as $row){
                            $tgl_posting = tgl_indo($row['tanggal']);
                        echo "
                            <tr>
                                <td class='text-center'>$no</td>
                                <td>$row[nama]</td>
                                <td class='text-center'>$row[email]</td>
                                <td class='text-center'>$row[subjek]</td>
                                <td class='text-center'>$tgl_posting</td>

                        <td>
                            <center>
                                <a class='lihat-data' title='Tampilkan' href='".base_url()."administrator/lihat_pesan/$row[id_hubungi]'><i class='fas fa-eye fa-xs'
                                        style='color: #1cc88a'></i></a>&nbsp;

                                <a id='hapus-data' class='hapus-data' href='".base_url()."administrator/hapus_pesan/$row[id_hubungi]' class='hapus-data' title='Hapus'><i
                                        class='fas fa-trash fa-xs' style='color: #e74a3b'></i></a>
                            </center>

                        </td>
                        </tr>
                        ";
                        $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->


<div class="modal fade" id="modalTampilPesan" tabindex="-1" role="dialog" aria-labelledby="modalSayaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSayaLabel">Hapus Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Halo, ini modal sederhana.
                    <br />
                    Seri Tutorial Bootstrap 4 lengkap dari dasar sampai mahir.
                    <textarea id="editor" name="" cols=" 30" rows="10"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Oke</button>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- End of Main Content -->
<script>
$('.hapus-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Hapus pesan",
      text: "Yakin ingin menghapus pesan?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#e74a3b',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: "Tidak",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
            title: "Hapus",
            text: "Pesan berhasil dihapus!",
            icon: "success",
            timer: 2000,
            showConfirmButton: false
        }).then(function(){
            window.location.replace(url);
        })
      }
    //   else {
    //     Swal.fire({
    //         title: "Batal",
    //         text: "Hapus pesan dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

$('.lihat-data').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  Swal.fire({
      title: "Lihat pesan",
      text: "Ingin lihat pesan masuk?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: '#1cc88a',
      confirmButtonText: 'Ya, Lihat pesan',
      cancelButtonText: "Tidak",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.replace(url);
      }
    //   else {
    //     Swal.fire({
    //         title: "Batal",
    //         text: "Lihat pesan dibatalkan!",
    //         icon: "error",
    //         timer: 2000,
    //         showConfirmButton: true
    //     })
    //   }
    })
});

</script>
