<?php
    include "../config/connection.php";
    if(isset($_POST['btntambah'])){
        $nopendaftar    = $_POST['no_pendaftar'];
        $nissiswa       = $_POST['no_induk'];
        $namasiswa      = $_POST['nama'];
        $status    = $_POST['statussiswa'];
        $varUser        = $_POST['no_induk'];
        $varPswd        = md5($_POST['no_induk']);

         $querySiswa = "INSERT INTO `tb_siswa`(`nis`, `no_pendaftar`, `nama_siswa`, `siswa_status`) VALUES ('$nissiswa','$nopendaftar','$namasiswa','$status')";
    //var_dump($querySiswa); exit();

    //proses simpan ke user
    $queryUser  = mysqli_query($connect,"INSERT INTO `tb_pengguna`(`pengguna_id`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_level`) VALUES ('','$namasiswa','$varUser','$varPswd','siswa')");

    $sql = mysqli_query($connect,$querySiswa);
    //var_dump($sql);
  if ($sql) {
    
    //echo "masuk";
    echo "<script>alert('data berhasil ditambahkan');document.location.href='siswaaktif.php'</script>";
  } else {
    //echo "gagal";
    echo "<script>alert('data gagal ditambahkan');document.location.href='siswaaktif.php'</script>";
  }
}
?>