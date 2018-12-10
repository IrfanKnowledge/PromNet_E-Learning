<?php
/*==============syntax KOMENTAR==============*/
// 1. tanda /**/ untuk mengapit komentar
// 2. tanda // untuk membuat 1 baris disebelah kanan tanda // menjadi komentar

/*==============tentang Menampilkan==============*/
// 1. tanda echo untuk menampilkan
// 2. tanda print untuk menampilkan
// 3. tanda "" untuk mengapit text tetapi syntax tertentu tetap terdeteksi
//            (Khusus untuk Name_Space atau variable bawaan PHP tidak bisa
//             dan tidak bisa memanggil konstanta, harus tanpa tanda "")
//             Misal echo "<h1>Irfan </h1>"
// 4. tanda '' untuk mengapit text dan isinya auto string

/*==============tentang Variable==============*/
//1. tanda $ untuk membuat variable misal $coba = 50;
//2.

/*==============tentang Konstanta==============*/
//1. tanda define() merupakan fungsi constanta
//   misal define("irfan", 100); maka contanta irfan bernilai 100
//   dan panggil misal echo irfan maka hasilnya 100

/*==============tentang Function==============*/
// 1. dimulai dengan function
//    misal function Aritmatika ($nilaiX, $nilaiY, $Tugas){
//      if ($tugas == "+") {
//        $hasil = $nilaiX + $nilaiY;
//      }
//    }
//   Disarankan diawali huruf besar untuk membedakan dengan variable
//

/*==============tentang Include dan Require==============*/
// 1. tanda include 'nama_file' untuk memuat file tersebut;
//    Misal include 'index.php';
// 2. tanda require 'nama_file' untuk memuat file tersebut tetapi
//    jika tidak berhasil maka tidak akan mengeksekusi script berikutnya
// 3. tanda incluce_once 'nama_file' untuk memuat file secara 1 kali
// 4. tanda require_once 'nama_file' untuk memuat file secara 1 kali
//    jika tidak berhasil maka tidak akan mengeksekusi script berikutnya


/*==============tentang Array==============*/
// 1. array asosiatif atau alphabet misal $arrayName = array('no' => , '1');
// 2. array numeric $arrayName = array('index1', 'index2', 'index3');
// 3. array campuran yaitu berisi keduanya
// 4. fungsi var_dump("nama_variable")
//    untuk mengetahui tipe data dan jumlah karakter variable

/*==============tentang Get==============*/
// 1. mengambil nilai variable pada url setelah tanda ?
//    misal ?irfan=1234
//    maka ketika echo $_GET['irfan']; maka menampilkan 1234
//    misal diterapkan pada <a href="index.php?irfan=1234"></a>
//    atau penggunaan pada form html, dengan method GET

/*==============tentang Get==============*/
// 1. mengambil nilai pada form yang menggunakan method POST
//    misal untuk memanggilnya echo $_POST['irfan'];

/*==============tentang SESSION==============*/
// 1. session_start();
// 2. session_destroy();

?>

<!-- ==============tentang Form method GET dan POST============== -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>hallo</title>
  </head>
  <body>
    <?php
    if (isset($_GET['simpan'])) {
        echo $_GET['nama'];
    }
    echo "test";
    ?>

    <form action="catatan_php_1.php" method="get">
        NIM:<br>
        <input type="number" name="nim" placeholder="NIM">
        <br>
        Nama:<br>
        <input type="text" name="nama" placeholder="Nama">
        <br>
        <input  type="submit" name="simpan" value="Proses">
    </form>
    <a href="catatan_php_1.php?nama=irfan">test</a>
  </body>
</html>
