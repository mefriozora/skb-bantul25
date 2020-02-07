<?php
    session_start();
    if(@$_SESSSION['level']=='Admin'){
      echo "<script>
      alert('Login dulu);
      window.location.href='../auth/login.php';
      </script>";
       }
    include_once "views/main.php";
?>

<div class="my-3 my-md-3">
    <div class="row-deck">
        <div class="col-12">
            <div class="card">
              <div class="box">
                <div class="box-header">
                <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                Dashboard
              </h1>
            </div>
            <?php
              //perhitungan jumlah pendatar
              $querypendaftar = mysqli_query($connect,"SELECT * from tb_pendaftar WHERE status_pendaftar='Belum Diterima'");
              $countpendaftar = mysqli_num_rows($querypendaftar);

              //perhitungan jumlah siswa diterima
              $querysiswaditerima = mysqli_query($connect,"SELECT * from tb_pendaftar WHERE status_pendaftar='Diterima'");
              $countsiswaditerima = mysqli_num_rows($querysiswaditerima);

              //perhitungan jumlah tutor
              $querytutor = mysqli_query($connect,"SELECT * from tb_pamong_belajar order by nik asc");
              $counttutor = mysqli_num_rows($querytutor);

              //perhitungan jadwal
              $queryjadwal = mysqli_query($connect,"SELECT *  FROM tb_rombel");
              $countjadwal = mysqli_num_rows($queryjadwal);

              //perhitungan nilai
              $querynilai = mysqli_query($connect,"SELECT *  FROM tb_nilai");
              $countnilai = mysqli_num_rows($querynilai);
            ?>
            <div class="row row-cards">
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?php echo $countpendaftar ?></div>
                    <div class="text-muted mb-4"><a href="pendaftaran.php">Pendaftar Masuk</a></div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    
                    <div class="h1 m-0"><?php echo $countsiswaditerima ?></div>
                    <div class="text-muted mb-4"><a href="siswa.php">Pendaftar Diterima</a></div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    
                    <div class="h1 m-0"><?php echo $counttutor ?></div>
                    <div class="text-muted mb-4"><a href="tutor.php">Pamong Belajar</a></div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    
                    <div class="h1 m-0"><?php echo $countjadwal ?></div>
                    <div class="text-muted mb-4"><a href="jadwal.php">Jadwal KBM</a></div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    
                    <div class="h1 m-0"><?php echo $countnilai ?></div>
                    <div class="text-muted mb-4"><a href="nilai.php">Nilai</a></div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    
                    <div class="h1 m-0">3</div>
                    <div class="text-muted mb-4"><a href="laporan.php">Laporan</a></div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>    
