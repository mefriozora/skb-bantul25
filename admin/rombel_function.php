<?php
include "../config/connection.php";
    if(isset($_POST['tambah']))
    {                                  
      
      $kelas = $_POST['kelas'];
      //var_dump($kelas);
      $nis  = $_POST['nis'];
      //var_dump($nis);
      $_SESSION['idrombel'] = $kelas;
      //var_dump($kelas);
      $jml = count($nis);
      //var_dump($jml);
    //   for ($i=0; $i<$jml; $i++) 
    // {
    //   mysqli_query($connect, "INSERT INTO tb_rombel_siswa(rombel_id,nis) VALUES ('$kelas','{$nis[$i]}')");
    // }
      foreach ($nis as $data)
      {
        $sql = "INSERT INTO tb_rombel_siswa(rombel_id,nis) VALUES ('$kelas','$data')";
        $variii = mysqli_query($connect,$sql);
        echo $sql;
      }
          //echo "masuk";
          echo "<script>alert('Data Berhasil Tersimpan')</script>";
          echo "<script>window.location='rombel_pembagian.php';</script>";
    }

    if(isset($_POST['reset']))
    {                                  
      $_SESSION['idrombel']='0';
      echo "<script>window.location='rombel_pembagian.ph';</script>";
    }
?>
