<?php
	session_start();
	include("config.php");

if(isset($_POST['submit'])){

	// ambil data dari formulir
	$username = $_POST['username'];
	$password = $_POST['password'];

	//ambil data dari db
	$query = pg_query("SELECT * FROM tutor WHERE username='$username'");
	$tutor = pg_fetch_array($query);
	echo $tutor;

	//cek username udah ada di database atau belum
	if($tutor['username'] == $username){
		//kalau ada, cek password
		if($tutor['password_tutor'] == $password){
			$_SESSION['submit'] = true;
			$_SESSION['idtutor'] = $tutor['id_tutor'];
			header('Location: index2.php?');
			exit;
		}
		else {
			//kalau password salah
			header('Location: login.php?status=pwsalah');
		} 
	}	
	else {
		// kalau username salah
		header('Location: login.php?status=unamesalah');
	}
} else {
	die("Akses dilarang...");
}
?>
