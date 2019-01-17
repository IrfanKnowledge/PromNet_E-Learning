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


                </table>

            </div>
        </div>
      </div>
  </div>


  <?php $this->load->view('javascript.php'); ?>
</body>

</html>
