<!Doctype html>
	<head>
		<title>Formulir Pendaftaran Siswa Baru</title>
	</head>
	<body>
		<h3> Formulir Pendaftaran Siswa </h3>
		<form action="prosespendaftaran.php" method="POST">
		<fieldset>
			<p>
				<label for='nama'>Nama: </label>
				<input type='text' name='nama' placeholder='Nama Lengkap'/>
			</p>
			<p>
				<label for='alamat'>Alamat: </label>
				<textarea name='alamat'></textarea>
			</p>
			<p>
				<label for='jenis_kelamin'>Jenis Kelamin: </label>
				<label><input type='radio' name='jenis_kelamin' value='Laki-laki'>Laki-laki</label>
				<label><input type='radio' name='jenis_kelamin' value='Perempuan'>Perempuan</label>
			</p>
			<p>
				<label for='sekolah_asal'>Sekolah Asal: </label>
				<input type='text' name='sekolah_asal'placeholder='nama sekolah'/>
			</p>
			<p>
				<input type='submit' value='Daftar' name='daftar'/>
			</p>
		</fieldset></form>
	</body>
</html>