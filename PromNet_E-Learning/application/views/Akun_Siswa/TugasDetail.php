<!doctype html>
<html class="no-js" lang="en">

<head>
  <?php $this->load->view('head.php') ?>
  <script>
      function setup() {
          document.getElementById('buttonid').addEventListener('click', openDialog);
          function openDialog() {
              document.getElementById('fileid').click();
          }
          document.getElementById('fileid').addEventListener('change', submitForm);
          function submitForm() {
              document.getElementById('formid').submit();
          }
      }
  </script>
</head>

<body onload="setup()">
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
                    $tugas_sesi_soal = (array) $tugas_sesi_soal;  //convert to Array agar bisa dibandingkan dengan nilai Integer

                    if (key_exists('0', $tugas_sesi_soal)) { // karena jika $tugas_sesi_soal = -1 di Controller, maka akan berubah menjadi Array([0] => -1)
                      $tugas_sesi_soal = -1;
                    }

                    if ($tugas_sesi_soal == -1) {
                      echo "<tr class='table-primary'><td colspan='5' align='center'><h3>Tugas, tidak tersedia.</h3></td></tr>";
                    }else{
                      $tugas_sesi_soal = (object) $tugas_sesi_soal; //convert to Object agar OOP Style
                  ?>
                    <tr class="table-primary">
                      <td><?php echo $no; ?></td>
                      <td><a href="#"></a> <?php echo $tugas_sesi_soal->soal; ?></td>
                      <td><a href="<?php echo site_url('Tugas_Sesi_Soal_Siswa/Download/' . $tugas_sesi_soal->file_soal) ?>" class="text-danger"><?php echo $tugas_sesi_soal->file_soal; ?></a></td>
                      <td><?php echo $tugas_sesi_soal->waktu_mulai_tugas; ?></td>
                      <td><?php echo $tugas_sesi_soal->waktu_deadline_tugas; ?></td>
                    </tr>
                  <?php
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

              <?php
                $tugas_sesi_soal = (array) $tugas_sesi_soal;

                if (key_exists('0', $tugas_sesi_soal)) { // karena jika $tugas_sesi_soal = -1 di Controller, maka akan berubah menjadi Array([0] => -1)
                  $tugas_sesi_soal = -1;
                }

                 if($tugas_sesi_soal != -1): $tugas_sesi_soal = (object) $tugas_sesi_soal; //convert to Object agar OOP Style
              ?>

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

                  <?php
                    $tugas_sesi_jawaban = (array) $tugas_sesi_jawaban;

                    if (key_exists('0', $tugas_sesi_jawaban)) { // karena jika $tugas_sesi_jawaban = -1 di Controller, maka akan berubah menjadi Array([0] => -1)
                      $tugas_sesi_jawaban = -1;
                    }

                    if ($tugas_sesi_jawaban != -1): $tugas_sesi_jawaban = (object) $tugas_sesi_jawaban; //convert to Object agar OOP Style
                  ?>

                    <?php if (isset($akses_pengumpulan) ): ?>
                          <?php if ($akses_pengumpulan == 1): //jika Siswa masih diberikan izin untuk mengirimkan tugas atau meng-edit tugas maka... ?>

                            <tbody>
                              <?php $no=1; echo form_open_multipart('Tugas_Sesi_Jawaban_Siswa/do_upload/' . $this->uri->segment(3) . '/' . $tugas_sesi_soal->id . '/' . $this->uri->segment(4), 'id="formid"'); ?>
                                <tr class="table-primary">
                                  <input type="hidden" name="update" value="1">
                                  <input type="hidden" name="id_jawaban" value="<?php echo $tugas_sesi_jawaban->id ?>">
                                  <input type="hidden" name="waktu_deadline_tugas" value="<?php echo $tugas_sesi_soal->waktu_deadline_tugas ?>">
                                  <td><?php echo $no; ?></td>
                                  <td><a href="<?php echo site_url('Tugas_Sesi_Jawaban_Siswa/Download/' . $tugas_sesi_jawaban->berkas_jawaban) ?>" class="text-danger"><?php echo $tugas_sesi_jawaban->berkas_jawaban; ?></a>

                                      <br><br>

                                      <div align="center">
                                        <input id='fileid' type="file" name="userfile" size="10" hidden/>
                                        <button id='buttonid' type="button" name="button" class="btn btn-primary">Edit</button>
                                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                      </div>
                                  </td>
                                  <td><textarea name="komentar_siswa" rows="4" cols="30"><?php echo $tugas_sesi_jawaban->komentar_siswa; ?></textarea></td>
                                  <td><?php echo $tugas_sesi_jawaban->komentar_guru; ?></td>
                                  <td align="center"><?php echo $tugas_sesi_jawaban->waktu_pengumpulan; ?></td>
                                  <td align="center" style="font-size: 20px"><b><?php echo $tugas_sesi_jawaban->status_pengumpulan; ?></b></td>
                                  <td><?php echo $tugas_sesi_jawaban->nilai_tugas; ?></td>
                                </tr>
                              </form>
                            </tbody>

                          <?php elseif($akses_pengumpulan == -1): //jika Siswa TIDAK DIZINKAN untuk mengirimkan tugas atau meng-edit tugas maka... ?>

                            <tbody>
                              <?php $no = 1;?>
                              <tr class="table-primary">
                                <td><?php echo $no; ?></td>
                                <td><?php echo $tugas_sesi_jawaban->berkas_jawaban; ?></td>
                                <td><?php echo $tugas_sesi_jawaban->komentar_siswa; ?></td>
                                <td><?php echo $tugas_sesi_jawaban->komentar_guru; ?></td>
                                <td align="center"><?php echo $tugas_sesi_jawaban->waktu_pengumpulan; ?></td>
                                <td align="center" style="font-size: 20px"><b><?php echo $tugas_sesi_jawaban->status_pengumpulan; ?></b></td>
                                <td><?php echo $tugas_sesi_jawaban->nilai_tugas; ?></td>
                              </tr>
                              <?php
                              ?>
                            </tbody>

                          <?php endif; ?>
                    <?php endif; ?>

                  <?php else: ?>
                    <?php if($status_dilarang_akses == 1): ?>

                      <tr class='table-primary'><td colspan='7' align='center'><h3>Waktu mulai tugas, belum dimulai.</h3></td></tr>

                    <?php else: ?>

                      <tbody>
                        <?php $no=1; echo form_open_multipart('Tugas_Sesi_Jawaban_Siswa/do_upload/' . $this->uri->segment(3) . '/' . $tugas_sesi_soal->id . '/' . $this->uri->segment(4)); ?>
                        <tr class="table-primary">
                          <input type="hidden" name="waktu_deadline_tugas" value="<?php echo $tugas_sesi_soal->waktu_deadline_tugas ?>">
                          <td><?php echo $no; ?></td>
                          <td><input type="file" name="userfile" size="10">
                            <br>
                            <input type="submit" value="kirim">
                          </td>
                          <td><textarea name="komentar_siswa" rows="4" cols="30"></textarea> </td>
                          <td></td>
                          <td></td>
                          <td align="center" style="font-size: 20px"><b>Belum<br>Mengumpulkan</b></td>
                          <td></td>
                        </tr>
                      </form>
                    </tbody>

                    <?php endif; ?>
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
