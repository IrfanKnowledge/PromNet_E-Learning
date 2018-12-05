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
                        <h1 align ="center">Tambah Siswa</h1>
                        <!-- Edit Modal HTML -->
                      		<div class="modal-dialog">
                      			<div class="modal-content">
                      				<form action="<?php echo site_url('Siswa/SiswaTambah');?>" method="POST">


                                  <div class="modal-header">
                                      <h4 class="modal-title">Tambah Siswa</h4>
                                        <?php if ($status == 1) {?>
                                          <?php for ($i=0; $i < 5; $i++) { ?>
                                            &nbsp;
                                          <?php } ?>
                                        <h4 class="modal-title text-success">Data Telah Ditambahkan!</h4>
                                        <?php } ?>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><a href="<?php echo site_url('Siswa/V_SiswaTambah') ?>">&times;</a></button>
                                  </div>

                      					<div class="modal-body">
                      						<div class="form-group">
                                    <div class="form-group">
                                      <label>NIS</label>
                                      <input name="nis" type="text" class="form-control" required>
                                    </div>
                      							<label>Nama</label>
                      							<input name="nama" type="text" class="form-control" required>
                      						</div>
                      						<div class="form-group">
                      							<label>Password</label>
                      							<input name="password" type="password" class="form-control" required>
                      						</div>
                      					</div>

                      					<div class="modal-footer">
                      						<a href="<?php echo site_url('Siswa/V_SiswaTambah') ?>"><input type="button" class="btn btn-default" data-dismiss="modal" value="Batal"></a>
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
