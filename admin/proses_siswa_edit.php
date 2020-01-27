<?php
    include "../config/connection.php";

    if(isset($_POST['btnedit'])){

        $statussiswa   = $_POST['statussiswa'];

        $updatesiswa = mysqli_query($connect,"UPDATE `tb_siswa` SET `siswa_status`='$statussiswa' WHERE nis='".$_GET['id']."'");

        if($updatesiswa){
            echo "<script>alert('Data berhasil di update');document.location.href='siswaaktif.php'</script>";
        }else{
            echo "<script>alert('Data gagal di update');document.location.href='siswa_edit.php'</script>";
        }
    }
?>