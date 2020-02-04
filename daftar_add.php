<?php
session_start();
include "config/connection.php";

if(isset($_POST["daftar"])){
    $paketkesetaraan    = $_POST['paket'];
    $kelas              = $_POST['tampil'];
    $namapendaftar      = $_POST['nama'];
    $tempatlahir        = $_POST['tempat_lhr'];
    $tangallahir       = $_POST['tanggal_lhr'];
    $agama              = $_POST['agama'];
    $jenkel             = $_POST['jenkel'];
    $alamatpendaftar    = $_POST['alamat'];
    $nohppendaftar      = $_POST['no_hp'];
    $asalsekolah        = $_POST['asal_sekolah'];
    $putuskelas         = $_POST['putus_sekolah_kelas'];
    $putussemester      = $_POST['putus_sekolah_semester'];
    $alamatsekolah      = $_POST['alamat_sekolah'];
    $bertempattingggal  = $_POST['tempat_tinggal'];
    $namaayah           = $_POST['nama_ayah'];
    $pekerjaanayah      = $_POST['pekerj_ayah'];
    $namaibu            = $_POST['nama_ibu'];
    $pekerjaanibu       = $_POST['pekerj_ibu'];
    $alamatortu         = $_POST['alamat_ortu'];
    $teleponortu        = $_POST['no_hp_ortuwali'];
    $tgldaftar          = date("Ymd");
    $varakte            = $_FILES["fileakta"]["name"];
    $varkk              = $_FILES["filekk"]["name"];
    $varijazah          = $_FILES["fileijazah"]["name"];
    $varsuratpindah     = $_FILES["file_skpindah"]["name"];
    $varfoto            = $_FILES["file_foto"]["name"];

    move_uploaded_file($_FILES["fileakta"]["tmp_name"],"pendaftaran/file_pendaftar/".$_FILES["fileakta"]["name"]);
    move_uploaded_file($_FILES["filekk"]["tmp_name"],"pendaftaran/file_pendaftar/".$_FILES["filekk"]["name"]);
    move_uploaded_file($_FILES["fileijazah"]["tmp_name"],"pendaftaran/file_pendaftar/".$_FILES["fileijazah"]["name"]);
    move_uploaded_file($_FILES["file_skpindah"]["tmp_name"],"pendaftaran/file_pendaftar/".$_FILES["file_skpindah"]["name"]);
    move_uploaded_file($_FILES["file_foto"]["tmp_name"],"pendaftaran/file_pendaftar/".$_FILES["file_foto"]["name"]);


    $query1 = "SELECT max(no_pendaftar) as maxPENDAFTAR FROM tb_pendaftar where no_pendaftar LIKE '$paketkesetaraan%'";
    $result1 = mysqli_query($connect,$query1);
    $data1 = mysqli_fetch_array($result1);
    $idMax = $data1['maxPENDAFTAR'];

    $noUrut = (int) substr($idMax, 9,4);
    $noUrut++;

    $newID = $paketkesetaraan .$tgldaftar . sprintf("%04s", $noUrut);

    $query2 = "INSERT INTO `tb_pendaftar`(`no_pendaftar`, `paket_kesetaraan`, `kelas_kesetaraan`, `nama`, `tempat_lhr`, `tanggal_lhr`, `agama`, `jenkel`, `alamat_domisili`, `no_hp`, `tgl_pendaftaran`, `asal_sekolah`, `putus_sekolah_kelas`, `putus_sekolah_semester`, `alamat_sekolah`, `bertempat_tinggal`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `no_hp_ortuwali`, `status_pendaftar`, `foto`, `akte`, `kk`, `ijazah_raport`, `sk_pindah_sekolah`) VALUES ('$newID','$paketkesetaraan','$kelas','$namapendaftar','$tempatlahir','$tangallahir','$agama','$jenkel','$alamatpendaftar','$nohppendaftar','$tgldaftar','$asalsekolah','$putuskelas','$putussemester','$alamatsekolah','$bertempattingggal','$namaayah','$namaibu','$pekerjaanayah','$pekerjaanibu','$alamatortu','$teleponortu','Belum Diterima','$varfoto','$varakte','$varkk','$varijazah','$varsuratpindah')";
     $result2 = mysqli_query($connect,$query2);
    //var_dump($result2);
     if ($result2) {
       //echo "berhasil"; 
      echo "<script>alert('Berhasil daftar');document.location.href='index.php'</script>";
  } else {
    //echo "gagal";
    echo "<script>alert('Gagal daftar');document.location.href='daftar.php'</script>";
  }
  } else {
    //echo "gagal upload";
    echo "<script>alert('File gagal diupload');document.location.href='daftar.php'</script>";
  }




    /*$kesetaraan     = $
    $queryc         = mysqli_query($connect, "SELECT no_pendaftar FROM pendaftar");
    $baris          = mysqli_num_rows($queryc);

    if($baris == 0){
        $tanggal    = date("Ymd");
        $awal     = 1;
        $gabungawal = "$tanggal"."000"."$awal";
        //$hasilkode = str_pad($gabungawal, 4, "0", STR_PAD_LEFT);
        $querry     = "INSERT INTO pendaftar VALUES ('$gabungawal','','','','','','','','','','','','','','','','','','','','','','')";
        $QInsert = mysqli_query($connect, $querry);
         echo "<script>alert('Berhasil'); document.location.href='index.php'</script>";

    } else {
        $tanggal    = date("Ymd");
        $kedua      = mysqli_query($connect, "SELECT no_pendaftar FROM pendaftar ORDER BY no_pendaftar DESC LIMIT 1");
        $pecahno    = mysqli_fetch_array($kedua);
        // var_dump($pecahno);die;
        $pecahnoo   = $pecahno["no_pendaftar"];
        $sub        = substr($pecahnoo,8,4);
        $konversi   = intval($sub);
        //var_dump($konversi);die;
        $angkabaru  = $konversi+1;
        $gabungkedua= "$tanggal"."000"."$angkabaru";
        //var_dump($sub);die;
        $QQTambah   = "INSERT INTO pendaftar VALUES ('$gabungkedua','','','','','','','','','','','','','','','','','','','','','','')";
        $QTambah    = mysqli_query($connect, $QQTambah);
        echo "<script>alert('Berhasil'); document.location.href='index.php'</script>";
    }
}*/
?>
