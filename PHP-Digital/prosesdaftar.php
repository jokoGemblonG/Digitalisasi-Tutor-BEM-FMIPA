<?php
	include('config.php');
	if(isset($_POST['daftar'])){
		$nama = $_POST['nama']
		$jk = $_POST['jenis_kelamin'];
		$no_hp = $_POST['no_hp'];
		$id_sesi = $_POST['id_sesi'];
		
		$query = pg_query("INSERT INTO tabel (nama, jenis_kelamin, no_hp, id_sesi) VALUES('$nama', '$jk', '$no_hp', 'id_sesi')");
		if($query == TRUE){
			header('Location: index.php?status=sukses');
			}
		else{
			header('Location: index.php?status=gagal');}
	}?>
