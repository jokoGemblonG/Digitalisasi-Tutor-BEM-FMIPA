<?php
	include('config.php');
	if(isset($_POST['daftar'])){
		$id_pendaftar = $_POST['id_pendaftar'];
		$IDK = $_POST['IDK'];
		$nama = $_POST['Nama_pendaftar'];
		$kontak = $_POST['kontak'];
		$email = $_POST['email'];
		$paket = $_POST['paket'];
		
		$query_cek = pg_fetch_array(pg_query("SELECT COUNT(*) FROM daftar_hadir WHERE id_pendaftar = '$id_pendaftar' AND idk = '$IDK'"));

		if ($query_cek['count'] > 0) {
			header('Location: index.php?status=gagal');
		}
		else{
			$query_p = pg_query("INSERT INTO pendaftar (id_pendaftar, nama_pendaftar, no_hp, email, paket) VALUES('$id_pendaftar', '$nama', '$kontak', '$email', '$paket')");
			$query_dh = pg_query("INSERT INTO daftar_hadir (idk, id_pendaftar) VALUES('$IDK','$id_pendaftar')");
			header('Location: index.php?status=sukses');
		}
		/*
		if($query_p == TRUE && $query_dh == TRUE && $query_cek == FALSE){
			header('Location: index.php?status=sukses');
		}
		elseif($query_dh != TRUE){
			header('Location: index.php?status=gagal1');
		}
		elseif ($query_cek == TRUE) {
			header('Location: index.php?status=gagal2');
		}
		else{}*/
			
		

}
?>
