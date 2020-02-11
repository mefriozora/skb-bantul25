<?php
session_start();
if(@$_SESSION['level']!="Pamong"){
	echo "<script>
		alert('Mohon Maaf, Anda tidak berhak mengakses halaman ini');
		window.location.href='../auth/login.php';
		</script>";
}
?>