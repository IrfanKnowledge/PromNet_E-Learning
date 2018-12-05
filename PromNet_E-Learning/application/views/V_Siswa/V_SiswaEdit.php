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
                      <h1 align ="center">Edit Siswa</h1>
                      <table class="table table-bordered table-hover" align ="center">
                        <thead class="thead-dark">
                            <tr>
                              <th>No</th>
                              <th>id</th>
                              <th>NIS</th>
                              <th>Nama</th>
                              <th>Password</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($siswa as $column) { ?>
                          <tr class="table-primary">
                            <td><?php echo $no; ?></td>
                            <td id="<?php echo $column->id; ?>"><?php echo $column->id; ?></td>
                            <td><?php echo $column->NIS; ?></td>
                            <td><?php echo $column->Nama; ?></td>
                            <td><?php echo $column->Password; ?></td>
                            <td>
                              <a id="edit" href="#editdata" class="edit" data-toggle="modal"
                                data-id="<?php echo $column->id; ?>"
                                data-nis="<?php echo $column->NIS; ?>"
                                data-nama="<?php echo $column->Nama; ?>"
                              >
                                Edit
                              </a>
                              <a id="delete" href="#deletedata" class="delete" data-toggle="modal"
                                data-no="<?php echo $no; ?>"
                                data-id="<?php echo $column->id; ?>"
                                data-nis="<?php echo $column->NIS; ?>"
                                data-nama="<?php echo $column->Nama; ?>"
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

        <form action="<?php echo site_url('Siswa/SiswaEdit'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Edit Siswa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <input type="hidden" name="id" class="form-control" id="id" required>
            <div class="form-group">
              <label>NIS:</label>
              <input type="txt" name="nis" class="form-control" id="nis" required>
            </div>
            <div class="form-group">
              <label>Nama:</label>
              <input type="txt" name="nama" class="form-control" id="nama" required>
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

  <!-- Delete Modal HTML -->
  <div id="deletedata" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <form action="<?php echo site_url('Siswa/SiswaDelete'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Hapus Siswa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <h3 class="text-danger" align="center">Apakah Anda yakin akan menghapus data berikut?</h3>

            <input type="hidden" name="no" class="form-control" id="no" required>
            <input type="hidden" name="id" class="form-control" id="id" required>
            <div class="form-group">
              <label>NIS:</label>
              <input type="txt" name="nis" class="form-control" id="nis" required>
            </div>
            <div class="form-group">
              <label>Nama:</label>
              <input type="txt" name="nama" class="form-control" id="nama" required>
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
        var nis = $(this).data('nis');
        var nama = $(this).data('nama');

        $(".modal-body #id").val(id);
        $(".modal-body #nis").val(nis);
        $(".modal-body #nama").val(nama);
    })
    $(document).on("click", "#delete", function() {
        var no = $(this).data('no');
        var id = $(this).data('id');
        var nis = $(this).data('nis');
        var nama = $(this).data('nama');

        $(".modal-body #no").val(no);
        $(".modal-body #id").val(id);
        $(".modal-body #nis").val(nis);
        $(".modal-body #nama").val(nama);
    })
  </script>
</body>

</html>
