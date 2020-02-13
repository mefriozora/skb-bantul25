<?php
	include "../config/connection.php";

	if (isset($_GET['id'])) {
		$queryverfikasi = mysqli_query($connect,"UPDATE tb_pendaftar SET status_pendaftar='Diterima' WHERE no_pendaftar='".$_GET['id']."'");
		if ($queryverfikasi) {
			 echo "<script>alert('Berhasil Mengubah Status');document.location.href='siswa_diterima.php'</script>";
		}else{
			echo "<script>alert('Gagal Mengubah Status');document.location.href='pendaftaran.php'</script>";
	}
}
?>