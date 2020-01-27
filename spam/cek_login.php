<?php
ini_set('display_error',0);
ini_set('error_reporting',E_ERROR);
include"../config/connection.php";

$username = $_POST['username'];
$pass     = $_POST['password'];

if (empty($username) AND empty($pass)){ 
  echo"<script>alert('Silahkan lengkapi data Login !');history.back(-1);</script>";  
}
else{ 
  $login=mysqli_query($connect,"SELECT * FROM user WHERE username='$username' AND password='$pass'");
  $ketemu=mysqli_num_rows($login);
  $r=mysqli_fetch_array($login);

  if ($ketemu > 0){
    session_start();
      $_SESSION['sesi_nama']    = $r['nama'];
      $_SESSION['sesi_level']   = $r['level'];
      $_SESSION["loginadm"]     = true; 
      echo"<script>window.location.href='home.php';</script>";            
  }
  else{   
      $_SESSION["loginadm"]     = false;     
      echo"<script>alert('Login Gagal!. Data tidak ditemukan');history.back(-1);</script>"; 
  }

}

?>
