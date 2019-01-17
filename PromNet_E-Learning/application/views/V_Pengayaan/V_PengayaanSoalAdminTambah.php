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
                                <a title="Add Pengayaan" href="<?php echo site_url('C_PengayaanSoalAdmin2/V_PengayaanSoalAdminTambah/'); ?>" class=" <?php if ($this->uri->segment(2) == 'V_PengayaanSoalAdminTambah'){ ?> text-white bg-primary <?php } ?>"><span class="mini-sub-pro">Tambah Pengayaan</span></a>
                            </div>
                          </div> 
                        </div>
                        
                        <!-- Edit Modal HTML -->
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form action="<?php echo site_url('C_PengayaanSoalAdmin2/PengayaanSoalAdminTambah');?>" method="POST">


                                  <div class="modal-header">
                                      <h4 class="modal-title">Tambah Tes Pengayaan</h4>
                                        <?php if ($status == 1) {?>
                                          <?php for ($i=0; $i < 5; $i++) { ?>
                                            &nbsp;
                                          <?php } ?>
                                        <h4 class="modal-title text-success">Data Telah Ditambahkan!</h4>
                                        <?php } ?>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><a href="<?php echo site_url('C_PengayaanSoalAdmin2/V_PengayaanSoalAdminTambah') ?>">&times;</a></button>
                                  </div>

                                <div class="modal-body">
                                  <div class="form-group">
                                <label>ID Tes Pengayaan:</label>
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
                                  <a href="<?php echo site_url('C_PengayaanSoalAdmin2/V_PengayaanSoalAdminTambah') ?>"><input type="button" class="btn btn-default" data-dismiss="modal" value="Batal"></a>
                                  <input type="submit" class="btn btn-success" value="Tambah">
                                </div>

                              </form>

                            </div>
                          </div>
                    </div>
                </div>
            </div>
  </div>
  <?php $this->load->view('javascript.php'); ?>
</body>

</html>
