<body>

    <!-- <header class="header-area">

        <?php include("top-header.php"); ?>
        <?php include("main-header-menu.php"); ?>

    </header> -->

    <div class="container">
        <div class="vc_column wpb_column vc_column_container td-pb-span8 wow fadeInUp" style='margin:40px 0'>
            <div class="wpb_wrapper">
                <div class="clearfix"></div>


                <div class="col-12">
                    <div class="section-heading text-center mt-40">
                        <h3>Download Area</h3>
                        <div class="line"></div>
                    </div>
                </div>


                <article class="post type-post status-publish format-standard has-post-thumbnail mb-100">
                    <div class="td-post-content td-pb-padding-side">
                        <table class='table table-striped table-condensed '>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Hits</th>
                                <th style='width:70px'></th>
                            </tr>
                            <?php
                            $no = $this->uri->segment(3) + 1;
                            foreach ($download->result_array() as $r) {
                                echo "<tr>
                            <td>$no</td>
                            <td>$r[judul]</td>
                            <td>$r[hits] Kali</td>
                            <td><a class='td_btn td_btn_sm td_default_btn' href='" . base_url() . "download/file_view/$r[nama_file]' target='_blank'><i class='fa fa-download ' data-toggle='tooltip' data-placement='bottom' title='Download'></i></a></td>
                          </tr>";
                                $no++;
                            }
                            ?>
                        </table>
                    </div>
                </article>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- ***** Footer Area Start ***** -->
    <!-- <?php include("footer.php"); ?> -->
    <!-- ***** Footer Area End ***** -->
