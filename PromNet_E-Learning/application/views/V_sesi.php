
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
                              <th>id_mapel</th>
                              <th>Sesi Ke-</th>
                              <th>Topik</th>
                              <th>Uraian</th>
                              <th>Konten1</th>
                              <th>Konten2</th>
                              <th>Konten3</th>
                              <th>Tes Ketuntasan</th>
                              <th>Tes Pengayaan</th>
                              <th>Tugas</th>
                            </tr>
                        </thead>
                        <tbody>
                       <?php $no = 1; foreach ($Sesi_Pembelajaran as $column) { ?>
                        <tr class="table-primary">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $column->id; ?></td>
                          <td><?php echo $column->id_mapel; ?></td>
                          <td><?php echo $column->Sesi_Ke; ?></td>
                          <td><?php echo $column->Topik; ?></td>
                          <td><?php echo $column->Uraian; ?></td>
                          <td><a href="<?php echo site_url('C_matpel/Download/'. $column->Konten1) ?>" class="text-danger"><?php echo $column->Konten1; ?></a></td>
                          <td><?php echo $column->Konten2; ?></td>
                          <td><?php echo $column->Konten3; ?></td>


                         <th>
                            <a href="<?php echo site_url('C_matpel/Ketuntasan/'.($column->id)); ?>">Ketuntasan</a>
                        </th>
                         <th>
                            <a href="<?php echo site_url('C_matpel/Pengayaan/'.($column->id)); ?>">Pengayaan</a>
                        </th>
                        <th>
                          <a href="<?php echo site_url('C_matpel/Tugas/'.($column->id)); ?>">Tugas</a>
                        </th>

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

</body>

</html>
