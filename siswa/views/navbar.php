<?php
session_start();
include "../config/connection.php";
?>
<body class="">
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
                      <strong class="text-muted d-block mt-1"><?php echo $_SESSION['nama']; ?></strong>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <a class="dropdown-item" href="./logout.php">
                      <i class="dropdown-icon fe fe-lock"></i> Ganti Password
                    </a>
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
                    <a href="./index.php" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
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
      