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
                    <th>Soal</th>
                    <th>File</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Deadline</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($tugas_sesi_soal as $column) { ?>
                    <tr class="table-primary">
                      <td><?php echo $no; ?></td>
                      <td><a href="#adddata"></a> <?php echo $column->soal; ?></td>
                      <td><a href="<?php echo site_url('Tugas_Sesi_Soal_Siswa/Download/' . $column->file_soal) ?>"><?php echo $column->file_soal; ?></a></td>
                      <td><?php echo $column->waktu_mulai_tugas; ?></td>
                      <td><?php echo $column->waktu_deadline_tugas; ?></td>
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
                      <th>Berkas Jawaban</th>
                      <th>Komentar Siswa</th>
                      <th>Komentar Guru</th>
                      <th>Waktu Pengumpulan</th>
                      <th>Status Pengumpulan</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>

                  <?php if (!empty($tugas_sesi_jawaban)):?>
                    <tbody>
                      <?php $no = 1; foreach ($tugas_sesi_jawaban as $column) { ?>
                        <tr class="table-primary">
                          <td><?php echo $no; ?></td>
                          <td><a href="#adddata"></a> <?php echo $column->soal; ?></td>
                          <td><a href="<?php echo site_url('Tugas_Sesi_Soal_Siswa/Download/' . $column->file_soal) ?>"><?php echo $column->file_soal; ?></a></td>
                          <td><?php echo $column->waktu_mulai_tugas; ?></td>
                          <td><?php echo $column->waktu_deadline_tugas; ?></td>
                        </tr>
                      <?php
                        $no++;
                        }
                      ?>
                    </tbody>
                  <?php else: ?>
                    <tbody>
                      <?php echo form_open_multipart('Tugas_Sesi_Jawaban_Siswa/do_upload/' . $this->uri->segment(3));?>
                        <tr class="table-primary">
                          <td><input type="file" name="userfile" size="20" /></td>
                          <td><input type="submit" value="upload"/></td>
                          <td><textarea name="komentar_siswa" rows="8" cols="40"></textarea> </td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </form>
                    </tbody>
                      <?php endif; ?>

                </table>

            </div>
        </div>
      </div>
  </div>


  <?php $this->load->view('javascript.php'); ?>
</body>

</html>
