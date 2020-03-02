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
                  <a class="dropdown-item" href="ubah_password.php">
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
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i>Pendaftaran</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="pendaftaran.php" class="dropdown-item ">Pendaftar Masuk</a>
                      <a href="siswa_diterima.php" class="dropdown-item ">Pendaftar Diterima</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i>Master Data</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="siswa.php" class="dropdown-item ">Siswa</a>
                      <a href="kelas.php" class="dropdown-item ">Kelas</a>
                      <a href="paket_kesetaraan.php" class="dropdown-item ">Paket Kesetaraan</a>
                      <a href="tutor.php" class="dropdown-item ">Pamong Belajar</a>
                      <a href="mapel.php" class="dropdown-item ">Mata Pelajaran</a>
                      <a href="ta.php" class="dropdown-item ">Tahun Ajaran</a>
                      <a href="pengguna.php" class="dropdown-item ">Pengguna</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-user-check"></i>Rombel</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="rombel_data.php" class="dropdown-item ">Data Rombel</a>
                      <a href="rombel_pembagian.php" class="dropdown-item ">Pembagian Rombel</a>
					  
					  <?php 
					  //cek semester 
					  $q_semester = mysqli_query($connect, "select * from tb_tahunajaran where semester_id = '2' and ta_status = 'Aktif'");
					  $semester = mysqli_num_rows($q_semester);
					  if($semester > 0){
						echo "<a href='naik_kelas.php?cari=cari' class='dropdown-item'>Kenaikan Kelas</a>";
					  }
					  ?>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="jadwal.php" class="nav-link"><i class="fe fe-calendar"></i>Jadwal</a>
                  </li>
                  <li class="nav-item">
                    <a href="nilai.php" class="nav-link"><i class="fe fe-book-open"></i>Nilai</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file-text"></i>Laporan</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="lap_pendaftar.php" class="dropdown-item ">Laporan Pendaftaran</a>
                      <a href="lap_jadwal.php" class="dropdown-item ">Laporan Jadwal</a>
                      <a href="lap_nilai.php" class="dropdown-item ">Laporan Nilai Siswa</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      