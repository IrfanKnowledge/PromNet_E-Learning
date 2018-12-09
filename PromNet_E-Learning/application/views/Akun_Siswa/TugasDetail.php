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
                  <?php
                    $no = 1;
                    if ($tugas_sesi_soal == -1) {
                      echo "<tr class='table-primary'><td colspan='5' align='center'><h3>Tugas, tidak tersedia.</h3></td></tr>";
                    }else{
                      foreach ($tugas_sesi_soal as $column) { ?>
                    <tr class="table-primary">
                      <td><?php echo $no; ?></td>
                      <td><a href="#"></a> <?php echo $column->soal; ?></td>
                      <td><a href="<?php echo site_url('Tugas_Sesi_Soal_Siswa/Download/' . $column->file_soal) ?>" class="text-danger"><?php echo $column->file_soal; ?></a></td>
                      <td><?php echo $column->waktu_mulai_tugas; ?></td>
                      <td><?php echo $column->waktu_deadline_tugas; ?></td>
                    </tr>
                  <?php
                      $no++;
                      }
                    }
                  ?>
                </tbody>
              </table>

              <br><br>

              <?php
                if (isset($status)):
              ?>
                <?php if ($this->uri->segment(5) == 'status_error'): ?>
                  <h1 align="center" class="text-danger"><?php echo $status; ?></h1>
                <?php elseif($this->uri->segment(5) == 'status_berhasil'): ?>
                  <h1 align="center" class="text-success"><?php echo $status; ?></h1>
                <?php endif; ?>
                <br>
              <?php endif; ?>

              <?php if ($tugas_sesi_soal != -1): ?>

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
                          <td><?php echo $column->berkas_jawaban; ?> <br><br>
                            <div align="center">
                              <a href="#edit" align="right" class="text-light"><button type="button" name="button_edit" class="btn btn-primary">Edit</button></a>
                              <a href="#ok" align="right" class="text-light"><button type="button" name="button_ok" class="btn btn-primary">OK</button></a>
                            </div>
                          </td>
                          <td><textarea name="komentar_siswa" rows="8" cols="40"><?php echo $column->komentar_siswa; ?></textarea></td>
                          <td><?php echo $column->komentar_guru; ?></td>
                          <td><?php echo $column->waktu_pengumpulan; ?></td>
                          <td><?php echo $column->status_pengumpulan; ?></td>
                          <td><?php echo $column->nilai_tugas; ?></td>
                        </tr>
                        <?php
                        $no++;
                      }
                      ?>
                    </tbody>
                  <?php else: ?>
                    <tbody>
                      <?php $no=1; echo form_open_multipart('Tugas_Sesi_Jawaban_Siswa/do_upload/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)); ?>
                      <tr class="table-primary">
                        <input type="hidden" name="waktu_deadline_tugas" value="<?php echo $column->waktu_deadline_tugas ?>">
                        <td><?php echo $no; ?></td>
                        <td><input type="file" name="userfile" size="10">
                          <br>
                          <input type="submit" value="kirim">
                        </td>
                        <td><textarea name="komentar_siswa" rows="8" cols="40"></textarea> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </form>
                  </tbody>
                  <?php $no++; endif; ?>

                </table>

              <?php endif; ?>

            </div>
        </div>
      </div>
  </div>


  <?php $this->load->view('javascript.php'); ?>
</body>

</html>
