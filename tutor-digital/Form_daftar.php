<!DOCtype html>

	<head>
	<title> Tutor BEM FMIPA | Daftar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<header>
		<h4> SITUS TERPADU </h4>
		<h2> Tutor BEM FMIPA </h2>
	</header>
	<nav>
		<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php"> Home </a></li>
			<!-- <li><a href="list tutor.php"> List Tutor</a></li>
			<li><a href="Form_daftar.php"> Pendaftaran</a></li> -->
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="login.php"> Login (Tutor)</a></li>
		</ul>
	  </div>
	 </nav>
	<body>
	
		<h3 style="text-align:center;">Formulir Pendaftaran Peserta Tutor</h3>
		<form action="prosesdaftar.php" method="POST">
			<fieldset>
			<p>
				<label for='id_pendaftar'>NIM : </label></br>
				<input type='text' name='id_pendaftar' placeholder='A14190000'>
			</p>
			<p>
				<label for='IDK'>Kode Kelas : </label></br>
				<input type='text' name='IDK' placeholder='Kode Kelas: BIOSEN160001'>
			</p>
			<p>
				<label for='Nama_pendaftar'>Nama : </label></br>
				<input type='text' name='Nama_pendaftar' placeholder='Nama Lengkap'/>
			</p>
			<p>
				<label for='kontak'>Kontak : </label></br>
				<input type='text' name='kontak' placeholder='No HP'>	
			</p>	
			<p>
				<label for='email'>Email : </label></br>
				<input type='email' name='email' placeholder='Email'>
			</p>
			<p>
				<label for='paket'>Paket : </label>
					</br>
					<label><input type='radio' name='paket' value='A'>Paket A (Rp 15.000)</label>
					</br>
					<label><input type='radio' name='paket' value='B'>Paket B (Rp 10.000)</label>
					</br>
					<label><input type='radio' name='paket' value='C'>Paket C &nbsp;&nbsp;(Rp 5.000)</label>
			</p>
			<p>
				<input type='submit' value='daftar' name='daftar'/>
			</p>
		</fieldset></form>
	</body></html>
