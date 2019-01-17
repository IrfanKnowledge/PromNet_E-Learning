
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


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                      <div class="navbar">
                          <div class="subnav">
                            <button class="subnavbtn">Sesi Pembelajaran  <i class="fa fa-caret-down"></i></button>
                            <div class="subnav-content">
                                  <a title="Add Sesi" href="<?php echo site_url('Sesi_Pembelajaran_Siswa/V_SesiTambah/'); ?>" class=" <?php if ($this->uri->segment(2) == 'V_SesiTambah'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">Tambah Sesi</span></a>
                                  <a href="<?php echo site_url('Sesi_Pembelajaran_Siswa/SesiEdit/'); ?>">Edit Sesi</a>
                            </div>
                          </div>
                        </div>

                      <table class="table table-bordered table-hover" align ="center">
                        <thead class="thead-dark">
                            <tr>
                              <th>No</th>
                              <th>id</th>
                              <th>ID Mata Pelajaran</th>
                              <th>Topik</th>
                              <th>Uraian</th>
                              <th>Konten1</th>
                              <th>Konten2</th>
                              <th>Konten3</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       <?php $no = 1; foreach ($sesi_pembelajaran as $column) { ?>
                        <tr class="table-primary">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $column->id; ?></td>
                          <td><?php echo $column->id_mapel; ?></td>
                          <td><?php echo $column->Topik; ?></td>
                          <td><?php echo $column->Uraian; ?></td>
                          <td><?php echo $column->Konten1; ?></td>
                          <td><?php echo $column->Konten2; ?></td>
                          <td><?php echo $column->Konten3; ?></td>
                          <td>
                              <a id="edit" href="#editdata" class="edit" data-toggle="modal"
                                data-id="<?php echo $column->id; ?>"
                                data-id_mapel="<?php echo $column->id_mapel; ?>"
                                data-topik="<?php echo $column->Topik; ?>"
                                data-uraian="<?php echo $column->Uraian; ?>"
                                data-konten1="<?php echo $column->Konten1; ?>"
                                data-konten2="<?php echo $column->Konten2; ?>"
                                data-konten3="<?php echo $column->Konten3; ?>"
                              >
                                Edit
                              </a>
                              <a id="delete" href="#deletedata" class="delete" data-toggle="modal"
                                data-id="<?php echo $column->id; ?>"
                                data-id_mapel="<?php echo $column->id_mapel; ?>"
                                data-topik="<?php echo $column->Topik; ?>"
                                data-uraian="<?php echo $column->Uraian; ?>"
                                data-konten1="<?php echo $column->Konten1; ?>"
                                data-konten2="<?php echo $column->Konten2; ?>"
                                data-konten3="<?php echo $column->Konten3; ?>"
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

        <form action="<?php echo site_url('Sesi_Pembelajaran_Siswa/SesiEdit'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Edit Sesi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <input type="hidden" name="id" class="form-control" id="id" required>
            <div class="form-group">
              <label>ID Mata Pelajaran:</label>
              <input type="txt" name="id_mapel" class="form-control" id="id_mapel" required>
            </div>
            <div class="form-group">
              <label>Topik:</label>
              <input type="txt" name="topik" class="form-control" id="topik" required>
            </div>
            <div class="form-group">
              <label>Uraian:</label>
              <input type="txt" name="uraian" class="form-control" id="uraian">
            </div>
            <div class="form-group">
              <label>Konten 1:</label>
              <input type="txt" name="konten1" class="form-control" id="konten1">
            </div>
            <div class="form-group">
              <label>Konten 2:</label>
              <input type="txt" name="konten2" class="form-control" id="konten2">
            </div>
            <div class="form-group">
              <label>Konten 2:</label>
              <input type="txt" name="konten3" class="form-control" id="konten3">
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

        <form action="<?php echo site_url('Sesi_Pembelajaran_Siswa/SesiDelete'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Hapus Sesi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <h3 class="text-danger" align="center">Apakah Anda yakin akan menghapus data berikut?</h3>

            <input type="hidden" name="no" class="form-control" id="no" required>
            <input type="hidden" name="id" class="form-control" id="id" required>
            <div class="form-group">
              <label>ID Mata Pelajaran:</label>
              <input type="txt" name="id_mapel" class="form-control" id="id_mapel" required>
            </div>
            <div class="form-group">
              <label>Topik:</label>
              <input type="txt" name="topik" class="form-control" id="topik" required>
            </div>
            <div class="form-group">
              <label>Uraian:</label>
              <input type="txt" name="uraian" class="form-control" id="uraian">
            </div>
            <div class="form-group">
              <label>Konten 1:</label>
              <input type="txt" name="konten1" class="form-control" id="konten1">
            </div>
            <div class="form-group">
              <label>Konten 2:</label>
              <input type="txt" name="konten2" class="form-control" id="konten2">
            </div>
            <div class="form-group">
              <label>Konten 2:</label>
              <input type="txt" name="konten3" class="form-control" id="konten3">
            </div>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>

          <div class="modal-footer">
            <input type="button" name = "Cancel_Data" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" name = "Simpan_Data" class="btn btn-danger" value="Delete">
          </div>

        </form>

      </div>
    </div>
  </div>

   <?php $this->load->view('javascript.php'); ?>

  <script type="text/javascript">
    $(document).on("click", "#edit", function() {
        var id = $(this).data('id');
        var id_mapel = $(this).data('id_mapel');
        var topik = $(this).data('topik');
        var uraian = $(this).data('uraian');
        var konten1 = $(this).data('konten1');
        var konten2 = $(this).data('konten2');
        var konten3 = $(this).data('konten3');

        $(".modal-body #id").val(id);
        $(".modal-body #id_mapel").val(id_mapel);
        $(".modal-body #topik").val(topik);
        $(".modal-body #uraian").val(uraian);
        $(".modal-body #konten1").val(konten1);
        $(".modal-body #konten2").val(konten2);
        $(".modal-body #konten3").val(konten3);
    })
    $(document).on("click", "#delete", function() {
        var id = $(this).data('id');
        var id_mapel = $(this).data('id_mapel');
        var topik = $(this).data('topik');
        var uraian = $(this).data('uraian');
        var konten1 = $(this).data('konten1');
        var konten2 = $(this).data('konten2');
        var konten3 = $(this).data('konten3');

        $(".modal-body #id").val(id);
        $(".modal-body #id_mapel").val(id_mapel);
        $(".modal-body #topik").val(topik);
        $(".modal-body #uraian").val(uraian);
        $(".modal-body #konten1").val(konten1);
        $(".modal-body #konten2").val(konten2);
        $(".modal-body #konten3").val(konten3);
    })
  </script>

</body>

</html>
