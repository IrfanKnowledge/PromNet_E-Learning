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
                      <h1 align ="center">Nilai Tes Ketuntasan</h1>
                      <table class="table table-bordered table-hover" align ="center">
                        <thead class="thead-dark">
                            <tr>
                              <th>No</th>
                              <th>id</th>
                              <th>NIS</th>
                              <th>ID Tes</th>
                              <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($tes_ketuntasan as $column) { ?>
                          <tr class="table-primary">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $column->id; ?></td>
                            <td><?php echo $column->NIS; ?></td>
                            <td><?php echo $column->id_Tes; ?></td>
                            <td><?php echo $column->Nilai_Tes; ?></td>      
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
