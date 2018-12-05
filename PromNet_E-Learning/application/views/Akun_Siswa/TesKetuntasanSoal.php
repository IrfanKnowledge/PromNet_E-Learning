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
<!--             <h1 align ="center"><?php echo $this->session->mata_pelajaran['Nama_Mapel']; ?></h1> -->

          <table class="table table-bordered table-hover" align ="center">
              <thead class="thead-dark">
                <tr align="center">
                  <th>No</th>
                  <th>Pertanyaan</th>
                  <th>Benar</th>
                  <th>Salah</th>
                </tr>
              </thead>
              <tbody>
                <form class="" action="<?php echo site_url('Tes_Ketuntasan_Siswa/Jawaban_Tambah');?>" method="post">
                  <?php  $no = 1; foreach ($tes_ketuntasan_soal as $column) { ?>
                    <tr class="table-primary">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $column->Pertanyaan; ?></td>
                      <input type="hidden" name="id<?php echo $column->id; ?>" value="<?php echo $column->id; ?>">

                      <td><input name="pilihan<?php echo $column->id;?>" type="radio"
                        <?php echo $column->pilihan1?> value="Benar"><br>

                      </td>


                      <td><input name="pilihan<?php echo $column->id;?>" type="radio"
                        <?php echo $column->pilihan2?> value="Salah"><br>

                      </td>
                    </tr>
                    <?php
                    $no++;
                  }
                  ?>
              </tbody>
            </table>
            <input class="btn btn-info" role="button" type="submit" name="simpan" value="Submit">
          </form>
          </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('javascript.php'); ?>
</body>

</html>
