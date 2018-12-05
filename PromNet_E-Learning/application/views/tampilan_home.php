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
                        <h1 align ="center">Oleh:</h1>
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
              						        <th>No</th>
                                  <th>NIM</th>
                             			<th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                          <tr class="table-danger">
                          	<th scope="row">1</th>
            				        <td style="font-family: georgia;">1604125</td>
                            <td style="font-family: verdana;">Azizah Nurul K</td>
                          </tr>
                          <tr class="table-success">
                          	<th scope="row">2</th>
            				        <td style="font-family: georgia;">1603719</td>
                            <td style="font-family: verdana;"> Irfan Muhammad Faisal</td>
                          </tr>
                        </table>
                </div>
            </div>
        </div>


    </div>
  </div>
  <?php $this->load->view('javascript.php'); ?>
</body>

</html>
