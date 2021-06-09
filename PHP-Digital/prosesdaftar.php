<?php
	include('config.php');
	if(isset($_POST['daftar'])){
		$nama = $_POST['Nama_pendaftar']
		$kontak = $_POST['kontak'];
		$email = $_POST['email'];
		$id_availability = $_POST['id_availability'];
		$paket = $_POST['paket']
		
		$query = pg_query("INSERT INTO tabel (Nama_pendaftar, kontak, email, id_availability, paket) 
		VALUES('$Nama_pendaftar', '$kontak', '$email', '$id_availability', 'paket')");
		if($query == TRUE){
			header('Location: index.php?status=sukses');
			}
		else{
			header('Location: index.php?status=gagal');}
	}?>
