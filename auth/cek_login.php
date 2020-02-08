<?php

 include '../config/connection.php';

 if (isset($_POST['login'])) {

 	$varUsername 	= $_POST['username'];
 	$varPassword	= md5($_POST['password']);

 	//proses cek database
 	$sql = mysqli_query($connect, "SELECT *,(SELECT semester FROM tb_semester WHERE semester_status='Aktif') as semester,(SELECT ta_nama FROM tb_tahunajaran WHERE ta_status='Aktif') as tahunajaran FROM tb_pengguna WHERE pengguna_username='$varUsername' AND pengguna_password='$varPassword'") or die(mysqli_error());
 	$varResult 	= mysqli_fetch_array($sql);
 	$varCekPswd	= $varResult['pengguna_password'];

   //cek username
 	$varCekuser	= mysqli_query($connect,"SELECT pengguna_username FROM tb_pengguna WHERE pengguna_username ='$varUsername'");
	$varResultuser 	= mysqli_fetch_array($varCekuser);
 	
	//cek username ada atau tidak
	//kondisi username  kosong
 	if (empty($varResultuser)) {
 		echo "<script>
		alert('Username Anda Tidak Terdaftar');
		window.location.href='login.php';
		</script>";
	//kondisi jika nip ada maka masuk proses cek password
	}else if (isset($varResultuser)){
		//cek apakah password inputan sama dengan password database
		//konidisi jika password tidak sama 
		if ($varPassword!=$varCekPswd) {
			echo "<script>
			alert('Password Anda Salah');
			window.location.href='login.php';
			</script>";
		//kondisi jika password sama bisa login
		}else{	
			$level 		= $varResult['pengguna_level'];
		 	$varNama	= $varResult['pengguna_nama'];
			$username   = $varResult['pengguna_username'];
			$password   = $varResult['pengguna_password'];
			$idpengguna = $varResult['pengguna_id'];
			$semester   = $varResult['semester'];
			$tahunajaran= $varResult['tahunajaran'];
			

		 	session_start();
		 	//membuat session
		 	$_SESSION['nama']			= $varNama;
			$_SESSION['level']			= $level;
			$_SESSION['username']		= $username;
			$_SESSION['password']		= $password;
			$_SESSION['id']				= $idpengguna;
	        $_SESSION['semester']		= $semester;
	        $_SESSION['tahunajaran']	= $tahunajaran;
	        $_SESSION['idrombel']		='0';
		 	
		 	if ($level =='Admin' ) {
		 		echo "<script>
				alert('Login Berhasil Sebagai Admin');
				window.location.href='../admin/index.php';
				</script>";
		 		//exit();
		 		//echo "Masuk admin";
		 		
		 	}else if ($level == 'Siswa') {
		 		echo "<script>
				alert('Login Berhasil Sebagai Siswa');
				window.location.href='../latihan_siswa/index.php';
				</script>";
		
		 }else{
		 	header('location : logout.php');
		 }
		}
 	}

//ketika belum klik tombol
}else{
	
echo "<script>window.location.href='login.php';</script>";
}
?>
