<?php 
	include("config.php");
	session_start();
	if(isset($_SESSION['submit'])){
		header("Location: index2.php");
		exit;
	}
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
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="Form_daftar.php"> Pendaftaran</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="login.php"> Login Tutor</a></li>
		</ul>
	  </div>
	 </nav>
	 
	<table border="2">
	<thead>
		<tr>
			<th style='text-align:center'>ID Kelas</th>
			<th style='text-align:center'>Hari</th>
			<th style='text-align:center'>Jam</th>
			<th style='text-align:center'>Tutor</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$query = pg_query("SELECT K.idk AS idk, hari, jam, nama FROM (((kelas K INNER JOIN sesi S ON K.ids = S.ids) INNER JOIN tutor T ON K.id_tutor = T.id_tutor) INNER JOIN mata_kuliah M ON K.idm = M.idm) WHERE K.idm = 'SAD'");

		while($kelas = pg_fetch_array($query)){
			echo "<tr>";

			echo "<td  style='padding: 3px'>".$kelas['idk']."</td>";
			echo "<td style='padding: 3px'>".$kelas['hari']."</td>";
			echo "<td style='padding: 3px'>".$kelas['jam']."</td>";
			echo "<td style='padding: 3px'>".$kelas['nama']."</td>";

			echo "</tr>";
			}
		?>

	</tbody>

	</table>
	</body></html>
