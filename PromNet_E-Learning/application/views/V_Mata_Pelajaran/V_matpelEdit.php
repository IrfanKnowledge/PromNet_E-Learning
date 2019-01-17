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
                      <h1 align ="center">Edit Mata Pelajaran</h1>
                      <table class="table table-bordered table-hover" align ="center">
                        <thead class="thead-dark">
                            <tr>
                              <th>No</th>
                              <th>id</th>
                              <th>Kode Mapel</th>
                              <th>Nama Mapel</th>
                              <th>Jam Pembelajaran</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($mata_pelajaran as $column) { ?>
                          <tr class="table-primary">
                            <td><?php echo $no; ?></td>
                            <td id="<?php echo $column->id; ?>"><?php echo $column->id; ?></td>
                            <td><?php echo $column->kd_Mapel; ?></td>
                            <td><?php echo $column->Nama_Mapel; ?></td>
                            <td><?php echo $column->Jam_Pembelajaran; ?></td>
                            <td>
                              <a id="edit" href="#editdata" class="edit" data-toggle="modal"
                                  data-id="<?php echo $column->id; ?>"
                                data-kd_mapel="<?php echo $column->kd_Mapel; ?>"
                                data-nama_mapel="<?php echo $column->Nama_Mapel; ?>"
                                data-jam_pembelajaran="<?php echo $column->Jam_Pembelajaran; ?>"
                              >
                                Edit
                              </a>
                              <a id="delete" href="#deletedata" class="delete" data-toggle="modal"
                                data-no="<?php echo $no; ?>"
                                data-id="<?php echo $column->id; ?>"
                                data-kd_mapel="<?php echo $column->kd_Mapel; ?>"
                                data-nama_mapel="<?php echo $column->Nama_Mapel; ?>"
                                data-jam_pembelajaran="<?php echo $column->Jam_Pembelajaran; ?>"
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

        <form action="<?php echo site_url('C_matpel/matpelEdit'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Edit Mata Pelajaran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <input type="hidden" name="id" class="form-control" id="id" required>
            <div class="form-group">
              <label>Kode Matpel:</label>
              <input type="txt" name="kd_Mapel" class="form-control" id="kd_mapel" required>
            </div>
            <div class="form-group">
              <label>Nama Matpel:</label>
              <input type="txt" name="Nama_Mapel" class="form-control" id="nama_mapel" required>
            </div>
            <div class="form-group">
              <label>Jam Pembelajaran:</label>
              <input type="txt" name="Jam_Pembelajaran" class="form-control" id="jam_pembelajaran">
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

        <form action="<?php echo site_url('C_matpel/matpelDelete'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Hapus Mata Pelajaran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <h3 class="text-danger" align="center">Apakah Anda yakin akan menghapus data berikut?</h3>

            <input type="hidden" name="no" class="form-control" id="no" required>
            <input type="hidden" name="id" class="form-control" id="id_2" required>
            <div class="form-group">
              <label>Kode Matpel:</label>
              <input type="txt" name="kd_Mapel" class="form-control" id="kd_Mapel" required>
            </div>
            <div class="form-group">
              <label>Nama Matpel:</label>
              <input type="txt" name="Nama_Mapel" class="form-control" id="Nama_Mapel" required>
            </div>
            <div class="form-group">
              <label>Jam Pembelajaran:</label>
              <input type="txt" name="Jam_Pembelajaran" class="form-control" id="Jam_Pembelajaran" required>
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
        var kd_Mapel = $(this).data('kd_mapel');
        var Nama_Mapel = $(this).data('nama_mapel');
        var Jam_Pembelajaran = $(this).data('jam_pembelajaran');

        $(".modal-body #id").val(id);
        $(".modal-body #kd_mapel").val(kd_Mapel);
        $(".modal-body #nama_mapel").val(Nama_Mapel);
        $(".modal-body #jam_pembelajaran").val(Jam_Pembelajaran);
    })
    $(document).on("click", "#delete", function() {
        var no = $(this).data('no');
        var id = $(this).data('id');
        var kd_Mapel = $(this).data('kd_mapel');
        var Nama_Mapel = $(this).data('nama_mapel');
        var Jam_Pembelajaran = $(this).data('jam_pembelajaran');

        // console.log(no);
        // console.log(id);
        // console.log(kd_Mapel);
        // console.log(Nama_Mapel);
        // console.log(Jam_Pembelajaran);

        $(".modal-body #no").val(no);
        $(".modal-body #id_2").val(id);
        $(".modal-body #kd_Mapel").val(kd_Mapel);
        $(".modal-body #Nama_Mapel").val(Nama_Mapel);
        $(".modal-body #Jam_Pembelajaran").val(Jam_Pembelajaran);
    })
  </script>
</body>

</html>
