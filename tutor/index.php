<?php
    session_start();
    if(@$_SESSSION['level']=='3'){
?>
<?php include_once "views/main.php";?>
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
              $querypendaftar = mysqli_query($connect,"SELECT * from pendaftar WHERE status_pendaftar='Belum Diterima'");
              $countpendaftar = mysqli_num_rows($querypendaftar);

              //perhitungan jumlah siswa diterima
              $querysiswaditerima = mysqli_query($connect,"SELECT * from pendaftar WHERE status_pendaftar='Diterima'");
              $countsiswaditerima = mysqli_num_rows($querysiswaditerima);

              //perhitungan jumlah tutor
              $querytutor = mysqli_query($connect,"SELECT * from tutor order by kode_tutor asc");
              $counttutor = mysqli_num_rows($querytutor);

              //perhitungan jadwal
              $queryjadwal = mysqli_query($connect,"SELECT jadwal.id_jadwal, tahun_ajaran.ta, mapel.nama_mapel, jadwal.semester, kelas.kelas, jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai, tutor.nama_tutor FROM jadwal LEFT JOIN tahun_ajaran ON tahun_ajaran.kode_ta=jadwal.kode_ta LEFT JOIN kelas ON kelas.kode_kelas=jadwal.kode_kelas LEFT JOIN mapel ON mapel.kode_mapel=jadwal.kode_mapel LEFT JOIN tutor ON tutor.kode_tutor=jadwal.kode_tutor");
              $countjadwal = mysqli_num_rows($queryjadwal);
            ?>
            <div class="row row-cards">
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                   
                    <div class="h1 m-0"><?php echo $countpendaftar ?></div>
                    <div class="text-muted mb-4"><a href="pendaftaran.php">Pendaftar</a></div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    
                    <div class="h1 m-0"><?php echo $countsiswaditerima ?></div>
                    <div class="text-muted mb-4"><a href="siswa.php">Siswa Diterima</a></div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    
                    <div class="h1 m-0"><?php echo $counttutor ?></div>
                    <div class="text-muted mb-4"><a href="tutor.php">Tutor</a></div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    
                    <div class="h1 m-0"><?php echo $countjadwal ?></div>
                    <div class="text-muted mb-4"><a href="jadwal.php">Jadwal Pembelajaran</a></div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    
                    <div class="h1 m-0">$95</div>
                    <div class="text-muted mb-4">Daily Earnings</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    
                    <div class="h1 m-0">621</div>
                    <div class="text-muted mb-4">Products</div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>         
</div>
<?php
    }
?> 