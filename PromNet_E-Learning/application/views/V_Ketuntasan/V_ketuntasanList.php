<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php $this->load->view('head.php') ?>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Start Left menu area -->
    <?php $this->load->view('navbar_kiri'); ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php
          $this->load->view('logo.php');
          $this->load->view('header.php');
        ?>
            <!-- Mobile Menu start -->
            <?php $this->load->view('mobile'); ?>
            <!-- Mobile Menu end -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <h1 align ="center">Tes Ketuntasan</h1>
                      <table class="table table-bordered table-hover" align ="center">
                        <thead class="thead-dark">
                            <tr>
                              <th>No</th>
                              <th>id</th>
                              <th>Id Sesi</th>
                              <th>Judul</th>
                              <th>Durasi</th>
                              <th>Uraian</th>
                              <th>Waktu Mulai</th>
                              <th>Waktu Berakhir</th>
                              <th>Soal</th>
                              <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($tes_ketuntasan as $column) { ?>
                          <tr class="table-primary">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $column->id; ?></td>
                            <td><?php echo $column->id_Sesi; ?></td>
                            <td><?php echo $column->Judul; ?></td>
                            <td><?php echo $column->Durasi; ?></td>
                            <td><?php echo $column->Uraian; ?></td>
                            <td><?php echo $column->Waktu_Mulai_tes; ?></td>
                            <td><?php echo $column->Waktu_Berakhir_tes; ?></td>
                             <th>
                                <a href="<?php echo site_url('C_matpel/soal_ketuntasan/'.($column->id_Sesi)); ?>">Soal</a>
                            </th>
                            <th>
                                <a href="<?php echo site_url('C_matpel/nilai_ketuntasan/'.($column->id_Sesi)); ?>">Nilai</a>
                            </th>
>                                                        
                          </tr>
                        <?php
                          $no++;
                          }
                        ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
  </div>
  <?php $this->load->view('javascript.php'); ?>
</body>

</html>
