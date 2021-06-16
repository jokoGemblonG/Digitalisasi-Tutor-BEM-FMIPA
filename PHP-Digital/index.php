<?php
	session_start();
	if(isset($_SESSION['submit'])){
		header("Location: index2.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title> Tutor Bem FMIPA </title>
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
			<li class="active"><a href="index.php"> Home </a></li>
			<li><a href="Form_daftar.php"> Pendaftaran </a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="login.php"> Login (Tutor) </a></li>
		</ul>
	  </div>
	 </nav>
	 
	List Ketersediaan Kelas:<br />
	<br />
	<div class = "container">
		<div class="row">
			<div class="col-lg-4">
				<a href="Bio.php"><img src="./Template/Bio.jpg" style="width:40% "></a></br>
				Biologi </div>
			<div class="col-lg-4">
				<a href="Fis.php"><img src="./Template/Fis.jpg" style="width:40% "></a></br>
				Fisika </div>
			<div class="col-lg-4">
				<a href="Mbl.php"><img src="./Template/Mbl.jpg" style="width:40% "></a></br>
				Matematika dan Berpikir Logis</div>
		</div>
			
		<div class="row">	
			<div class="col-lg-4">
				<a href="Kim.php"><img src="./Template/Kim.jpg" style="width:40% "></a></br>
				Kimia</div>
			<div class="col-lg-4">
				<a href="Sad.php"><img src="./Template/Sad.jpg" style="width:40% "></a></br>
				Statistika dan Analisis Data</div>
		</div>
	</body></html>
