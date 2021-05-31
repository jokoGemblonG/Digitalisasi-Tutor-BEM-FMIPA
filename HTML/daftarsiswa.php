<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Siswa Baru | SMK Coding</title></head>
<body>
	<header>
		<h3>Siswa yang sudah mendaftar</h3>
	</header>
	
	<nav>
		<a href="form pendaftaran.php">[+] Tambah Baru</a>
	</nav>
	
	</br>
	
	<table border="1">
	<thead>
			<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>Sekolah Asal</th>
					<th>Tindakan</th>
			</tr>
	</thead>
	<tbody>
		<?php $query= pg_query("Select * from calonsiswa");
		while($siswa=pg_fetch_array($query)){
			echo"<tr>";
			echo"<td>".$siswa['id']."</td>";
			echo"<td>".$siswa['nama']."</td>";
			echo"<td>".$siswa['alamat']."</td>";
			echo"<td>".$siswa['jenis_kelamin']."</td>";
			echo"<td>".$siswa['sekolah_asal']."</td>";
			echo"<td>
			<a href='formedit.php?id=".$siswa['id']."'>Edit</a> | 
			<a href= 'hapus.php?id=".$siswa['id']."'>Hapus</a></td>";
			echo"</td>";
			echo"</tr>";}?>
			
		</tbody></table>
		<p>Total : <?php echo pg_num_rows($query) ?></p>
		</body></html>
