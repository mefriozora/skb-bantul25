<?php
  include "../config/connection.php";  
    session_start();
    if($_SESSION['level']=='Siswa'){
?>
<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="../assets/vendor/tabler-master/dist/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/vendor/tabler-master/dist/favicon.ico" />
    <title>SKB Bantul</title>
    <script src="../assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '../'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="../assets/css/dashboard.css" rel="stylesheet" />
    <script src="../assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="../assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="../assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="../assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="../asset/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="../assets/plugins/input-mask/plugin.js"></script>
    <!-- Datatables Plugin -->
    <script src="../assets/plugins/datatables/plugin.js"></script>

<script type="text/javascript">     
function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ( (charCode > 31 && charCode < 48) || charCode > 57) {
            return false;
        }
        return true;
    }
    
function isNumberKey(txt, evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode == 46) {
//Check if the text already contains the . character
if (txt.value.indexOf('.') === -1) {
    return true;
} else {
    return false;
}
} else {
    if (charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;
}
return true;
}    
</script>
</head>
<body class="">
  <?php
    if ($_SESSION['level']=='Siswa') {
      $user_login = $_SESSION['level']=='Siswa';
    }
      $sql_user = mysqli_query($connect,"SELECT *,(SELECT semester FROM tb_semester WHERE semester_status='Aktif') as semester,(SELECT ta_nama FROM tb_tahunajaran WHERE ta_status='Aktif') as tahunajaran FROM tb_pengguna WHERE pengguna_username = '".$user_login."'");
      $varData_user = mysqli_fetch_array($sql_user);
      
  ?>
    <div class="page">
      <div class="flex-fill">
        <div class="header py-4">
          <div class="container">
            <label class="d-flex">
              <a class="header-brand" href="./index.php">
              <img src="../assets/image/bantul.png" class="header-brand-img" alt="tabler logo">
               <label for="">SKB Bantul</label>

              </a>             
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown d-none d-md-flex">
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                  <i class="fe fe-user"></i>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"></span>
                      <strong class="text-muted d-block mt-1"><?php echo $varData_user['pengguna_username'] ?></strong>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="./logout.php">
                      <i class="dropdown-icon fe fe-log-out"></i> Keluar
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
            
        </div>   
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
        <div class="container">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="index.php" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a href="jadwal.php" class="nav-link"><i class="fe fe-calendar"></i>Jadwal</a>
                  </li>
                  <li class="nav-item">
                    <a href="nilai.php" class="nav-link"><i class="fe fe-book-open"></i>Nilai</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <?php
} else{
    echo "<script>alert('login dulu ya');
            window.location=('../auth/login.php');</script>";
}
?>