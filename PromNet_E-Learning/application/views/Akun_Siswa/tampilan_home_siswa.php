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
                        <h1 align ="center">Mata Pelajaran</h1>
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
              						        <th>No</th>
                                  <th>Id</th>
                             			<th>Kode</th>
                                  <th>Mata Pelajaran</th>
                                  <th>Jam Pembelajaran</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $no = 1; foreach ($mata_pelajaran as $column): ?>
                                <tr class="table-primary">
                                  <th scope="row"><?php echo $no; ?></th>
                                  <td style="font-family: georgia;"><?php echo $column->id; ?></td>
                                  <td style="font-family: verdana;"><?php echo $column->kd_Mapel; ?></td>
                                  <td style="font-family: verdana;"><a href="<?php echo site_url('Sesi_Pembelajaran_Siswa/index/'. $column->kd_Mapel); ?>" class="text-danger"><?php echo $column->Nama_Mapel; ?></a></td>
                                  <td style="font-family: verdana;"><?php echo $column->Jam_Pembelajaran; ?></td>
                                </tr>
                              <?php $no++; endforeach; ?>
                        </table>
                </div>
            </div>
        </div>
    </div>
  </div>
  <?php $this->load->view('javascript.php'); ?>
</body>

</html>
