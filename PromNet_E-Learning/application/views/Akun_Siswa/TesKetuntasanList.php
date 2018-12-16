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
            <h1 align ="center"><?php echo $this->session->mata_pelajaran['Nama_Mapel']; ?></h1>

          <table class="table table-bordered table-hover" align ="center">
              <thead class="thead-dark">
                <tr align="center">
                  <th>No</th>
                  <th>Judul</th>
                  <th>Durasi</th>
                  <th>Deskripsi</th>
                  <th>Waktu Mulai</th>
                  <th>Waktu Berakhir</th>
                  <th>Mulai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  if ($tes_ketuntasan == -1) {
                    echo "<tr class='table-primary'><td colspan='7' align='center'><h3>Tes Ketuntasan, tidak tersedia.</h3></td></tr>";
                  }else{
                    foreach ($tes_ketuntasan as $column) { ?>
                  <tr class="table-primary">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $column->Judul; ?></td>
                    <td><?php echo $column->Durasi; ?> Menit</td>
                    <td><?php echo $column->Uraian; ?></td>
                    <td><?php echo $column->Waktu_Mulai_tes; ?></td>
                    <td><?php echo $column->Waktu_Berakhir_tes; ?></td>
                    <th>
                        <a href="<?php echo site_url('Tes_Ketuntasan_Soal_Siswa/mulai_soal_ketuntasan/'. $this->uri->segment('3') . '/' . $column->sesi_ke); ?>" class="text-danger">Mulai</a>
                    </th>
                  </tr>
                <?php
                  $no++;
                    }
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
