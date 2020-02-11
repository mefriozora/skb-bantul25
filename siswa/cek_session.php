<?php
session_start();
if(@$_SESSION['level']!="Siswa"){
	echo "<script>
		alert('Mohon Maaf, Anda tidak berhak mengakses halaman ini');
		window.location.href='../auth/login.php';
		</script>";
}
?>