<section>
    <div class="download" style="margin-top: 130px;"></section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8" style="padding-right: 25px;">
                    <div class="section-heading" style="margin-bottom: 30px;">
                        <h6 data-scroll-reveal="enter left move 10px over 0.4s after 0.2s">Unduhan</h6>
                        <h2 data-scroll-reveal="enter left move 20px over 0.6s after 0.4s">File dan dokumen</h2>
                    </div>
                    <?php
              if (empty($unduh->result_array()))
              {
                echo "<div><img data-scroll-reveal='enter left move 30px over 0.6s after 0.8s' class='kosong' src='".base_url()."assets/template/breezed/img/undraw_attached_file_n4wm.svg'></div><h5 class='text-center' data-scroll-reveal='enter left move 30px over 0.6s after 0.8s'>Tidak ada unduhan!</h5>";
              } else {
              ?>
                    <article class="">
                        <div class="download-table">
                            <div class="table-responsive">
                                <table id="unduhTabel" class="hover table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Nama File</th>
                                            <th>Unduh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($unduh->result_array() as $row){
                                                echo "
                                                    <tr>
                                                    <td class='text-center'>$no."."</td>
                                                    <td><span class='judul-table-download'>$row[judul_unduh]</span>
                                                    <div class='post-meta' style='font-size: 13px;'>
                                                    <a class='link-disable' href='#'><i class='fa fa-calendar'></i> ".tgl_indo($row['tanggal'])."</a>
                                                    <a class='link-disable' href='#'><i class='fa fa-hand-o-up ml-3'></i> ".number_format($row['hits'])."x diunduh</a>
                                                    </div></td>
                                                    <td class='text-center align-middle'><a class='btn-download-table' href='" . base_url() . "unduhan/file/$row[file]' target='_blank'><i class='fa fa-download ' data-toggle='tooltip' data-placement='bottom' title='Unduh'></i></a></td>
                                                    </tr>";
                                                $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </article>
                    <?php } ?>
                </div>
                <?php include( "sidebar.php"); ?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

$(document).ready(function() {
    table = $('#unduhTabel').DataTable({
        "lengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]],
        "columnDefs": [
            { "orderable": false, "targets": [2] }
        ]
    });
});

</script>
