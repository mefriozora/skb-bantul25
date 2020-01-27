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
                      <strong class="text-muted d-block mt-1">Tutor</strong>
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
                    <a href="./home.php" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i>Master Data</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="siswa.php" class="dropdown-item ">Siswa WB</a>
                      <a href="kelas.php" class="dropdown-item ">Kelas</a>
                      <a href="mapel.php" class="dropdown-item ">Mata Pelajaran</a>
                      <a href="ta.php" class="dropdown-item ">Tahun Ajaran</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-book-open"></i>Nilai</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="nilai.php" class="dropdown-item ">Input Nilai</a>
                      <a href="data_nilai.php" class="dropdown-item ">Data Nilai</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>