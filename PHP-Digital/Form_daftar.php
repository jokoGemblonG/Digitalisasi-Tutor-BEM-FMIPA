<!DOCtype html>

	<head>
	<title> Tutor Bem FMIPA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>
	<header>
		<h3> Situs Terpadu </h3>
		<h2> Tutor Bem FMIPA </h2>
	</header>
	<nav>
		<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="login.php"> Login Tutor</a></li>
			<li><a href="list tutor.php"> List Tutor</a></li>
			<li><a href="Form_daftar.php"> Pendaftaran</a></li>
		</ul>
	  </div>
	 </nav>
	<body>
	
		<h3 style="text-align:center;">Formulir Pendaftaran Peserta Tutor</h3>
		<formaction="prosesdaftar.php" method="POST">
		<fieldset>
		<p>
			<label for='Nama_pendaftar'>Nama : </label></br>
			<input type='text' name='nama' placeholder='Nama Lengkap'/>
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
			<label for='id_availability'>Kode Tutor : </label></br>
			<input type='text' name='id_availability' placeholder='Kode Tutor'>
		<p>
			<label for='paket'>Paket : </label>
				</br>
				<label><input type='radio' name='paket' value='A'>Paket A</label>
				</br>
				<label><input type='radio' name='paket' value='B'>Paket B</label>
				</br>
				<label><input type='radio' name='paket' value='C'>Paket C</label>
		</p>
	</fieldset></form>
	</body></html>