<?php

include("config.php") ;

if( !isset($_GET['id']) ){
    header('Location: daftarsiswa.php');
}

$id = $_GET['id'];

$sql = "SELECT * FROM calonsiswa WHERE id=$id" ;
$query = pg_query($db, $sql);
$siswa = pg_fetch_assoc($query) ;

if(pg_num_rows($query) < 1 ){
	die ("Data tidak ditemukan") ;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Siswa | SMK Coding </title>
</head>
<body>
	<header>
		<h3>Formulir Edit Siswa</h3>
	</header>

	<form action="prosesedit.php" method= "POST">
		
		<fieldset>
			<input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />
	<p>
		<label for="nama">Nama: </label>
		<input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $siswa['nama'] ?>" />
	</p>
	<p>
		<label for="alamat">Alamat : </label>
		<textarea name="alamat"><?php echo $siswa['alamat'] ?></textarea>
	</p>
	<p>
		<label for="jenis_kelamin">Jenis Kelamin: </label>
		<?php $jk = $siswa['jenis_kelamin']; ?>
		<label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked": "" ?>> Laki-laki</label>
        <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked": "" ?>> Perempuan</label>
	</p>
	<p>
		<label for="sekolah_asal">Sekolah Asal: </label>
		<input type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" />
	</p>
	<p>
		<input type="submit" value="Simpan" name="simpan" />
	</p>
		</fieldset>

	</form>

</body>
</html>
