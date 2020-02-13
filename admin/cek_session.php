<?php
session_start();
if(@$_SESSION['level']!="Admin"){
	echo "<script>
		alert('Mohon Maaf, Anda tidak berhak mengakses halaman ini');
		window.location.href='../auth/login.php';
		</script>";
}
?>