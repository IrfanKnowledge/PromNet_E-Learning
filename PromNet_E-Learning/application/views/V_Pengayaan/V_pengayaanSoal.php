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
                      <h1 align ="center">Tes Pengayaan</h1>
                      <table class="table table-bordered table-hover" align ="center">
                        <thead class="thead-dark">
                            <tr>
                              <th>No</th>
                              <th>id</th>
                              <th>Id Tes Ketuntasan</th>
                              <th>No Soal</th>
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
                        <?php $no = 1; foreach ($tes_pengayaan_soal as $column) { ?>
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
                      <a href="#" class="btn btn-success" role="button">Tambah</a>
                </div>
            </div>
        </div>
    </div>
  </div>
 <?php $this->load->view('javascript.php'); ?>

  <script type="text/javascript">
    $(document).on("click", "#edit", function() {
       var id = $(this).data('id');
        var no_soal = $(this).data('no_soal');
        var pertanyaan = $(this).data('pertanyaan');
        var pilihan1 = $(this).data('pilihan1');
        var pilihan2 = $(this).data('pilihan2');
        var pilihan3 = $(this).data('pilihan3');
        var pilihan4 = $(this).data('pilihan4');
        var kunci_jawaban = $(this).data('kunci_jawaban');

        $(".modal-body #id").val(id);
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
        var no_soal = $(this).data('no_soal');
        var pertanyaan = $(this).data('pertanyaan');
        var pilihan1 = $(this).data('pilihan1');
        var pilihan2 = $(this).data('pilihan2');
        var pilihan3 = $(this).data('pilihan3');
        var pilihan4 = $(this).data('pilihan4');
        var kunci_jawaban = $(this).data('kunci_jawaban');

        $(".modal-body #id").val(id);
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
