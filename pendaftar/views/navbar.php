<?php
session_start();
include "../koneksi.php";
include "auth_user.php";
?>
<body class="">
    <div class="page">
      <div class="flex-fill">
        <div class="header py-4">
          <div class="container">
            <label class="d-flex">
              <a class="header-brand" href="">
              <img src="../assets/image/bantul.png" class="header-brand-img" alt="tabler logo">
               <label for="">SKB Bantul</label>
              </a>
<?php
if (!isset ($_SESSION["loginsiswa"]) || $_SESSION ["loginsiswa"] != true){ }else{?>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown d-none d-md-flex">
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <!--<span class="avatar" style="background-image: url(../foto_siswa/)"></span>-->
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?php echo "".$_SESSION["sesi_nama"]."" ?></span>
                      <small class="text-muted d-block mt-1">Siswa</small>
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
<?php } ?>
        </div>

<?php 
if (!isset ($_SESSION["loginsiswa"]) || $_SESSION ["loginsiswa"] != true){
}else{
?>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="./home.php" class="nav-link"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="data_pendaftar.php" class="nav-link"><i class="fe fe-file"></i> Data Pendaftar</a>
                  </li>
                  <li class="nav-item">
                   <!-- <a href="help.php" class="nav-link"><i class="fe fe-file-text"></i>Help?</a>-->
                  </li>
                </ul>
              </div>
            </div>
          </div>
<?php } ?>            
        </div>

    