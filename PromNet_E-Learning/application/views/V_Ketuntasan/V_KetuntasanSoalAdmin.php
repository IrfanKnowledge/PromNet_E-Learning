<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php $this->load->view('head.php') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: blue;
}

.subnav-content {
  display: none;
  position: sticky;
  text-align: center;
  background-color: blue;
  width: 100%;
  z-index: 1;
}

.subnav-content a {
  float: center;
  color: white;
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

.subnav:hover .subnav-content {
  display: block;
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

                      <div class="navbar">
                          <div class="subnav">
                            <button class="subnavbtn">Soal Ketuntasan  <i class="fa fa-caret-down"></i></button>
                            <div class="subnav-content">
                                <a title="Add Sesi" href="<?php echo site_url('C_KetuntasanSoalAdmin2/V_KetuntasanSoalAdminTambah/'); ?>" class=" <?php if ($this->uri->segment(2) == 'V_KetuntasanSoalAdminTambah'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">Tambah Soal Ketuntasan</span></a>
                            </div>
                          </div>
                        </div>

                      <table class="table table-bordered table-hover" align ="center">
                        <thead class="thead-dark">
                            <tr>
                              <th>No</th>
                              <th>id</th>
                              <th>Id Tes Ketuntasan</th>
                              <th>No. Soal</th>
                              <th>Pertanyaan</th>
                              <th>Pilihan 1</th>
                              <th>Pilihan 2</th>
                              <th>Pilihan 3</th>
                              <th>Pilihan 4</th>
                              <th>Kunci Jawaban</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($tes_ketuntasan_soal as $column) { ?>
                          <tr class="table-primary">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $column->id; ?></td>
                            <td><?php echo $column->id_Tes; ?></td>
                            <td><?php echo $column->No_Soal; ?></td>
                            <td><?php echo $column->Pertanyaan; ?></td>
                            <td><?php echo $column->pilihan1; ?></td>
                            <td><?php echo $column->pilihan2; ?></td>
                            <td><?php echo $column->pilihan3; ?></td>
                            <td><?php echo $column->pilihan4; ?></td>
                            <td><?php echo $column->Kunci_Jawaban; ?></td>
                             <td>
                              <a id="edit" href="#editdata" class="edit" data-toggle="modal"
                                data-id="<?php echo $column->id; ?>"
                                data-id_tes="<?php echo $column->id_Tes; ?>"
                                data-no_soal="<?php echo $column->No_Soal; ?>"
                                data-pertanyaan="<?php echo $column->Pertanyaan; ?>"
                                data-pilihan1="<?php echo $column->pilihan1; ?>"
                                data-pilihan2="<?php echo $column->pilihan2; ?>"
                                data-pilihan3="<?php echo $column->pilihan3; ?>"
                                data-pilihan4="<?php echo $column->pilihan4; ?>"
                                data-kunci_jawaban="<?php echo $column->Kunci_Jawaban; ?>"
                              >
                                Edit
                              </a>
                              <a id="delete" href="#deletedata" class="delete" data-toggle="modal"
                                data-no="<?php echo $no; ?>"
                                data-id="<?php echo $column->id; ?>"
                                 data-id_tes="<?php echo $column->id_Tes; ?>"
                                data-no_soal="<?php echo $column->No_Soal; ?>"
                                data-pertanyaan="<?php echo $column->Pertanyaan; ?>"
                                data-pilihan1="<?php echo $column->pilihan1; ?>"
                                data-pilihan2="<?php echo $column->pilihan2; ?>"
                                data-pilihan3="<?php echo $column->pilihan3; ?>"
                                data-pilihan4="<?php echo $column->pilihan4; ?>"
                                data-kunci_jawaban="<?php echo $column->Kunci_Jawaban; ?>"
                              >
                                Delete
                              </a>
                            </td>

                          </tr>
                        <?php
                          $no++;
                          }
                        ?>
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
  </div>

 <!-- Edit Modal HTML -->
  <div id="editdata" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="<?php echo site_url('C_KetuntasanSoalAdmin2/KetuntasanSoalAdminEdit'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Edit Soal Ketuntasan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <input type="hidden" name="id" class="form-control" id="id" required>
            <div class="form-group">
              <label>ID Tes Ketuntasan:</label>
              <input type="txt" name="id_tes" class="form-control" id="id_tes" required>
            </div>
            <div class="form-group">
              <label>No. Soal:</label>
              <input type="txt" name="no_soal" class="form-control" id="no_soal" required>
            </div>
            <div class="form-group">
              <label>Pertanyaan:</label>
              <input type="txt" name="pertanyaan" class="form-control" id="pertanyaan">
            </div>
            <div class="form-group">
              <label>Pilihan 1:</label>
              <input type="txt" name="pilihan1" class="form-control" id="pilihan1">
            </div>
            <div class="form-group">
              <label>Pilihan 2:</label>
              <input type="txt" name="pilihan2" class="form-control" id="pilihan2">
            </div>
            <div class="form-group">
              <label>Pilihan 3:</label>
              <input type="txt" name="pilihan3" class="form-control" id="pilihan3">
            </div>
             <div class="form-group">
              <label>Pilihan 4:</label>
              <input type="txt" name="pilihan4" class="form-control" id="pilihan4">
            </div>
             <div class="form-group">
              <label>Kunci Jawaban:</label>
              <input type="txt" name="kunci_jawaban" class="form-control" id="kunci_jawaban">
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



 <!-- Delete Modal HTML -->
  <div id="deletedata" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="<?php echo site_url('C_KetuntasanSoalAdmin2/KetuntasanSoalAdminDelete'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Hapus Tes Ketuntasan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <h3 class="text-danger" align="center">Apakah Anda yakin akan menghapus data berikut?</h3>

            <input type="hidden" name="no" class="form-control" id="no" required>
            <input type="hidden" name="id" class="form-control" id="id" required>

           <div class="form-group">
              <label>ID Tes Ketuntasan:</label>
              <input type="txt" name="id_tes" class="form-control" id="id_tes" required>
            </div>
            <div class="form-group">
              <label>No. Soal:</label>
              <input type="txt" name="no_soal" class="form-control" id="no_soal" required>
            </div>
            <div class="form-group">
              <label>Pertanyaan:</label>
              <input type="txt" name="pertanyaan" class="form-control" id="pertanyaan">
            </div>
            <div class="form-group">
              <label>Pilihan 1:</label>
              <input type="txt" name="pilihan1" class="form-control" id="pilihan1">
            </div>
            <div class="form-group">
              <label>Pilihan 2:</label>
              <input type="txt" name="pilihan2" class="form-control" id="pilihan2">
            </div>
            <div class="form-group">
              <label>Pilihan 3:</label>
              <input type="txt" name="pilihan3" class="form-control" id="pilihan3">
            </div>
             <div class="form-group">
              <label>Pilihan 4:</label>
              <input type="txt" name="pilihan4" class="form-control" id="pilihan4">
            </div>
             <div class="form-group">
              <label>Kunci Jawaban:</label>
              <input type="txt" name="kunci_jawaban" class="form-control" id="kunci_jawaban">
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
         var id_tes = $(this).data('id_tes');
        var no_soal = $(this).data('no_soal');
        var pertanyaan = $(this).data('pertanyaan');
        var pilihan1 = $(this).data('pilihan1');
        var pilihan2 = $(this).data('pilihan2');
        var pilihan3 = $(this).data('pilihan3');
        var pilihan4 = $(this).data('pilihan4');
        var kunci_jawaban = $(this).data('kunci_jawaban');

        $(".modal-body #id").val(id);
        $(".modal-body #id_tes").val(id_tes);
        $(".modal-body #no_soal").val(no_soal);
        $(".modal-body #pertanyaan").val(pertanyaan);
        $(".modal-body #pilihan1").val(pilihan1);
        $(".modal-body #pilihan2").val(pilihan2);
        $(".modal-body #pilihan3").val(pilihan3);
        $(".modal-body #pilihan4").val(pilihan4);
        $(".modal-body #kunci_jawaban").val(kunci_jawaban);
    })
    $(document).on("click", "#delete", function() {
        var id = $(this).data('id');
        var id_tes = $(this).data('id_tes');
        var no_soal = $(this).data('no_soal');
        var pertanyaan = $(this).data('pertanyaan');
        var pilihan1 = $(this).data('pilihan1');
        var pilihan2 = $(this).data('pilihan2');
        var pilihan3 = $(this).data('pilihan3');
        var pilihan4 = $(this).data('pilihan4');
        var kunci_jawaban = $(this).data('kunci_jawaban');

        $(".modal-body #id").val(id);
        $(".modal-body #id_tes").val(id_tes);
        $(".modal-body #no_soal").val(no_soal);
        $(".modal-body #pertanyaan").val(pertanyaan);
        $(".modal-body #pilihan1").val(pilihan1);
        $(".modal-body #pilihan2").val(pilihan2);
        $(".modal-body #pilihan3").val(pilihan3);
        $(".modal-body #pilihan4").val(pilihan4);
        $(".modal-body #kunci_jawaban").val(kunci_jawaban);
    })
  </script>

</body>

</html>
