<?php include("config.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<title> Tutor BEM FMIPA | Daftar Hadir </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<header>
		<h2> Tutor BEM FMIPA </h2>
		<h5> Daftar Hadir </h5>
	</header>
	
	<nav>
		<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index2.php">My Home</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="index.php"> Logout </a></li>
		</ul>
	  </div>
	</nav>
	
	<table border="2">
	<thead>
		<tr>
			<th style='text-align:center'>Kelas</th>
			<th style='text-align:center'>Nama Murid</th>
		</tr>
	</thead>

	<tbody>
		<?php
		echo $username;
		$query = pg_query("SELECT DH.idk AS idk, P.nama_pendaftar AS nama FROM ((daftar_hadir DH INNER JOIN kelas K ON DH.idk = K.idk) INNER JOIN pendaftar P ON DH.id_pendaftar = P.id_pendaftar) WHERE K.id_tutor = '$username';");

		while($dh = pg_fetch_array($query)){
			echo "<tr>";

			echo "<td  style='padding: 3px'>".$dh['idk']."</td>";
			echo "<td style='padding: 3px'>".$dh['nama']."</td>";

			echo "</tr>";
			}
		?>

	</tbody>

	</table>