<?php
session_start();
$idtutor = $_SESSION['idtutor'];
if(!isset($_SESSION['submit'])){
	header("Location: login.php");
	exit;
	}
include('config.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title> Tutor Bem FMIPA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<header>
		<h4 style='padding: 3px'> SITUS TERPADU </h4>
		<h2 style='padding: 3px'> Tutor BEM FMIPA </h2>	
	</header>
	
	<nav class= "navbar navbar-inverse">
	<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index2.php">My Home</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="logout.php"> Logout</a></li>
		</ul>
	  </div>
	 </nav>
	
	<div class="container table-responsive p-0">
		<table class="table" border="2">
		<thead>
			<tr>
				<th style='text-align:center'>ID Kelas</th>
				<th style='text-align:center'>Hari</th>
				<th style='text-align:center'>Jam</th>
				<th style='text-align:center'>Jumlah Peserta</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = pg_query("SELECT K.idk AS idk, hari, jam, COUNT(distinct DH.id_pendaftar) AS jumlah_murid FROM ((((kelas K INNER JOIN sesi S ON K.ids = S.ids) INNER JOIN tutor T ON K.id_tutor = T.id_tutor) INNER JOIN mata_kuliah M ON K.idm = M.idm) INNER JOIN daftar_hadir DH ON K.idk = DH.idk) WHERE K.id_tutor = '$idtutor' GROUP BY K.idk, hari, jam ORDER BY K.idk, hari, jam");
			while($kelas = pg_fetch_array($query)){
				echo "<tr>";

				echo "<td  style='padding: 3px'>".$kelas['idk']."</td>";
				echo "<td style='padding: 3px'>".$kelas['hari']."</td>";
				echo "<td style='padding: 3px'>".$kelas['jam']."</td>";
				echo "<td style='padding: 3px'>".$kelas['jumlah_murid']."</td>";

				echo "</tr>";
				}
			?>
		</tbody>
		</table></div><br />
	<br />

	<!-- Tabel Daftar Hadir -->
	<div class="container table-responsive p-0">
		<table class="table" border="2">
		<thead>
			<tr>
				<th style='text-align:center'>ID Kelas</th>
				<th style='text-align:center'>Nama Murid</th>
				<!-- <th style='text-align:center'>Jam</th>
				<th style='text-align:center'>Tutor</th> -->
			</tr>
		</thead>
		<tbody>
			<?php
			$query = pg_query("SELECT DH.idk AS idk, P.nama_pendaftar AS murid FROM ((daftar_hadir DH INNER JOIN kelas K ON DH.idk = K.idk) INNER JOIN pendaftar P ON DH.id_pendaftar = P.id_pendaftar) WHERE K.id_tutor = '$idtutor';");
			while($kelas = pg_fetch_array($query)){
				echo "<tr>";

				echo "<td  style='padding: 3px'>".$kelas['idk']."</td>";
				echo "<td style='padding: 3px'>".$kelas['murid']."</td>";
				/* echo "<td style='padding: 3px'>".$kelas['jam']."</td>";
				echo "<td style='padding: 3px'>".$kelas['nama']."</td>"; */

				echo "</tr>";
				}
			?>
		</tbody>
		</table></div><br />
	<br />
	
	<!-- Tabel Upah Tutor -->
	<div class="container table-responsive p-0">
		<table class="table" border="2">
		<thead>
			<tr>
				<th style='text-align:center'>Upahmu</th>
				<!-- <th style='text-align:center'>Nama Murid</th>
				<th style='text-align:center'>Jam</th>
				<th style='text-align:center'>Tutor</th> -->
			</tr>
		</thead>
		<tbody>
			<?php
			$query = pg_query("SELECT CONCAT('Rp', SUM(upah_tutor)) upah_tutor FROM (SELECT CASE WHEN paket = 'A' THEN 12000*COUNT(DH.id_pendaftar) WHEN paket = 'B' THEN 8000*COUNT(DH.id_pendaftar) WHEN paket = 'C' THEN 4000*COUNT(DH.id_pendaftar) END AS upah_tutor FROM ((daftar_hadir DH INNER JOIN kelas K ON DH.idk = K.idk) INNER JOIN pendaftar P ON DH.id_pendaftar = P.id_pendaftar) WHERE K.id_tutor = '$idtutor' GROUP BY P.paket) AS x;");
			while($kelas = pg_fetch_array($query)){
				echo "<tr>";

				echo "<td style='padding: 3px'>".$kelas['upah_tutor']."</td>";
				/* echo "<td style='padding: 3px'>".$kelas['murid']."</td>";
				echo "<td style='padding: 3px'>".$kelas['jam']."</td>";
				echo "<td style='padding: 3px'>".$kelas['nama']."</td>"; */

				echo "</tr>";
				}
			?>
		</tbody>
		</table></div><br />
	<br />	
	</body></html>
