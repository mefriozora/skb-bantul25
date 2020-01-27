<?php
session_start();
include "config/connection.php";

if(isset($_POST["daftar"])){
    $namapendaftar  = @$_POST['nama'];
    //var_dump($namapendaftar); exit();
    $nisn           = @$_POST['nisn'];
    //var_dump($nisn); exit();
    $tempatlahir    = @$_POST['tempat_lhr'];
    //var_dump($tempatlahir); exit();
    $tgllahir       = @$_POST['tanggal_lhr'];
    //var_dump($tgllahir); exit();
    $agama          = @$_POST['agama'];
    //var_dump($agama);
    $gender         = @$_POST['jenkel'];
    //var_dump($gender); exit();
    $alamatpendaftar= @$_POST['alamat'];
    //var_dump($alamatpendaftar);
    $nohppendaftar  = @$_POST['no_hp'];
    //var_dump($nohppendaftar);
    $asalsekolah    = @$_POST['asal_sekolah'];
    //var_dump($asalsekolah);
    $paketkesetaraan= @$_POST['kesetaraan'];
    //var_dump($paketkesetaraan);
    $setarakelas    = @$_POST['kelas_setara'];
    //var_dump($setarakelas);
    $alamatsekolah  = @$_POST['alamat_sekolah'];
    //var_dump($alamatsekolah);
    $namaayah       = @$_POST['nama_ayah'];
    //var_dump($namaayah);
    $namaibu        = @$_POST['nama_ibu'];
    //var_dump($namaibu);
    $pekerjaanayah  = @$_POST['pekerj_ayah'];
    //var_dump($pekerjaanayah);
    $pekerjaanibu   = @$_POST['pekerj_ibu'];
    //var_dump($pekerjaanibu);
    $alamatortu     = @$_POST['alamat_ortu'];
    //var_dump($alamatortu);
    $namawali       = @$_POST['nama_wali'];
    //var_dump($namawali);
    $pekerjaanwali  = @$_POST['pekerj_wali'];
    //var_dump($pekerjaanwali);
    $alamatwali     = @$_POST['alamat_wali'];
    //var_dump($alamatwali);
    $nohportu_wali  = @$_POST['no_hp_ortuwali'];
    //var_dump($nohportu_wali);
    $tgldaftar      = date("Ymd");
    $varakte        = $_FILES["fileakta"]["name"];
    $varkk          = $_FILES["filekk"]["name"];
    $varijazah      = $_FILES["fileijazah"]["name"];
    $varsuratpindah = $_FILES["file_skpindah"]["name"];
    $varfoto        = $_FILES["file_foto"]["name"];

    move_uploaded_file($_FILES["fileakta"]["tmp_name"],"pendaftar/file_pendaftar/".$_FILES["fileakta"]["name"]);
    move_uploaded_file($_FILES["filekk"]["tmp_name"],"pendaftar/file_pendaftar/".$_FILES["filekk"]["name"]);
    move_uploaded_file($_FILES["fileijazah"]["tmp_name"],"pendaftar/file_pendaftar/".$_FILES["fileijazah"]["name"]);
    move_uploaded_file($_FILES["file_skpindah"]["tmp_name"],"pendaftar/file_pendaftar/".$_FILES["file_skpindah"]["name"]);
    move_uploaded_file($_FILES["file_foto"]["tmp_name"],"pendaftar/file_pendaftar/".$_FILES["file_foto"]["name"]);


    $query1 = "SELECT max(no_pendaftar) as maxPENDAFTAR FROM tb_pendaftar where no_pendaftar LIKE '$paketkesetaraan%'";
    $result1 = mysqli_query($connect,$query1);
    $data1 = mysqli_fetch_array($result1);
    $idMax = $data1['maxPENDAFTAR'];

    $noUrut = (int) substr($idMax, 9,4);
    $noUrut++;

    $newID = $paketkesetaraan .$tgldaftar . sprintf("%04s", $noUrut);

    $query2 = "INSERT INTO `tb_pendaftar`(`no_pendaftar`, `nama`, `nisn`, `tempat_lhr`, `tanggal_lhr`, `agama`, `jenkel`, `alamat`, `no_hp`, `paket_kesetaraan`, `kelas_kesetaraan`, `tgl_pendaftaran`, `asal_sekolah`, `alamat_sekolah`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `nama_wali`, `pekerjaan_wali`, `alamat_wali`, `no_hp_ortuwali`, `foto`, `status_pendaftar`, `akte`, `kk`, `ijazah_raport`, `sk_pindah_sekolah`) VALUES ('$newID','$namapendaftar','$nisn','$tempatlahir','$tgllahir','$agama','$gender','$alamatpendaftar','$nohppendaftar','$paketkesetaraan','$setarakelas','$tgldaftar','$asalsekolah','$alamatsekolah','$namaayah','$namaibu','$pekerjaanayah','$pekerjaanibu','$alamatortu','$namawali','$pekerjaanwali','$alamatwali','$nohportu_wali','$varfoto','Belum Diterima','$varakte','$varkk','$varijazah','$varsuratpindah')";
     $result2 = mysqli_query($connect,$query2);
    //var_dump($result2);
     if ($result2) {
       //echo "berhasil"; 
      echo "<script>alert('Berhasil daftar');document.location.href='pendaftar/info_pendaftar.php'</script>";
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
