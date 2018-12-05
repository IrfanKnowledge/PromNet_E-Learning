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
    </div>
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 align ="center">Sesi Pembelajaran</h1>

          <table class="table table-bordered table-hover" align ="center">
              <thead class="thead-dark">
                <tr align="center">
                  <th>No</th>
                  <th>id</th>
                  <th>id_mapel</th>
                  <th>Topik</th>
                  <th>Uraian</th>
                  <th>Konten1</th>
                  <th>Konten2</th>
                  <th>Konten3</th>
                  <th>Tes Ketuntasan</th>
                  <th>Tes Pengayaan</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($Sesi_Pembelajaran as $column) { ?>
                  <tr class="table-primary">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $column->id; ?></td>
                    <td><?php echo $column->id_mapel; ?></td>
                    <td><?php echo $column->Topik; ?></td>
                    <td><?php echo $column->Uraian; ?></td>
                    <td><?php echo $column->Konten1; ?></td>
                    <td><?php echo $column->Konten2; ?></td>
                    <td><?php echo $column->Konten3; ?></td>

                   <th>
                      <a href="<?php echo site_url('C_matpel/Ketuntasan/'.($column->id)); ?>">Ketuntasan</a>
                  </th>
                   <th>
                      <a href="<?php echo site_url('C_matpel/Pengayaan/'.($column->id)); ?>">Pengayaan</a>
                  </th
                    
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
  <?php $this->load->view('javascript.php'); ?>
</body>

</html>
