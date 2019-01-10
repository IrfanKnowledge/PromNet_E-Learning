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

              <h1 align ="center"><?php if (!empty($nama_mapel)){  echo $nama_mapel->nama_mapel; }?></h1>

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
                      foreach ($tugas_sesi_soal as $column) {
                  ?>
                    <tr class="table-primary">
                  <form class="" action="<?php  echo site_url('Tugas_Sesi_Soal_Siswa/Ngetest'); ?>" method="post">
                      <td><?php echo $no; ?></td>
                      <td><a href="<?php echo site_url('Tugas_Sesi_Jawaban_Siswa/index/' . $this->uri->segment(3) . '/' . $column->sesi_ke) ?>" class="text-danger"><?php echo $column->soal; ?></a></td>
                      <td><a href="<?php echo site_url('Tugas_Sesi_Soal_Siswa/Download/' . $column->file_soal) ?>" class="text-danger"><?php echo $column->file_soal; ?></a></td>
                      <td><?php echo $column->waktu_mulai_tugas; ?></td>
                      <td><?php echo $column->waktu_deadline_tugas; ?></td>
                    </tr>
                  </form>

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

  <!-- Edit Modal HTML -->
  <div id="adddata" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="<?php echo site_url('Admin/AdminEdit'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Edit Admin</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <input type="hidden" name="id" class="form-control" id="id" required>
            <div class="form-group">
              <label>Nama:</label>
              <input type="txt" name="nama" class="form-control" id="nama" required>
            </div>
            <div class="form-group">
              <label>Username:</label>
              <input type="txt" name="username" class="form-control" id="username" required>
            </div>
            <div class="form-group">
              <label>Password:</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>

          <div class="modal-footer">
            <input type="button" name = "Cancel_Data" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" name = "Simpan_Data" class="btn btn-danger" value="Simpan">
          </div>

        </form>

      </div>
    </div>
  </div>

  <?php $this->load->view('javascript.php'); ?>

  <script type="text/javascript">
    $(document).on("click", "#edit", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var username = $(this).data('username');
        var password = $(this).data('password');

        $(".modal-body #id").val(id);
        $(".modal-body #nama").val(nama);
        $(".modal-body #username").val(username);
    })
    $(document).on("click", "#delete", function() {
        var no = $(this).data('no');
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var username = $(this).data('username');
        var password = $(this).data('password');

        $(".modal-body #no").val(no);
        $(".modal-body #id").val(id);
        $(".modal-body #nama").val(nama);
        $(".modal-body #username").val(username);
    })
  </script>
</body>

</html>
