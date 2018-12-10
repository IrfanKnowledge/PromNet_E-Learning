<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>I.M.F</title>
  </head>
  <body>
      <h1>INSERT RECORD TABLE DATA MAHASISWA</h1>

      <table cellpadding="10px" cellspacing="0px" border="1px" bordercolor="black" align = "center">
        <form action="<?php site_url('C_Mahasiswa/insert') ?>" method="post">
        <tr>
          <td>NIM:</td>
          <td><input type="text" name="nim" value=""></td>
        </tr>
        <tr>
          <td>Nama:</td>
          <td><input type="text" name="nama" value=""></td>
        </tr>
        <tr>
          <td>Angkatan</td>
          <td><input type="text" name="angkatan" value=""></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="simpan_data" value="simpan"></td>
        </tr>
        </form>
      </table>

      <h1>MENAMPILKAN TABLE DATA MAHASISWA</h1>

      <table cellpadding="10px" cellspacing="0px" border="1px" bordercolor="black" align = "center">
        <tr>
          <td>NIM</td>
          <td>Nama</td>
          <td>Angkatan</td>
          <td colspan="2">Action</td>
        </tr>
      </table>

  </body>
</html>
