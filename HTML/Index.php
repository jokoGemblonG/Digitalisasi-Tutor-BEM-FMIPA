<!DOCTYPE html>
<html>
<head>
	<title> Pendaftaran Siswa Baru | SMK Coding</title></head>
	
<body>
	<header>
		<h3>Pendaftaran Siswa Baru</h3>
		<h2>SMK Coding</h2>
	</header>
	
	<h4>Menu</h4>
	<nav>
			<ul>
					<li><a
href="form pendaftaran.php">Daftar Baru</a></li>
					<li><a
href="daftarsiswa.php">Pendaftar</a></li>
			</ul>
		</nav>
		
		<?php if(isset($_GET['status'])): ?>
		<p>
				<?php
						if($_GET['status']== 'sukses'){
								echo "Pendaftaran siswa baru berhasil!";
						}else{echo"Pendaftaran gagal!";} ?>
						
		</p>
		<?php endif;?>
		</body></html>
