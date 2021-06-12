<?php
	include('config.php');
	if(isset($_POST['daftar'])){
		$id_pendaftar = $_POST['id_pendaftar'];
		$IDK = $_POST['IDK'];
		$nama = $_POST['Nama_pendaftar'];
		$kontak = $_POST['kontak'];
		$email = $_POST['email'];
		$paket = $_POST['paket'];
		
		$query = pg_query("INSERT INTO pendaftar (id_pendaftar, idk, nama_pendaftar, no_hp, email, paket) VALUES('$id_pendaftar','$IDK', '$nama', '$kontak', '$email', '$paket')");
		
		if($query == TRUE){
			header('Location: index.php?status=sukses');
			}
		else{
			header('Location: index.php?status=gagal');}
	}?>
	
