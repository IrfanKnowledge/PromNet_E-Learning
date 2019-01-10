<!doctype html>
<html class="no-js" lang="en">

<head>
  <?php $this->load->view('head.php') ?>
  <style stylesheet="text/css">
    .isDisabled {
      color: currentColor;
      cursor: not-allowed;
      opacity: 0.5;
      text-decoration: none;
    }
  </style>
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
            <h1 align ="center"><?php if (!empty($nama_mapel)){  echo $nama_mapel->nama_mapel; }?></h1>

          <?php //echo print_r($this->session->cek); ?>
          <?php //if (): ?>
            <!-- <span id="status_pengerjaan"></span> -->
          <?php //endif; ?>

          <table class="table table-bordered table-hover" align ="center">
              <thead class="thead-dark">
                <tr align="center">
                  <th>No</th>
                  <th>Judul</th>
                  <th>Durasi</th>
                  <th>Deskripsi</th>
                  <th>Waktu Mulai</th>
                  <th>Waktu Berakhir</th>
                  <th>Status</th>
                  <th>Mulai</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  if ($tes_pengayaan == -1) {
                    echo "<tr class='table-primary'><td colspan='9' align='center'><h3>Tes Pengayaan, tidak tersedia.</h3></td></tr>";
                  }else{
                    foreach ($tes_pengayaan as $column) { ?>
                  <tr class="table-primary">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $column->Judul; ?></td>
                    <td><?php echo $column->Durasi; ?> Menit</td>
                    <td><?php echo $column->Uraian; ?></td>
                    <td><?php echo $column->Waktu_Mulai_tes; ?></td>
                    <td><?php echo $column->Waktu_Berakhir_tes; ?></td>

                    <?php
                      //default waktu adalah Asia/Jakarta
              			     date_default_timezone_set('Asia/Jakarta');
                    ?>

                    <!-- cek apakah array $status tersebut kosong? -->
                    <?php if ($status != array()): ?>
                      <!-- var $now menunjuk nilai awal pada array $status -->
                      <?php $now = current($status); ?>
                      <!-- cek apakah var $now tersebut menunjuk nilai NULL? -->
                      <?php if ($now): ?>
                        <!-- cek apakah id_Tes pada var $now sama dengan id pada var column? -->
                        <?php if ($now->id_Tes == $column->id):?>
                          <td><b><?php echo $now->Status_Pengerjaan; ?></b></td>
                          <!-- jika sama, kita setting var $now menunjuk indeks berikutnya pada array $status -->
                          <!-- ...kemudian jika sudah selesai, kita buat linknya menjadi disabled -->
                          <?php if ($now->Status_Pengerjaan == "Sudah Selesai"): $now = next($status);?>
                            <th>
                              <a class ="isDisabled" class="text-danger">Mulai</a>
                            </th>
                          <?php else: ?>
                            <th>
                              <a href="<?php echo site_url('Tes_Pengayaan_Soal_Siswa/mulai_soal_pengayaan/'. $this->uri->segment('3') . '/' . $column->sesi_ke); ?>" class="text-danger">Mulai</a>
                            </th>
                          <?php endif; ?>
                        <!-- jika tidak sama, maka kita tuliskan dengan 3 kondisi seperti berikut -->
                        <?php else: ?>
                          <!-- jika waktu mulai belum terlewati hari sekarang (waktu terkini) maka... -->
                          <?php if ($column->Waktu_Mulai_tes > date('Y-m-d H:i:s')): ?>
                            <td><b>Belum Di Mulai</b></td>
                            <th>
                              <a class="isDisabled" class="text-danger">Mulai</a>
                            </th>
                          <!-- jika waktu berakhir telah terlewati hari sekarang (watu terkini) maka... -->
                          <?php elseif($column->Waktu_Berakhir_tes < date('Y-m-d H:i:s')): ?>
                            <td><b>Berakhir, Anda Belum Mengerjakan</b></td>
                            <th>
                              <a class="isDisabled"  class="text-danger">Mulai</a>
                            </th>
                          <!-- jika hari ini atau waktu terkini terletak diantara waktu mulai dan berakhir maka... -->
                          <?php else: ?>
                            <td><b>Belum Mengerjakan</b></td>
                            <th>
                              <a href="<?php echo site_url('Tes_Pengayaan_Soal_Siswa/mulai_soal_pengayaan/'. $this->uri->segment('3') . '/' . $column->sesi_ke); ?>" class="text-danger">Mulai</a>
                            </th>
                          <?php endif; ?>
                        <?php endif; ?>
                      <!-- jika var $now tersebut menunjuk nilai NULL maka kita tuliskan sesuai 3 kondisi berikut -->
                      <?php else: ?>
                        <!-- jika waktu mulai belum terlewati hari sekarang (waktu terkini) maka... -->
                        <?php if ($column->Waktu_Mulai_tes > date('Y-m-d H:i:s')): ?>
                          <td><b>Belum Di Mulai</b></td>
                          <th>
                            <a class="isDisabled"  class="text-danger">Mulai</a>
                          </th>
                        <!-- jika waktu berakhir telah terlewati hari sekarang (watu terkini) maka... -->
                        <?php elseif($column->Waktu_Berakhir_tes < date('Y-m-d H:i:s')): ?>
                          <td><b>Berakhir, Anda Belum Mengerjakan</b></td>
                          <th>
                            <a class="isDisabled"  class="text-danger">Mulai</a>
                          </th>
                        <!-- jika hari ini atau waktu terkini terletak diantara waktu mulai dan berakhir maka... -->
                        <?php else: ?>
                          <td><b>Belum Mengerjakan</b></td>
                          <th>
                            <a href="<?php echo site_url('Tes_Pengayaan_Soal_Siswa/mulai_soal_pengayaan/'. $this->uri->segment('3') . '/' . $column->sesi_ke); ?>" class="text-danger">Mulai</a>
                          </th>
                        <?php endif; ?>
                      <?php endif; ?>
                    <!-- jika array $status kosong maka kita tuliskan sesuai 3 kondisi berikut -->
                    <?php else: ?>
                      <!-- jika waktu mulai belum terlewati hari sekarang (waktu terkini) maka... -->
                      <?php if ($column->Waktu_Mulai_tes > date('Y-m-d H:i:s')): ?>
                        <td><b>Belum Di Mulai</b></td>
                        <th>
                          <a class="isDisabled"  class="text-danger">Mulai</a>
                        </th>
                      <!-- jika waktu berakhir telah terlewati hari sekarang (watu terkini) maka... -->
                      <?php elseif($column->Waktu_Berakhir_tes < date('Y-m-d H:i:s')): ?>
                        <td><b>Berakhir, Anda Belum Mengerjakan</b></td>
                        <th>
                          <a class="isDisabled"  class="text-danger">Mulai</a>
                        </th>
                      <!-- jika hari ini atau waktu terkini terletak diantara waktu mulai dan berakhir maka... -->
                      <?php else: ?>
                        <td><b>Belum Mengerjakan</b></td>
                        <th>
                          <a href="<?php echo site_url('Tes_Pengayaan_Soal_Siswa/mulai_soal_pengayaan/'. $this->uri->segment('3') . '/' . $column->sesi_ke); ?>" class="text-danger">Mulai</a>
                        </th>
                      <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($nilai != array()): ?>
                      <!-- var $now menunjuk nilai awal pada array $status -->
                      <?php $now = current($nilai); ?>
                      <!-- cek apakah var $now tersebut menunjuk nilai NULL? -->
                      <?php if ($now): ?>
                        <!-- cek apakah id_Tes pada var $now sama dengan id pada var column? -->
                        <?php if ($now->id_Tes == $column->id):?>
                          <!-- jika sama, kita setting var $now menunjuk indeks berikutnya pada array $status -->
                          <td><b><?php echo $now->Nilai_Tes; $now = next($nilai);?></b></td>
                        <!-- jika tidak sama, maka kita tuliskan belum mengerjakan atau belum dimulai -->
                        <?php else: ?>
                          <td></td>
                        <?php endif; ?>
                      <!-- jika var $now tersebut menunjuk nilai NULL maka kita tuliskan belum mengerjakan atau belum dimulai -->
                      <?php else: ?>
                        <td></td>
                      <?php endif; ?>
                    <!-- jika array $status kosong maka kita tuliskan belum mengerjakan atau belum dimulai -->
                    <?php else: ?>
                      <td></td>
                    <?php endif; ?>
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
