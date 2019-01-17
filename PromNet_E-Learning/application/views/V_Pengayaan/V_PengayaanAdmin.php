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
                            <button class="subnavbtn">Tes Pengayaan  <i class="fa fa-caret-down"></i></button>
                            <div class="subnav-content">
                                <a title="Add Sesi" href="<?php echo site_url('C_PengayaanAdmin/V_PengayaanAdminTambah/'); ?>" class=" <?php if ($this->uri->segment(2) == 'V_PengayaanAdminTambah'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">Tambah tes Pengayaan</span></a>
                            </div>
                          </div> 
                        </div>
                        
                  
                      <table class="table table-bordered table-hover" align ="center">
                        <thead class="thead-dark">
                            <tr>
                              <th>No</th>
                              <th>id</th>
                              <th>Id Sesi</th>
                              <th>Judul</th>
                              <th>Durasi</th>
                              <th>Uraian</th>
                              <th>Waktu Mulai</th>
                              <th>Waktu Berakhir</th>
                              <th>Soal</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($tes_pengayaan as $column) { ?>
                          <tr class="table-primary">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $column->id; ?></td>
                            <td><?php echo $column->id_Sesi; ?></td>
                            <td><?php echo $column->Judul; ?></td>
                            <td><?php echo $column->Durasi; ?></td>
                            <td><?php echo $column->Uraian; ?></td>
                            <td><?php echo $column->Waktu_Mulai_tes; ?></td>
                            <td><?php echo $column->Waktu_Berakhir_tes; ?></td>
                             <th>
                                <a href="<?php echo site_url('C_matpel/soal_pengayaan/'.($column->id_Sesi)); ?>">Soal</a>
                            </th>
                             <td>
                              <a id="edit" href="#editdata" class="edit" data-toggle="modal"
                                data-id="<?php echo $column->id; ?>"
                                data-id_sesi="<?php echo $column->id_Sesi; ?>"
                                data-judul="<?php echo $column->Judul; ?>"
                                data-durasi="<?php echo $column->Durasi; ?>"
                                data-uraian="<?php echo $column->Uraian; ?>"
                                data-waktu_mulai_tes="<?php echo $column->Waktu_Mulai_tes; ?>"
                                data-waktu_berakhir_tes="<?php echo $column->Waktu_Berakhir_tes; ?>"
                              >
                                Edit
                              </a>
                              <a id="delete" href="#deletedata" class="delete" data-toggle="modal"
                                  data-id="<?php echo $column->id; ?>"
                                data-id_sesi="<?php echo $column->id_Sesi; ?>"
                                data-judul="<?php echo $column->Judul; ?>"
                                data-durasi="<?php echo $column->Durasi; ?>"
                                data-uraian="<?php echo $column->Uraian; ?>"
                                data-waktu_mulai_tes="<?php echo $column->Waktu_Mulai_tes; ?>"
                                data-waktu_berakhir_tes="<?php echo $column->Waktu_Berakhir_tes; ?>"
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

        <form action="<?php echo site_url('C_PengayaanAdmin/PengayaanAdminEdit'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Edit Tes Pengayaan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <input type="hidden" name="id" class="form-control" id="id" required>
            <div class="form-group">
              <label>ID Sesi:</label>
              <input type="txt" name="id_sesi" class="form-control" id="id_sesi" required>
            </div>
            <div class="form-group">
              <label>Judul:</label>
              <input type="txt" name="judul" class="form-control" id="judul" required>
            </div>
            <div class="form-group">
              <label>Durasi:</label>
              <input type="txt" name="durasi" class="form-control" id="durasi">
            </div>
            <div class="form-group">
              <label>Uraian:</label>
              <input type="txt" name="uraian" class="form-control" id="uraian">
            </div>
            <div class="form-group">
              <label>Waktu Mulai:</label>
              <input type="txt" name="waktu_mulai_tes" class="form-control" id="waktu_mulai_tes">
            </div>
            <div class="form-group">
              <label>Waktu Berakhir:</label>
              <input type="txt" name="waktu_berakhir_tes" class="form-control" id="waktu_berakhir_tes">
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

        <form action="<?php echo site_url('Pengayaan_Admin/PengayaanAdminDelete'); ?>" method="post">
        <!--<form id="form" enctype="multipart/form-data">-->
        <!--<form>-->
          <div class="modal-header">
            <h4 class="modal-title">Hapus Tes Pengayaan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>

          <div class="modal-body">
            <!--<div class="fetched-data"></div>-->
            <h3 class="text-danger" align="center">Apakah Anda yakin akan menghapus data berikut?</h3>

            <input type="hidden" name="no" class="form-control" id="no" required>
            <input type="hidden" name="id" class="form-control" id="id" required>

           <div class="form-group">
              <label>ID Sesi:</label>
              <input type="txt" name="id_sesi" class="form-control" id="id_sesi" required>
            </div>
            <div class="form-group">
              <label>Judul:</label>
              <input type="txt" name="judul" class="form-control" id="judul" required>
            </div>
            <div class="form-group">
              <label>Durasi:</label>
              <input type="txt" name="durasi" class="form-control" id="durasi">
            </div>
            <div class="form-group">
              <label>Uraian:</label>
              <input type="txt" name="uraian" class="form-control" id="uraian">
            </div>
            <div class="form-group">
              <label>Waktu Mulai:</label>
              <input type="txt" name="waktu_mulai_tes" class="form-control" id="waktu_mulai_tes">
            </div>
            <div class="form-group">
              <label>Waktu Berakhir:</label>
              <input type="txt" name="waktu_berakhir_tes" class="form-control" id="waktu_berakhir_tes">
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
        var id_sesi = $(this).data('id_sesi');
        var judul = $(this).data('judul');
        var durasi = $(this).data('durasi');
        var uraian = $(this).data('uraian');
        var waktu_mulai_tes = $(this).data('waktu_mulai_tes');
        var waktu_berakhir_tes = $(this).data('waktu_berakhir_tes');


        $(".modal-body #id").val(id);
        $(".modal-body #id_sesi").val(id_sesi);
        $(".modal-body #judul").val(judul);
        $(".modal-body #durasi").val(durasi);
        $(".modal-body #uraian").val(uraian);
        $(".modal-body #waktu_mulai_tes").val(waktu_mulai_tes);
        $(".modal-body #waktu_berakhir_tes").val(waktu_berakhir_tes);
    })
    $(document).on("click", "#delete", function() {
        var id = $(this).data('id');
        var id_sesi = $(this).data('id_sesi');
        var judul = $(this).data('judul');
        var durasi = $(this).data('durasi');
        var uraian = $(this).data('uraian');
        var waktu_mulai_tes = $(this).data('waktu_mulai_tes');
        var waktu_berakhir_tes = $(this).data('waktu_berakhir_tes');


        $(".modal-body #id").val(id);
        $(".modal-body #id_sesi").val(id_sesi);
        $(".modal-body #judul").val(judul);
        $(".modal-body #durasi").val(durasi);
        $(".modal-body #uraian").val(uraian);
        $(".modal-body #waktu_mulai_tes").val(waktu_mulai_tes);
        $(".modal-body #waktu_berakhir_tes").val(waktu_berakhir_tes);
    })
  </script> 

</body>

</html>

