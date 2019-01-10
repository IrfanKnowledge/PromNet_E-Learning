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
                  <th>Pertanyaan</th>
                  <th>Benar</th>
                  <th>Salah</th>
                </tr>
              </thead>
              <tbody>
                <form id="form_tes" action="<?php echo site_url('Tes_Ketuntasan_Jawaban_Siswa/tes');?>" method="post">

                  <!-- jika data Soal Tidak ada, maka setting jumlah soal = 0 -->
                  <?php if (empty($tes_ketuntasan_soal)): ?>
                    <div id="jumlah_soal" jumlah_soal="0"></div>
                  <?php endif; ?>

                  <?php  $no = 1; foreach ($tes_ketuntasan_soal as $column) { ?>
                    <tr class="table-primary">

                      <div id="id_tes" id_tes="<?php echo $column->id_Tes?>"> </div>
                      <!-- Untuk memberikan data jumlah soal kepada javascript -->
                      <div id="jumlah_soal" jumlah_soal="<?php echo count($tes_ketuntasan_soal); ?>"></div>
                      <!-- Untuk memberikan data setiap id_Soal kepada javascript -->
                      <div id="<?php echo $no;?>"  name="<?php echo $column->id;?>"></div>

                      <td><?php echo $no; ?></td>
                      <td><?php echo $column->Pertanyaan; ?></td>

                      <!-- id benar dan salah sebagai pembeda pada javascript saat melakukan proses
                          autofill jawaban setiap kali merefresh halaman atau memuat halaman ini -->
                      <td><input id="benar<?php echo $no;?>" name="<?php echo $column->id;?>" type="radio"
                        <?php echo $column->pilihan1?> value="Benar"><br>
                      </td>
                      <td><input id="salah<?php echo $no;?>" name="<?php echo $column->id;?>" type="radio"
                        <?php echo $column->pilihan2?> value="Salah"><br>

                      </td>
                    </tr>
                    <?php
                    $no++;
                  }
                  ?>
              </tbody>
            </table>
            <div align ="center"> <input class="btn btn-info" role="button" type="submit" name="simpan" value="Submit"></div>
            <!-- untuk menampilkan error melalui javascript jika saat submit, soal masih kosong -->
            <div align ="center"> <h5 id="error"></h5> </div>

          </form>
          <!-- <?php //print_r($this->session->array_form);?> -->

        <!-- <div id="demo">

        </div>

        <div id="one"></div>
        <div id="two"></div>
        <div id="three"></div>
        <div id="four"></div>
        <div id="five"></div> -->

          </div>
      </div>
    </div>

      <!-- untuk memuat waktu tersisa dan di-hitung mundur  -->
      <div class="container fixed-bottom" style="position: fixed;">
        <div class="row">
          <div class="col-xl-9 col-lg-9 col-md-8 col-sm-6 col-4">
          </div>
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
            <div class="pos-f-t" style="width: 250px; bottom:0px">
              <nav class="navbar navbar-dark bg-dark">
                <h1 id="tempat_waktu_tersisa" style="color:white"></h1>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <!-- untuk mengambil nilai segment URL ke 3 misal MPK01 dan di kirim ke  AJAX -->
      <!-- dan untuk memuat script html dari hasil return AJAX ke div ini yaitu html untuk auto-pindah halaman -->
      <div id="selesai" name="<?php echo $this->uri->segment(3);?>"></div>

  </div>

  <!-- Edit Modal HTML -->
  <div id="modal_konfirmasi_submit" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <h5>Apakah anda sudah yakin?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button id="konfirmasi_ok" type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
          </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('javascript.php'); ?>

  <script type="text/javascript">
    $(window).load(function () {
      // mengubah data string dari nilai atribut 'jumlah_soal' menjadi integer
      // .. dan dimasukan ke dalam variable jumlah_soal
      var jumlah_soal = parseInt( $('#jumlah_soal').attr('jumlah_soal') );

      //deklarasi tipe data array
      var id_soal = [];

      //pengulangan untuk menambahkan element id setiap soal pada array id_soal
      for (var i = 0; i < jumlah_soal; i++) {
        //menambah element pada array dari urutan terakhir array
        id_soal.push( $('#'+(i+1)).attr('name') );
      }
      //console.log(id_soal);

      //aksi menggunakan ajax akan dilakukan jika jumlah soal tidak kosong atau nol (0)
      if (jumlah_soal != 0) {
        //mengirimkan data jumlah soal dan id setiap soal dengan tujuan memberi return
        //..data jawaban user di database, dan me-autofill-kan pada form setiap kali me-refresh halaman
        $.ajax({
          url:"http://localhost/PromNet_E-Learning/index.php/Tes_Ketuntasan_Jawaban_Siswa/Ambil_Jawaban",
          method:"post",
          data:{id_setiap_soal:id_soal},
          success:function(data){

            var $i = 1;
            jQuery.each(jQuery.parseJSON(data), function (Key, Value) {
              //$("#demo").append(Key + Value.Jawaban + " ");
              if (Value.Jawaban == "Benar") {
                $("#benar"+$i).attr("checked", "checked");
              }else if (Value.Jawaban == "Salah") {
                $("#salah"+$i).attr("checked", "checked");
              }
              $i++;
            })
            // console.log(jQuery.parseJSON(data));
          }
        });
      }

      //untuk autoupdate setiap jawaban setiap 10 detik
      var auto_update = setInterval(function () {
        var isi_form = $("form").serializeArray();
        //console.table(isi_form)
        $.ajax({
          url:"http://localhost/PromNet_E-Learning/index.php/Tes_Ketuntasan_Jawaban_Siswa/Ubah_Jawaban",
          method:"post",
          data:{array_form:isi_form}
          // success:function(data){
          //   // $("#demo").append('berhasil');
          // }
        });
      }, 10000);

      //untuk proses submit
      var isi_form

      $( "#form_tes" ).submit(function() {
        if ( jumlah_soal > 0) {
          if ($("#modal_konfirmasi_submit").modal() == false) {
            $("#modal_konfirmasi_submit").modal("show");
          }
        }else{
          $( "#error" ).text( "Soal tidak boleh kosong" ).show().fadeOut( 3000 );
        }
        event.preventDefault();
      });

      $('#konfirmasi_ok').click(function () {
        clearInterval(auto_update);
        //mengambil semua data form yang terisi
        var isi_form = $("form").serializeArray();
        //membuat form tidak dapat diakses atau dimanipulasi olehu user
        $("input").attr("disabled", true);
        //mengambil id_tes pada tes_ketuntasan saat ini
        var id_tes = $("#id_tes").attr("id_tes");
        //mengambil kd_mapel yang terdapat pada URL halaman ini
        var kd_mapel = $('#selesai').attr("name");
        $.ajax({
          url: "http://localhost/PromNet_E-Learning/index.php/Tes_Ketuntasan_Jawaban_Siswa/Submit",
          method: "post",
          data: {array_form:isi_form, id_tes:id_tes, kd_mapel:kd_mapel},
          success: function (data) {
            // console.log(data);
            $('#selesai').html(data);
          }
        })
      })


      // console.log(id_tes);
      // mengambil id_tes pada tes_ketuntasan ini
      var id_tes = $("#id_tes").attr("id_tes");
      $.ajax({
        url: "http://localhost/PromNet_E-Learning/index.php/Tes_Ketuntasan_Waktu_Siswa/Waktu_Mulai_Dan_Durasi_Soal",
        method: "post",
        data: {id_tes:id_tes},
        success: function (data) {
          //jQuery.parseJSON = fungsi untuk mengubah format JSON menjadi javascript
          //console.log(jQuery.parseJSON(data));
          var waktu_berakhir = jQuery.parseJSON(data)['Waktu_Berakhir'];
          //console.log(waktu_berakhir);

          //--------------------------Hitung Mundur Waktu Tersisa---------------------

          // format Date = Bulan-Tanggal-Tahun Jam-Menit-detik
          // Set the date we're counting down to
          var countDownDate = new Date(waktu_berakhir).getTime();

          // Update the count down every 1 second
          var x = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("tempat_waktu_tersisa").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
              //fungsi menghentikan perintah Waktu Hitung Mundur yang dimasukkan pada variable x
              clearInterval(x);

              //fungsi menghentikan perintah auto update jawaban setiap 10 detik yang dimasukkan pada variable auto_update
              //clearInterval(auto_update); ini tidak bisa kita hapus, karena tidak akan terdeteksi
              //console.log(clearInterval(auto_update));

              document.getElementById("tempat_waktu_tersisa").innerHTML = "Waktu Habis";

              //mengambil semua data form yang terisi
              var isi_form = $("form").serializeArray();
              //membuat form tidak dapat diakses atau dimanipulasi olehu user
              $("input").attr("disabled", true);
              //mengambil id_tes pada tes_ketuntasan saat ini
              var id_tes = $("#id_tes").attr("id_tes");
              //mengambil kd_mapel yang terdapat pada URL halaman ini
              var kd_mapel = $('#selesai').attr("name");
              $.ajax({
                url: "http://localhost/PromNet_E-Learning/index.php/Tes_Ketuntasan_Jawaban_Siswa/Submit",
                method: "post",
                data: {array_form:isi_form, id_tes:id_tes, kd_mapel:kd_mapel},
                success: function (data) {
                  // console.log(data);
                  $('#selesai').html(data);
                }
              })
            }
          }, 1000);
          //--------------------------Hitung Mundur Waktu Tersisa---------------------
        }
      });
    });

  </script>
</body>

</html>
