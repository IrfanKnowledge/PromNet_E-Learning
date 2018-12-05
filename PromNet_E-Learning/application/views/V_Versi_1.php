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
            <h1 align ="center">Ini Versi 1</h1>
            <table class="table table-bordered table-hover" align ="center">
              <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>id</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Password</th>
                  </tr>
              </thead>
              <tbody>
              <?php $no = 1; foreach ($Siswa as $column) { ?>
                <tr class="table-primary">
                  <td><?php echo $no; ?></td>
                  <td><?php echo $column->id; ?></td>
                  <td><?php echo $column->NIS; ?></td>
                  <td><?php echo $column->Nama; ?></td>
                  <td><?php echo $column->Password; ?></td>
                </tr>
              <?php
                $no++;
                }
              ?>
              </tbody>
            </table>

            <br><br>

            <table class="table table-bordered table-hover" align ="center">
              <thead class="thead-dark">
                <tr align="center">
                  <th>No</th>
                  <th>id</th>
                  <th>Topik</th>
                  <th>Uraian</th>
                  <th>Konten1</th>
                  <th>Konten2</th>
                  <th>Konten3</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1; foreach ($Sesi_Pembelajaran as $column) { ?>
                <tr class="table-primary">
                  <td><?php echo $no; ?></td>
                  <td><?php echo $column->id; ?></td>
                  <td><?php echo $column->Topik; ?></td>
                  <td><?php echo $column->Uraian; ?></td>
                  <td><?php echo $column->Konten1; ?></td>
                  <td><?php echo $column->Konten2; ?></td>
                  <td><?php echo $column->Konten3; ?></td>
                </tr>
              <?php
                $no++;
                }
              ?>
                </tbody>
            </table>

            <br><br>

            <table border="1px" bordercolor="blue" class="table table-bordered" align ="center">
              <table class="table table-bordered table-hover" align ="center">
                <thead class="thead-dark">
                  <tr>
                    <th>No</th>
                    <th>id_Tes</th>
                    <th>No_Soal</th>
                    <th>Pertanyaan</th>
                    <th>pilihan1</th>
                    <th>pilihan2</th>
                    <th>pilihan3</th>
                    <th>pilihan4</th>
                    <th>Kunci_Jawaban</th>
                  </tr>

                </thead>

              </tr>
              <?php $no = 1; foreach ($Tes_Ketuntasan_Soal as $column) { ?>
                <tr class="table-primary">
                  <td><?php echo $no; ?></td>
                  <td><?php echo $column->id_Tes; ?></td>
                  <td><?php echo $column->No_Soal; ?></td>
                  <td><?php echo $column->Pertanyaan; ?></td>
                  <td><?php echo $column->pilihan1; ?></td>
                  <td><?php echo $column->pilihan2; ?></td>
                  <td><?php echo $column->pilihan3; ?></td>
                  <td><?php echo $column->pilihan4; ?></td>
                  <td><?php echo $column->Kunci_Jawaban; ?></td>
                </tr>
              <?php
                $no++;
                }
              ?>
            </table>
          </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('javascript.php'); ?>
</body>

</html>
