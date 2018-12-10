<!DOCTYPE html>
<html>
<head>
	<title>Praktikum</title>
</head>
<body>

	<!-- menambah data mahasiswa -->
	<h2>MENAMBAH DATA MAHASISWA</h2>
	<form action="<?php echo site_url('C_mahasiswa/insert'); ?>" method="POST">
		<input type="text" name="nim" placeholder="NIM">
		<input type="text" name="nama" placeholder="NAMA">
		<input type="text" name="angkatan" placeholder="ANGKATAN">
		<button type="submit">TAMBAH DATA</button>
	</form>

	<br/>
	<br/>

	<!-- menampilkan seluruh data mahasiswa -->
	<h2>MENAMPILKAN TABLE DATA MAHASISWA</h2>
	<TABLE border="1" width="50%">
		<thead>
			<tr>
				<th>NIM</th>
				<th>NAMA</th>
				<th>ANGKATAN</th>
				<th colspan="2">ACTION</th>
			</tr>
		</thead>

		<tbody>
		<!-- CARA1 -->
		<?php
			foreach ($mahasiswa as $key) {


		?>
			<tr>

				<th><?php echo $key->nim; ?></th>
				<th><?php echo $key->nama; ?></th>
				<th><?php echo $key->angkatan; ?></th>


				<th>
					<!-- tombol untuk menuju form edit -->
					<a href="<?php echo site_url('C_mahasiswa/fedit/'. $key->id); ?>">EDIT</a>
				</th>
				<th>
					<!-- tombol untuk menghapus data mahasiswa -->
					<a href="<?php echo site_url('C_mahasiswa/delete/'. $key->id); ?>">DELETE</a>
				</th>
			</tr>
			<?php
			}


		?>
		</tbody>
	</TABLE>


</body>
</html>
