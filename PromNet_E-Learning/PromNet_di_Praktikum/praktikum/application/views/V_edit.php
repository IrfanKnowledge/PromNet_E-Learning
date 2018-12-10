<!DOCTYPE html>
<html>
<head>
	<title>Praktikum</title>
</head>
<body>
	<h2>EDIT DATA MAHASISWA</h2>

	<!-- form inputan untuk merubah data pada database -->
	<form action="<?php echo site_url('C_mahasiswa/update/'.$mahasiswa['id']); ?>" method="POST">
		<!-- membaca data sebelumnya yang sudah ada di database -->
		<input type="text" name="nim" value="<?php echo $mahasiswa['nim']; ?>" >			
		<input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>" >			
		<input type="text" name="angkatan" value="<?php echo $mahasiswa['angkatan']; ?>" >			
		
		<!-- tombol submit berfungsi untuk memproses data yang akan dirubah sesuai dengan inputan -->
		<button type="submit">EDIT</button>	
	</form>

	<br/>
	<br/>



</body>
</html>