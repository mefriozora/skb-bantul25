<?php
  include_once "cek_session.php"; include_once "views/main.php";
?>
<?php
  $query = mysqli_query($connect, "SELECT pengguna_username,nik FROM tb_pengguna JOIN tb_pamong_belajar ON tb_pamong_belajar.nik=tb_pengguna.pengguna_username WHERE pengguna_username='".$_SESSION['username']."'");
  $Data = mysqli_fetch_array($query);
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
              //perhitungan jadwal
              $queryjadwal = mysqli_query($connect,"SELECT a.rombel_id, c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a JOIN tb_tahunajaran b ON a.ta_id=b.ta_id JOIN tb_kelas c ON a.kelas_id=c.kelas_id JOIN tb_pamong_belajar e ON a.nik=e.nik JOIN tb_paket f ON c.paket_id=f.paket_id WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif' AND e.nik='".$Data['nik']."')");
              $countjadwal = mysqli_num_rows($queryjadwal);

              //perhitungan nilai
              $querynilai = mysqli_query($connect,"SELECT a.rombel_id, c.kelas_nama,f.paket_nama,b.ta_nama,e.pamong_nama FROM tb_rombel a 
              JOIN tb_tahunajaran b ON b.ta_id=a.ta_id 
              JOIN tb_kelas c ON c.kelas_id=a.kelas_id 
              JOIN tb_pamong_belajar e ON e.nik=a.nik 
              JOIN tb_paket f ON f.paket_id=c.paket_id 
              WHERE a.ta_id=(SELECT ta_id FROM tb_tahunajaran WHERE ta_status='Aktif')AND e.nik='".$Data['nik']."'");
              $countnilai = mysqli_num_rows($querynilai);
            ?>
            <div class="row row-cards">
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
                    
                    <div class="h1 m-0">2</div>
                    <div class="text-muted mb-4">Laporan</div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>