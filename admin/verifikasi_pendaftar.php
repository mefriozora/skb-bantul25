<?php
	include "../config/connection.php";

	if (isset($_GET['id'])) {
		$queryverfikasi = mysqli_query($connect,"UPDATE tb_pendaftar SET status_pendaftar='Diterima' WHERE no_pendaftar='".$_GET['id']."'");
		if ($queryverfikasi) {
			 echo "<script>alert('Berhasil Memverifikasi');document.location.href='siswa.php'</script>";
		}else{
			echo "<script>alert('Gagal Memverifikasi');document.location.href='siswa.php'</script>";
	}
}
?>